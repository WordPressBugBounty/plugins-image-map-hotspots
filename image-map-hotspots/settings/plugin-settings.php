<?php
if (!defined('ABSPATH'))
   exit;
?>
<div class="imh-6310">
   <h1>Plugin Settings</h1>
   <?php

   wp_enqueue_media();

   $imh_6310_selected_server = imh_6310_get_option('imh_6310_selected_server');
   $imh_6310_font_awesome_status = imh_6310_get_option('imh_6310_font_awesome_status');
   $closeIcon = imh_6310_get_option('imh_6310_close_icon');
   $desktopSize = imh_6310_get_option('imh_6310_desktop_size');
   $iPadSize = imh_6310_get_option('imh_6310_ipad_size');
   $mobileSize = imh_6310_get_option('imh_6310_mobile_size');

   $closeIcon = $closeIcon ? $closeIcon : imh_6310_plugin_dir_url . 'assets/images/close.png';
   $desktopSize = $desktopSize ? $desktopSize : 30;
   $mobileSize = $mobileSize ? $mobileSize : 20;
   $iPadSize = $iPadSize ? $iPadSize : $mobileSize; 

   if (!empty($_POST['update']) && $_POST['update'] == 'Update') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'imh-6310-nonce-update')) {
         die('You do not have sufficient permissions to access this page.');
      } else {
         //Server activation status
         $imh_6310_selected_server = imh_6310_get_option('imh_6310_selected_server');
         if (!$imh_6310_selected_server) {
            $wpdb->query("DELETE FROM {$wpdb->prefix}options where option_name='imh_6310_selected_server'");
            $wpdb->query("INSERT INTO {$wpdb->prefix}options(option_name, option_value) VALUES ('imh_6310_selected_server', '" . $_POST['imh_6310_selected_server'] . "')");
         } else {
            $wpdb->query("UPDATE {$wpdb->prefix}options set 
                        option_value='" . $_POST['imh_6310_selected_server'] . "' 
                        where option_name = 'imh_6310_selected_server'");
         }
         $imh_6310_selected_server =  $_POST['imh_6310_selected_server'];

         //fontawesome Font Start
         if ($imh_6310_font_awesome_status != '') {
            $wpdb->query("UPDATE {$wpdb->prefix}options set 
        option_value='" . $_POST['imh_6310_font_awesome_status'] . "' 
        where option_name = 'imh_6310_font_awesome_status'");
         } else {
            $wpdb->query("DELETE FROM {$wpdb->prefix}options where option_name='imh_6310_font_awesome_status'");
            $wpdb->query("INSERT INTO {$wpdb->prefix}options(option_name, option_value) VALUES ('imh_6310_font_awesome_status', '" . $_POST['imh_6310_font_awesome_status'] . "')");
         }
         $imh_6310_font_awesome_status = $_POST['imh_6310_font_awesome_status'];

         //Next image start
         $imh_6310_close_icon = imh_6310_get_option('imh_6310_close_icon');
         if (!$imh_6310_close_icon) {
            $wpdb->query("DELETE FROM {$wpdb->prefix}options where option_name='imh_6310_close_icon'");
            $wpdb->query("INSERT INTO {$wpdb->prefix}options(option_name, option_value) VALUES ('imh_6310_close_icon', '" . $_POST['imh_6310_close_icon'] . "')");
         } else {
            $wpdb->query("UPDATE {$wpdb->prefix}options set 
                      option_value='" . $_POST['imh_6310_close_icon'] . "' 
                      where option_name = 'imh_6310_close_icon'");
         }
         $closeIcon =  $_POST['imh_6310_close_icon'];


         //Desktop Size
         $imh_6310_desktop_size = imh_6310_get_option('imh_6310_desktop_size');
         if (!$imh_6310_desktop_size) {
            $wpdb->query("DELETE FROM {$wpdb->prefix}options where option_name='imh_6310_desktop_size'");
            $wpdb->query("INSERT INTO {$wpdb->prefix}options(option_name, option_value) VALUES ('imh_6310_desktop_size', '" . $_POST['imh_6310_desktop_size'] . "')");
         } else {
            $wpdb->query("UPDATE {$wpdb->prefix}options set 
                      option_value='" . $_POST['imh_6310_desktop_size'] . "' 
                      where option_name = 'imh_6310_desktop_size'");
         }
         $desktopSize =  $_POST['imh_6310_desktop_size'];

         //iPad size
         $imh_6310_ipad_size = imh_6310_get_option('imh_6310_ipad_size');
         if (!$imh_6310_ipad_size) {
            $wpdb->query("DELETE FROM {$wpdb->prefix}options where option_name='imh_6310_ipad_size'");
            $wpdb->query("INSERT INTO {$wpdb->prefix}options(option_name, option_value) VALUES ('imh_6310_ipad_size', '" . $_POST['imh_6310_ipad_size'] . "')");
         } else {
            $wpdb->query("UPDATE {$wpdb->prefix}options set 
                      option_value='" . $_POST['imh_6310_ipad_size'] . "' 
                      where option_name = 'imh_6310_ipad_size'");
         }
         $iPadSize =  $_POST['imh_6310_ipad_size'];

         //Mobile size
         $imh_6310_mobile_size = imh_6310_get_option('imh_6310_mobile_size');
         if (!$imh_6310_mobile_size) {
            $wpdb->query("DELETE FROM {$wpdb->prefix}options where option_name='imh_6310_mobile_size'");
            $wpdb->query("INSERT INTO {$wpdb->prefix}options(option_name, option_value) VALUES ('imh_6310_mobile_size', '" . $_POST['imh_6310_mobile_size'] . "')");
         } else {
            $wpdb->query("UPDATE {$wpdb->prefix}options set 
                      option_value='" . $_POST['imh_6310_mobile_size'] . "' 
                      where option_name = 'imh_6310_mobile_size'");
         }
         $mobileSize =  $_POST['imh_6310_mobile_size'];
      }
   }
   ?>
   <form action="" method="post">
      <?php wp_nonce_field("imh-6310-nonce-update") ?>
      <div class="imh-6310-modal-body-form">
         <table width="100%" cellpadding="10" cellspacing="0">
         <tr>
            <td width="250px">
               <b>Activation Server:</b><br />
               <small>If you fetch license key activation error, please change server</small>
            </td>
            <td width="500px" colspan="2">
               <input type="radio" name="imh_6310_selected_server" value="1"  <?php echo ($imh_6310_selected_server != 2) ? ' checked':'' ?>> Server 1 &nbsp;&nbsp;&nbsp;
               <input type="radio" name="imh_6310_selected_server" value="2" <?php echo ($imh_6310_selected_server == 2) ? ' checked':'' ?>> Server 2
            </td>
         </tr>
            <tr>
               <td width="250px">
                  <b>Font Awesome Activation <span class="imh-6310-pro">(Pro)</span>:</b><br />
               </td>
               <td width="500px" colspan="2">
                  <input type="radio" name="imh_6310_font_awesome_status" value="2" checked> Active &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="imh_6310_font_awesome_status" value="1" <?php echo ($imh_6310_font_awesome_status == 1) ? ' checked' : '' ?>> Inactive
               </td>
            </tr>
            <tr>
               <td width="250px"><b>Change Close Icon <span class="imh-6310-pro">(Pro)</span>:</b></td>
               <td width="500px">
                  <input type="text" required name="imh_6310_close_icon" id="close-icon-src" value="<?php echo $closeIcon ?>" class="imh-form-input imh-6310-form-input-lg">
                  <input type="button" id="close-icon" value="Change Image" class="imh-6310-btn-success">
               </td>
               <td>
                  <img src="<?php echo $closeIcon ?>" width="40" />
               </td>
            </tr>
            <tr>
               <td width="250px"><b>Close Icon Size in Desktop <span class="imh-6310-pro">(Pro)</span>:</b></td>
               <td width="500px">
                  <input type="number" required min="10" name="imh_6310_desktop_size" id="close-icon-src" value="<?php echo $desktopSize ?>" class="imh-form-input lg">
               </td>
            </tr>
            <tr>
               <td width="250px"><b>Close Icon Size in iPad <span class="imh-6310-pro">(Pro)</span>:</b></td>
               <td width="500px">
                  <input type="number" required min="10" name="imh_6310_ipad_size" id="close-icon-src" value="<?php echo $iPadSize ?>" class="imh-form-input lg">
               </td>
            </tr>
            <tr>
               <td width="250px"><b>Close Icon Size in Mobile <span class="imh-6310-pro">(Pro)</span>:</b></td>
               <td width="500px">
                  <input type="number" required min="10" name="imh_6310_mobile_size" id="close-icon-src" value="<?php echo $mobileSize ?>" class="imh-form-input lg">
               </td>
            </tr>
            <tr>
               <td colspan="3">
                  <input type="submit" name="update" class="imh-6310-btn-primary imh-margin-right-10" value="Update" />
               </td>
            </tr>
         </table>
      </div>
      <br class="imh-6310-clear" />
   </form>

   <script type="text/javascript">
      jQuery(document).ready(function() {
         jQuery("body").on("click", "#close-icon", function(e) {
            e.preventDefault();
            var image = wp
               .media({
                  title: "Upload Image",
                  multiple: false,
               })
               .open()
               .on("select", function(e) {
                  var uploaded_image = image.state().get("selection").first();
                  var image_url = uploaded_image.toJSON().url;
                  jQuery("#close-icon-src").val(image_url);
               });

            jQuery("#imh_6310_add_new_media").css({
               "overflow-x": "hidden",
               "overflow-y": "auto",
            });
         });
      })
   </script>