(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: false,
        loop: true,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });

    
})(jQuery);

document.getElementById("enquiryForm").addEventListener("submit", function(e) {
  e.preventDefault();

  let formData = new FormData(this);

  fetch("send.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(resp => {
    if (resp.trim() === "success") {

      document.getElementById("successMsg").style.display = "block";

      let msg = `New Gold Loan Enquiry
Name: ${name.value}
Phone: ${phone.value}
City: ${city.value}
Gold Weight: ${weight.value} gm
Loan Amount: ₹${amount.value}`;

      window.open(
        `https://wa.me/919797979812?text=${encodeURIComponent(msg)}`,
        "_blank"
      );

    } else {
      alert("Mail failed!");
    }
  });
});

