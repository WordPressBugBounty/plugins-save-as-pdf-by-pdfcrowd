<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://pdfcrowd.com/save-as-pdf-wordpress-plugin/
 * @since      1.0.0
 *
 * @package    Save_As_Pdf_Pdfcrowd
 * @subpackage Save_As_Pdf_Pdfcrowd/admin/partials
 */
?>

<div class="wrap">

  <form
    method="post"
    id="save-as-pdf-pdfcrowd-options"
    name="save-as-pdf-pdfcrowd-options"
    data-nonce="<?php esc_attr_e(wp_create_nonce('wp_ajax_save_as_pdf_pdfcrowd_create_button')); ?>"
    action="options.php">

        <?php

        if(get_transient('save_as_pdf_pdfcrowd_show_wizard')) {
            delete_transient('save_as_pdf_pdfcrowd_show_wizard');
            require_once('wizard.php');
        }

        ?>

        <div id="save-as-pdf-pdfcrowd-admin-settings"
             class="save-as-pdf-pdfcrowd-basic-mode">
          <h1>
            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTkuMjI3IiBoZWlnaHQ9IjQzLjI1NiIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03My44MDIgLTM4Ni4wNikiPjxnIHRyYW5zZm9ybT0ibWF0cml4KDEuNzk0OCAwIDAgMS43OTQ4IC0yNjI2LjUgLTIxMi4wNikiIGZpbGw9IiNmZmYiIHN0cm9rZT0iI2ZmOTUwMCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PHBhdGggZD0ibTE1MTQuNSAzMzUuODZjMC40NDI2IDAuMDU0IDEuMjM2Ni0wLjI0MzM2IDEuMDAwMiAwLjQ4OTY1djE4LjUxMWMtMC40NDI2LTAuMDU0LTEuMjM2NiAwLjI0MzM3LTEuMDAwMi0wLjQ4OTY1di0xOC41MTF6IiBvcGFjaXR5PSIuOTkiIHN0cm9rZS13aWR0aD0iNC45OTk4Ii8+PHBhdGggZD0ibTE1MDYuMyAzNDQuNTRoMS40NzQ4djEwLjU1NWgtMS40NzQ4di0xMC41NTV6IiBvcGFjaXR5PSIuOTkiIHN0cm9rZS13aWR0aD0iNC41MjUxIi8+PHBhdGggZD0ibTE1MjIuNCAzMzkuNzhjMC4zNzU1IDAuMTIzMSAxLjI5ODYtMC4zMDEzMyAxLjE2OTQgMC4zMjY0M3YxNC44NDNjLTAuMzc1NS0wLjEyMzExLTEuMjk4NiAwLjMwMTMzLTEuMTY5NC0wLjMyNjQzdi0xNC44NDN6IiBvcGFjaXR5PSIuOTkiIHN0cm9rZS13aWR0aD0iNC44MzA2Ii8+PHBhdGggZD0ibTE1MzUuMSAzNTMuMjh2Mi4xNjQ5aC01LjE2NDl2LTIuMTY0OWg1LjE2NDl6IiBvcGFjaXR5PSIuOTkiIHN0cm9rZS13aWR0aD0iMy44MzUxIi8+PC9nPjwvZz48L3N2Zz4K" style="height: 24px;"/>
            <?php esc_html_e( get_admin_page_title() ); ?>
            <span id="save-as-pdf-pdfcrowd-version">v4.5.1</span>
          </h1>

          <div id="save-as-pdf-pdfcrowd-sticky">
            <div>
              <div
                id="save-as-pdf-pdfcrowd-nav-tab"
                class="nav-tab-wrapper"
                style="display: flex;">
                <div style="flex-grow: 1">
                  <a
                    id="save-as-pdf-pdfcrowd-settings-set-nav"
                    href="#save-as-pdf-pdfcrowd-settings-set"
                    class="nav-tab nav-tab-active">
                     Basic Settings
                  </a>
                  <a
                    id="save-as-pdf-pdfcrowd-license-settings-nav"
                    href="#save-as-pdf-pdfcrowd-license-settings"
                    class="nav-tab">
                    License
                   </a>
                   <a href="#save-as-pdf-pdfcrowd-help" class="nav-tab">
                     Help
                   </a>
                </div>
                <div style="text-align: center">
                  <div id="save-as-pdf-pdfcrowd-save-wrap">
                    <div
                      id="save-as-pdf-pdfcrowd-dirty-flag-text"
                      class="save-as-pdf-pdfcrowd-dirty-flag"
                      style="display: none">
                      You have unsaved changes
                    </div>
                    <input
                      id="pdfcrowd-save"
                      style="margin-right: 1em; margin-left: 1em; margin-bottom: 2px;"
                      name="Submit"
                      type="submit"
                      class="button-primary" value="<?php esc_attr_e('Save Changes', $this->plugin_name); ?>">
                      <div
                        id="save-as-pdf-pdfcrowd-dirty-flag"
                        class="save-as-pdf-pdfcrowd-dirty-flag"
                        style="display: none">
                        *
                      </div>
                  </div>
                  <input
                    name="Reset"
                    style="margin-bottom: 2px;"
                    type="submit"
                    class="button-primary"
                    value="<?php esc_attr_e('Reset to Default', $this->plugin_name); ?>"
                    onclick="return save_as_pdf_pdfcrowd_reset_settings();" />
                </div>
              </div>
            </div>

            <?php

             $options = Save_As_Pdf_Pdfcrowd_Public::get_options();

             $license_status = Save_As_Pdf_Pdfcrowd_Admin::get_license_status($options);

               $api_key = isset($options['api_key']) ? $options['api_key'] : '';
               $auto_use_cookies = isset($options['auto_use_cookies']) ? $options['auto_use_cookies'] : '';
               $button_alignment = isset($options['button_alignment']) ? $options['button_alignment'] : '';
               $button_background_color = isset($options['button_background_color']) ? $options['button_background_color'] : '';
               $button_border_color = isset($options['button_border_color']) ? $options['button_border_color'] : '';
               $button_border_style = isset($options['button_border_style']) ? $options['button_border_style'] : '';
               $button_border_width = isset($options['button_border_width']) ? $options['button_border_width'] : '';
               $button_custom_html = isset($options['button_custom_html']) ? $options['button_custom_html'] : '';
               $button_custom_indicator = isset($options['button_custom_indicator']) ? $options['button_custom_indicator'] : '';
               $button_disposition = isset($options['button_disposition']) ? $options['button_disposition'] : '';
               $button_format = isset($options['button_format']) ? $options['button_format'] : '';
               $button_hidden = isset($options['button_hidden']) ? $options['button_hidden'] : '';
               $button_hover = isset($options['button_hover']) ? $options['button_hover'] : '';
               $button_html_hidden = isset($options['button_html_hidden']) ? $options['button_html_hidden'] : '';
               $button_id = isset($options['button_id']) ? $options['button_id'] : '';
               $button_image = isset($options['button_image']) ? $options['button_image'] : '';
               $button_image_height = isset($options['button_image_height']) ? $options['button_image_height'] : '';
               $button_image_url = isset($options['button_image_url']) ? $options['button_image_url'] : '';
               $button_image_width = isset($options['button_image_width']) ? $options['button_image_width'] : '';
               $button_indicator = isset($options['button_indicator']) ? $options['button_indicator'] : '';
               $button_indicator_html = isset($options['button_indicator_html']) ? $options['button_indicator_html'] : '';
               $button_indicator_timeout = isset($options['button_indicator_timeout']) ? $options['button_indicator_timeout'] : '';
               $button_margin_bottom = isset($options['button_margin_bottom']) ? $options['button_margin_bottom'] : '';
               $button_margin_left = isset($options['button_margin_left']) ? $options['button_margin_left'] : '';
               $button_margin_right = isset($options['button_margin_right']) ? $options['button_margin_right'] : '';
               $button_margin_top = isset($options['button_margin_top']) ? $options['button_margin_top'] : '';
               $button_on_categories = isset($options['button_on_categories']) ? $options['button_on_categories'] : '';
               $button_on_front = isset($options['button_on_front']) ? $options['button_on_front'] : '';
               $button_on_home = isset($options['button_on_home']) ? $options['button_on_home'] : '';
               $button_on_pages = isset($options['button_on_pages']) ? $options['button_on_pages'] : '';
               $button_on_posts = isset($options['button_on_posts']) ? $options['button_on_posts'] : '';
               $button_on_taxonomies = isset($options['button_on_taxonomies']) ? $options['button_on_taxonomies'] : '';
               $button_padding_bottom = isset($options['button_padding_bottom']) ? $options['button_padding_bottom'] : '';
               $button_padding_left = isset($options['button_padding_left']) ? $options['button_padding_left'] : '';
               $button_padding_right = isset($options['button_padding_right']) ? $options['button_padding_right'] : '';
               $button_padding_top = isset($options['button_padding_top']) ? $options['button_padding_top'] : '';
               $button_position = isset($options['button_position']) ? $options['button_position'] : '';
               $button_radius = isset($options['button_radius']) ? $options['button_radius'] : '';
               $button_styling = isset($options['button_styling']) ? $options['button_styling'] : '';
               $button_text = isset($options['button_text']) ? $options['button_text'] : '';
               $button_text_color = isset($options['button_text_color']) ? $options['button_text_color'] : '';
               $button_text_size = isset($options['button_text_size']) ? $options['button_text_size'] : '';
               $button_text_weight = isset($options['button_text_weight']) ? $options['button_text_weight'] : '';
               $button_translation = isset($options['button_translation']) ? $options['button_translation'] : '';
               $button_translation_domain = isset($options['button_translation_domain']) ? $options['button_translation_domain'] : '';
               $button_user_drawings = isset($options['button_user_drawings']) ? $options['button_user_drawings'] : '';
               $content_viewport_height = isset($options['content_viewport_height']) ? $options['content_viewport_height'] : '';
               $conversion_mode = isset($options['conversion_mode']) ? $options['conversion_mode'] : '';
               $converter_user_agent = isset($options['converter_user_agent']) ? $options['converter_user_agent'] : '';
               $converter_version = isset($options['converter_version']) ? $options['converter_version'] : '';
               $custom_data = isset($options['custom_data']) ? $options['custom_data'] : '';
               $dev_mode = isset($options['dev_mode']) ? $options['dev_mode'] : '';
               $diagnostics = isset($options['diagnostics']) ? $options['diagnostics'] : '';
               $email_bcc = isset($options['email_bcc']) ? $options['email_bcc'] : '';
               $email_cc = isset($options['email_cc']) ? $options['email_cc'] : '';
               $email_custom_dialogs = isset($options['email_custom_dialogs']) ? $options['email_custom_dialogs'] : '';
               $email_dialogs = isset($options['email_dialogs']) ? $options['email_dialogs'] : '';
               $email_from = isset($options['email_from']) ? $options['email_from'] : '';
               $email_message = isset($options['email_message']) ? $options['email_message'] : '';
               $email_recipient = isset($options['email_recipient']) ? $options['email_recipient'] : '';
               $email_recipient_address = isset($options['email_recipient_address']) ? $options['email_recipient_address'] : '';
               $email_subject = isset($options['email_subject']) ? $options['email_subject'] : '';
               $enable_cookies_opt = isset($options['enable_cookies_opt']) ? $options['enable_cookies_opt'] : '';
               $error_page = isset($options['error_page']) ? $options['error_page'] : '';
               $license_type = isset($options['license_type']) ? $options['license_type'] : '';
               $no_margins = isset($options['no_margins']) ? $options['no_margins'] : '';
               $output_format = isset($options['output_format']) ? $options['output_format'] : '';
               $output_name = isset($options['output_name']) ? $options['output_name'] : '';
               $pdf_created_callback = isset($options['pdf_created_callback']) ? $options['pdf_created_callback'] : '';
               $rendering_mode = isset($options['rendering_mode']) ? $options['rendering_mode'] : '';
               $smart_scaling_mode = isset($options['smart_scaling_mode']) ? $options['smart_scaling_mode'] : '';
               $url_lookup = isset($options['url_lookup']) ? $options['url_lookup'] : '';
               $username = isset($options['username']) ? $options['username'] : '';
               $version = isset($options['version']) ? $options['version'] : '';

                 $page_size = isset($options['page_size']) ? $options['page_size'] : 'A4';
                 $page_width = isset($options['page_width']) ? $options['page_width'] : '';
                 $page_height = isset($options['page_height']) ? $options['page_height'] : '';
                 $orientation = isset($options['orientation']) ? $options['orientation'] : 'portrait';
                 $margin_top = isset($options['margin_top']) ? $options['margin_top'] : '';
                 $margin_right = isset($options['margin_right']) ? $options['margin_right'] : '';
                 $margin_bottom = isset($options['margin_bottom']) ? $options['margin_bottom'] : '';
                 $margin_left = isset($options['margin_left']) ? $options['margin_left'] : '';
                 $print_page_range = isset($options['print_page_range']) ? $options['print_page_range'] : '';
                 $content_viewport_width = isset($options['content_viewport_width']) ? $options['content_viewport_width'] : 'medium';
                 $content_fit_mode = isset($options['content_fit_mode']) ? $options['content_fit_mode'] : 'auto';
                 $remove_blank_pages = isset($options['remove_blank_pages']) ? $options['remove_blank_pages'] : 'trailing';
                 $header_url = isset($options['header_url']) ? $options['header_url'] : '';
                 $header_html = isset($options['header_html']) ? $options['header_html'] : '';
                 $header_height = isset($options['header_height']) ? $options['header_height'] : '';
                 $footer_url = isset($options['footer_url']) ? $options['footer_url'] : '';
                 $footer_html = isset($options['footer_html']) ? $options['footer_html'] : '';
                 $footer_height = isset($options['footer_height']) ? $options['footer_height'] : '';
                 $no_header_footer_horizontal_margins = isset($options['no_header_footer_horizontal_margins']) ? $options['no_header_footer_horizontal_margins'] : '';
                 $exclude_header_on_pages = isset($options['exclude_header_on_pages']) ? $options['exclude_header_on_pages'] : '';
                 $exclude_footer_on_pages = isset($options['exclude_footer_on_pages']) ? $options['exclude_footer_on_pages'] : '';
                 $header_footer_scale_factor = isset($options['header_footer_scale_factor']) ? $options['header_footer_scale_factor'] : '';
                 $page_numbering_offset = isset($options['page_numbering_offset']) ? $options['page_numbering_offset'] : '';
                 $page_watermark = isset($options['page_watermark']) ? $options['page_watermark'] : '';
                 $page_watermark_url = isset($options['page_watermark_url']) ? $options['page_watermark_url'] : '';
                 $multipage_watermark = isset($options['multipage_watermark']) ? $options['multipage_watermark'] : '';
                 $multipage_watermark_url = isset($options['multipage_watermark_url']) ? $options['multipage_watermark_url'] : '';
                 $page_background = isset($options['page_background']) ? $options['page_background'] : '';
                 $page_background_url = isset($options['page_background_url']) ? $options['page_background_url'] : '';
                 $multipage_background = isset($options['multipage_background']) ? $options['multipage_background'] : '';
                 $multipage_background_url = isset($options['multipage_background_url']) ? $options['multipage_background_url'] : '';
                 $page_background_color = isset($options['page_background_color']) ? $options['page_background_color'] : '';
                 $use_print_media = isset($options['use_print_media']) ? $options['use_print_media'] : '';
                 $no_background = isset($options['no_background']) ? $options['no_background'] : '';
                 $disable_javascript = isset($options['disable_javascript']) ? $options['disable_javascript'] : '';
                 $disable_image_loading = isset($options['disable_image_loading']) ? $options['disable_image_loading'] : '';
                 $disable_remote_fonts = isset($options['disable_remote_fonts']) ? $options['disable_remote_fonts'] : '';
                 $use_mobile_user_agent = isset($options['use_mobile_user_agent']) ? $options['use_mobile_user_agent'] : '';
                 $load_iframes = isset($options['load_iframes']) ? $options['load_iframes'] : 'all';
                 $block_ads = isset($options['block_ads']) ? $options['block_ads'] : '';
                 $default_encoding = isset($options['default_encoding']) ? $options['default_encoding'] : '';
                 $locale = isset($options['locale']) ? $options['locale'] : '';
                 $http_auth_user_name = isset($options['http_auth_user_name']) ? $options['http_auth_user_name'] : '';
                 $http_auth_password = isset($options['http_auth_password']) ? $options['http_auth_password'] : '';
                 $cookies = isset($options['cookies']) ? $options['cookies'] : '';
                 $verify_ssl_certificates = isset($options['verify_ssl_certificates']) ? $options['verify_ssl_certificates'] : '';
                 $fail_on_main_url_error = isset($options['fail_on_main_url_error']) ? $options['fail_on_main_url_error'] : '';
                 $fail_on_any_url_error = isset($options['fail_on_any_url_error']) ? $options['fail_on_any_url_error'] : '';
                 $no_xpdfcrowd_header = isset($options['no_xpdfcrowd_header']) ? $options['no_xpdfcrowd_header'] : '';
                 $css_page_rule_mode = isset($options['css_page_rule_mode']) ? $options['css_page_rule_mode'] : 'default';
                 $custom_css = isset($options['custom_css']) ? $options['custom_css'] : '';
                 $custom_javascript = isset($options['custom_javascript']) ? $options['custom_javascript'] : '';
                 $on_load_javascript = isset($options['on_load_javascript']) ? $options['on_load_javascript'] : '';
                 $custom_http_header = isset($options['custom_http_header']) ? $options['custom_http_header'] : '';
                 $javascript_delay = isset($options['javascript_delay']) ? $options['javascript_delay'] : '';
                 $element_to_convert = isset($options['element_to_convert']) ? $options['element_to_convert'] : '';
                 $element_to_convert_mode = isset($options['element_to_convert_mode']) ? $options['element_to_convert_mode'] : 'cut-out';
                 $wait_for_element = isset($options['wait_for_element']) ? $options['wait_for_element'] : '';
                 $auto_detect_element_to_convert = isset($options['auto_detect_element_to_convert']) ? $options['auto_detect_element_to_convert'] : '';
                 $readability_enhancements = isset($options['readability_enhancements']) ? $options['readability_enhancements'] : 'none';
                 $viewport_width = isset($options['viewport_width']) ? $options['viewport_width'] : '';
                 $viewport_height = isset($options['viewport_height']) ? $options['viewport_height'] : '';
                 $scale_factor = isset($options['scale_factor']) ? $options['scale_factor'] : '';
                 $jpeg_quality = isset($options['jpeg_quality']) ? $options['jpeg_quality'] : '';
                 $convert_images_to_jpeg = isset($options['convert_images_to_jpeg']) ? $options['convert_images_to_jpeg'] : 'none';
                 $image_dpi = isset($options['image_dpi']) ? $options['image_dpi'] : '';
                 $enable_pdf_forms = isset($options['enable_pdf_forms']) ? $options['enable_pdf_forms'] : '';
                 $linearize = isset($options['linearize']) ? $options['linearize'] : '';
                 $encrypt = isset($options['encrypt']) ? $options['encrypt'] : '';
                 $user_password = isset($options['user_password']) ? $options['user_password'] : '';
                 $owner_password = isset($options['owner_password']) ? $options['owner_password'] : '';
                 $no_print = isset($options['no_print']) ? $options['no_print'] : '';
                 $no_modify = isset($options['no_modify']) ? $options['no_modify'] : '';
                 $no_copy = isset($options['no_copy']) ? $options['no_copy'] : '';
                 $title = isset($options['title']) ? $options['title'] : '';
                 $subject = isset($options['subject']) ? $options['subject'] : '';
                 $author = isset($options['author']) ? $options['author'] : '';
                 $keywords = isset($options['keywords']) ? $options['keywords'] : '';
                 $extract_meta_tags = isset($options['extract_meta_tags']) ? $options['extract_meta_tags'] : '';
                 $page_layout = isset($options['page_layout']) ? $options['page_layout'] : '';
                 $page_mode = isset($options['page_mode']) ? $options['page_mode'] : '';
                 $initial_zoom_type = isset($options['initial_zoom_type']) ? $options['initial_zoom_type'] : '';
                 $initial_page = isset($options['initial_page']) ? $options['initial_page'] : '';
                 $initial_zoom = isset($options['initial_zoom']) ? $options['initial_zoom'] : '';
                 $hide_toolbar = isset($options['hide_toolbar']) ? $options['hide_toolbar'] : '';
                 $hide_menubar = isset($options['hide_menubar']) ? $options['hide_menubar'] : '';
                 $hide_window_ui = isset($options['hide_window_ui']) ? $options['hide_window_ui'] : '';
                 $fit_window = isset($options['fit_window']) ? $options['fit_window'] : '';
                 $center_window = isset($options['center_window']) ? $options['center_window'] : '';
                 $display_title = isset($options['display_title']) ? $options['display_title'] : '';
                 $right_to_left = isset($options['right_to_left']) ? $options['right_to_left'] : '';
                 $data_string = isset($options['data_string']) ? $options['data_string'] : '';
                 $data_file = isset($options['data_file']) ? $options['data_file'] : '';
                 $data_format = isset($options['data_format']) ? $options['data_format'] : 'auto';
                 $data_encoding = isset($options['data_encoding']) ? $options['data_encoding'] : '';
                 $data_ignore_undefined = isset($options['data_ignore_undefined']) ? $options['data_ignore_undefined'] : '';
                 $data_auto_escape = isset($options['data_auto_escape']) ? $options['data_auto_escape'] : '';
                 $data_trim_blocks = isset($options['data_trim_blocks']) ? $options['data_trim_blocks'] : '';
                 $data_options = isset($options['data_options']) ? $options['data_options'] : '';
                 $debug_log = isset($options['debug_log']) ? $options['debug_log'] : '';
                 $tag = isset($options['tag']) ? $options['tag'] : '';
                 $http_proxy = isset($options['http_proxy']) ? $options['http_proxy'] : '';
                 $https_proxy = isset($options['https_proxy']) ? $options['https_proxy'] : '';
                 $client_certificate = isset($options['client_certificate']) ? $options['client_certificate'] : '';
                 $client_certificate_password = isset($options['client_certificate_password']) ? $options['client_certificate_password'] : '';
                 $layout_dpi = isset($options['layout_dpi']) ? $options['layout_dpi'] : '';
                 $content_area_x = isset($options['content_area_x']) ? $options['content_area_x'] : '';
                 $content_area_y = isset($options['content_area_y']) ? $options['content_area_y'] : '';
                 $content_area_width = isset($options['content_area_width']) ? $options['content_area_width'] : '';
                 $content_area_height = isset($options['content_area_height']) ? $options['content_area_height'] : '';
                 $contents_matrix = isset($options['contents_matrix']) ? $options['contents_matrix'] : '';
                 $header_matrix = isset($options['header_matrix']) ? $options['header_matrix'] : '';
                 $footer_matrix = isset($options['footer_matrix']) ? $options['footer_matrix'] : '';
                 $disable_page_height_optimization = isset($options['disable_page_height_optimization']) ? $options['disable_page_height_optimization'] : '';
                 $main_document_css_annotation = isset($options['main_document_css_annotation']) ? $options['main_document_css_annotation'] : '';
                 $header_footer_css_annotation = isset($options['header_footer_css_annotation']) ? $options['header_footer_css_annotation'] : '';
                 $max_loading_time = isset($options['max_loading_time']) ? $options['max_loading_time'] : '';
                 $conversion_config = isset($options['conversion_config']) ? $options['conversion_config'] : '';
                 $conversion_config_file = isset($options['conversion_config_file']) ? $options['conversion_config_file'] : '';
                 $subprocess_referrer = isset($options['subprocess_referrer']) ? $options['subprocess_referrer'] : '';
                 $use_http = isset($options['use_http']) ? $options['use_http'] : '';
                 $retry_count = isset($options['retry_count']) ? $options['retry_count'] : '';

             /*
             * Set up hidden fields
             *
             */
             settings_fields($this->plugin_name);
             do_settings_sections($this->plugin_name);
            ?>

             <div id="save-as-pdf-pdfcrowd-settings-cfg-area">
               <div id="save-as-pdf-pdfcrowd-cfg-area-row">
                 <div style="white-space: nowrap; margin-right: 1em;">
                   <select
                     class="save-as-pdf-pdfcrowd-categories-filter save-as-pdf-pdfcrowd-basic-input"
                     autocomplete="off">
                     <option value="">
                       All Options
                     </option>
                     <option
                       value="save-as-pdf-pdfcrowd-quick-setup"
                       class="save-as-pdf-pdfcrowd-basic-input">
                       Quick Setup
                     </option>
                     <option value="save-as-pdf-pdfcrowd-look">
                       Button Look
                     </option>
                     <option value="save-as-pdf-pdfcrowd-positioning">
                       Button Positioning
                     </option>
                     <option value="save-as-pdf-pdfcrowd-styling">
                       Button Styling
                     </option>
                     <option value="save-as-pdf-pdfcrowd-mode">
                       Mode
                     </option>
                         <option value="save-as-pdf-pdfcrowd-page-setup">
                           Page Setup
                         </option>
                         <option value="save-as-pdf-pdfcrowd-general-options">
                           General Options
                         </option>
                   </select>
                   <select
                     class="save-as-pdf-pdfcrowd-categories-filter save-as-pdf-pdfcrowd-adv-input"
                     autocomplete="off">
                     <option value="">
                       All Options
                     </option>
                     <option
                       value="save-as-pdf-pdfcrowd-quick-setup"
                       class="save-as-pdf-pdfcrowd-basic-input">
                       Quick Setup
                     </option>
                     <option value="save-as-pdf-pdfcrowd-look">
                       Button Look
                     </option>
                     <option value="save-as-pdf-pdfcrowd-positioning">
                       Button Positioning
                     </option>
                     <option value="save-as-pdf-pdfcrowd-styling">
                       Button Styling
                     </option>
                     <option
                       value="save-as-pdf-pdfcrowd-conv-indicator">
                       Conversion in Progress Button Indicator
                     </option>
                     <option
                       value="save-as-pdf-pdfcrowd-behavior">
                       Behavior
                     </option>
                     <option value="save-as-pdf-pdfcrowd-mode">
                       Mode
                     </option>
                       <option value="save-as-pdf-pdfcrowd-page-setup">
                         Page Setup
                       </option>
                       <option value="save-as-pdf-pdfcrowd-header-and-footer">
                         Header & Footer
                       </option>
                       <option value="save-as-pdf-pdfcrowd-watermark-and-background">
                         Watermark & Background
                       </option>
                       <option value="save-as-pdf-pdfcrowd-general-options">
                         General Options
                       </option>
                       <option value="save-as-pdf-pdfcrowd-print-resolution">
                         Print Resolution
                       </option>
                       <option value="save-as-pdf-pdfcrowd-pdf-format">
                         PDF Format
                       </option>
                       <option value="save-as-pdf-pdfcrowd-viewer-preferences">
                         Viewer Preferences
                       </option>
                       <option value="save-as-pdf-pdfcrowd-data">
                         Data
                       </option>
                       <option value="save-as-pdf-pdfcrowd-miscellaneous">
                         Miscellaneous
                       </option>
                       <option value="save-as-pdf-pdfcrowd-tweaks">
                         Tweaks
                       </option>
                       <option value="save-as-pdf-pdfcrowd-api-client-options">
                         API Client Options
                       </option>
                   </select>
                 </div>
                 <div style="flex-grow: 1;">
                   <div style="display: flex; align-items: center;">
                     <div style="flex-grow: 1; position: relative; min-width: 100px; margin-right: 2em;">
                       <input
                         id="save-as-pdf-pdfcrowd-options-filter"
                         type="text"
                         class="save-as-pdf-pdfcrowd-clearable-input"
                         autocomplete="off"
                         style="width: 100%;"
                         placeholder="Filter options by name">
                         <svg id="save-as-pdf-pdfcrowd-options-filter-icon"
                              xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                         </svg>
                         <span id="save-as-pdf-pdfcrowd-clear-filter"
                               class="save-as-pdf-pdfcrowd-clear-button">✕</span>
                     </div>
                   </div>
                 </div>
                 <div id="save-as-pdf-pdfcrowd-switch-wrap">
                   <div style="margin-right: .5em; display: flex; align-items: center;">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                       <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                       <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                     </svg>
                   </div>
                   <div style="margin-right: .5em">
                     <label for="save-as-pdf-pdfcrowd-settings-toggle">
                       Expert Settings
                     </label>
                   </div>
                   <div>
                     <label class="save-as-pdf-pdfcrowd-switch">
                       <input
                         id="save-as-pdf-pdfcrowd-settings-toggle"
                         type="checkbox"
                         autocomplete="off">
                         <span class="save-as-pdf-pdfcrowd-slider save-as-pdf-pdfcrowd-round"></span>
                     </label>
                   </div>
                 </div>
               </div>
               <div style="display: flex;">
                 <div>
                   <label for="save-as-pdf-pdfcrowd-comments-toggle">
                     <input type="checkbox"
                            id="save-as-pdf-pdfcrowd-comments-toggle"
                            autocomplete="off">
                            Descriptions
                   </label>
                   <label for="save-as-pdf-pdfcrowd-changes-only-toggle">
                     <input
                       type="checkbox"
                       id="save-as-pdf-pdfcrowd-changes-only-toggle"
                       autocomplete="off">
                       Changes only
                   </label>
                 </div>
                 <div>
                   <label for="save-as-pdf-pdfcrowd-show-button-preview">
                     <input
                       type="checkbox"
                       id="save-as-pdf-pdfcrowd-show-button-preview"
                       autocomplete="off">
                       Button style preview
                   </label>
                   <label for="save-as-pdf-pdfcrowd-sc-params">
                     <input type="checkbox"
                            id="save-as-pdf-pdfcrowd-sc-params"
                            autocomplete="off">
                            Shortcode and PHP function parameters
                   </label>
                 </div>
               </div>
             </div>
          </div>

          <?php
           require_once('license-settings.php');
           require_once('save-as-pdf-pdfcrowd-settings.php');
           ?>

           <div
             id="save-as-pdf-pdfcrowd-help"
             class="save-as-pdf-pdfcrowd-metaboxes hidden save-as-pdf-pdfcrowd-tab-content"
             style="line-height:2">
             <div style="font-size:larger;font-weight:bold">
                 Support
             </div>

             <div>
               Feel free to contact us for any assistance or questions.
               We will be happy to help!
             </div>
             <div>
               <strong>Email:</strong>
               <a href="mailto:support@pdfcrowd.com?subject=Save as PDF Help">
                 support@pdfcrowd.com
               </a>
             </div>
             <div>
                  You can also use our
               <a href="https://pdfcrowd.com/contact/?ref=wordpress&pr=save-as-pdf-pdfcrowd"
                  title="Contact us"
                  target="_blank">
                  contact form
               </a>.
             </div>

             <div style="line-height: normal; margin-top:1em;">
               <div style="font-size:larger;font-weight:bold">
                 Useful Links
               </div>
               <ul>
                 <li>
                   <a href="https://pdfcrowd.com/save-as-pdf-wordpress-plugin/" target="_blank">
                     Plugin Homepage
                   </a>
                 </li>
                 <li>
                   <a href="https://pdfcrowd.com/save-as-pdf-wordpress-plugin/ref/" target="_blank">
                     Option Reference
                   </a>
                 </li>
                 <li>
                   <a
                     id="save-as-pdf-pdfcrowd-pg-link"
                     href="https://pdfcrowd.com/playground/html-to-pdf/?lang=wf%2Fwpsettings&url=<?php echo urlencode(get_home_url()); ?>" target="_blank">
                     Playground
                   </a>
                 </li>
                 <li>
                   <a href="https://pdfcrowd.com/preview/html-to-pdf/?lang=wf%2Fwpsettings&url=<?php echo urlencode(get_home_url()); ?>" target="_blank">
                     Output PDF Preview
                   </a>
                 </li>
               </ul>
             </div>
           </div>

           <div
             id="save-as-pdf-pdfcrowd-button-preview">
             <strong>Button Style Preview:</strong>
             <div id="save-as-pdf-pdfcrowd-close-preview">✕</div>
             <div id='save-as-pdf-pdfcrowd-button-preview-content'>
             </div>
             <div class='clear'></div>
             <div>
               Tip: click the button to see the progress indicator
             </div>
           </div>

           <script>
              function save_as_pdf_pdfcrowd_submit_action(action) {
                  var form = document.forms['save-as-pdf-pdfcrowd-options'];
                  form['save-as-pdf-pdfcrowd[wp_submit_action]'].value = action;
                  form.submit();
                  return true;
              }

              function save_as_pdf_pdfcrowd_reset_settings() {
                  var r = confirm("<?php esc_attr_e('All Save as PDF settings will be reset to default. Please confirm.', $this->plugin_name); ?>");
                  if(r !== true) {
                      return false;
                  }
                  return save_as_pdf_pdfcrowd_submit_action('reset');
              }
             </script>

             <input type="hidden"
                    name="save-as-pdf-pdfcrowd[wp_submit_action]"
                    value="" />

             <hr style="margin-top: 2em">
             <div id="save-as-pdf-pdfcrowd-support-notes">
               If you like "Save as PDF by Pdfcrowd", please rate it using
               <a href='https://wordpress.org/support/plugin/save-as-pdf-by-pdfcrowd/reviews/#new-post' target='_blank'>★★★★★</a>.
             </div>
        </div>
    </form>

    <div style="display: none">
        <input type="hidden" id="save-as-pdf-pdfcrowd-hidden-header"
               value="<?php
        $site_name = esc_html(get_bloginfo('name'));
        $site_desc = esc_html(get_bloginfo('description'));
        $site_css = esc_url(get_bloginfo('stylesheet_url'));
        $site_url = esc_url(get_bloginfo('url'));
        // variables are escaped prior the echo command
        echo <<<EOT
<html>
  <head>
    <link rel='stylesheet' href='$site_css'>
    <style>
      * { margin: 0; padding: 0; }
    </style>
  </head>
  <body>
    <div style='text-align: center'>
      <p class='site-title'>
        <a href='$site_url'>$site_name</a>
      </p>
      <p class='site-description'>
        $site_desc
      </p>
    </div>
  </body>
</html>
EOT;

?>">
        <input type="hidden" id="save-as-pdf-pdfcrowd-hidden-footer"
               value="<?php
        echo <<<EOT
<html>
  <head>
    <link rel='stylesheet' href='$site_css'>
    <style>
      * { margin: 0; padding: 0; }
    </style>
  </head>
  <body>
    <div style='float: left'>
      <a class='pdfcrowd-source-url' data-pdfcrowd-placement='href-and-content'></a>
    </div>
    </div>
    <div style='float: right'>
      <span class='pdfcrowd-page-number'></span>&#47;<span class='pdfcrowd-page-count'></span>
    </div>
  </body>
</html>
EOT;

?>">
    </div>
</div>
