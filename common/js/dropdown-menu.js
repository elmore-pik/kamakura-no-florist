// グローバルナビゲーション時、商品紹介のドロップダウンメニュー
//親メニューでもある.headnav-list-has-children aと、子メニューである.headnavSub-list aにフォーカスすると、子メニューを包むulの.headnavSub-listに新たにfocusedというクラスを付与する。
$(function() {
    //商品紹介をフォーカスすると
    $(".menu-item-has-children a").focus(function() {
        //商品紹介の兄弟要素「.sub-menu」を取得し、focusedクラスを追加する
        $(this).siblings(".sub-menu").addClass('focused');     
      //blur()でフォーカスが外れた時
    }).blur(function() {
        //商品紹介の兄弟要素「.sub-menu」を取得し、focusedクラスを外す
        $(this).siblings('.sub-menu').removeClass('focused');
    });

    //サブメニューをフォーカスすると
    $(".sub-menu a").focus(function() {
        //「.sub-menu a」の親要素「.sub-menu」を取得し、focusedクラスを追加する
        $(this).parents(".sub-menu").addClass('focused');
        //blur()でフォーカス外れた時
    }).blur(function() {
        //「.sub-menu a」の親要素「.sub-menu」を取得し、focusedクラスを外す
        $(this).parents(".sub-menu").removeClass('focused');
    });
});