var passwordFunc = (function() {

  var pass1 = $("#pass1");
  var pass2 = $("#pass2");
  var openPassButton = $("#openPassButton");
  var checkPassButton = $("#checkPassButton");
  var pass1_error = $("#pass1-error");
  var pass1_error2 = $("#pass1-error2");
  var pass2_error = $("#pass2-error");

  // フォームのフォーカス時の処理
  function onfocusPass() {

    pass1
      .on("focus", function() {
        var timer = setInterval(displayButton, 100);
      })
      .on("focusout", function() {
        checkPassLength();
        checkPassText();
        var n = [pass1.val()].length;
        checkPassInput(n);
        clearInterval(timer);
      });
  }

  // 表示・非表示ボタンの表示
  function displayButton() {

    if(pass1.val() == "") {
      openPassButton.hide();
    } else {
      openPassButton.show();
    }

  }


  // パスワードの表示・非表示
  function openPass() {

    var passButtonValue = openPassButton.val();

    if(passButtonValue === "表示") {

      openPassButton.val("非表示");
      pass1.attr("type", "text");

    } else {

      openPassButton.val("表示");
      pass1.attr("type", "password");

    }
  }

  // パスワードの文字数チェック
  function checkPassLength() {

    var pass_length = pass1.val().length;
    var count_pass_alert = '6文字以上12文字以下で入力してください';

    if(pass_length < 6) {

      pass1_error.text(count_pass_alert);

    } else {

      pass1_error.text("");

    }

  }

  // パスワードの文字列チェック
  function checkPassText() {

    var regex = /^[a-zA-Z0-9]+$/;
    var no_regex_alert = '半角英数字で入力してください';

      if(pass1.val().match(regex)) {

        pass1_error2.text("");

      } else {

        pass1_error2.text(no_regex_alert);

      }
  }

  // パスワードの入力チェック
  function checkPassInput(n) {

    var no_input_pass_alert = 'パスワードを入力してください';

    for(var i = 1; i <= n; i++) {

      var pass = $("#pass" + i);
      var pass_error = $("#pass" + i + "-error");

      if(pass.val() == "") {

        pass_error.text(no_input_pass_alert);

        if(i == "1"){
          pass1_error2.text("");
        }
      }
    }
  }

  //パスワードの同一チェック
  function checkPassMatch() {

    var no_match_pass_alert = 'パスワードが一致していません';

      if(pass1.val() != pass2.val()) {

        pass2_error.text(no_match_pass_alert);
        return false;

      } else {

        return true;
      }
  }
  // パスワード確認ボタンを押したときの処理
  function checkPass() {

    pass2_error.text("");

    if(pass1.val() == "" || pass2.val() == "") {
      checkPassMatch();
      var n = [pass1.val(), pass2.val()].length;
      checkPassInput(n);
    } else {

      checkPassMatch();

      if(checkPassMatch) {

        checkPassLength();
        checkPassText();

        if(pass1_error.text() != "" || pass1_error2.text() != "" || pass2_error.text() != "") {

          return false;

        } else {

          alert("OK");
        }
      }
    }
  }
  // コピー防止
  function nocopyPass() {

    var no_copy_alert = "コピーせずに入力してください";

    pass1.on("copy", function() {

      alert(no_copy_alert);
      return false;
    })
  }

  return {
    // パブリックメソッド
    start: function() {

      onfocusPass();
      nocopyPass();
      openPassButton.on("mousedown", openPass);
      checkPassButton.on("mousedown", checkPass);
    }
  };
})();

passwordFunc.start();