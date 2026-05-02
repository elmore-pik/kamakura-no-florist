$(function() {
  //ページの先頭へ戻るボタンをクリックしたら
    $(".pagetop").click(function() {
        //html,bodyのスクロール位置が0（最上部）に300秒で移動する
        $('html, body').animate({
          scrollTop: 0
        }, 300);
    });

    //もし画面をスクロールした場合
    $(window).scroll(function() {
      //もし画面のスクロールが240px以上なら
      if($(window).scrollTop() > 240) {
        //ページの先頭へ戻るボタンを300秒で移動して表示
        $(".pagetop").fadeIn(300);
      } else {
        //ページの先頭へ戻るボタンを300秒で移動して非表示
        $(".pagetop").fadeOut(300);
      }
    });

    //bodyの高さをbodyHの変数に代入
    var bodyH = $('body').height(); 
    //もしbodyの高さが763px以上なら
    if($(bodyH) > 763) {
      //ページの先頭へ戻るボタンを表示
      $(".pagetop").css('display','block');
      //それ以外なら
    } else {
      //ページの先頭へ戻るボタンを非表示
      $(".pagetop").css('display','none');
    }
});