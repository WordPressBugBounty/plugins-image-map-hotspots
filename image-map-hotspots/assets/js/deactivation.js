jQuery(document).ready(function () {
  let deactivateUrl = "";

  jQuery('#deactivate-image-map-hotspots').on(
    "click",
    function (e) {
      e.preventDefault();

      deactivateUrl = jQuery(this).attr("href");

      jQuery("#imh-6310-myplugin-modal").fadeIn();
    }
  );

  jQuery("#imh-6310-myplugin-skip").on("click", function () {
    window.location.href = deactivateUrl;
  });

  jQuery("#imh-6310-myplugin-feedback-form").on(
    "submit",
    function (e) {
      e.preventDefault();

      jQuery.ajax({
        url: myPluginData.ajax_url,
        type: "POST",
        data: {
          action: "myplugin_send_feedback",
          reason:
            jQuery('input[name="reason"]:checked').val() || "",
          details:
            jQuery('textarea[name="details"]').val() || "",
        },
        complete: function () {
          window.location.href = deactivateUrl;
        },
      });
    }
  );
});