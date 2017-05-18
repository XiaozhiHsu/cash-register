



$(document).ready(function(){
$(".btn-more").click(function(){//当点击黄色块触发silideToggle
$(".more-txt").show(0);
$(this).addClass("active"); return false;
});
});

$('.dialog_blank').height($('body').height());
        $('#btn1').click(function(){
            $('.dialog_blank').show();
            $('.dialog1').show();
        });
        $('.dialog_blank').click(function(){
            $(this).hide();
            $('.dialog').hide();
        });

$('.dialog_back').click(function(){
            $('.dialog_blank').hide();
            $('.dialog').hide();
        });
$('.dialog_blank2').height($('body').height());
        $('#btn2').click(function(){
            $('.dialog_blank2').show();
            $('.dialog2').show();
        });
        $('.dialog_blank2').click(function(){
            $(this).hide();
            $('.dialog2').hide();
        });


$('.dialog_back2').click(function(){
            $('.dialog_blank2').hide();
            $('.dialog2').hide();
        });


$('.dialog_blank3').height($('body').height());
        $('#btn3').click(function(){
            $('.dialog_blank3').show();
            $('.dialog3').show();
        });
        $('.dialog_blank3').click(function(){
            $(this).hide();
            $('.dialog3').hide();
        });

$('.dialog_blank5').height($('body').height());
$('#btn5').click(function(){
    $('.dialog_blank5').show();
    $('.dialog5').show();
});
$('.dialog_blank5').click(function(){
    $(this).hide();
    $('.dialog5').hide();
});

// setTimeout(function(){
//      $('.dialog3,.dialog_blank3').fadeOut();
//  },1000);