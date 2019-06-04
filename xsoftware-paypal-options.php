<?php

if(!defined("ABSPATH")) die;

if (!class_exists("xs_paypal_plugin")) :

class xs_paypal_options
{

        private $default = array (
                'user' => [
                        'email' => 'your-email@example.com',
                        'client_id' => '',
                        'client_secret' => '',
                ],
                'sys' => [
                        'checkout' => '',
                        'currency' => 'EUR',
                ],
                'vat' => [
                        'v22' => [
                                'rate' => 22.00,
                                'descr' => '22% - GENERICO'
                        ]
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

                xs_framework::init_admin_style();
                xs_framework::init_admin_script();

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
                if(isset($input['sys']) && !empty($input['sys']))
                        foreach($input['sys'] as $key => $value)
                                $current['sys'][$key] = $value;

                if(isset($input['vat_remove']) && !empty($input['vat_remove'])) {
                        unset($current['vat'][$input['vat_remove']]);
                }
                if(
                        isset($input['vat']['new_vat']) &&
                        !empty($input['vat']['new_vat']['key']) &&
                        !empty($input['vat']['new_vat']['rate']) &&
                        !empty($input['vat']['new_vat']['descr'])
                ) {
                        $key = 'v'.$input['vat']['new_vat']['key'];
                        $v['rate'] = $input['vat']['new_vat']['rate'];
                        $v['descr'] = $input['vat']['new_vat']['descr'];
                        $current['vat'][$key] = $v;
                }

                return $current;
        }

        function show()
        {
                $tab = xs_framework::create_tabs( array(
                        'href' => '?page=xsoftware_paypal',
                        'tabs' => array(
                                'user' => 'User',
                                'system' => 'System',
                                'vat' => 'VAT'
                        ),
                        'home' => 'user',
                        'name' => 'main_tab'
                ));

                switch($tab) {
                        case 'user':
                                $this->show_user();
                                return;
                        case 'system':
                                $this->show_system();
                                return;
                        case 'vat':
                                $this->show_vat();
                                return;
                }
        }

        function show_user()
        {
                $options = array(
                        'name' => 'xs_options_paypal[user][email]',
                        'value' => $this->options['user']['email'],
                        'echo' => TRUE
                );

                add_settings_field(
                        $options['name'],
                        'User Email',
                        'xs_framework::create_input',
                        'paypal',
                        'section_setting',
                        $options
                );

                $options = array(
                        'name' => 'xs_options_paypal[user][client_id]',
                        'value' => $this->options['user']['client_id'],
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
                        'value' => $this->options['user']['client_secret'],
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
        }

        function show_vat()
        {
                $vat = $this->options['vat'];

                foreach($vat as $key => $values) {
                        $data[$key]['id'] = $key;
                        $data[$key]['rate'] = $values['rate'];
                        $data[$key]['descr'] = $values['descr'];
                        $data[$key]['remove'] = xs_framework::create_button([
                                'class' => 'button-primary',
                                'name' => 'xs_options_paypal[vat_remove]',
                                'text' => 'Remove',
                                'value' => $key
                        ]);
                }
                $data['new_vat']['id'] = xs_framework::create_input([
                        'class' => 'xs_full_width',
                        'name' => 'xs_options_paypal[vat][new_vat][key]'
                ]);;
                $data['new_vat']['rate'] = xs_framework::create_input_number([
                        'class' => 'xs_full_width',
                        'name' => 'xs_options_paypal[vat][new_vat][rate]',
                        'value' => 0,
                        'step' => 0.01
                ]);
                $data['new_vat']['descr'] = xs_framework::create_input([
                        'class' => 'xs_full_width',
                        'name' => 'xs_options_paypal[vat][new_vat][descr]'
                ]);

                xs_framework::create_table([
                        'class' => 'xs_admin_table xs_full_width',
                        'data' => $data,
                        'headers' => ['ID', 'Rate', 'Description', 'Actions']
                ]);
        }

        function show_system()
        {
                $options = array(
                        'name' => 'xs_options_paypal[sys][checkout]',
                        'selected' => $this->options['sys']['checkout'],
                        'data' => xs_framework::get_wp_pages_link(),
                        'default' => 'Select a checkout page',
                        'echo' => TRUE
                );

                add_settings_field(
                        $options['name'],
                        'Set checkout page',
                        'xs_framework::create_select',
                        'paypal',
                        'section_setting',
                        $options
                );
                $options = array(
                        'name' => 'xs_options_paypal[sys][currency]',
                        'selected' => $this->options['sys']['currency'],
                        'data' => xs_framework::get_currency_list(),
                        'default' => 'Select a currency',
                        'echo' => TRUE
                );

                add_settings_field(
                        $options['name'],
                        'Set Currency',
                        'xs_framework::create_select',
                        'paypal',
                        'section_setting',
                        $options
                );

                $options = array(
                        'name' => 'xs_options_paypal[sys][vat]',
                        'value' => $this->options['sys']['vat'],
                        'min' => 0,
                        'max' => 100,
                        'echo' => TRUE
                );

                add_settings_field(
                        $options['name'],
                        'Set VAT(%)',
                        'xs_framework::create_input_number',
                        'paypal',
                        'section_setting',
                        $options
                );
        }


}

endif;

$xs_paypal_options = new xs_paypal_options();

?>