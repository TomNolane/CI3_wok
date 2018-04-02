
var equalheight = function (container) {
    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    $(container).each(function () {
        $el = $(this);
        $($el).height('auto');
        var topPostion = $el.position().top;
        if (currentRowStart != topPostion) {
            for (var currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0;
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
};


$(document).ready(function () {
    equalheight('.ex-section-3 .ex-wrapper');
    $(document).on('click', function (e) {
        if($('.ex-aside-menu').hasClass('ex-is-open')){
            $('.ex-aside-menu').removeClass('ex-is-open');
        }
        if (!$(e.target).is('.panel-body')) {
            $('.collapse').collapse('hide');
        }
    });
    var dropdownToggle =  $('.dropdown-toggle'),
        menu = $('.dropdown-menu'),
        askButton = $('.ex-ask-question'),
        footerHeight = $('.ex-sticky-footer').outerHeight();
    $(document).on('click' ,function(){
        dropdownToggle.hasClass('ex-on-off') ? dropdownToggle.removeClass('ex-on-off'): '';
    });
    dropdownToggle.on('click', function (e) {
        $(this).toggleClass('ex-on-off');
        $(this).parent().css('position','initial');
    });
    menu.on('click', function (e) {
        e.stopPropagation();
    });
    askButton.on('click', function (event) {
        $('#askQuestion').modal();
        $('.dropdown.open .dropdown-toggle').dropdown('toggle');
    });
    //Sticky footer functionality, adding body dynamic padding bottom duo to footer height
    $('.ex-sticky').css('padding-bottom', footerHeight);
    $( window ).resize(function() {
        var dynamicFooterHeight = $('.ex-sticky-footer').outerHeight();
        $('.ex-sticky').css('padding-bottom', dynamicFooterHeight);
    });

    $('.ex-hamburger').on('click', function(event){
        event.stopPropagation();
        $('.ex-aside-menu').addClass('ex-is-open');
    });
    $('.ex-close-menu, .ex-ask-question').on('click', function () {
        $('.ex-aside-menu').removeClass('ex-is-open');
    });
    $('.ex-aside-menu').on('click', function (event) {
        event.stopPropagation();
    });
    $('.ex-ask-question').on('click', function (event) {
        $('#askQuestion').modal();
    });


    //Collapse menu hide show events
    $('.panel-collapse').on('show.bs.collapse', function () {
        $(this).prev('.panel-heading').addClass('ex-bg-head')
            .find('.ex-down')
            .removeClass('ex-down')
            .addClass('ex-up');
    });
    $('.panel-collapse').on('hide.bs.collapse', function () {
        $(this).prev('.panel-heading').removeClass('ex-bg-head')
            .find('.ex-up')
            .removeClass('ex-up')
            .addClass('ex-down');
    });
    //******CHANGE ARROW DOWN TO ARROW UP *******//
    $('.ex-dropdown-menu').on('click', function () {
        $(this).find('a').toggleClass('ex-to-click').find('i').toggleClass('ex-to-close');
    });

});
