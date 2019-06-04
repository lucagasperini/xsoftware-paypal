<?php
/*
Plugin Name: XSoftware Paypal
Description: Paypal management on wordpress.
Version: 1.0
Author: Luca Gasperini
Author URI: https://xsoftware.it/
Text Domain: xsoftware_paypal
*/

if(!defined("ABSPATH")) die;

require 'paypal-sdk/bootstrap.php';
include 'xsoftware-paypal-options.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

if (!class_exists("xs_paypal_plugin")) :

class xs_paypal_plugin
{

        public function __construct()
        {
                add_action('add_meta_boxes', array($this, 'metaboxes'));
                add_action('save_post', array($this,'save'), 10, 2 );
                add_shortcode('xs_paypal_add_cart', [$this,'shortcode_add_cart']);
                add_shortcode('xs_paypal_checkout', [$this,'shortcode_checkout']);

                $this->options = get_option('xs_options_paypal');

        }

        function get_vat_list($field)
        {
                $vat = $this->options['vat'];
                $offset = array();

                foreach($vat as $key => $values){
                        $offset[$key] = $values[$field];
                }

                return $offset;
        }

        function metaboxes()
        {
                add_meta_box(
                        'xs_paypal_metaboxes',
                        'XSoftware Paypal',
                        array($this,'metaboxes_print'),
                        ['xs_product'],
                        'advanced',
                        'high'
                );
        }
        function metaboxes_print($post)
        {
                $v = get_post_meta( $post->ID );

                $price = isset($v['xs_paypal_price'][0]) ? $v['xs_paypal_price'][0] : '';
                $vat = isset($v['xs_paypal_vat'][0]) ? $v['xs_paypal_vat'][0] : '';

                $data[0][0] = 'Select a Price:';
                $data[0][1] = xs_framework::create_input([
                        'name' => 'xs_paypal_price',
                        'value' => $price
                ]);
                $data[1][0] = 'Select VAT';
                $data[1][1] = xs_framework::create_select([
                        'name' => 'xs_paypal_vat',
                        'selected' => $vat,
                        'data' => $this->get_vat_list('descr'),
                        'default' => 'Select a VAT'
                ]);

                xs_framework::create_table(array('data' => $data ));
        }


        function save($post_id, $post)
        {
                $post_type = get_post_type($post_id);

                if($post_type !== 'xs_product')
                        return;

                if(isset($_POST['xs_paypal_price']) && !empty($_POST['xs_paypal_price'])) {
                        $price = floatval($_POST['xs_paypal_price']);
                        update_post_meta( $post_id, 'xs_paypal_price', $price );
                }
                if(isset($_POST['xs_paypal_vat']) && !empty($_POST['xs_paypal_vat'])) {
                        update_post_meta( $post_id, 'xs_paypal_vat', $_POST['xs_paypal_vat'] );
                }
        }

        function shortcode_add_cart()
        {
                global $post;

                wp_enqueue_style('xs_paypal_item_style', plugins_url('style/item.css', __FILE__));

                $btn = xs_framework::create_button([
                        'name' => 'add_cart',
                        'value' => $post->ID,
                        'text' => 'Add to Cart'
                ]);
                $qt = xs_framework::create_input_number([
                        'name' => 'qt',
                        'value' => 1
                ]);

                echo '<form action="'.$this->options['sys']['checkout'].'" method="get">';
                xs_framework::create_container([
                        'class' => 'xs_add_cart_container',
                        'obj' => [$btn, $qt],
                        'echo' => TRUE
                ]);
                echo '</form>';
        }

        function shortcode_checkout()
        {
                if(isset($_GET['add_cart']) && !empty($_GET['add_cart'])){

                        $id = $_GET['add_cart'];
                        $post_type = get_post_type($id);
                        $v = get_post_meta( $id );
                        if(isset($_GET['qt']) && !empty($_GET['qt']) && is_numeric($_GET['qt']))
                                $qt = intval($_GET['qt']);
                        else
                                $qt = 1;

                        if(
                        $post_type === 'xs_product' &&
                        isset($v['xs_paypal_price'][0]) &&
                        !empty($v['xs_paypal_price'][0])
                        ) {
                                $_SESSION['xs_paypal'][$id] = $qt;
                        }
                } else if(isset($_GET['success']) && $_GET['success'] === 'true') {
                        $result = $this->checkout_validation();
                        if($result !== 0) {
                                echo 'The payment was successful!';
                                unset($_SESSION['xs_paypal']);
                        }
                        return;

                } else if(isset($_GET['rem_cart']) && !empty($_GET['rem_cart'])) {
                        $id = $_GET['rem_cart'];
                        unset($_SESSION['xs_paypal'][$id]);
                }
                if(isset($_SESSION['xs_paypal']) && !empty($_SESSION['xs_paypal'])){
                        $this->checkout_show_cart();
                } else {
                        echo 'The cart is empty!';
                        return;
                }
        }

