/***********************************************
 * Hamburger menu behaviour
 ***********************************************/
$(window).scroll(function() {
    if ($(document).scrollTop() > 1) {
        $('#hamburger').removeClass('dark');
    } else {
        $('#hamburger').addClass('dark');
    }
});

// Animate icon on click
$(document).ready(function() {
    $('#hamburger').click(function() {
        $(this).toggleClass('open');
        $('.navbar-abel').toggleClass('open');
    });
});

/***********************************************
 * Smooth scrolling
 ***********************************************/
$('a').click(function(e) {

    // If internal link
    if (/#/.test(this.href)) {
        e.preventDefault();

        var target = $($.attr(this, 'href'));
        $('body,html').animate({ 'scrollTop': target.offset().top }, 1000, function() { animating = false; });
    }

});


/***********************************************
 * loading
 ***********************************************/

setInterval(function() {
    document.querySelectorAll(".dots")[0].classList.remove('animate');
    setTimeout(function() {
        document.querySelectorAll(".dots")[0].classList.add('animate');
    }, 200);
}, 3750);


function resizeIH() {
    var mH = $('.mapcoe').height();
    $('iframe').css("height", mH);
}
resizeIH();
$(window).resize(function() {
    resizeIH();
});