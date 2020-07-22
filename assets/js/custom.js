(function($) {
    $('document').ready(function() {

        function elementInView(elem) {
            return $(window).scrollTop() < $(elem).offset().top + $(elem).height() ;
        }
        

        if( $(window).width() > 768 ) {

            if( $(".vx-seo-sidebar").length > 0 ) {

                var seoDetailsTop = $('.vx-seo-sidebar').offset().top;
                var nextAfterSeoDetails = $('.vx-seo-sidebar').next();
            
                $(window).scroll(function() {

                    if ( elementInView( $('.vx-seo-sidebar').next() ) ) {
                        //fire at will!
                        console.log('there it is, wooooohooooo!');
                    }
    
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