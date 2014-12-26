/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {

    if ($('#responsive-slider').length) {
        $('#responsive-slider').advancedSlider({width: '100%',
            height: '100%',
            scaleType: 'outsideFit',
            skin: 'glossy-square-gray',
            effectType: 'fade',
            pauseSlideshowOnHover: true,
            swipeThreshold: 100,
            slideButtons: false,
            thumbnailType: 'scroller',
            thumbnailButtons: false,
            thumbnailScrollerResponsive: true,
            minimumVisibleThumbnails: 2,
            slideProperties: {
                0: {captionSize: 35, captionHideEffect: 'slide'},
                1: {captionPosition: 'custom', captionShowEffect: 'fade', captionHeight: 160, captionLeft: 70, slideshowDelay: 8000},
                3: {captionSize: 40},
                5: {captionPosition: 'left', captionSize: 150, captionHideEffect: 'slide'},
                7: {captionPosition: 'right', captionSize: 150, captionHideEffect: 'slide'}
            }
        });
    }

    if ($('.nice_words').length) {
        $('.nice_words').on('click', function () {
            $('.mubarak').hide();
            $('.nice_words').removeClass('active');
            $($(this).attr('data-target')).show();
            $(this).addClass('active');
        });
    }

    if ($("ul.pagination").length) {
        $("ul.pagination").quickPagination({pagerLocation: "both", pageSize: "1"});
    }
    
     $('#example').vTicker();
    
});