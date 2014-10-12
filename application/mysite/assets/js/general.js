$(function() {
    $('#logo').hover(
        function() {
            $('#logo img').attr('src', base_url + 'application/mysite/assets/img/gerardpaullabitad-gpworx-logo_circle.png');
        }, function() {
            $('#logo img').attr('src', base_url + 'application/mysite/assets/img/gerardpaullabitad-gpworx-logo_white.png');
        }
    );

    $("#bg > div:gt(0)").hide();
    $('.logo').click(function(e) {
        e.preventDefault();
        $('#bg > div:first')
                .fadeOut(1000)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('#bg');
    });

    //---- Slideshow ------
//        $("#bg > div:gt(0)").hide();
//        setInterval(function() {
//            $('#bg > div:first')
//                    .fadeOut(1000)
//                    .next()
//                    .fadeIn(1000)
//                    .end()
//                    .appendTo('#bg');
//        }, 7000);
    //---- Slideshow ------

    //when the user hovers over the div that contains our html...  
    $('.center-container-content').hover(function() {
        //... we get the width of the div and split it by 2  ...  
        //var width = $(this).outerWidth() / 2;
        var width = 100;
        /*... and using that width we move the left "part" of the image to left and right "part" 
         to right by changing it's indent from left side or right side... '*/
        $(this).find('.img-left').animate({right: width}, {queue: false, duration: 300});
        $(this).find('.img-right').animate({left: width}, {queue: false, duration: 300});
    }, function() {
        //... and when he hovers out we get the images back to their's starting position using the same function... '  
        $(this).find('.img-left').animate({right: 0}, {queue: false, duration: 300});
        $(this).find('.img-right').animate({left: 0}, {queue: false, duration: 300});
        //... close it and that's it  
    });
});