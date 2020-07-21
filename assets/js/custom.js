(function($) {
    $('document').ready(function() {
        var seoDetailsTop = $('.vx--seo-details-left-column').offset().top;
        
        console.log('hello pops');
        $(window).scroll(function() {

            var currentScroll = $(window).scrollTop();

            if (currentScroll >= seoDetailsTop) {
                $('.vx-seo-sidebar').css({ 
                    position: 'static'
                    
                });
            } else {
                $('.vx-seo-sidebar').css({
                    position: 'fixed',
                    top: '0',
                    left: '0'
                });
            }

        });
    });
})('jQuery');