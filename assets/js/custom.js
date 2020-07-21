(function($) {
    $('document').ready(function() {

        if ($(window).width() > 768) {
            if( $('body').has('.vx-seo-sidebar') ) {
                var seoDetailsTop = $('.vx-seo-sidebar').offset().top;
                var nextAfterSeoDetails = $('.vx-seo-sidebar').next();
            
                $(window).scroll(function() {
    
                    var currentScroll = $(window).scrollTop();
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

                    // when meet next div reset position
                    if( currentScroll >= nextAfterSeoDetails ) {
                        $('.vx-seo-sidebar').css({
                            position: 'static'
                        });
                    }
    
                });    
            }
        }
        
    });
})(jQuery);