jQuery(document).ready(function($) {
  $("select#lyket_page_button_type").on("change", function() {
    changeTemplateOptions("page", this.value, $);

    $("div#lyket-preview").attr("data-lyket-type", this.value);
    $("div#lyket-preview").attr("data-lyket-template", "simple");
  });

  $("select#lyket_post_button_type").on("change", function() {
    changeTemplateOptions("post", this.value, $);

    $("div#lyket-preview").attr("data-lyket-type", this.value);
    $("div#lyket-preview").attr("data-lyket-template", "simple");
  });

  $("select#lyket_post_template").on("change", function() {
    toggleColors(supportTheme.includes(this.value), $);

    $("div#lyket-preview").attr("data-lyket-template", this.value);
  });

  $("select#lyket_page_template").on("change", function() {
    toggleColors(supportTheme.includes(this.value), $);

    $("div#lyket-preview").attr("data-lyket-template", this.value);
  });
});

const changeTemplateOptions = (key, button, $) => {
  const template = $(`select#lyket_${key}_template`);

  template.empty();

  $.each(options[button], function(_key, value) {
    template.append(
      $("<option></option>")
        .attr("value", value.key)
        .text(value.label)
    );
  });

  toggleColors(true, $);
};

const toggleColors = (shouldShow, $) => {
  const all = $(".lyket-colors-row");

  $.each(all, function(_key, input) {
    shouldShow
      ? input.classList.remove("lyket-hidden")
      : input.classList.add("lyket-hidden");
  });
};

const options = {
  like: [
    {
      label: "Simple",
      key: "simple"
    },
    {
      label: "Twitter",
      key: "twitter"
    },
    {
      label: "Chevron",
      key: "chevron"
    }
  ],
  clap: [
    {
      label: "Simple",
      key: "simple"
    },
    {
      label: "Medium",
      key: "medium"
    },
    {
      label: "Heart",
      key: "heart"
    }
  ],
  updown: [
    {
      label: "Simple",
      key: "simple"
    },
    {
      label: "Reddit",
      key: "reddit"
    },
    {
      label: "Chevron",
      key: "chevron"
    }
  ]
};

const supportTheme = ["simple", "chevron", "heart"];
