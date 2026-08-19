<?php
/*
  Plugin Name: Image Hotspot - Map Image Annotation
  Plugin URI: https://wordpress.org/plugins/image-map-hotspots/
  Description: Image hotspot lets you easily add custom tooltips to your images and add hotspot when highlighting them. Furthermore, you have the option of setting customized tooltip content, position, animation, and more.
  Author: Sk Abul Hasan
  Author URI: https://www.wpmart.org/
  Version: 3.8
 */

if (!defined('ABSPATH'))
   exit;

define('imh_6310_plugin_url', plugin_dir_path(__FILE__));
define('imh_6310_plugin_dir_url', plugin_dir_url(__FILE__));
define('imh_6310_PLUGIN_CURRENT_VERSION', 3.8);

add_shortcode('imh_6310_image_map', 'imh_6310_image_map_shortcode');

function imh_6310_image_map_shortcode($atts)
{
   extract(shortcode_atts(array('id' => ' ',), $atts));
   $ids = (int) $atts['id'];

   ob_start();
   include(imh_6310_plugin_url . 'shortcode.php');
   return ob_get_clean();
}


add_action('admin_menu', 'imh_6310_image_map_menu');

function imh_6310_image_map_menu()
{
   $options = imh_6310_get_user_roles();
   add_menu_page('Image Map Hotspot', 'Image Map Hotspot', $options, 'imh-6310-image-map-hotspot', 'imh_6310_home', 'dashicons-format-image', 20);
   add_submenu_page('imh-6310-image-map-hotspot', 'Image Map Hotspot', 'All Image Map Hotspot',  $options, 'imh-6310-image-map-hotspot', 'imh_6310_home');
   add_submenu_page('imh-6310-image-map-hotspot', 'Settings', 'Settings', $options, 'imh-6310-image-map-hotspot-setting', 'imh_6310_image_map_hotspot_setting');
   add_submenu_page('imh-6310-image-map-hotspot', 'Import / Export Plugin', 'Import/Export Plugin', $options, 'imh-6310-image-map-hotspot-import-export', 'imh_6310_image_map_hotspot_import_export');
   add_submenu_page('imh-6310-image-map-hotspot', 'License', 'License', $options, 'imh-6310-image-map-hotspot-license', 'imh_6310_image_map_hotspot_lincense');
   add_submenu_page('imh-6310-image-map-hotspot', 'How to use', 'Help', $options, 'imh-6310-image-map-hotspot-use', 'imh_6310_image_map_hotspot_how_to_use');
   add_submenu_page('imh-6310-image-map-hotspot', 'WpMart Plugins', 'WpMart Plugins', $options, 'imh-6310-wpmart-plugins', 'imh_6310_wpmart_plugins');
}

include imh_6310_plugin_url . 'template-menu.php';

register_activation_hook(__FILE__, 'imh_6310_image_map_install');
include_once(imh_6310_plugin_url . 'functions.php');

function imh_6310_activation_redirect($plugin)
{
   if ($plugin == plugin_basename(__FILE__)) {
      exit(wp_redirect(admin_url('admin.php?page=imh-6310-image-map-hotspot-use')));
   }
}
add_action('activated_plugin', 'imh_6310_activation_redirect');

add_action('admin_enqueue_scripts', 'imh_6310_link_css_js');


function imh_6310_plugin_update_check()
{
   imh_6310_version_status();
   imh_6310_check_field_exists();
}
add_action('plugins_loaded', 'imh_6310_plugin_update_check');

// function imh_6310_head_css()
// {
//     wp_register_style('imh-6310-head-css', false);
//     wp_enqueue_style('imh-6310-head-css');

//     wp_add_inline_style(
//         'imh-6310-head-css',
//         '.imh-6310-point-icons { display: none; }'
//     );
// }

// add_action('wp_enqueue_scripts', 'imh_6310_head_css', 999);

