jQuery(document).ready(function($) {
  $(".lk-color-picker").wpColorPicker({
    mode: "hsla",
    change: function(e, ui) {
      const name = $(e.target)
        .attr("name")
        .split("_")[2];

      $("div#lyket-preview").attr(
        `data-lyket-color-${name}`,
        ui.color.toString()
      );
    }
  });
});
