
    $("#phone").mask("+7(999) 999-99-99");

    $('#price').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });

    $('.menu-click').click(function(){
        var current_element = this;
        $(this).next().next().animate( {'height':'toggle'},
            200,
            'linear',
            function() {
                if( $(current_element).next().next().css('display') == 'block' ){
                    $(current_element).next().removeClass("fa-arrow-down");
                    $(current_element).next().addClass("fa-arrow-up");
                }
                else
                    $(current_element).next().addClass("fa-arrow-down");
            } );
        return false;
    });


    if ($(document).height() <= $(window).height())
        $(".footer-div").addClass("navbar-fixed-bottom");
 
    $('#carousel-poster').on('slid.bs.carousel', function () {
        var id = $(".carousel-inner .item.active").attr('id').substring(8, 10);
        $('.carousel-tab li').removeClass('active');
        $('#indicator' + id).addClass('active');
    });
