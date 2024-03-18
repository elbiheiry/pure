$(document).on('ready', function () {

    $('.ripple-effect').ripples({
        resolution: 330,
        dropRadius: 20,
        perturbance: 0.02,
    });

});

/* Nice Scroll
===============================*/
$(document).ready(function () {
    "use strict";
	$("html").niceScroll({
        scrollspeed: 60,
        mousescrollstep: 35,
        cursorwidth: 5,
        cursorcolor: '#13152E',
        cursorborder: 'none',
        background: 'rgba(255,255,255,0.3)',
        cursorborderradius: 3,
        autohidemode: false,
        cursoropacitymin: 0.1,
        cursoropacitymax: 1,
        zindex: "999"
	});
	
	new WOW().init();
});


/* Preloder
========================*/
$(window).on('load', function () {
    
    "use strict";
    
    $('.loader').css({
        
        'display': 'none'
        
    });
    
    $('.loading-left-bg').addClass('translateLeft');
    
    $('.loading-right-bg').addClass('translateRight');
    
    $(".loading").delay(1000).fadeOut(10);
    
});


/*WOW-Master
===============================*/
$(document).ready(function () {
    "use strict";
    new WOW().init();
});

/*Scroll To
===============================*/

$(document).ready(function() {
    "use strict";
    $(".scroll-sec").click(function(e) {
        e.preventDefault();
        $.scrollTo(e.target.hash, 600, {
            offset: -70
        });
    });
});

/*determine language
============================*/
$(document).ready(function () {
    'use strict';
    $('body').on('click', '.langSwitch', function () {
        // alert($(this).data('lang'))
        $.ajax({
            url: $(this).attr('href'),
            method: 'POST',
            data: {
                locale: $(this).data('lang')
            },
            dataType: 'json',
            cache: false,
            success: function (data) {
                // alert(data.lang);
                if (data.response === 'success') {
                    location.reload();
                }
            }

        });
        return false;
    });
    $.ajaxSetup(
    {
        headers:
            {
                'X-CSRF-Token': $('.langSwitch').data('token')
            }
    });
});

