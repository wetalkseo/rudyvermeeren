"use strict";

jQuery(document).ready(function($) {

    $(window).load(function() { 
        setHeight();
        SaveButtonPos();
    }) 

    $(window).resize(function() {
        setHeight();
        SaveButtonPos();
    }) 

    // set height of the side menu.
    function setHeight() { 
        //clear any styling
        $('.anps-admin-menu').removeAttr( 'style' );
        $('.anps-admin-content').removeAttr( 'style' );   
        //calculate height and set css
        //
        
        var adminheight = $('.anps-admin').innerHeight();
        $('.anps-admin-menu').css('min-height', adminheight);
        $('.anps-admin-content').css('min-height', adminheight);
    }

    //SAVE button
    function SaveButtonPos() {
        var saveButton = $('.fixsave');
        var saveButton_b = $('.fixsave-b');
        var anpsAdmin = $('.anps-admin');
        var adminOffsetRight = (anpsAdmin.offset().left + anpsAdmin.outerWidth());
        var adminOffsetTop = anpsAdmin.offset().top;
        var adminBottomOffset = (adminOffsetTop + anpsAdmin.innerHeight())

        saveButton.css({
            'left': adminOffsetRight, 
            'top': (adminOffsetTop + 70),
            'visibility': 'visible'
        }); 

        saveButton_b.css({
            'left': (adminOffsetRight - 40), 
            'top': adminBottomOffset,
            'visibility': 'visible'
        }); 
    }

    //live upload image display
    $('.anps_upload input[type="text"]').on('change', function(){

        var input = $(this);

        if(input.siblings('.preview-img').length) {
            var newimage = input.val();

            //if preview is hidden, show it.
            $(this).siblings('.preview-img').removeClass('hidden');
            
            //change attribute to the new image.
            var image = $(this).siblings('.preview-img').find('img');
            if (image.length) {
                image.attr('src', newimage );
             }   
        }
            if (input.val() =="") {
            $(this).siblings('.preview-img').addClass('hidden');
        }
        setHeight();
    })

    //Set min width on desktop mode only
    if ($(window).width() > 1400) {
        $('[data-minheight]').each( function(){
            $(this).css('min-height', $(this).data('minheight')); 
        })
    }

    function dimmGlobal() {
        var dimMaster = $('.set-global');
        var dimmSlaves = $('.global-options *');

        if( dimMaster.find('input').is(":checked") && $('label[data-show="top"]').hasClass('selected')) {
            dimmSlaves.css('pointer-events', 'none');
            dimmSlaves.css('opacity', '0.6');
        } else {                
            dimmSlaves.css('opacity', '1');
            dimmSlaves.css('pointer-events', 'auto');
        }
        dimmToggle(); 
    }
    $('.set-global input').on('change', function() {
        dimmGlobal();
    });  

    $('.top-or-bottom input').on('change', function() {
        dimmGlobal();
    });  
    
    dimmGlobal();

    /* dimm toggle */
    function dimmToggle() {
        $('.dimm-master').each(function(){
           
            var dimMaster = $(this);
            var dimmSlaves = dimMaster.siblings('.dimm');
            var dimmRebels = dimMaster.siblings('.dimmreverse');

            if( dimMaster.find('input').is(":checked")) {
                dimmSlaves.css('opacity', '1');
                dimmSlaves.css('pointer-events', 'auto');

                dimmRebels.css('pointer-events', 'none');
                dimmRebels.css('opacity', '0.2');
            } else {                
                dimmSlaves.css('pointer-events', 'none');
                dimmSlaves.css('opacity', '0.2');

                dimmRebels.css('opacity', '1');
                dimmRebels.css('pointer-events', 'auto');                
            }
        })
    }    

    $('.dimm-master input').on('change', function() {
        dimmToggle();
    });

    dimmToggle(); 

    /*toggle options*/
    $('.onoff').hide();

    $('.toggleoptions').each(function(){

        var options = $(this);
        var options_to_toggle = options.siblings('.options-to-toggle');

        var index = $('input:checked', options).parents('label').data('show');
        options_to_toggle.find('> .onoff').hide();
        options_to_toggle.find('.show-' + index).show(100);
        setHeight();

        $('input', options).on('change', function() {
            var index = $(this).parents('label').data('show');
            options_to_toggle.find('> .onoff').hide();
            options_to_toggle.find('.show-' + index).show(100);
            setHeight();
        });
        $(window).trigger('resize');
        setHeight();
    });

    $('#auto_adjust_logo').change(function() {
        if($(this).is(':checked')) {    
            $('.onoff').hide(100);
            }
            else {
                $('.onoff').show(100);
            }
    }).change();

    $('#custom-header-bg-vertical-wrap').hide;

    $('.vertical-menu-switch').change(function() {
        if($(this).is(':checked')) {   
                $('#custom-header-bg-vertical-wrap').show(100);
            }
            else {
                $('#custom-header-bg-vertical-wrap').hide(100);
            }
    }).change();


    $(".anps-radio label").each(function( index ) {   
        if( $("input[type=radio]").eq(index).is(':checked')) {
            $(".anps-radio label img").eq( index ).css({
                "border":"2px solid #2187c0",
                "cursor":"default"
            });
            $(".anps-radio label").eq(index).addClass('selected');
        }
    });
        
    $(".anps-radio label").on("click", function(){      
        $('img', this).css({
            "border":"2px solid #2187c0",
            "cursor":"default"
        });

        $(this).addClass('selected');

        $(this).siblings().find('img').css(
            { 
                "border": "2px solid transparent",
                "cursor": "pointer"
            }
        );

        $(this).siblings().removeClass('selected');

    });

    //*dummy content warning*/
    $('input.dummy').on('click', function(){
        if ($(this).parents('.dummy-options').hasClass('already-imported')) {
            var reply = confirm("WARNING: You have already insert dummy content and by inserting it again, you will have duplicate content.\r\n\We recommend doing this ONLY if something went wrong the first time and you have already cleared the content.");         
            
            if (reply == true) {
                $(".absolute.fullscreen.importspin").addClass('visible');
                return true;
            } else {
                return false;
            }
        } else {
            $(".absolute.fullscreen.importspin").addClass('visible');
        }
    });

    setTimeout(function() {
            setHeight();
            dimmGlobal();
        }, 100);

    window.onresize = function() {
        setHeight();
    };

    //palette change active class
    $('.palette').on('click', function() {
        if ( $('.palette').hasClass('active')) {
            $('.palette').removeClass('active');
        }
        $(this).addClass('active');
    });

    if( $('#copy-clipboard').length ) {
        /* Copy to clipboard */
        var clipboard = new Clipboard('#copy-clipboard');
    }
});