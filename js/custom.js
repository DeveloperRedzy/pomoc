$(document).ready(function() {
  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({ pageNotFound: "error_404" }); // initialize

  // define routes
  app.route({
    view: "view_1",
    load: "view_1.html"
  });
  app.route({ view: "view_2", load: "view_2.html" });
  app.route({
    view: "view_3",
    load: "view_3.html"
  });

  // run app
  app.run();
});
