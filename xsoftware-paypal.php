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
                $this->options = get_option('xs_options_paypal');

                add_filter('xs_cart_approval_link', [$this, 'get_approval_link']);
                add_filter('xs_cart_validate', [$this, 'checkout_validation']);
        }

        function get_approval_link($sale_order)
        {

                if(empty($this->options['user']['client_id'])) {
                        echo 'Set client_id first!';
                        return;
                }
                if(empty($this->options['user']['client_secret'])) {
                        echo 'Set client_secret first!';
                        return;
                }

                $paypal_id = $this->options['user']['client_id'];
                $paypal_secret = $this->options['user']['client_secret'];

                $list = new ItemList();


                foreach($sale_order['items'] as $id => $values) {
                        $tmp = new Item();
                        $tmp->setName($values['name']);
                        $tmp->setCurrency($sale_order['currency']);
                        $tmp->setQuantity($values['quantity']);
                        $tmp->setSku(strval($values['id']));
                        $tmp->setPrice($values['price']);
                        $list->addItem($tmp);

                }

                $apiContext = getApiContext($paypal_id, $paypal_secret);
                // ### Payer
                // A resource representing a Payer that funds a payment
                // For paypal account payments, set payment method
                // to 'paypal'.
                $payer = new Payer();
                $payer->setPaymentMethod("paypal");

                $details = new Details();
                $details->setTax($sale_order['taxed']);
                $details->setSubtotal($sale_order['untaxed']);

                $amount = new Amount();
                $amount->setCurrency($sale_order['currency']);
                $amount->setTotal($sale_order['total']);
                $amount->setDetails($details);

                $transaction = new Transaction();
                $transaction->setAmount($amount);
                $transaction->setItemList($list);
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

                $paypal_id = $this->options['user']['client_id'];
                $paypal_secret = $this->options['user']['client_secret'];

                $apiContext = getApiContext($paypal_id, $paypal_secret);
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

                $offset = $payment->toArray();

                $var_fees = !empty($this->options['fees']['var_fees']) ?
                        floatval($this->options['fees']['var_fees']) :
                        0;

                $fixed_fees = !empty($this->options['fees']['fixed_fees']) ?
                        floatval($this->options['fees']['fixed_fees']) :
                        0;

                $amount = $offset['transactions'][0]['amount']['total'];

                if($var_fees !== 0 || $fixed_fees !== 0) {
                        $amount_fees = $amount * ($var_fees / 100) + $fixed_fees;
                        $offset['amount_fees'] = $amount_fees;
                }

                $offset['id'] = str_replace('PAYID-','',$offset['id']);

                return $offset;
	}

}

endif;

$xs_paypal_plugin = new xs_paypal_plugin();

?>