imh_6310_reset_fields();
function generateJSON(selector = "#imh-6310-add-point ") {
  let myObj = {};
  let myCSS = {};
  let elementType = Number(
    jQuery(selector + ".imh-6310-section-select:checked").val()
  );

  let productIds = [];
  jQuery(selector)
    .find("[data-selected-pdt-id]")
    .each(function () {
      productIds.push(jQuery(this).attr("data-selected-pdt-id"));
    });
  myObj.productIds = productIds.join(",");
  myObj.productPerRowDesk = jQuery(
    selector + ".imh-6310-product-per-row-desk"
  ).val();
  myObj.productPerRowMob = jQuery(
    selector + ".imh-6310-product-per-row-mob"
  ).val();
  myObj.productBoxWidth = jQuery(
    selector + ".imh-6310-product-box-width"
  ).val();
  myObj.productBoxBgColor = jQuery(
    selector + ".imh-6310-product-box-bg-color"
  ).val();
  myObj.productBoxHoverColor = jQuery(
    selector + ".imh-6310-product-box-hover-color"
  ).val();
  myObj.productTitleFontSize = jQuery(
    selector + ".imh-6310-product-title-font-size"
  ).val();
  myObj.productTitleColor = jQuery(
    selector + ".imh-6310-product-title-color"
  ).val();
  myObj.productTitleHoverColor = jQuery(
    selector + ".imh-6310-product-title-hover-color"
  ).val();
  myObj.productPriceFontSize = jQuery(
    selector + ".imh-6310-product-price-font-size"
  ).val();
  myObj.productPriceColor = jQuery(
    selector + ".imh-6310-product-price-color"
  ).val();
  myObj.productDisPriceColor = jQuery(
    selector + ".imh-6310-product-dis-price-color"
  ).val();
  myObj.productBtnFontSize = jQuery(
    selector + ".imh-6310-product-button-font-size"
  ).val();
  myObj.productBtnColor = jQuery(
    selector + ".imh-6310-product-button-color"
  ).val();
  myObj.productBtnHoverColor = jQuery(
    selector + ".imh-6310-product-button-hover-color"
  ).val();
  myObj.productBtnBgColor = jQuery(
    selector + ".imh-6310-product-button-bg-color"
  ).val();
  myObj.productBtnBgHoverColor = jQuery(
    selector + ".imh-6310-product-button-bg-hover-color"
  ).val();
  myObj.tooltipWidth = jQuery(selector + ".imh-6310-tooltip-width").val();

  myObj.iconType = Number(
    jQuery(selector + ".imh-6310_icon_type:checked").val()
  );
  myObj.fontAwesomeIcon = jQuery(selector + ".icons-1").val();
  myObj.fontAwesomeHoverIcon = jQuery(selector + ".icons-2").val();
  myObj.fontAwesomeIconColor = jQuery(
    selector + ".imh_6310_fontawesome_icon_color"
  ).val();
  myObj.fontAwesomeIconHoverColor = jQuery(
    selector + ".imh_6310_fontawesome_icon_hover_color"
  ).val();
  myObj.fontAwesomIconSize = jQuery(selector + ".imh-6310_icon_size").val();
  myObj.fontAwesomIconSizeInMobile = jQuery(
    selector + ".imh-6310_icon_size_in_mobile"
  ).val();
  myObj.fontAwesomIconSizeInIpad = jQuery(
    selector + ".imh-6310_icon_size_in_ipad"
  ).val();
  myObj.imgOrIconSize = jQuery(selector + ".img_or_icon_size").val();
  myObj.imgOrIconSizeInIpad = jQuery(
    selector + ".img_or_icon_size_in_ipad"
  ).val();
  myObj.imgOrIconSizeInMobile = jQuery(
    selector + ".img_or_icon_size_in_mobile"
  ).val();
  myObj.customFirstImg = jQuery(selector + ".imh-6310-image-edit-1").val();
  myObj.customSecondImg = jQuery(selector + ".imh-6310-image-edit-2").val();
  myObj.customText = jQuery(selector + ".imh-6310_custom_enter_text").val();
  myObj.customTextSize = jQuery(
    selector + ".imh_6310_custom_text_font_size"
  ).val();
  myObj.customTextColor = jQuery(
    selector + ".imh_6310_custom_text_font_color"
  ).val();
  myObj.customTextBgColor = jQuery(
    selector + ".imh_6310_custom_text_font_bg_color"
  ).val();
  myObj.customeCode = jQuery(
    selector + `textarea[name='imh_6310_custom_code']`
  ).val();
  myObj.mouseType = jQuery(selector + ".imh-6310_popover_type:checked").val();
  myObj.blinkTooltip = jQuery(selector + ".imh-6310_blink_type:checked").val();
  myObj.alwaysShow = jQuery(selector + ".imh-6310_always_show:checked").val();
  myObj.glowColor = jQuery(
    selector + ".imh_6310_fontawesome_icon_glow_color"
  ).val();

  // check element type

  myObj.selectedTemplate = jQuery(selector + ".imh-6310-active").attr(
    "data-id"
  );

  myObj.popupEmbedded = jQuery(selector + ".popup_embedded").val();
  myObj.selectedTemplate = jQuery(selector + ".imh-6310-active").attr(
    "data-id"
  );

  // check selector type

  myObj.linkText = (
    jQuery(selector + ".imh_6310_link_text").val() || ""
  ).replace(/'/g, "@@##!!@@");
  myObj.linkURL = jQuery(selector + ".imh_6310_custom_link_url").val();
  myObj.openNewTab = jQuery(selector + ".imh-6310-open-new-tab:checked").val();
  myObj.openPopup = jQuery(selector + ".imh-6310-open-popup:checked").val();
  myObj.openDesImg = jQuery(selector + ".imh-6310-des-img").val();
  myObj.openDescription = jQuery(
    selector + ".imh-6310-tooltip_discription"
  ).val();
  myObj.openDesFontSize = jQuery(
    selector + ".imh-6310-tooltip_discription_font_size"
  ).val();
  myObj.openDesFontSizeMobile = jQuery(
    selector + ".imh-6310-tooltip_discription_font_size_mobile"
  ).val();
  myObj.openDesFontColor = jQuery(
    selector + ".imh-6310-tooltip_discription_font_color"
  ).val();
  myObj.customButtonLinkType = jQuery(
    selector + ".imh-6310_button_link:checked"
  ).val();
  myObj.customButtonText = jQuery(selector + ".imh-6310-button-text").val();
  myObj.customButtonUrl = jQuery(selector + ".imh-6310-button-url").val();
  myObj.customButtonTextSize = jQuery(
    selector + ".imh_6310_button_text_size"
  ).val();
  myObj.customButtonTextColor = jQuery(
    selector + ".imh_6310_button_text_color"
  ).val();
  myObj.customButtonBgcolor = jQuery(
    selector + ".imh_6310_button_bg_color"
  ).val();
  myObj.tempCommonFontSize = jQuery(
    selector + ".imh_6310_template_font_size"
  ).val();
  myObj.tempCommonFontSizeMobile = jQuery(
    selector + ".imh_6310_template_font_size_mobile"
  ).val();
  myObj.tempCommonFontColor = jQuery(
    selector + ".imh_6310_template_font_color"
  ).val();
  myObj.tempCommonBgColor = jQuery(
    selector + ".imh_6310_template_bg_color"
  ).val();
  myObj.tem02EmbeddedLink = imh6310getEmbeddedAttributes(
    jQuery(selector + ".imh-6310-embedded_code_link").val()
  );

  let customCode = (
    jQuery(selector + `textarea[name='imh-6310-custome_html']`).val() || ""
  ).replace(/'/g, "@@##!!@@");

  customCode = customCode.replace(/='/g, '="');
  customCode = customCode.replace(/'>/g, '">');

  myObj.customeHtmlCode = customCode;
  myObj.customeCssCode = (
    jQuery(selector + `textarea[name='imh-6310-custome_css']`).val() || ""
  ).replace(/'/g, "@@##!!@@");
  myObj.pluginShortCode = jQuery(
    selector + `input[name='imh_6310_short_code']`
  ).val();
  myObj.customeCodePopup = imh6310getEmbeddedAttributes(
    jQuery(selector + `textarea[name='imh_6310_custom_code_popup']`).val()
  );
  myObj.popupCustomHtml = (
    jQuery(selector + `textarea[name='imh_6310_popup_custom_html']`).val() || ""
  ).replace(/'/g, "@@##!!@@");
  myObj.popupCustomCss = (
    jQuery(selector + `textarea[name='imh_6310_popup_custom_css']`).val() || ""
  ).replace(/'/g, "@@##!!@@");
  myObj.popupCustomCodeWidth = jQuery(
    selector + ".imh_6310_custom_popup_width"
  ).val();
  myObj.customButtonTextColor = jQuery(
    selector + ".imh_6310_button_text_color"
  ).val();
  myObj.customIconLinkType = jQuery(
    selector + ".imh-6310_link_title_type:checked"
  ).val();
  myObj.linkPosition = jQuery(
    selector + ".imh-6310-link-position:checked"
  ).val();
  myObj.elementType = elementType;

  if (myObj.iconType == 1) {
    myCSS.styleCSS = `
    .imh-6310-drag[data-id='${window.currentPoint}'] .imh-6310-pin-main-img{ 
        color: ${myObj.fontAwesomeIconColor} !important;
        font-size:${myObj.fontAwesomIconSize}px !important;
    } 
    .imh-6310-drag[data-id='${window.currentPoint}'] .imh-6310-pin-hover-img{ 
      color: ${myObj.fontAwesomeIconHoverColor} !important;
      font-size:${myObj.fontAwesomIconSize}px !important;
    } 
   
  `;
  } else if (myObj.iconType == 2) {
    myCSS.styleCSS = `
    .imh-6310-drag[data-id='${window.currentPoint}'] .imh-6310-pin-main-img{ 
        width: ${myObj.imgOrIconSize}px !important;
        height:${myObj.imgOrIconSize}px !important;
        border-radius: 50%;
    } 
    .imh-6310-drag[data-id='${window.currentPoint}'] .imh-6310-pin-hover-img{ 
      width: ${myObj.imgOrIconSize}px !important;
      height:${myObj.imgOrIconSize}px !important;
      border-radius: 50%;
  }
  `;
  } else if (myObj.iconType == 3) {
    myCSS.styleCSS = `
    .imh-6310-drag[data-id='${window.currentPoint}'] .imh-6310-customtext{
        font-size:${myObj.customTextSize}px !important;
        color: ${myObj.customTextColor} !important;
        background-color:${myObj.customTextBgColor} !important;
        padding: 5px 10px;
    } 
  `;
  }

  //imh_6310_reset_fields();
  return [myObj, myCSS];
}

function setJsonData() {
  let jsonData = jQuery(`[data-id='${window.currentPoint}']`).attr("data-json");
  jsonData = JSON.parse(jsonData);
  if (!jsonData || !jsonData.elementType) {
    return;
  }
  imh_6310_reset_fields();

  jQuery("#imh-6310-edit-point .imh-6310-section-select[value='1']").trigger(
    "click"
  );

  jQuery("#imh-6310-edit-point .imh-6310-section-select[value='2']").trigger(
    "click"
  );

  jQuery("#imh-6310-edit-point .imh-6310-section-select[value='3']").trigger(
    "click"
  );

  jQuery("#imh-6310-edit-point .imh-6310-section-select[value='4']").trigger(
    "click"
  );

  jQuery(".imh-6310-tooltip-img").removeClass("imh-6310-active");
  jQuery(".imh-6310-open-new-tab").prop("selectedIndex", jsonData.openNewTab);

  jQuery(".imh-6310-open-popup").prop("selectedIndex", jsonData.openPopup);
  if (Number(jsonData.openPopup) == 1) {
    jQuery(".tooltip-embedded").addClass("imh-6310-hide");
  } else {
    jQuery(".tooltip-embedded").removeClass("imh-6310-hide");
  }
  jQuery(".imh-6310-templates").removeClass("imh-6310-hide");
  jQuery(".imh-6310-active").removeClass("imh-6310-active");
  jQuery(
    `.imh-6310-templates, [data-id='${jsonData.selectedTemplate}']`
  ).removeClass("imh-6310-hide");

  jQuery(".icons-1").val(jsonData.fontAwesomeIcon);
  jQuery(".icons-2").val(jsonData.fontAwesomeHoverIcon);
  jQuery(".imh_6310_fontawesome_icon_color").val(jsonData.fontAwesomeIconColor);
  jQuery(".imh_6310_fontawesome_icon_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.fontAwesomeIconColor,
    });
  jQuery(".imh_6310_fontawesome_icon_glow_color").val(jsonData.glowColor);
  jQuery(".imh_6310_fontawesome_icon_glow_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.glowColor,
    });
  jQuery(".imh_6310_fontawesome_icon_hover_color").val(
    jsonData.fontAwesomeIconHoverColor
  );
  jQuery(".imh_6310_fontawesome_icon_hover_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.fontAwesomeIconHoverColor,
    });
  jQuery(".imh-6310_icon_size").val(jsonData.fontAwesomIconSize);
  jQuery(".imh-6310_icon_size_in_mobile").val(
    jsonData.fontAwesomIconSizeInMobile !== undefined
      ? jsonData.fontAwesomIconSizeInMobile
      : jsonData.fontAwesomIconSize
  );
  jQuery(".imh-6310_icon_size_in_ipad").val(
    jsonData.fontAwesomIconSizeInIpad !== undefined
      ? jsonData.fontAwesomIconSizeInIpad
      : jsonData.fontAwesomIconSize
  );
  jQuery(".img_or_icon_size").val(jsonData.imgOrIconSize);
  jQuery(".img_or_icon_size_in_ipad").val(
    jsonData.imgOrIconSizeInIpad !== undefined
      ? jsonData.imgOrIconSizeInIpad
      : jsonData.imgOrIconSize
  );
  jQuery(".img_or_icon_size_in_mobile").val(
    jsonData.imgOrIconSizeInMobile !== undefined
      ? jsonData.imgOrIconSizeInMobile
      : jsonData.imgOrIconSize
  );
  jQuery(".imh-6310-image-edit-1").val(jsonData.customFirstImg);
  jQuery(".imh-6310-image-edit-2").val(jsonData.customSecondImg);

  jQuery(".imh-6310_custom_enter_text").val(jsonData.customText);
  jQuery(".imh_6310_custom_text_font_size").val(jsonData.customTextSize);
  jQuery(".imh_6310_custom_text_font_color").val(jsonData.customTextColor);
  jQuery(".imh_6310_custom_text_font_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.customTextColor,
    });
  jQuery(".imh_6310_custom_text_font_bg_color").val(jsonData.customTextBgColor);
  jQuery(".imh_6310_custom_text_font_bg_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.customTextBgColor,
    });

  jQuery(`textarea[name='imh_6310_custom_code']`).val(jsonData.customeCode);
  jQuery(`textarea[name='imh_6310_custom_code_popup']`).val(
    imh_6310_create_embedded_code(jsonData.customeCodePopup)
  );
  jQuery(`textarea[name='imh_6310_popup_custom_html']`).val(
    (jsonData.popupCustomHtml || "").replace(/@@##!!@@/g, "'")
  );
  jQuery(`textarea[name='imh_6310_popup_custom_css']`).val(
    (jsonData.popupCustomCss || "").replace(/@@##!!@@/g, "'")
  );
  jQuery(".imh_6310_custom_popup_width").val(jsonData.popupCustomCodeWidth);
  jQuery(`textarea[name='imh-6310-custome_html']`).val(
    (jsonData.customeHtmlCode || "").replace(/@@##!!@@/g, "'")
  );
  jQuery(`textarea[name='imh-6310-custome_css']`).val(
    (jsonData.customeCssCode || "").replace(/@@##!!@@/g, "'")
  );
  jQuery(`input[name='imh_6310_short_code']`).val(jsonData.pluginShortCode);
  jQuery(".imh_6310_link_text").val(
    (jsonData.linkText || "").replace(/@@##!!@@/g, "'")
  );
  jQuery(".imh_6310_custom_link_url").val(jsonData.linkURL);
  jQuery(".imh-6310-des-img").val(jsonData.openDesImg);
  jQuery(".imh-6310-tooltip_discription").val(
    jsonData.openDescription ? jsonData.openDescription : 400
  );
  jQuery(".imh-6310-tooltip-width").val(jsonData.tooltipWidth);
  jQuery(".imh-6310-tooltip_discription_font_size").val(
    jsonData.openDesFontSize
  );
  jQuery(".imh-6310-tooltip_discription_font_size_mobile").val(
    jsonData.openDesFontSizeMobile
  );
  jQuery(".imh-6310-tooltip_discription_font_color").val(
    jsonData.openDesFontColor
  );
  jQuery(".imh-6310-tooltip_discription_font_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.openDesFontColor,
    });
  jQuery(".tooltip_discription_font_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.openDesFontColor,
    });
  jQuery(".imh-6310-button-text").val(jsonData.customButtonText);
  jQuery(".imh-6310-button-url").val(jsonData.customButtonUrl);
  jQuery(".imh_6310_button_text_size").val(jsonData.customButtonTextSize);
  jQuery(".imh_6310_button_text_color").val(jsonData.customButtonTextColor);
  jQuery(".imh_6310_button_text_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.customButtonTextColor,
    });
  jQuery(".imh_6310_button_bg_color").val(jsonData.customButtonBgcolor);
  jQuery(".imh_6310_button_bg_color")
    .closest("div")
    .find(".minicolors-swatch-color")
    .css({
      "background-color": jsonData.customButtonBgcolor,
    });
  jQuery(".popup_embedded").val(jsonData.popupEmbedded);
  jQuery(".imh-6310-tooltip-link").removeClass("imh-6310-hide");
  jQuery(".imh_6310_textarea").removeClass("imh-6310-hide");

  jQuery(".imh-6310-form-02").removeClass("imh-6310-hide");
  jQuery(".imh-6310-form-02").removeClass("imh-6310-hide");

  if (jsonData.selectedTemplate != "") {
    //set common
    jQuery(".imh_6310_template_font_size").val(jsonData.tempCommonFontSize);
    jQuery(".imh_6310_template_font_size_mobile").val(
      jsonData.tempCommonFontSizeMobile
    );
    jQuery(".imh_6310_template_font_color").val(jsonData.tempCommonFontColor);
    jQuery(".imh_6310_template_font_color")
      .closest("div")
      .find(".minicolors-swatch-color")
      .css({
        "background-color": jsonData.tempCommonFontColor,
      });
    jQuery(".imh_6310_template_bg_color").val(jsonData.tempCommonBgColor);
    jQuery(".imh_6310_template_bg_color")
      .closest("div")
      .find(".minicolors-swatch-color")
      .css({
        "background-color": jsonData.tempCommonBgColor,
      });

    //Uncommon fields
    if (jsonData.selectedTemplate == "02") {
      jQuery(".imh-6310-embedded_code_link").val(
        imh_6310_create_embedded_code(jsonData.tem02EmbeddedLink)
      );
    }

    let linkPosition = jsonData.linkPosition ? jsonData.linkPosition : 1;
    jQuery(`
        #imh-6310-edit-point .toggle-tabs li:first-child, 
        #imh-6310-edit-point .imh-6310_icon_type[value='${jsonData.iconType}'],
        #imh-6310-edit-point .imh-6310_popover_type[value='${jsonData.mouseType}'],
        #imh-6310-edit-point .imh-6310_blink_type[value='${jsonData.blinkTooltip}'],
        #imh-6310-edit-point .imh-6310_always_show[value='${jsonData.alwaysShow}'],
        #imh-6310-edit-point .imh-6310-section-select[value='${jsonData.elementType}'],
        #imh-6310-edit-point .imh-6310_link_title_type[value='${jsonData.customIconLinkType}'],
        #imh-6310-edit-point .imh-6310-link-position[value='${linkPosition}'],
        #imh-6310-edit-point .imh-6310-open-popup[value='${jsonData.openPopup}'],
        #imh-6310-edit-point .imh-6310-open-new-tab[value='${jsonData.openNewTab}'],
        #imh-6310-edit-point .imh-6310_button_link[value='${jsonData.customButtonLinkType}']
      `).trigger("click");
  }

  setTimeout(function () {
    if (jsonData.elementType == 2) {
      jQuery(
        "#imh-6310-edit-point .imh-6310-tooltip-link, .imh_6310_custom_template"
      ).addClass("imh-6310-hide");
      jQuery("#imh-6310-edit-point .imh_6310_template_embedded").removeClass(
        "imh-6310-hide"
      );
    } else if (jsonData.elementType == 3) {
      jQuery("#imh-6310-edit-point .imh_6310_custom_template").removeClass(
        "imh-6310-hide"
      );
      jQuery(
        "#imh-6310-edit-point .imh-6310-tooltip-link, .imh_6310_template_embedded, .imh_6310_font_prop, .imh-6310-templates,  #imh-6310-edit-point .imh_6310_template_description"
      ).addClass("imh-6310-hide");
    } else {
      jQuery("#imh-6310-edit-point .imh-6310-tooltip-link").removeClass(
        "imh-6310-hide"
      );
      jQuery(
        "#imh-6310-edit-point .imh_6310_custom_template, .imh_6310_template_embedded"
      ).addClass("imh-6310-hide");
    }
  }, 500);

  if (jsonData.selectedTemplate != "") {
    jQuery(
      `.imh-6310-tooltip-img[data-id='${jsonData.selectedTemplate}']`
    ).addClass("imh-6310-active");
    jQuery(
      `#imh-6310-edit-point .imh-6310-tooltip-img[data-id='${jsonData.selectedTemplate}']`
    ).trigger("click");
  }

  setTimeout(function () {
    if (jsonData.elementType == 4) {
      jQuery(
        '.toggle-tabs li[data-id="3"], .imh-6310-direct-link, .imh-6310_link'
      ).removeClass("imh-6310-hide");
      jQuery(
        ".imh_6310_font_prop, .imh_6310_template_embedded, .imh_6310_custom_template, .imh_6310_custom_template, .imh_6310_template_description, .imh-6310-templates, .imh-6310-tooltip-link"
      ).addClass("imh-6310-hide");
    }
  }, 1000);

  setTimeout(function () {
    if (jsonData.elementType == 5) {
      jQuery(
        '.imh_6310_font_prop, .imh_6310_template_embedded, .toggle-tabs li[data-id="3"], .imh_6310_template_description, .imh-6310-tooltip-link'
      ).addClass("imh-6310-hide");
      jQuery(".imh-6310-product").removeClass("imh-6310-hide");
      jQuery("#imh-6310-product-search").val("");

      const productIds = jsonData.productIds
        ? jsonData.productIds.split(",")
        : [];

      const productList = jQuery("#imh-6310-edit-point .imh-6310-product-list");
      if (productList.length) {
        productList.each(function () {
          const id = jQuery(this).attr("data-product-id");
          if (productIds.length && productIds.includes(id)) {
            const text = jQuery(this).text();
            const img = jQuery(this).attr("data-product-img");
            const imgTag = img
              ? `<div class='imh-6310-selected-product-img'><img src='${img}' /></div>`
              : ""; // Add image only if img exists

            jQuery(
              "#imh-6310-edit-point .imh-6310-selected-product-list"
            ).append(
              `<div class='imh-6310-selected-product' data-selected-pdt-id='${id}'>
                    ${imgTag}
                    <div class='imh-6310-selected-product-title'>${text}</div>
                    <i class="fas fa-window-close"></i>
                </div>`
            );
          }
        });
      }

      jQuery(".imh-6310-product-per-row-desk").val(
        jsonData.productPerRowDesk ? jsonData.productPerRowDesk : 3
      );
      jQuery(".imh-6310-product-per-row-mob").val(
        jsonData.productPerRowMob ? jsonData.productPerRowMob : 2
      );
      jQuery(".imh-6310-product-box-width").val(
        jsonData.productBoxWidth ? jsonData.productBoxWidth : 500
      );
      jQuery(".imh-6310-product-box-bg-color").val(
        jsonData.productBoxBgColor
          ? jsonData.productBoxBgColor
          : "rgb(255, 255, 255)"
      );
      jQuery(".imh-6310-product-box-bg-color")
        .closest("div")
        .find(".minicolors-swatch-color")
        .css({
          "background-color": jsonData.productBoxBgColor
            ? jsonData.productBoxBgColor
            : "rgb(255, 255, 255)",
        });

      jQuery(".imh-6310-product-box-hover-color").val(
        jsonData.productBoxHoverColor
          ? jsonData.productBoxHoverColor
          : "rgb(240, 240, 240)"
      );
      jQuery(".imh-6310-product-box-hover-color")
        .closest("div")
        .find(".minicolors-swatch-color")
        .css({
          "background-color": jsonData.productBoxHoverColor
            ? jsonData.productBoxHoverColor
            : "rgb(240, 240, 240)",
        });

      //Title Section
      jQuery(".imh-6310-product-title-font-size").val(
        jsonData.productTitleFontSize ? jsonData.productTitleFontSize : 18
      );
      jQuery(".imh-6310-product-title-color").val(
        jsonData.productTitleColor ? jsonData.productTitleColor : "rgb(0, 0, 0)"
      );
      jQuery(".imh-6310-product-title-color")
        .closest("div")
        .find(".minicolors-swatch-color")
        .css({
          "background-color": jsonData.productTitleColor
            ? jsonData.productTitleColor
            : "rgb(0, 0, 0)",
        });
      jQuery(".imh-6310-product-title-hover-color").val(
        jsonData.productTitleHoverColor
          ? jsonData.productTitleHoverColor
          : "rgb(26, 26, 26)"
      );
      jQuery(".imh-6310-product-title-hover-color")
        .closest("div")
        .find(".minicolors-swatch-color")
        .css({
          "background-color": jsonData.productTitleHoverColor
            ? jsonData.productTitleHoverColor
            : "rgb(26, 26, 26)",
        });

      //Price Section
      jQuery(".imh-6310-product-price-font-size").val(
        jsonData.productPriceFontSize ? jsonData.productPriceFontSize : 16
      );
      jQuery(".imh-6310-product-price-color").val(
        jsonData.productPriceColor
          ? jsonData.productPriceColor
          : "rgb(4, 107, 210)"
      );
      jQuery(".imh-6310-product-price-color")
        .closest("div")
        .find(".minicolors-swatch-color")
        .css({
          "background-color": jsonData.productPriceColor
            ? jsonData.productPriceColor
            : "rgb(4, 107, 210)",
        });
      jQuery(".imh-6310-product-dis-price-color").val(
        jsonData.productDisPriceColor
          ? jsonData.productDisPriceColor
          : "rgb(255, 0, 0)"
      );
      jQuery(".imh-6310-product-dis-price-color")
        .closest("div")
        .find(".minicolors-swatch-color")
        .css({
          "background-color": jsonData.productDisPriceColor
            ? jsonData.productDisPriceColor
            : "rgb(4, 107, 210)",
        });

      //Button
      jQuery(".imh-6310-product-button-font-size").val(
        jsonData.productBtnFontSize ? jsonData.productBtnFontSize : 18
      );
      jQuery(".imh-6310-product-button-color").val(
        jsonData.productBtnColor
          ? jsonData.productBtnColor
          : "rgb(255, 255, 255)"
      );
      jQuery(".imh-6310-product-button-color")
        .closest("div")
        .find(".minicolors-swatch-color")
        .css({
          "background-color": jsonData.productBtnColor
            ? jsonData.productBtnColor
            : "rgb(255, 255, 255)",
        });

      jQuery(".imh-6310-product-button-hover-color").val(
        jsonData.productBtnHoverColor
          ? jsonData.productBtnHoverColor
          : "rgb(245, 245, 245)"
      );
      jQuery(".imh-6310-product-button-hover-color")
        .closest("div")
        .find(".minicolors-swatch-color")
        .css({
          "background-color": jsonData.productBtnHoverColor
            ? jsonData.productBtnHoverColor
            : "rgb(245, 245, 245)",
        });

      jQuery(".imh-6310-product-button-bg-color").val(
        jsonData.productBtnBgColor
          ? jsonData.productBtnBgColor
          : "rgb(4, 107, 210)"
      );
      jQuery(".imh-6310-product-button-bg-color")
        .closest("div")
        .find(".minicolors-swatch-color")
        .css({
          "background-color": jsonData.productBtnBgColor
            ? jsonData.productBtnBgColor
            : "rgb(4, 107, 210)",
        });

      jQuery(".imh-6310-product-button-bg-hover-color").val(
        jsonData.productBtnBgHoverColor
          ? jsonData.productBtnBgHoverColor
          : "rgb(210, 100, 72)"
      );
      jQuery(".imh-6310-product-button-bg-hover-color")
        .closest("div")
        .find(".minicolors-swatch-color")
        .css({
          "background-color": jsonData.productBtnBgHoverColor
            ? jsonData.productBtnBgHoverColor
            : "rgb(210, 100, 72)",
        });
    }
  }, 1000);

  setTimeout(function () {
    if (jsonData.elementType == 6) {
      jQuery(".imh_6310_plugin_short_code").removeClass("imh-6310-hide");
      jQuery(
        '.imh_6310_font_prop, .imh_6310_template_embedded, .imh_6310_custom_template, .imh_6310_custom_template, .imh_6310_template_description, .imh-6310-templates, .imh-6310-tooltip-link, .toggle-tabs li[data-id="3"], .imh-6310-direct-link, .imh-6310_link'
      ).addClass("imh-6310-hide");
    }
  }, 1000);
}

function imh_6310_reset_fields() {
  jQuery(".ima-imh-6310_icon_type[value='1']").prop("checked", true);
  jQuery(".ima-imh-6310_popover_type[value='1']").prop("checked", true);
  jQuery(".imh-6310-tooltip-img").removeClass("imh-6310-active");
  jQuery(
    ".imh-6310-form, .imh-6310-tooltip-link, .imh-6310-templates, .tooltip-embedded"
  ).addClass("imh-6310-hide");
  jQuery(".imh-6310-embedded_code_link").val("");

  // setTimeout(function () {
  jQuery("[data-value]").each(function () {
    const selector = jQuery(this);
    if (
      selector.attr("data-value") !== undefined ||
      selector.attr("data-value") !== null
    ) {
      selector.val(selector.attr("data-value"));
      selector.attr("data-defaultValue", selector.attr("data-value"));
      selector.text(selector.attr("data-value"));
      if (selector.closest("div").find(".minicolors-swatch-color")) {
        selector
          .closest("div")
          .find(".minicolors-swatch-color")
          .css({
            "background-color": selector.attr("data-value"),
          });
      }
    }
  });

  // }, 100);
  jQuery(".imh-6310-section-select, .imh-6310-open-new-tab").prop(
    "selectedIndex",
    0
  );

  jQuery(".imh_6310_textarea").addClass("imh-6310-hide");

  setTimeout(function () {
    if (jQuery(".imh_6310_color_picker").length) {
      jQuery(".imh_6310_color_picker").each(function () {
        jQuery(this).minicolors({
          control: jQuery(this).attr("data-control") || "hue",
          defaultValue: jQuery(this).attr("data-defaultValue") || "",
          format: jQuery(this).attr("data-format") || "hex",
          keywords: jQuery(this).attr("data-keywords") || "",
          inline: jQuery(this).attr("data-inline") === "true",
          letterCase: jQuery(this).attr("data-letterCase") || "lowercase",
          opacity: jQuery(this).attr("data-opacity"),
          position: jQuery(this).attr("data-position") || "bottom left",
          swatches: jQuery(this).attr("data-swatches")
            ? jQuery(this).attr("data-swatches").split("|")
            : [],
          change: function (value, opacity) {
            if (!value) return;
            if (opacity) value += ", " + opacity;
            if (typeof console === "object") {
            }
          },
          theme: "bootstrap",
        });
      });
    }
  }, 500);
}

function defineDragableElement() {
  let allElement = jQuery(".imh-6310-drag");
  allElement.each(function () {
    jQuery(this).draggable({
      appendTo: "body",
      containment: ".imh-6310-annotation-box",
      drag: function () {},
      stop: function () {
        let tWidth = jQuery(".imh-6310-annotation-box").width();
        let tHeight = jQuery(".imh-6310-annotation-box").height();
        var iconWidth = jQuery(this).width();
        var height = jQuery(this).find(".imh-6310-point-icons").height();
        var bottom = tHeight - (jQuery(this).position().top + height);
        var left = jQuery(this).position().left;

        var xPos = (
          (left / parseFloat(jQuery(this).parent().width())) *
          100
        ).toFixed(2);
        var yPos = (
          (bottom / parseFloat(jQuery(this).parent().height())) *
          100
        ).toFixed(2);
        jQuery(this).attr(
          "data-position",
          `${xPos}-${yPos}-${tWidth}-${iconWidth}-${tHeight}`
        );
      },
    });
  });
}

function imh6310getEmbeddedAttributes(embeddedCode) {
  if (!embeddedCode) {
    return "";
  }
  jQuery("body").after(`<div class="imh-6310-dummy">${embeddedCode}</div>`);
  embeddedCode = jQuery(".imh-6310-dummy iframe");
  let attrName = "";
  let attrValue = "";
  if (embeddedCode.length) {
    embeddedCode.each(function () {
      var attributes = this.attributes;
      var i = attributes.length;
      while (i--) {
        if (attrName) {
          attrName += "XXYYXX";
          attrValue += "XXYYXX";
        }
        attrName += attributes[i].name;
        attrValue += attributes[i].value;
      }
    });
  }
  jQuery(".imh-6310-dummy").remove();
  return `${attrName}AABBAA${attrValue}`;
}

function imh_6310_create_embedded_code(embeddedCode) {
  if (!embeddedCode) return;
  embeddedCode = embeddedCode.split("AABBAA");
  let allAttrName = embeddedCode[0].split("XXYYXX");
  let allAttrValue = embeddedCode[1].split("XXYYXX");

  let htmlCode = "";

  if (
    allAttrName.length &&
    allAttrValue.length &&
    allAttrName.length == allAttrValue.length
  ) {
    for (let i = 0; i < allAttrName.length; i++) {
      htmlCode += " " + allAttrName[i] + '="' + allAttrValue[i] + '"';
    }
  }

  if (htmlCode) {
    htmlCode = "<iframe" + htmlCode + "></iframe>";
  }
  return htmlCode;
}

function imh_6310_clone_pointer() {
  jQuery("body").on("click", ".imh-6310-point-clone", function () {
    if (!confirm("Do you want to clone this pointer?")) {
      return false;
    }
    let annotationBox = jQuery(".imh-6310-annotation-box");
    let counter = jQuery(".imh-6310-drag").length + 1;
    let dataJson = JSON.parse(
      jQuery(this).closest(".imh-6310-drag").attr("data-json")
    );
    let bottom =
      ((annotationBox.height() -
        jQuery(this).closest(".imh-6310-drag").height() -
        5) /
        annotationBox.height()) *
      100;
    dataJson.xPos = 0;
    dataJson.yPos = bottom;

    let html = jQuery(this).closest(".imh-6310-drag").html();
    html = `<div data-id="${counter}" style="left: 0 !important; bottom: ${bottom}% !important;">${html}</div>`;
    jQuery(".imh-6310-annotation-box").append(html);
    jQuery(`div[data-id='${counter}']`).attr(
      "data-json",
      JSON.stringify(dataJson)
    );
    jQuery(`div[data-id='${counter}']`).attr(
      "data-position",
      `0-${bottom}-${dataJson.tWidth}-${dataJson.iconWidth}`
    );
    jQuery(`div[data-id='${counter}']`).attr(
      "class",
      `imh-6310-drag imh-6310-point-${counter} ui-widget-content ui-draggable ui-draggable-handle`
    );
    defineDragableElement();
  });
}
