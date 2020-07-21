(function($) {
    $('document').ready(function() {

        console.log('hello pops');
        if( $('body').has('.vx-seo-details-left-column') ) {
            var seoDetailsTop = $('.vx-seo-details-left-column').offset().top;
        
            $(window).scroll(function() {

                var currentScroll = $(window).scrollTop();
                console.log(currentScroll);
                if (currentScroll >= seoDetailsTop) {
                    $('.vx-seo-sidebar').css({
                        position: 'fixed',
                        top: '0',
                        right: '0'
                    });
                    
                } else {
                    $('.vx-seo-sidebar').css({ 
                        position: 'static'
                        
                    });
                }

            });    
        }
        
    });
})(jQuery);