window.$ = window.jQuery = require('jquery');
require('../../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min');

$(document).ready(function()
{  
    $('.node-add').on('click', function(event){
        var id = (this.id).replace('node-', '');
        var name = $('#node-name-'+id).html();
        $('#category-name').html(name);
        $("input[name='id-parent']").attr('value',  id);
        $("input[name='type-modal']").attr('value',  'new');
    });

    $('.node-edit').on('click', function(event){
        var id = (this.id).replace('node-', '');
        var name = $('#node-name-'+id).html();
        $('#category-name').html(name);
        $("input[name='id-parent']").attr('value',  id)
        $("input[name='type-modal']").attr('value',  'edit');
    });

    $('#new-child').on('click', function(event){

        var urlPost = $('#form-node').attr('action');

        var formData = {
            'name': $("#node-name").val(),
            'id-parent': $("#id-parent").val(),
            'type-modal': $("#type-modal").val(),
            '_token': $('meta[name="csrf-token"]').attr('content')
        };
        console.log(formData);

        $.ajax({
            url : urlPost,
            type : 'POST',
            data : formData,
            success: function(data){
                window.location.reload(true);
                console.log(data);                
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        return false;
    });

    $('.sel-cat').on('change', function (event) {       
        var urlPost = $('.sel-cat').attr('data-link');      

        var formData = {
            'id': $('.sel-cat').val(),           
            '_token': $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url : urlPost,
            type : 'POST',
            data : formData,
            success: function(data){
                if (data == 0){
                    $('.sel-cat-1').addClass('hidden');
                    $('.sel-cat-2').addClass('hidden');
                    $('.label-sel-1').addClass('hidden');
                    $('.label-sel-2').addClass('hidden');
                    $('.sel-cat-1').val('0');
                    $('.sel-cat-2').val('0');
                }else{
                    $('.sel-cat-1').html(data);
                    $('.sel-cat-1').removeClass('hidden');
                    $('.sel-cat-2').addClass('hidden');
                    $('.label-sel-1').removeClass('hidden');
                    $('.label-sel-2').addClass('hidden');
                }

                console.log(data);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        return false;
    });

    $('.sel-cat-1').on('change', function (event) {
        var urlPost = $('.sel-cat-1').attr('data-link');

        var formData = {
            'id': $('.sel-cat-1').val(),
            '_token': $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url : urlPost,
            type : 'POST',
            data : formData,
            success: function(data){
                if (data == 0){
                    $('.sel-cat-2').addClass('hidden');
                    $('.label-sel-2').addClass('hidden');
                    $('.sel-cat-2').val('0');
                }
                else{
                    $('.sel-cat-2').html(data);
                    $('.sel-cat-2').removeClass('hidden');
                    $('.label-sel-2').removeClass('hidden');
                }
                console.log(data);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        return false;
    });

    $('.menu-click').click(function(){
        var current_element = this;
        $(this).next().next().next().next().animate( {'height':'toggle'},
            200,
            'linear',
            function() {
                if( $(current_element).next().next().next().next().css('display') == 'block' ){
                    $(current_element).next().removeClass("fa-arrow-down");
                    $(current_element).next().addClass("fa-arrow-up");
                }
                else
                    $(current_element).next().addClass("fa-arrow-down");
            } );
        return false;
    });

    $('#cssmenu li.has-sub > a').on('click', function(){
        $(this).removeAttr('href');
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        }
        else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });

    $('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');

    $('.numeric').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });

    $('.edit_category_product').on('click', function(event){
        var urlPost = $('.edit_category_product').attr('href');
        var formData = {
            'id': this.id,
            '_token': $('meta[name="csrf-token"]').attr('content')
        };
        $.ajax({
            url : urlPost,
            type : 'POST',
            data : formData,
            success: function(data){
                $('#name-category').html(data[1]);
                $('#category').val(data[0]);
                // console.log(data);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        return false;
    });

});
