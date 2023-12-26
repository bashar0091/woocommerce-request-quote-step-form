jQuery(document).ready(function($){

    // step go back 
    $('.go_step_2').on('click', function(){
        $('.step_1').hide();
        $('.step_2').show();
    });

    $('.go_step_3').on('click', function(){
        $('.step_1').hide();
        $('.step_2').hide();
        $('.step_3').show();
    });

    $('.back_step_1').on('click', function(){
        $('.step_1').show();
        $('.step_2').hide();
        $('.step_3').hide();
    });

    $('.back_step_2').on('click', function(){
        $('.step_1').hide();
        $('.step_2').show();
        $('.step_3').hide();
    });


    // plus minus button 
    $(".plus_").click(function(){
        var $counterWrapper = $(this).closest('.counter_wrapper');
        var value = parseInt($counterWrapper.find(".number_").val());
        $counterWrapper.find(".number_").val(value + 1);
    });

    $(".minus_").click(function(){
        var $counterWrapper = $(this).closest('.counter_wrapper');
        var value = parseInt($counterWrapper.find(".number_").val());
        if(value > 0) {
            $counterWrapper.find(".number_").val(value - 1);
        }
    });

});