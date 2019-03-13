(function($) {
    $(document).ready(function(){


        $(window).scroll(function(){
            console.log('scroll');
            var aTop = 100;

            if($(this).scrollTop() >= 250){
                if (!$('body .site-header').hasClass("sticky")) {
                    $('body .site-header .menuContainer').css('top','-100px');
                    $('body .site-header .menuContainer').animate({top:0}, 100, function() {
                        //callback
                    });
                    $('body .site-header').addClass('sticky');
                }
            }else if($(this).scrollTop() <= 155){
                $('body .site-header').removeClass('sticky');
            }
            
        });


        $('.quotePop').click(function(e){
            e.preventDefault();
            console.log('click');
            $('#quotePop').modal();
        });

        $('.mobileMenuToggle').click(function(e){
            console.log('click');
            e.preventDefault();
            $('#mobileNav').toggleClass('open');
        })


    });


})(jQuery);