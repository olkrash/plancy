$(function () {
    // Burger Menu start
    $("#mobile-menu-icon").on("click", function () {
        toggleMenu();
    });

    $(".topnav").on("mouseleave", function () {
        if ($("#burger-menu").is(":visible")) {
            toggleMenu();
        }
    });

    function toggleMenu() {
        let burgerMenu = $("#burger-menu");
        let main = $('main');
        if (main.css('opacity') >= 0.9) {
            main.fadeTo("slow", 0.1);
            $('.topnav').fadeTo("slow", 0.1);
        } else {
            main.fadeTo("slow", 0.9);
            $('.topnav').fadeTo("slow", 0.9);
        }

        burgerMenu.toggle("display");
    }

    // Burger Menu end

    // Contact start
    $("#contact-form").on("submit", function (e) {
        e.preventDefault();
        let email = $(this).find("input[name=email]").val();
        $.getJSON("/mail.php",
            {
                email: email,
            }, function (data) {
                let popUp = $("#pop-up");
                popUp.show();
                popUp.find('.pop-up__text').text(data["message"])
            });
    });

    $('.pop-up__close').on("click", function () {
        $("#pop-up").hide();
    })
    // Contact end
})

// Slider start
new Swiper(".swiper", {
    slidesPerView: 2,
    spaceBetween: -20,
    loop: true,
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        900: {
            slidesPerView: 4,
            spaceBetween: -30,
        },
    }
});
// Slider end
