//お知らせの記事を赤文字でフォーカスさせる
$(function() {
    var news = $(".news-box .news a");
    $(news).focus(function() {
        $(this).css('color','#ff0000');
    });
});

//お知らせのMOREボタンを赤紫でフォーカスさせる
$(function() {
  var more = $(".news-box .purple-btn");
  $(more).focus(function() {
      $(this).css('background','#71236e');
  });
});

//アンカーリンクを赤文字でフォーカスさせる
$(function() {
    var anchor = $(".anchor-link a");
    $(anchor).focus(function() {
        $(this).css('color','#ff0000');
    });
});

//フォームのinputとtextareaとプルダウンメニューをTabキーでフォーカスさせる
$(function() {
    //inputとtextareaにfocusされたとき
    $('input,textarea,.todofuken select').focus(function() {
        $(this).css('outline', '2px solid #E85298');
        $(this).css('background', '#fae3ee');
        $(this).css('border-radius', '3px');
        $(this).css('color', '#664032');
        $(this).css('font-weight', 'bold');

      //inputとtextareaにfocusが外れたとき
    }).blur(function() {
        $(this).css('outline', 'none');
    });
});                                                  

