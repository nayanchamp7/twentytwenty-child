(function($) {
    $('document').ready(function() {

        function elementInView(elem) {
            if( elem.length > 0 ) {
                return $(window).scrollTop() < $(elem).offset().top + $(elem).height() ;
            }
        }
        

        if( $(window).width() > 960 ) {

                $(window).scroll(function() {

                    if( $(".vx-seo-details-left-column").length > 0 ) {

                        var seoDetailsTop = $('.vx-seo-details-left-column').offset().top;
                        var nextAfterSeoDetails = $('.vx-seo-details-section').next();

                        console.log("next section: " + nextAfterSeoDetails);

                        if ( elementInView( nextAfterSeoDetails ) ) {
                            //fire at will!
                            console.log('there it is, wooooohooooo!');
                        }
        
                        var currentScroll = $(window).scrollTop();
                        console.log(currentScroll);
                        console.log( "seo details: " + seoDetailsTop);
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

                    }
    
                });    
            
        }
    });
    
})(jQuery);