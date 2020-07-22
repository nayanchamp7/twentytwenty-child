(function($) {
    $('document').ready(function() {

        // function elementInView(elem) {
        //     if( elem.length > 0 ) {
        //         console.log('length okay');
        //         // return $(window).scrollTop() < $(elem).offset().top + $(elem).height() ;
        //         return ($(window).height() + $(window).scrollTop()) > $(elem).offset().top;
        //     }
        // }
        

        if( $(window).width() > 960 ) {

                $(window).scroll(function() {

                    if( $(".vx-seo-details-left-column").length > 0 ) {


                        var seoDetailsTop = $('.vx-seo-details-left-column').offset().top;
                        var nextAfterSeoDetails = $('vx-related-article-section');

                        // if ( elementInView( nextAfterSeoDetails ) ) {
                        //     //fire at will!
                        //     alert('there it is, wooooohooooo!');
                        // }
        
                        var currentScroll = $(window).scrollTop();

                        if (currentScroll >= seoDetailsTop) {

                            $('.vx-seo-sidebar').css({
                                position: 'fixed',
                                top: '20%',
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