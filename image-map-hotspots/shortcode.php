<?php
global $wpdb;
$style_table = $wpdb->prefix . 'imh_6310_style';
$font_awesome = imh_6310_get_option('imh_6310_font_awesome_status');
$closeIcon = imh_6310_get_option('imh_6310_close_icon');
$desktopSize = imh_6310_get_option('imh_6310_desktop_size');
$iPadSize = imh_6310_get_option('imh_6310_ipad_size');
$mobileSize = imh_6310_get_option('imh_6310_mobile_size');

$closeIcon = $closeIcon ? $closeIcon : imh_6310_plugin_dir_url . 'assets/images/close.png';
$desktopSize = $desktopSize ? $desktopSize : 30;
$mobileSize = $mobileSize ? $mobileSize : 20;
$iPadSize = $iPadSize ? $iPadSize : $mobileSize; 

$cssData = [];
if ($ids) {
   $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $ids), ARRAY_A);
   if (!$styledata) return;
   $css = explode("!!##!!", $styledata['css']);
   $key = explode(",", $css[0]);
   $value = explode("||##||", $css[1]);
   $filterKey = [];
   $filterValue = [];
   for ($i = 0; $i < count($key); $i++) {
      $filterKey[] = esc_attr($key[$i]);
   }
   for ($i = 0; $i < count($value); $i++) {
      $filterValue[] = esc_attr($value[$i]);
   }
   $cssData = array_combine($filterKey, $filterValue);
}
$jsonData = isset($cssData['json_data']) ? json_decode(stripslashes(html_entity_decode($cssData['json_data']))) : [];
$font_awesome = imh_6310_get_option('imh_6310_font_awesome_status');
if ($font_awesome != 1) {
   wp_enqueue_style('imh-font-awesome-new', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
   wp_enqueue_style('imh-font-awesome-old', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/v4-shims.min.css');
}

wp_enqueue_style('imh-6310-owl-carousel', plugins_url('output-common-css.css', __FILE__));
include imh_6310_plugin_url . "output-css.php";

$image_zoom = isset($cssData['zoom_feature']) ? esc_attr($cssData['zoom_feature']) : 0;
$tooltip_position  = isset($cssData['tooltip_position']) ? esc_attr($cssData['tooltip_position']) : 0;
$top_bottom  = isset($cssData['top_bottom']) ? esc_attr($cssData['top_bottom']) : 0;
$left_right  = isset($cssData['left_right']) ? esc_attr($cssData['left_right']) : 0;
?>


<div class="imh-6310-annotation-box-wrapper imh-6310-annotation-box-wrapper-<?php echo $ids; ?>">
   <div class="imh-6310-zoom-buttons" style="display: none;">
      <img src="<?php echo isset($cssData['zoom_in_icon']) && $cssData['zoom_in_icon'] ? esc_url($cssData['zoom_in_icon']) : imh_6310_plugin_dir_url . 'assets/images/zoom-in.png' ?>" alt="" class="imh-6310-zoom-in">
      <div class="imh-6310-builder-box-divider"></div>
      <img src="<?php echo isset($cssData['zoom_out_icon']) && $cssData['zoom_out_icon'] ? esc_url($cssData['zoom_out_icon']) : imh_6310_plugin_dir_url . 'assets/images/zoom-out.png' ?>" alt="" class="imh-6310-zoom-out">
   </div>

   <div
      class="imh-6310-annotation-box imh-6310-annotation-box-<?php echo $ids; ?>"
      data-id="<?php echo $ids; ?>"
      data-image-zoom="<?php echo $image_zoom == 2 ? 1 : 0; ?>"
      data-display-type="<?php echo isset($cssData['display_type']) ? $cssData['display_type'] : 0; ?>"
      data-tooltip-position="<?php echo $tooltip_position; ?>"
      data-top-bottom="<?php echo $top_bottom; ?>"
      data-left-right="<?php echo $left_right; ?>">
      <div class="imh-6310-annotation-box-inner">
         <img src="<?php echo isset($cssData['main_image']) ? $cssData['main_image'] : '' ?>" class="imh-6310-main-image imh-6310-img" data-imh-cls="imh-6310-main-image imh-6310-img" data-imh-value="<?php echo isset($cssData['main_image']) ? $cssData['main_image'] : '' ?>" alt="<?php echo esc_attr($styledata['name']) ?>" />
         <?php
         if ($jsonData) {

            $counter = 1;

            foreach ($jsonData as $js) {
               if ($js->iconType == 1) {
                  if (!$js->fontAwesomeIcon && !$js->fontAwesomeHoverIcon) {
                     continue;
                  }
                  if (!$js->fontAwesomeIcon) {
                     $fontAwesomeIcon = $js->fontAwesomeHoverIcon;
                     $fontAwesomeHoverIcon = $js->fontAwesomeHoverIcon;
                  } else if (!$js->fontAwesomeHoverIcon) {
                     $fontAwesomeIcon = $js->fontAwesomeIcon;
                     $fontAwesomeHoverIcon = $js->fontAwesomeIcon;
                  } else {
                     $fontAwesomeIcon = $js->fontAwesomeIcon;
                     $fontAwesomeHoverIcon = $js->fontAwesomeHoverIcon;
                  }
                  $points = "                          
                <i class='{$fontAwesomeIcon} imh-6310-pin-main-img imh-6310-blinking-{$ids}-{$counter}'></i>
                <i class='{$fontAwesomeHoverIcon} imh-6310-pin-hover-img imh-6310-blinking-hover-{$ids}-{$counter}'></i>              
              ";
               } else if ($js->iconType == 2) {
                  if (!$js->customFirstImg && !$js->customSecondImg) {
                     continue;
                  } else if (!$js->customFirstImg) {
                     $customFirstImg = $js->customSecondImg;
                     $customSecondImg = $js->customSecondImg;
                  } else if (!$js->customSecondImg) {
                     $customFirstImg = $js->customFirstImg;
                     $customSecondImg = $js->customFirstImg;
                  } else {
                     $customFirstImg = $js->customFirstImg;
                     $customSecondImg = $js->customSecondImg;
                  }
                  $points = "                          
                <img src='{$customFirstImg}' class='imh-6310-pin-main-img imh-6310-img imh-6310-blinking-{$ids}-{$counter}' data-imh-cls='imh-6310-pin-main-img imh-6310-img imh-6310-blinking-{$ids}-{$counter}' data-imh-value='{$customFirstImg}' />
                <img src='{$customSecondImg}' class='imh-6310-pin-hover-img imh-6310-img imh-6310-blinking-hover-{$ids}-{$counter}' data-imh-cls='imh-6310-pin-hover-img imh-6310-img imh-6310-blinking-hover-{$ids}-{$counter}' data-imh-value='{$customSecondImg}' /> 
              ";
               } else if ($js->iconType == 3) {
                  if (!$js->customText && !$js->customText) {
                     continue;
                  } else {
                     $customText = $js->customText;
                  }
                  $points = "                          
            <div class='imh-6310-customtext imh-6310-blinking-{$ids}-{$counter}'>" . esc_attr($customText) . "</div>           
              ";
               }

               $newObj = new stdClass();
               $newObj->xPos = $js->xPos;
               $newObj->yPos = $js->yPos;
               $newObj->tWidth = $js->tWidth;
               $newObj->tHeight = isset($js->tHeight) ? $js->tHeight : '';
               $newObj->selectedTemplate = $js->selectedTemplate;

               $newObj->iconType = $js->iconType;
               
               $newObj->fontAwesomIconSize = $js->fontAwesomIconSize;
               $newObj->fontAwesomIconSizeInIpad = $js->fontAwesomIconSizeInIpad;
               $newObj->fontAwesomIconSizeInMobile = $js->fontAwesomIconSizeInMobile;

               $newObj->iconWidth = $js->iconWidth;
               $newObj->imgOrIconSizeInIpad = $js->imgOrIconSizeInIpad;
               $newObj->imgOrIconSizeInMobile = $js->imgOrIconSizeInMobile;
        
             

               $jsonCode = json_encode($newObj);
               $customCode =  htmlentities($jsonCode, ENT_QUOTES, "UTF-8", false);
               $directLink = '';
               if ($js->elementType == 4) {
                  $target = $js->openNewTab == '1' ? "target='_blank'" : '';
                  $directLink = "data-link-url='" . imh_6310_validate_url(esc_attr($js->linkURL)) . "' {$target}";
               } else if ($js->customIconLinkType == '1' && isset($js->linkPosition) && $js->linkPosition == '2') {
                  $target = $js->openNewTab == '1' ? "target='_blank'" : '';
                  $directLink = "data-link-url='" . imh_6310_validate_url(esc_attr($js->linkURL)) . "' {$target}";
               }
               $always_show = isset($js->alwaysShow) && $js->alwaysShow == 1 ? 1 : 0;
               echo "
            <div data-id='{$counter}' data-always-show='{$always_show}' data-json='{$customCode}' class='imh-6310-drag imh-6310-point-{$ids}-{$counter}' style='visibility: hidden' {$directLink}>
               <div class='imh-6310-point-icons imh-6310-point-icons-{$ids}-" . esc_attr($counter) . "'>
                  {$points}
               </div>
            </div>  
            ";
               imh_6310_load_templates($js, $counter, $ids);
               // $popupElement = "<div class='imh-6310-hover-content imh-6310-hover-content-{$counter}'>" .  . "</div>";   
               // $popupElementJS = "jQuery('body').append(\"{$popupElement}\");";                

               $pointCssCode = "
              .imh-6310-point-{$counter} .imh-6310-tooltip{
                background: #FFF;
                color: #000;
                font-size: 16px;
              }
            ";
               if ($js->iconType == 1) {
                  $pointCssCode .= "
            .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-main-img {
               color: " . esc_attr($js->fontAwesomeIconColor) . " !important;
               font-size:" . esc_attr($js->fontAwesomIconSize) . "px !important;
            }
            .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-hover-img {
               color: " . esc_attr($js->fontAwesomeIconHoverColor) . " !important;
               font-size:" . esc_attr($js->fontAwesomIconSize) . "px !important;
            }
            @media screen and (min-width: 100px) and (max-width: 767px) {
               .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-main-img, .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-hover-img {
                  font-size:" . esc_attr(isset($js->fontAwesomIconSizeInMobile) ? $js->fontAwesomIconSizeInMobile : $js->fontAwesomIconSize) . "px !important;
               }
               .imh-6310-point-icons-{$ids}-{$counter}::after{
                  width: " . (esc_attr(isset($js->fontAwesomIconSizeInMobile) ? $js->fontAwesomIconSizeInMobile : $js->fontAwesomIconSize) + 10) . "px !important;
                  height: " . (esc_attr(isset($js->fontAwesomIconSizeInMobile) ? $js->fontAwesomIconSizeInMobile : $js->fontAwesomIconSize) + 10) . "px !important;
                }
            }
            @media screen and (min-width: 768px) and (max-width: 1366px) {
               .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-main-img, .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-hover-img {
                  font-size:" . esc_attr(isset($js->fontAwesomIconSizeInIpad) ? $js->fontAwesomIconSizeInIpad : $js->fontAwesomIconSize) . "px !important;
               }
               .imh-6310-point-icons-{$ids}-{$counter}::after{
                  width: " . (esc_attr(isset($js->fontAwesomIconSizeInIpad) ? $js->fontAwesomIconSizeInIpad : $js->fontAwesomIconSize) + 10) . "px !important;
                  height: " . (esc_attr(isset($js->fontAwesomIconSizeInIpad) ? $js->fontAwesomIconSizeInIpad : $js->fontAwesomIconSize) + 10) . "px !important;
                }
            }
            ";
                  if (isset($js->blinkTooltip) && $js->blinkTooltip == 1) {
                     $pointCssCode .= "
                 .imh-6310-point-icons-{$ids}-{$counter} {
                   position: relative;
                   display: block;
                 }
                 .imh-6310-point-icons-{$ids}-{$counter}::after{
                   content: '';
                   position: absolute;
                   width: " . esc_attr($js->fontAwesomIconSize + 10) . "px;
                   height: " . esc_attr($js->fontAwesomIconSize + 10) . "px;
                   box-shadow: 0 0 1px 3px white;
                   animation: pulse-animation-{$ids}-{$counter} 2s infinite;
                   display: block;
                   border-radius: 50%;
                   transform: translate(-50%, -50%);
                   top: 50%;
                   left: 50%;
                   pointer-events: none;
                 }
                 
                 @keyframes pulse-animation-{$ids}-{$counter} {
                   0% {
                     box-shadow: 0 0 0 0px {$js->glowColor};
                   }
                   100% {
                     box-shadow: 0 0 0 8px rgba(0, 0, 0, 0);
                   }
                 }
               ";
                  }
               } else if ($js->iconType == 2) {
                  $pointCssCode .= "
            .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-main-img {
               width:" . esc_attr($js->imgOrIconSize) . "px !important;
               height: " . esc_attr($js->imgOrIconSize) . "px !important; 
               border-radius: 50%;
            }
            .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-hover-img {
               width:" . esc_attr($js->imgOrIconSize) . "px !important;
               height: " . esc_attr($js->imgOrIconSize) . "px !important; 
               border-radius: 50%;
            }
            @media screen and (min-width: 100px) and (max-width: 767px) {
               .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-main-img, .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-hover-img {
                  width:" . esc_attr(isset($js->imgOrIconSizeInMobile) ? $js->imgOrIconSizeInMobile : $js->imgOrIconSize) . "px !important;
                  height: " . esc_attr(isset($js->imgOrIconSizeInMobile) ? $js->imgOrIconSizeInMobile : $js->imgOrIconSize) . "px !important; 
               }
            }
            @media screen and (min-width: 768px) and (max-width: 1366px) {
               .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-main-img, .imh-6310-point-{$ids}-{$counter} .imh-6310-pin-hover-img {
                  width:" . esc_attr(isset($js->imgOrIconSizeInIpad) ? $js->imgOrIconSizeInIpad : $js->imgOrIconSize) . "px !important;
                  height: " . esc_attr(isset($js->imgOrIconSizeInIpad) ? $js->imgOrIconSizeInIpad : $js->imgOrIconSize) . "px !important; 
               }
            }
            ";
                  if (isset($js->blinkTooltip) && $js->blinkTooltip == 1) {
                     $pointCssCode .= "
                     .imh-6310-point-icons-{$ids}-{$counter} {
                        position: relative;
                        display: block;
                      }
               .imh-6310-point-icons-{$ids}-" . esc_attr($counter) . "::after {
                  content: '';
                  position: absolute;
                  width: " . esc_attr($js->imgOrIconSize + 10) . "px;
                  height: " . esc_attr($js->imgOrIconSize + 10) . "px;
                  box-shadow: 0 0 1px 3px white;
                  animation: pulse-animation-{$ids}-{$counter} 2s infinite;
                  display: block;  
                  border-radius: 50%;                
                  transform: translate(-50%, -50%);
                  top: 50%;
                  left: 50%;                
                  pointer-events: none;
                }
                
                @keyframes pulse-animation-{$ids}-{$counter} {
                  0% {
                    box-shadow: 0 0 0 0px {$js->glowColor};
                  }
                  100% {
                    box-shadow: 0 0 0 8px rgba(0, 0, 0, 0);
                  }
                }
               ";
                  }
               } else if ($js->iconType == 3) {
                  $pointCssCode .= "
            .imh-6310-point-{$ids}-{$counter} .imh-6310-customtext {
               font-size:" . esc_attr($js->customTextSize) . "px !important;
               line-height:" . esc_attr($js->customTextSize) . "px;
               color: " . esc_attr($js->customTextColor) . " !important;
               background-color:" . esc_attr($js->customTextBgColor) . " !important;
               padding: 5px 10px;
            }             
            ";
                  if (isset($js->blinkTooltip) && $js->blinkTooltip == 1) {
                     $pointCssCode .= ".imh-6310-point-icons-{$ids}-{$counter} {
                 animation: pulse-animation-{$ids}-{$counter} 2s infinite;
               }
               
               @keyframes pulse-animation-{$ids}-{$counter} {
                 0% {
                   box-shadow: 0 0 0 0px {$js->glowColor};
                 }
                 100% {
                   box-shadow: 0 0 0 8px rgba(0, 0, 0, 0);
                 }
               }";
                  }
               }

               if ($image_zoom == 2) {
                  if(isset($cssData['display_device'])){
                     if($cssData['display_device'] == 1){
                        $pointCssCode .= "@media screen and (max-width: 767px) {.imh-6310-annotation-box-{$ids} .imh-6310-annotation-box-inner{ cursor: grab;}}";
                     } else if($cssData['display_device'] == 2){
                        $pointCssCode .= ".imh-6310-annotation-box-{$ids} .imh-6310-annotation-box-inner{ cursor: grab;}@media screen and (max-width: 767px) {.imh-6310-annotation-box-{$ids} .imh-6310-annotation-box-inner{ cursor: default;}}";
                     } else if($cssData['display_device'] == 3){
                        $pointCssCode .= ".imh-6310-annotation-box-{$ids} .imh-6310-annotation-box-inner{ cursor: grab;}";
                     }
                  }

                  $pointCssCode .= "
                     .imh-6310-hover-content-{$ids}-{$counter} img{
                        cursor: pointer;
                     }
                  ";
               }



               wp_register_style("imh-6310-template-" . esc_attr($counter) . "-css", "");
               wp_enqueue_style("imh-6310-template-" . esc_attr($counter) . "-css");
               wp_add_inline_style("imh-6310-template-" . esc_attr($counter) . "-css", $pointCssCode);
               if($counter === 4) break;
               $counter++;
            }
         }

         $customCSS = $cssData['custom_css'];

         $selectedKey = isset($cssData['icon_position']) ? $cssData['icon_position'] : 'right-top';
         $background = isset($cssData['icon_background']) ? esc_attr($cssData['icon_background']) : 'rgba(0, 0, 0, 0.9)';
         $buttonPosition = "display: " . (isset($cssData['zoom_feature']) && $cssData['zoom_feature'] == 2 && $cssData['display_device'] != 1 ? 'flex' : 'none') . " !important;
                  flex-direction: column;
                  align-items: center; 
                  gap: 5px; 
                  position: absolute;
                  z-index: 9999;
                  background: {$background};
                  padding: 5px;
                  border-radius: 6px;";
         $buttonPositionMobile = 'top: 10px; right: 10px;';
         $buttonImage = "position: relative;
                        display: block;
                        opacity: .8;
                        padding: 3px;
                        ";
         $buttonExtra = "";

         if($selectedKey === 'right-top'){
            $buttonPosition .= "top: 15px; right: 15px;";
         } else if($selectedKey === 'right-bottom'){
            $buttonPosition .= "bottom: 15px; right: 15px;";
         } else if($selectedKey === 'left-top'){
            $buttonPosition .= "top: 15px; left: 15px;";
         } else if($selectedKey === 'left-bottom'){
            $buttonPosition .= "bottom: 15px; left: 15px;";
         } else{
            $buttonPosition = "display: " . (isset($cssData['zoom_feature']) && $cssData['zoom_feature'] == 2 && $cssData['display_device'] != 1 ? 'flex' : 'none') . " !important;
            justify-content: " . (isset($cssData['icon_position']) ? $cssData['icon_position'] : 'flex-start') . ";
            margin-bottom: 20px;";
            $buttonImage = "margin: 0 10px;";
            $buttonExtra = ".imh-6310-annotation-box-wrapper-{$ids} .imh-6310-builder-box-divider{display: none !important;}";

            $buttonPositionMobile = '';
         }

         $customCSS .= "
      .imh-6310-close-button{
         width: {$desktopSize}px;
         height: {$desktopSize}px;
         background-image: url('{$closeIcon}');
         right: -" . ($desktopSize / 2) . "px;
         top: -" . ($desktopSize / 2) . "px;
         background-size: cover;
      }
      .imh-6310-close-button-mobile{
         display: none;
      }
      .imh-6310-annotation-box-wrapper-{$ids} .imh-6310-zoom-buttons{
         {$buttonPosition}
      }
      .imh-6310-annotation-box-wrapper-{$ids} .imh-6310-zoom-buttons img{
         width: " . (isset($cssData['desktop_icon_size']) ? $cssData['desktop_icon_size'] : '30') . "px;
         height: " . (isset($cssData['desktop_icon_size']) ? $cssData['desktop_icon_size'] : '30') . "px;
         cursor: pointer;
         {$buttonImage}
      }
      {$buttonExtra}
      .imh-6310-annotation-box-wrapper-{$ids} .imh-6310-zoom-buttons img:hover{
         opacity: 1;
      }
      @media screen and (min-width: 100px) and (max-width: 767px) {
         .imh-6310-close-button{
            width: {$mobileSize}px;
            height: {$mobileSize}px;
            right: calc(.5% + ".($mobileSize / 2)."px);
            top: -" . ($mobileSize / 2) . "px;
            background-size: cover;
         }
         .imh-6310-close-button-mobile{
            display: block;
         }
      }
      @media screen and (min-width: 768px) and (max-width: 1366px) {
         .imh-6310-close-button{
            width: {$iPadSize}px;
            height: {$iPadSize}px;
            right: calc(.5% + ".($iPadSize / 2)."px);
            top: -" . ($iPadSize / 2) . "px;
            background-size: cover;
         }
         .imh-6310-close-button-mobile{
            display: block;
         }
      }
      @media screen and (min-width: 100px) and (max-width: 1366px) {
         .imh-6310-annotation-box-wrapper-{$ids} .imh-6310-zoom-buttons{
            display: " . (isset($cssData['zoom_feature']) && $cssData['zoom_feature'] == 2 && $cssData['display_device'] != 2 ? 'flex' : 'none') . " !important;
            {$buttonPositionMobile}
         }
         .imh-6310-annotation-box-wrapper-{$ids} .imh-6310-zoom-buttons img{
            width: " . (isset($cssData['mobile_icon_size']) ? $cssData['mobile_icon_size'] : '25') . "px;
            height: " . (isset($cssData['mobile_icon_size']) ? $cssData['mobile_icon_size'] : '25') . "px;
            margin: 0 5px;
         }
      }
   ";



         wp_register_style("imh-6310-custom-code-" . esc_attr($ids) . "-css", "");
         wp_enqueue_style("imh-6310-custom-code-" . esc_attr($ids) . "-css");
         wp_add_inline_style("imh-6310-custom-code-" . esc_attr($ids) . "-css", $customCSS);
         ?>
      </div>
   </div>
</div>
<?php
wp_enqueue_script('imh-6310-output', plugins_url('assets/js/imh-main-output-file-pro.js', __FILE__), array('jquery'), TRUE);
wp_enqueue_script('imh-6310-zoom-in-out-drag', plugins_url('assets/js/zoom-in-out-drag.js', __FILE__), array('jquery'), TRUE);
?>