        function checkout_show_cart()
        {

                if(empty($this->options['user']['client_id'])) {
                        echo 'Set client_id first!';
                        return;
                }
                if(empty($this->options['user']['client_secret'])) {
                        echo 'Set client_secret first!';
                        return;
                }

                if(!isset($_SESSION['xs_paypal']) || empty($_SESSION['xs_paypal'])){
                        echo 'Empty!';
                        return;
                }

                $clientId = $this->options['user']['client_id'];
                $clientSecret = $this->options['user']['client_secret'];
                $currency = $this->options['sys']['currency'];

                $itemList = new ItemList();

                $subtotal = 0;
                $tax = 0;
                $vat_list = array();


                $table = array();

                foreach($_SESSION['xs_paypal'] as $id => $quantity) {
                        $post = get_post($id);
                        $post_meta = get_post_meta($id);

                        $tmp = new Item();
                        $tmp->setName($post->post_title);
                        $tmp->setCurrency($currency);
                        $tmp->setQuantity($quantity);
                        $tmp->setSku(strval($id));
                        $price = floatval($post_meta['xs_paypal_price'][0]);
                        $tmp->setPrice($price);
                        $vat = $post_meta['xs_paypal_vat'][0];
                        $vat_list[$vat][] = $price * $quantity;
                        $subtotal += $price * $quantity;
                        $itemList->addItem($tmp);
                        $table[$id]['id'] = $id;
                        $table[$id]['name'] = $post->post_title;
                        $table[$id]['quantity'] = $quantity;
                        $table[$id]['price'] = $price . ' ' . $currency;
                        $table[$id]['actions'] = '<a href="?rem_cart='.$id.'">Remove</a>';
                }

                xs_framework::create_table([
                        'data' => $table,
                        'headers' => [
                                'ID',
                                'Name',
                                'Quantity',
                                'Price',
                                'Actions',
                        ]
                ]);

                foreach($vat_list as $key => $types)
                {
                        $x = 0;
                        foreach($types as $single)
                                $x += $single;

                        $tax += $x * ($this->options['vat'][$key]['rate']/100);
                }

                $total = $subtotal + $tax;

                $t['subtotal'][0] = 'Subtotal:';
                $t['subtotal'][1] = $subtotal . ' ' . $currency;
                $t['total'][0] = 'Total:';
                $t['total'][1] = $total . ' ' . $currency;
                xs_framework::create_table([
                        'data' => $t
                ]);

                $apiContext = getApiContext($clientId, $clientSecret);
                // ### Payer
                // A resource representing a Payer that funds a payment
                // For paypal account payments, set payment method
                // to 'paypal'.
                $payer = new Payer();
                $payer->setPaymentMethod("paypal");

                $details = new Details();
                $details->setTax($tax);
                $details->setSubtotal($subtotal);

                $amount = new Amount();
                $amount->setCurrency($currency);
                $amount->setTotal($total);
                $amount->setDetails($details);

                $transaction = new Transaction();
                $transaction->setAmount($amount);
                $transaction->setItemList($itemList);
                $transaction->setInvoiceNumber(uniqid());
                $transaction->setDescription("Payment description");
                // ### Redirect urls
                // Set the urls that the buyer must be redirected to after
                // payment approval/ cancellation.
                $baseUrl = $this->options['sys']['checkout'];
                $redirectUrls = new RedirectUrls();
                $redirectUrls->setReturnUrl("$baseUrl/?success=true")
                ->setCancelUrl("$baseUrl/?success=false");

                // ### Payment
                // A Payment Resource; create one using
                // the above types and intent set to 'sale'
                $payment = new Payment();
                $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));


                // For Sample Purposes Only.
                $request = clone $payment;

                // ### Create Payment
                // Create a payment by calling the 'create' method
                // passing it a valid apiContext.
                // (See bootstrap.php for more on `ApiContext`)
                // The return object contains the state and the
                // url to which the buyer must be redirected to
                // for payment approval
                $payment->create($apiContext);

                // ### Get redirect url
                // The API response provides the url that you must redirect
                // the buyer to. Retrieve the url from the $payment->getApprovalLink()
                // method
                $approvalUrl = $payment->getApprovalLink();

                include_once 'paypal-button.php';
                print_paypal_btn($approvalUrl);

                return $payment;
        }

        function checkout_validation()
        {
                if(!isset($_GET['paymentId']) || empty($_GET['paymentId'])){
                        return 0;
                }
                if(empty($this->options['user']['client_id'])) {
                        echo 'Set client_id first!';
                        return 0;
                }
                if(empty($this->options['user']['client_secret'])) {
                        echo 'Set client_secret first!';
                        return 0;
                }

                $clientId = $this->options['user']['client_id'];
                $clientSecret = $this->options['user']['client_secret'];
                $currency = $this->options['sys']['currency'];

                $apiContext = getApiContext($clientId, $clientSecret);
                // Get the payment Object by passing paymentId
                // payment id was previously stored in session in
                // CreatePaymentUsingPayPal.php
                $paymentId = $_GET['paymentId'];
                $payment = Payment::get($paymentId, $apiContext);

                // ### Payment Execute
                // PaymentExecution object includes information necessary
                // to execute a PayPal account payment.
                // The payer_id is added to the request query parameters
                // when the user is redirected from paypal back to your site
                $execution = new PaymentExecution();
                $execution->setPayerId($_GET['PayerID']);

                $result = $payment->execute($execution, $apiContext);


                $payment = Payment::get($paymentId, $apiContext);

                return $payment;

	}

}

endif;

$xs_paypal_plugin = new xs_paypal_plugin();

?>