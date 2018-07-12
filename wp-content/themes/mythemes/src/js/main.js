////////////////////
//Application Module
////////////////////
 var app = (function () {   
     "use strict";  
     //-----------------------------------------------------------------
     // Page Initalization handler : exposed to app.init();
     //-----------------------------------------------------------------
     var init = function () {         
            _accordionHandler();
            _formElements();
            _menuToggle();
            _fileBrowes(); 
            _imageCaptionFullwidth();         
         },
          _fileBrowes = function(){
              $(".file-upload").change(function(){
                var x = ($(".file-upload").val());
                $('#file-upload-value').val(x);
              });
           },
        _accordionHandler = function(){
          $('.accordion-row-blk h4').on('click', function(){
              if(!$(this).hasClass('active')){
                   $('.accordion-row-blk h4').removeClass('active');
                   $(".accordion-content").stop(true, true).slideUp();
                   $(this).addClass('active');
                   $(this).parents('.accordion-row-blk').find(".accordion-content").slideDown();
              }else{
                $('.accordion-row-blk h4').removeClass('active');
                   $(".accordion-content").stop(true, true).slideUp();
              }
          });
        },

        _rippleActions = function() {
            // ripple
            window.rippler = $.ripple('.button', {
                debug: true,
                multi: true,
                opacity: 0.45,
                color: "auto",
                duration: 1
            });
        },

        _formElements = function() {
            //form 
            /*jquery ui selectbox placeholder start*/
            $.widget('app.selectmenu', $.ui.selectmenu, {
                _drawButton: function() {
                    this._super();
                    var selected = this.element
                        .find('[selected]')
                        .length,
                        placeholder = this.options.placeholder;

                    if (!selected && placeholder) {
                        this.buttonItem.text(placeholder);
                    }
                }
            });
                $(".banner-slider").slick({
                infinite: true,
                speed: 300,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true 

           });

            //Select menu
            $('.select-menu').each(function() {
                var $placeholder = $(this).data('placeholder');
                $(this).selectmenu({
                    placeholder: $placeholder,
                    appendTo: $(this).parent(".select-row"),
                    create: function(event, ui) {
                        $('.ui-selectmenu-text').addClass('placeholder');
                    },
                    change: function(event, ui) {
                        $('.ui-selectmenu-text').removeClass('placeholder');
                    }
                });
            });

           if($('.select-menu').length>0){
               $(".select-menu").selectmenu({
                   select: function(event, ui) {
                       var errorText  = $(this).parents('.form-row').find('label').attr('data-error');
                       if($('option:selected',$(this)).index()>0) {
                           $(this).parents('.form-row').removeClass('error-row');
                           $(this).parents('.form-row').find('.error-message').slideUp(function(){
                               $(this).remove();
                           });
                       } else {
                           $(this).parents('.form-row').addClass('error-row');
                           $(this).parents('.form-row').find('.error-message').slideDown(); 
                       }
                   }
               });
           }

          $(".select-menu").selectmenu({
             change: function(event, ui) {
               if ($('.select-menu option:selected').val() != 0) {
                   $('.select-menu').find('.error-message').hide();
                   $('.select-menu').parent('.form-row').removeClass('error-row');
               }
             }
          });

           $('.floating-item input, textarea').focus(function(){
               $(this).parent('.floating-item').addClass('input-animate'); 
            });

            $('input, textarea').keyup(function() {
                if ($(this).val() !== "") {
                    $(this).addClass('input-email-active'); 
                } else {
                    $(this).removeClass('input-email-active');  
                } 
            });
        },

        _menuToggle = function() {
          $('.menu-toggle').on('click', function() {
            $('body').addClass('y-hidden');
            $('.menu-open').addClass('slide');
          });
          $('.menu-close').on('click', function() {
            $('body').removeClass('y-hidden');
            $('.menu-open').removeClass('slide');
          });
        },

        _imageCaptionFullwidth = function(){
            var winWidth = $(window).width(),
                conatinerWidth = $('.container').width(),
                totalWidth = Math.round(winWidth -  conatinerWidth)/2;
            $('.image-caption-fullwidth').each(function(){
                $(this).find('.image-row').css('margin-left', -totalWidth);
                $(this).find('.image-row').css('margin-right', -totalWidth);
            })
        }

    // Expose Global Functions
    return {
         init: init,
     };
 })();

$(window).scroll(function() { 
   //scroll function here

});

$().ready(function () {
    app.init();           
});

if(Modernizr.touch){  
  //modernizer touch function code here for mobile
}
$(window).on('load', function() { 
  $('.render-blk').stop(true, true).animate({opacity:1}, 1000);
  if(sessionStorage.getItem('loader') == null) {
    NProgress.done();  
    sessionStorage.setItem('loader', 'true');
  }else{      
    NProgress.done();
  }
});
