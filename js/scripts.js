(function($) {
    $(document).ready(function(){


        $(window).scroll(function(){
            /*console.log('scroll')*/;
            var aTop = 100;

            if($(this).scrollTop() >= 250){
                if (!$('body .site-header').hasClass("sticky")) {
                    $('body .site-header .menuContainer').css('top','-100px');
                    $('body .site-header .menuContainer').animate({top:0}, 100, function() {
                        //callback
                    });
                    $('body .site-header').addClass('sticky');
                }
            }else if($(this).scrollTop() <= 75){
                $('body .site-header').removeClass('sticky');
            }
            
        });


        $('.quotePop').click(function(e){
            e.preventDefault();
            /*console.log('click');*/
            $('#quotePop').modal();
        });

        $('.mobileMenuToggle').click(function(e){
            /*console.log('click');*/
            e.preventDefault();
            $('#mobileNav').toggleClass('open');
        })

        jQuery('.quotePop').click(function(){
            /*console.log('pop btn');*/
            jQuery('#quotePop').attr('data-ref','Pop Form');
        });


        jQuery(document).on('mailsent.wpcf7', function (e) {
            $form=jQuery(e.target);
            if($form.attr('id').search('f402')!=-1){
                var ref = $form.parents('#quotePop').attr('data-ref');
                if(ref == 'Pop Form'){
                    /*console.log('pop');*/
                   dataLayer.push({'event' : 'formSubmitted', 'formName' : 'Pop Form'});
                }else{
                   /*console.log('contact');*/
                   dataLayer.push({'event' : 'formSubmitted', 'formName' : 'Contact'});
                }
            }
            else if ($form.attr('id').search('f3380')!=-1){
                dataLayer.push({'event' : 'lpFormSubmitted', 'formName' : 'Landing Page'});
            }
        });

        jQuery('.nav-phone').click(function(){
            /*console.log('Phone');*/
            dataLayer.push({'event' : 'phoneClick', 'phoneNumber' : 'Phone Number'});
        });

        
        jQuery(window).on('hidden.bs.modal', function() { 
            jQuery('#quotePop').attr('data-ref','');
        });   
 
    });
})(jQuery);