/* Exam Seat Management System - Custom JS */
$(document).ready(function () {
    // Smooth scroll for anchor links
    $('a[href^="#"]').on('click', function (e) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').stop().animate({ scrollTop: target.offset().top - 60 }, 600);
        }
    });
});
