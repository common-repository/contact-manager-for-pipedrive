<?php

namespace ContactManagerForPipedrive;

class PipedriveWpformsCMFP
{

    public function add_settings_section($sections, $form_data)
    {
        $sections['pipedrive'] = 'Pipedrive';
        return $sections;
    }

    function render_section_content($instance)
    {
        $key = get_option('cmfp-pipedrive-key');
        echo '<div class="wpforms-panel-content-section wpforms-panel-content-section-pipedrive">';
        echo '<div class="wpforms-panel-content-section-title">Pipedrive</div>';
        if (!$key)
            echo '<h3>Missing Pipedrive API Key. Set the key in "Settings->Contacts for Pipedrive" in your admin dashboard</h3>';

        $pipedrive = new PipedriveApiCMFP();
        $stages = $pipedrive->getStages();
        wpforms_panel_field(
            'select',
            'settings',
            'pipedrive_field_stage',
            $instance->form_data,
            'Pipeline Stage',
            array(
                'options' => $stages
            )
        );
        wpforms_panel_field(
            'select',
            'settings',
            'pipedrive_field_name',
            $instance->form_data,
            'Contact Name',
            array(
                'field_map' => array('text', 'name'),
                'placeholder' => '-- Select Field --',
            )
        );
        wpforms_panel_field(
            'select',
            'settings',
            'pipedrive_field_phone',
            $instance->form_data,
            'Contact Phone',
            array(
                'field_map' => array('text', 'phone'),
                'placeholder' => '-- Select Field --',
            )
        );
        wpforms_panel_field(
            'select',
            'settings',
            'pipedrive_field_email',
            $instance->form_data,
            'Email Address',
            array(
                'field_map' => array('text', 'email'),
                'placeholder' => '-- Select Field --',
            )
        );
        wpforms_panel_field(
            'select',
            'settings',
            'pipedrive_field_value',
            $instance->form_data,
            'Deal Monetary Value',
            array(
                'field_map' => array(
                    'text',
                    'number-slider',
                    'select',
                    'radio',
                    'checkbox',
                    'hidden',
                    'number',
                    'rating',
                    'payment-single',
                    'payment-multiple',
                    'payment-checkbox',
                    'payment-select',
                    'payment-total',
                    'net_promoter_score',
                ),
                'placeholder' => '-- Select Field --',
            )
        );
        wpforms_panel_field(
            'select',
            'settings',
            'pipedrive_field_title',
            $instance->form_data,
            'Deal Title',
            array(
                'field_map' => array(
                    'text',
                    'name',
                    'number-slider',
                    'select',
                    'radio',
                    'checkbox',
                    'hidden',
                    'number',
                    'rating',
                    'payment-single',
                    'payment-multiple',
                    'payment-checkbox',
                    'payment-select',
                    'payment-total',
                    'net_promoter_score',
                ),
                'placeholder' => '-- Select Field --',
            )
        );
        echo '</div>';
    }

    function send_to_pipedrive($fields, $entry, $form_data, $entry_id)
    {
        // Get email and first name
        $stage_id = $form_data['settings']['pipedrive_field_stage'] ?? "";
        $email_field_id = $form_data['settings']['pipedrive_field_email'] ?? "";
        $name_field_id = $form_data['settings']['pipedrive_field_name'] ?? "";
        $phone_field_id = $form_data['settings']['pipedrive_field_phone'] ?? "";
        $value_field_id = $form_data['settings']['pipedrive_field_value'] ?? "";
        $title_field_id = $form_data['settings']['pipedrive_field_title'] ?? "";

        if (!$email_field_id)
            return;

        $email = "";
        $name = "";
        $phone = "";
        $value = "";
        $title = "";
        if (isset($fields[$email_field_id]['value']))
            $email = $fields[$email_field_id]['value'];
        if (isset($fields[$name_field_id]['value']))
            $name = $fields[$name_field_id]['value'];
        if (isset($fields[$phone_field_id]['value']))
            $phone = $fields[$phone_field_id]['value'];
        if (isset($fields[$value_field_id]['value']))
            $value = $fields[$value_field_id]['value'];
        if (isset($fields[$title_field_id]['title']))
            $title = $fields[$title_field_id]['title'];

        if (empty($email)) {
            return;
        }

        $pipedrive = new PipedriveApiCMFP();
        $pipedrive->createDeal($stage_id, $email, $name, $phone, $title, $value, $fields);
    }

    public function __construct()
    {
        add_filter('wpforms_builder_settings_sections', array($this, 'add_settings_section'), 20, 2);
        add_filter('wpforms_form_settings_panel_content', array($this, 'render_section_content'), 20);
        add_action('wpforms_process_complete', array($this, 'send_to_pipedrive'), 10, 4);
    }
}

new PipedriveWpformsCMFP();
