<?php

/*
Plugin Name: Contact Manager for Pipedrive
Plugin URI: http://www.tradelineworks.com
Description: A plugin for automatically creating Pipedrive deals from WPForms
Version: 1.0
Author: Zeb Fross
Author URI: http://www.zebfross.com
License: GPL2
License URI: https://opensource.org/licenses/gpl-2.0.php
*/

namespace ContactManagerForPipedrive;

require_once __DIR__.'/vendor/autoload.php';
include "includes/PipedriveApiCMFP.php";
include "includes/wpforms/PipedriveWpformsCMFP.php";

class ContactManagerForPipedrivePlugin
{
    private static $slug = "contacts-for-pipedrive";

    private function get_var($name, $default = null)
    {
        if (array_key_exists($name, $_GET))
            return $_GET[$name];
        return $default;
    }

    private function get_post_var($name, $default = null)
    {
        if (array_key_exists($name, $_POST))
            return $_POST[$name];
        return $default;
    }

    /**
     * Print a html select dropdown with given items and selected key
     *
     * @param array<string> $items items to render
     * @param string $selected selected key
     * @param string $name name of html element
     */
    public static function print_select(array $items, $selected, $name, $size=300)
    {
        ?>
        <select name="<?php echo esc_attr($name) ?>" style='width:<?php echo $size; ?>px'>
            <?php foreach ($items as $key => $value) : ?>
                <option value="<?php echo esc_attr($key) ?>" <?php echo esc_attr(selected($key, $selected, false)); ?>><?php echo esc_html($value) ?></option>
            <?php endforeach; ?>
        </select>
        <?php
    }

    public function print_input($args)
    {
        $name = $args['field'];
        $size = $args['size'];
        $value = get_option($name, $args['default']);
        $name_e = esc_attr($name);
        if ($args['type'] == 'textarea') {
            // textarea
            echo "<textarea name='$name_e' rows=6 cols=100>" . esc_html($value) . "</textarea>";
        } elseif ($args['type'] == 'input') {
            echo "<input type='text' name='$name_e' value='" . esc_attr($value) . "' style='width:" . esc_attr($size) . "px' />";
        } elseif ($args['type'] == 'checkbox') {
            $checked = ($value == "1") ? 'checked="checked"' : "";
            $checked = esc_attr($checked);
            echo "<input type='checkbox' $checked name='$name_e' value='1' />";
        } elseif ($args['type'] == 'dropdown') {
            $options = $args['options'];
            ContactManagerForPipedrivePlugin::print_select($options, $value, $name, $size);
        }
    }

    protected function add_setting($id, $name, $section, $desc, $default, $type = "input", $size = 300, $options = [])
    {
        add_settings_field(
            $id,
            $name,
            array(&$this, 'print_input'),
            ContactManagerForPipedrivePlugin::$slug,
            $section,
            array(
                'field' => $id,
                'desc' => $desc,
                'type' => $type,
                'size' => $size,
                'default' => $default,
                'options' => $options
            )
        );

        register_setting(ContactManagerForPipedrivePlugin::$slug, $id, array());
    }

    public function register_settings()
    {
        //wp_enqueue_style('cmfp-admin-css', __DIR__ . 'css/admin.css', array(), null);

        add_settings_section('contacts-for-pipedrive', 'Contact Manager for Pipedrive Options', null, ContactManagerForPipedrivePlugin::$slug);

        $this->add_setting("cmfp-pipedrive-key", "Pipedrive API Key", "contacts-for-pipedrive", "", "");
    }

    private function render_view($file, $data = [], $return = false)
    {
        if (!is_array($data))
            $data = (array)$data;

        extract($data);

        ob_start();
        $theme = "views/" . $file . ".php";
        include($theme); // PHP will be processed
        $output = ob_get_contents();
        @ob_end_clean();
        if ($return)
            return $output;
        print $output;
    }

    static function init_tables() {

    }

    static function remove_tables() {
    }

    public function render_admin_view()
    {
        $this->render_view('header');
        $this->render_view('admin', []);
    }

    public function register_menu() {
        add_submenu_page("options-general.php" /*parent_slug*/, "Contact Manager for Pipedrive" /*page title*/, "Contacts for Pipedrive" /*menu title*/, "edit_posts" /*capability*/,  ContactManagerForPipedrivePlugin::$slug /*menu slug*/, array($this, "render_admin_view") /*function*/);
    }

    private function handle_new_user($user_id) {
        $addOnRegister = get_option('cmfp-pipedrive-register');
        $registerStage = get_option('cmfp-pipedrive-register-stage');
        if ($addOnRegister && $registerStage) {
            if (apply_filters('cmfp-add-on-register', true, $user_id)) {
                $list = apply_filters('cmfp-register-stage', $registerStage, $user_id);
                $api = new PipedriveApiCMFP();
                $user = get_userdata($user_id);
                $api->createDeal($registerStage, $user->user_email, $user->first_name . " " . $user->last_name,  get_user_meta($user_id, "billing_phone", true));
            }
        }
    }

    private function register_actions() {
        /*add_action("wpmem_post_register_data", function($post) {
            $this->handle_new_user($post['ID']);
        });
        add_action("register_new_user", function($user_id) {
            $this->handle_new_user($user_id);
        });*/
    }

    public function __construct()
    {
        if ( ! defined( 'CMFP_PLUGIN_URL' ) ) {
            define( 'CMFP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        }

        register_activation_hook(__FILE__, 'ContactManagerForPipedrive\ContactManagerForPipedrivePlugin::init_tables');
        register_uninstall_hook(__FILE__, 'ContactManagerForPipedrive\ContactManagerForPipedrivePlugin::remove_tables');
        add_action('admin_init', array(&$this, 'register_settings'));
        add_action('admin_menu', array($this, 'register_menu'));

        $this->register_actions();
    }

}

new ContactManagerForPipedrivePlugin();
