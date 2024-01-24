$("#mobile-icon").on("click", function(){
    $("#main-menu").toggleClass("collaps-menu")
});

$(document).ready(function () {
    $(".accordion-item").on("click", function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this)
                .children(".accordion-collapse")
                .slideUp(200);
        } else {
            $(".accordion-item").removeClass("active");
            $(this).addClass("active");
            $(".accordion-collapse").slideUp(200);
            $(this)
                .children(".accordion-collapse")
                .slideDown(200);
        }
    });
});