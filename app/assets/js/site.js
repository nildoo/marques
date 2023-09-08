$(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.scrollup_fade').fadeIn();
        } else {
            $('.scrollup_fade').fadeOut();
        }
    });
    $('.scrollup_fade').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1800);
        return false;
    });

    // $(window).scroll(function () {
    //     if ($(this).scrollTop() > 2) {
    //         $(".navbar-default").addClass('shadow');
    //     } else {
    //         $(".navbar-default").removeClass('shadow');
    //     }
    // });


    //ACCORDION INITIAL
    var bodyEl = $('body'),
        accordionDT = $('.accordion').find('dt'),
        accordionDD = accordionDT.next('dd'),
        parentHeight = accordionDD.height(),
        childHeight = accordionDD.children('.content').outerHeight(true),
        newHeight = parentHeight > 0 ? 0 : childHeight,
        accordionPanel = $('.accordion-panel'),
        buttonsWrapper = accordionPanel.find('.buttons-wrapper'),
        openBtn = accordionPanel.find('.open-btn'),
        closeBtn = accordionPanel.find('.close-btn');

    bodyEl.on('click', function (argument) {
        var totalItems = $('.accordion').children('dt').length;
        var totalItemsOpen = $('.accordion').children('dt.is-open').length;

        if (totalItems == totalItemsOpen) {
            openBtn.addClass('hidden');
            closeBtn.removeClass('hidden');
            buttonsWrapper.addClass('is-open');
        } else {
            openBtn.removeClass('hidden');
            closeBtn.addClass('hidden');
            buttonsWrapper.removeClass('is-open');
        }
    });


    function openCloseItem() {
        accordionDT.on('click', function () {

            var el = $(this),
                target = el.next('dd'),
                parentHeight = target.height(),
                childHeight = target.children('.content').outerHeight(true),
                newHeight = parentHeight > 0 ? 0 : childHeight;

            // animate to new height
            target.css({
                height: newHeight
            });

            // remove existing classes & add class to clicked target
            if (!el.hasClass('is-open')) {
                el.addClass('is-open');
            }

            // if we are on clicked target then remove the class
            else {
                el.removeClass('is-open');
            }
        });
    }
    openCloseItem();
    //ACCORDION END
});