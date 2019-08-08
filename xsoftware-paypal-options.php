<?php

if(!defined("ABSPATH")) die;

if (!class_exists("xs_paypal_options")) :

class xs_paypal_options
{

        private $default = array (
                'user' => [
                        'client_id' => '',
                        'client_secret' => '',
                        'mode' => 'sandbox'
                ],
                'fees' => [
                        'fixed_fees' => 0,
                        'var_fees' => 0,
                ]
        );

        public function __construct()
        {
                add_action('admin_menu', array($this, 'admin_menu'));
                add_action('admin_init', array($this, 'section_menu'));
                $this->options = get_option('xs_options_paypal', $this->default);

        }

        function admin_menu()
        {
                add_submenu_page(
                'xsoftware',
                'XSoftware Paypal',
                'Paypal',
                'manage_options',
                'xsoftware_paypal',
                array($this, 'menu_page') );
        }


        public function menu_page()
        {
                if ( !current_user_can( 'manage_options' ) )  {
                        wp_die( __( 'Exit!' ) );
                }

                echo '<div class="wrap">';

                echo "<h2>Paypal configuration</h2>";

                echo '<form action="options.php" method="post">';

                settings_fields('paypal_setting');
                do_settings_sections('paypal');

                submit_button( '', 'primary', 'submit', true, NULL );
                echo '</form>';

                echo '</div>';

        }

        function section_menu()
        {
                register_setting(
                        'paypal_setting',
                        'xs_options_paypal',
                        array($this, 'input')
                );
                add_settings_section(
                        'section_setting',
                        'Settings',
                        array($this, 'show'),
                        'paypal'
                );
        }

        function input($input)
        {
                $current = $this->options;

                if(isset($input['user']) && !empty($input['user']))
                        foreach($input['user'] as $key => $value)
                                $current['user'][$key] = $value;
                if(isset($input['fees']) && !empty($input['fees']))
                        foreach($input['fees'] as $key => $value)
                                $current['fees'][$key] = $value;

                return $current;
        }

        function show()
        {
                $tab = xs_framework::create_tabs( array(
                        'href' => '?page=xsoftware_paypal',
                        'tabs' => array(
                                'fees' => 'Fees',
                                'user' => 'User'
                        ),
                        'home' => 'fees',
                        'name' => 'main_tab'
                ));

                switch($tab) {
                        case 'fees':
                                $this->show_fees();
                                return;
                        case 'user':
                                $this->show_user();
                                return;
                }
        }

        function show_user()
        {
                $user = $this->options['user'];

                $options = array(
                        'name' => 'xs_options_paypal[user][client_id]',
                        'value' => $user['client_id'],
                        'echo' => TRUE
                );

                add_settings_field(
                        $options['name'],
                        'API Client ID',
                        'xs_framework::create_input',
                        'paypal',
                        'section_setting',
                        $options
                );

                $options = array(
                        'name' => 'xs_options_paypal[user][client_secret]',
                        'value' => $user['client_secret'],
                        'type' => 'password',
                        'echo' => TRUE
                );

                add_settings_field(
                        $options['name'],
                        'API Client Secret',
                        'xs_framework::create_input',
                        'paypal',
                        'section_setting',
                        $options
                );

                $mode = [
                        'sandbox' => 'Sandbox',
                        'live' => 'Live'
                ];

                $options = array(
                        'name' => 'xs_options_paypal[user][mode]',
                        'selected' => $user['mode'],
                        'data' => $mode,
                        'echo' => TRUE
                );

                add_settings_field(
                        $options['name'],
                        'Set paypal mode',
                        'xs_framework::create_select',
                        'paypal',
                        'section_setting',
                        $options
                );
        }

        function show_fees()
        {
                $fees = $this->options['fees'];

                $options = array(
                        'name' => 'xs_options_paypal[fees][fixed_fees]',
                        'value' => floatval($fees['fixed_fees']),
                        'step' => 0.01,
                        'max' => 99999999,
                        'echo' => TRUE
                );

                add_settings_field(
                        $options['name'],
                        'Set fixed fees',
                        'xs_framework::create_input_number',
                        'paypal',
                        'section_setting',
                        $options
                );

                $options = array(
                        'name' => 'xs_options_paypal[fees][var_fees]',
                        'value' => floatval($fees['var_fees']),
                        'step' => 0.0001,
                        'max' => 100,
                        'echo' => TRUE
                );

                add_settings_field(
                        $options['name'],
                        'Set variable fees (%)',
                        'xs_framework::create_input_number',
                        'paypal',
                        'section_setting',
                        $options
                );

        }

}

$xs_paypal_options = new xs_paypal_options();

endif;

?>