//Deactivate code start from here
add_action('admin_enqueue_scripts', 'imh_6310_myplugin_enqueue_assets');

function imh_6310_myplugin_enqueue_assets($hook)
{
   if ($hook !== 'plugins.php') {
      return;
   }

   wp_enqueue_script(
      'imh-6310-myplugin-deactivation',
      imh_6310_plugin_dir_url . 'assets/js/deactivation.js',
      ['jquery'],
      imh_6310_PLUGIN_CURRENT_VERSION,
      true
   );

   wp_localize_script(
      'imh-6310-myplugin-deactivation',
      'myPluginData',
      [
         'ajax_url' => admin_url('admin-ajax.php'),
         'plugin_slug' => plugin_basename(__FILE__)
      ]
   );

   wp_enqueue_style(
      'imh-6310-myplugin-deactivation-css',
      imh_6310_plugin_dir_url . 'assets/css/deactivation.css',
      [],
      imh_6310_PLUGIN_CURRENT_VERSION
   );
}

add_action('admin_footer', 'imh_6310_myplugin_deactivation_modal');

function imh_6310_myplugin_deactivation_modal()
{
   $screen = get_current_screen();

   if (!$screen || $screen->id !== 'plugins') {
      return;
   }

?>
   <div id="imh-6310-myplugin-modal" style="display:none;">

      <div class="imh-6310-myplugin-overlay"></div>

      <div class="imh-6310-myplugin-popup">

         <h2>Quick Feedback</h2>

         <p>Why are you deactivating this plugin?</p>

         <form id="imh-6310-myplugin-feedback-form">

            <label>
               <input type="radio" name="reason" value="Found a better plugin">
               Found a better plugin
            </label>

            <label>
               <input type="radio" name="reason" value="Missing feature">
               Missing feature
            </label>

            <label>
               <input type="radio" name="reason" value="Plugin issue">
               Plugin issue
            </label>

            <label>
               <input type="radio" name="reason" value="Temporary">
               Temporary deactivation
            </label>

            <label>
               <input type="radio" name="reason" value="Other">
               Other
            </label>

            <textarea
               name="details"
               rows="4"
               placeholder="Additional feedback..."></textarea>

            <div class="imh-6310-myplugin-actions">

               <button
                  type="submit"
                  class="button button-primary">
                  Submit & Deactivate
               </button>

               <button
                  type="button"
                  class="button"
                  id="imh-6310-myplugin-skip">
                  Skip & Deactivate
               </button>

            </div>

         </form>

      </div>

   </div>
<?php
}

add_action('wp_ajax_myplugin_send_feedback', 'imh_6310_myplugin_send_feedback');

function imh_6310_myplugin_send_feedback()
{
   $reason = sanitize_text_field($_POST['reason'] ?? '');
   $details = sanitize_textarea_field($_POST['details'] ?? '');
   $admins = get_users([
      'role' => 'administrator',
  ]);
  

   $admin_emails = [];
  
   foreach ($admins as $admin) {
         $admin_emails[] = $admin->user_email;
   }
   $admin_emails = implode(',', $admin_emails);

   $response = wp_remote_post(
      'https://demo.tcsesoft.com/plugin-feedback.php',
      [
         'timeout' => 15,
         'headers' => [
            'Content-Type' => 'application/json',
            'X-API-KEY' => '7fK9xP2mQ8vN4rT6yH1jW5cL3zB0dS'
         ],
         'body' => wp_json_encode([
            'reason'         => $reason,
            'details'        => $details,
            'plugin_version' => imh_6310_PLUGIN_CURRENT_VERSION,
            'site_url'       => home_url(),
            'wp_version'     => get_bloginfo('version'),
            'email'           => $admin_emails,
            'plugin_name'    => 'imh'
         ])
      ]
   );

   if (is_wp_error($response)) {
      wp_send_json_error();
   }

   wp_send_json_success();
}