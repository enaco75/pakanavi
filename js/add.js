//===== モーダル =====
$('.modalbtn').on('click', function(){
    let val =  $(this).data('value');
    $('.voted_btnd').attr('value', val);
    $('.voted_btn').attr('value', val);
    
    let img_src = $('#img'+val).prop("src");
    console.log(img_src);
    let name =  $(this).data('name');
    $('.voted_name').text(name);
    $('.voted_img').attr({
        'src': img_src,
        'alt': `${name}の画像`
    });

    $('.modal').removeClass('voteFadeOut');
});
//モーダル解除用の背景をクリックしてモーダルウィンドウを解除させる
$('.modal_back').on('click', function(){
    $('.modal').addClass('voteFadeOut');
});
//キャンセルボタンをクリックしてもモーダルウィンドウが解除
$('.cancel_btn').on('click', function(){
    $('.modal').addClass('voteFadeOut');
});

//投票が完了したことを知らせるアラート的な通知出したい。
if($('#voted_msg').is(':empty')){   //中身が空だったら
    $('#voted_msg').addClass('voteFadeOut');
}else{  //中身が空じゃなかったら
    //投票した馬の「投票する」ボタンを「投票済み」に変更する
    $('.modalbtn').each(function(){
        let voted_id = $(this).attr('data-value');
        let voted_msg = $('#voted_msg').text();
        if(voted_id === voted_msg){
            $(this).text(`投票済み`);
            $(this).addClass('sumi');
        }else{
            $(this).addClass('gray');
        }
    });
    $('#voted_msg').removeClass('voteFadeOut');
    $('#voted_msg').text(`投票が完了しました！`);
    
}

//メニューボタン押されたらナビを表示させたい
$('#menu_btn').on('click', function(){
    $('#close_btn').parent().removeClass('none');
    $('#close_btn').removeClass('none');
});
//closeボタンでメニュー閉じる
$('#close_btn').on('click', function(){
    $(this).parent().addClass('none');
    $(this).addClass('none');
});

$(function(){

    //TOPボタンを消す
    $('#scrollbtn').hide();
    //スクロールが100pxの位置に達したらボタンを表示
    $(window).on('scroll',function(){
        if($(this).scrollTop() > 100){
            $('#scrollbtn').fadeIn();
        } else{
            $('#scrollbtn').fadeOut();
        }
    });
    //TOPボタンを押すと動的にトップへ移動
    $('#scrollbtn').on('click', function(){
        $('body,html').animate({
            scrollTop: 0
        },1000);
        //jQueryでのreturn falseは親要素へのイベント伝播を止めるため
        return false;
    });

    //===== スライダー（slick） =====
    $('.slider').slick({
        autoplay: true,
        //speed: 1500
        dots: true,
        infinite: true,
        speed: 1000,
        fade: true,
        cssEase: 'linear'
    });
    /* $('.variable-width').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true
    }); */

    //↓===== inview =====↓
    //『.inview_re』要素が表示されると、『.is-show』が追加（addClass）される。
    //『.inview_re』要素が見えなくなると、『.is-show』が削除（removeClass）される。
    $(".inview_re").on("inview", function (event, isInView) {
        if (isInView) {
          $(this).stop().addClass("is-show");
        } else {
          $(this).stop().removeClass("is-show");
        }
    });

    //===== フォームにリセットボタンを追加（Add Clear） =====
    $("input").addClear({
        LineHeight: 30
    });
        

})