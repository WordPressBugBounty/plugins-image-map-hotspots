<?php
if (!defined('ABSPATH'))
   exit;
?>
<div class="imh-6310">
   <h1>Plugin Export / Import</h1>

   <button class="imh-6310-btn-primary" id="export-image-map-hotspot-data">Export Plugin Data</button>
   <button class="imh-6310-btn-primary" id="import-image-map-hotspot-data">Import Plugin Data (Pro)</button>
   <?php

   wp_enqueue_media();
   imh_6310_export_full_map_hotspot_plugin();
   ?>
   <script>
      jQuery(document).ready(function() {
         /* ######### Media Start ########### */
         jQuery("body").on("click", "#import-image-map-hotspot-data", function(e) {
            alert("Import option available in pro version only.")
         });

         jQuery('body').on('click', '#export-image-map-hotspot-data', function(){
            if (!confirm("Do you want to export service box full plugin?")){
               return false;
            } else{
               window.open(jQuery('#export-image-map-hotspot-plugin').attr('href'), '_blank');
            }
         });

         jQuery("body").on("click", "#upload-csv-file", function(e) {
            e.preventDefault();
            var image = wp.media({
                  title: 'Upload File',
                  multiple: false
               }).open()
               .on('select', function(e) {
                  var uploaded_image = image.state().get('selection').first();
                  var image_url = uploaded_image.toJSON().url;
                  jQuery("#file-url").val(image_url);
               });

            jQuery("#imh_6310_add_new_media").css({
               "overflow-x": "hidden",
               "overflow-y": "auto"
            });
         });
      });
   </script>