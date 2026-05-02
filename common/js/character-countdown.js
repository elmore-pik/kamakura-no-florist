//ご利用目的のテキストエリア文字数カウンター（カウントダウン）
$(function() {
    //テキストエリアにキーボードのキーが押され、上がった際に呼び出される
    $("#count-down").keyup(function() {
        // 300文字 －　テキストエリア要素の数を取得を「remain」という変数に代入
        var remain = 300 - $(this).val().length;

        $("#textmax").text(remain);
        //もしremainより少ない場合、カウンターの色が赤に変わる
        if (remain < 0) {
          $("#textmax").css('color', '#ff0000');

          //そうじゃない場合は茶色に戻る
        } else {
          $("#textmax").css('color', '#664032');
        }
    });
});

//メッセージのテキストエリア文字数カウンター（カウントダウン）
$(function() {
  //テキストエリアにキーボードのキーが押され、上がった際に呼び出される
  $("#count-down__message").keyup(function() {
      // 30文字 －　テキストエリア要素の数を取得を「remain」という変数に代入
      var remain = 30 - $(this).val().length;

      $("#textmax__message").text(remain);
      //もしremainより少ない場合、カウンターの色が赤に変わる
      if (remain < 0) {
        $("#textmax__message").css('color', '#ff0000');

        //そうじゃない場合は茶色に戻る
      } else {
        $("#textmax__message").css('color', '#664032');
      }
  });
});
