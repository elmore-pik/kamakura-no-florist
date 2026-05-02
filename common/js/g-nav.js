//ハンバーガーメニュー
$(function () {
  $(".openbtn").click(function () {
    //ボタンがクリックされたら
    $(this).toggleClass("active"); //ボタン自身にactiveクラスを付与し
    $("#g-nav").toggleClass("panelactive"); //ナビにpanelactiveクラスを付与
    $("#g-nav").stop(); //アニメーションをストップ
  });

  //親要素の#g-navを持つ子孫要素の#g-nav-list__item aを取得しmenuという変数に代入
  var menu = $("#g-nav").find("#g-nav-list__item a");
  $(menu).click(function () {
    //ナビのリンクがクリックされたら
    $(".openbtn").removeClass("active"); //ボタンのactiveを除去し
    $("#g-nav").removeClass("panelactive"); //ナビのpanelactiveクラスも除去
  });

  //CLOSEボタンがクリックされたらハンバーガーメニューが閉じる
  var closeBtn = $("#g-nav").find("#g-nav-btn");
  //#g-nav-btnをクリックすると
  $(closeBtn).click(function () {
    $(".openbtn").removeClass("active"); //ボタンのactiveを除去し
    $("#g-nav").removeClass("panelactive");//ナビにpanelactiveクラスを付与
    $("#g-nav").stop(); //アニメーションをストップ
  });

  //画面横幅がリサイズされた場合
  $(window).on("load resize", function () {
    var m = window.matchMedia('(max-width: 1150px)');
    if (!m.matches) {
      //画面横幅が1150px以上のときの処理
      //activeクラスが付与されていたら
      
      if ($(".openbtn").hasClass("active")) { //ボタンのactiveクラスの存在有無を確認する
        $(".openbtn").removeClass("active"); //ボタンのactiveクラスを除去し
        $("#g-nav").removeClass("panelactive"); //ナビのpanelactiveクラスも除去
      }
    }
  });
});
//リサイズするとボタンが押せなくなる。#g-navがdisplay:noneになっている

//商品紹介のアコーディオンパネルの動作
$(function() {
    var pTitle = $("#product-title");
    var menu = $(".product-list");
    //クリックで動く
    $(pTitle).click(function() {
      //openクラスを付ける
      $(pTitle).toggleClass('open');
      //#product-titleの次の.product-listを開閉する
      $(pTitle).next(menu).slideToggle();
      //アニメーションをストップ
      $(pTitle).stop();
    });

    //.product-listをクリックしたら
    $(menu).click(function () {
      //各商品のリンクがクリックされたら
      $(".openbtn").removeClass("active"); //ボタンのactiveを除去し
      $("#g-nav").removeClass("panelactive"); //ナビのpanelactiveクラスも除去
    });

    // 商品紹介の＋マークをフォーカスする
    $(pTitle).focus(function() {
      //openクラスを付ける
      $(this).toggleClass('open');
      //#product-titleの次の.product-listを開閉する
      $(this).next(menu).slideToggle();
      //アニメーションをストップ
      $(pTitle).stop();
   });
});
