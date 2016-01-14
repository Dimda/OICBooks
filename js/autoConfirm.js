/*
 * autoConfirm.js - v0.5 - 2012/07/15
 * http://blog.material-being.com/portfolio/auto_confirm/
 * 
 * Copyright (c) 2012 Seiichiro Sasaki
 * Dual licensed under the MIT and GPL licenses.
 * http://blog.material-being.com/
 */
 
$(document).ready(function() {
	
//■□■――――――――――――――――――――――――――――――――――――■□■
//		□ 設定
//■□■――――――――――――――――――――――――――――――――――――■□■

	var confirmName = '確認';	//入力画面におけるSubmit(送信)ボタンの値
	var submitName = '送信';	//確認画面におけるSubmit(送信)ボタンの値
	var speed = 300;			//アニメーションの速度（ミリ秒）
	var convertLf = true;		//プレビュー時、テキストエリアの改行をbrタグに置き換える
	var getLabelCR = true;		//プレビュー時、ラジオボタンとチェックボックスはvalue属性ではなくラベルの値を表示する
	var getOptionHTML = true;	//プレビュー時、セレクトボックスはoption要素のvalue属性ではなくoption要素で囲まれた文字列を表示する
	
	var formClass = '.autoConfirm';	//対象のFormタグに指定するクラス
	var confirmBackClass = '.autoConfirmBack';	//戻るボタンに指定するクラス
	var confirmHiddenClass = '.error-message, .hint-message';	//入力画面でのみ表示するクラス
	var confirmVisibleClass = '.confirm-message';	//プレビュー画面でのみ表示するクラス
	
	
//■□■――――――――――――――――――――――――――――――――――――■□■
//		□ プログラム
//■□■――――――――――――――――――――――――――――――――――――■□■
	
	$(formClass + ' :submit').val(confirmName);
	$(formClass + ' ' + confirmBackClass).css('display', 'none');
	
	//まず現在のURLから入力画面か確認画面かを判断する
	if(location.hash == '#confirm') {
		switcher();
	}
	
	$(formClass).submit(function() {
		
		if(location.hash != '#confirm') {
			location.hash = '#confirm';			
			return false;
		}else{
			return true;
		}
	});
	
	//---------------------------------
	// Backボタンが押されたらハッシュ値を削除
	//---------------------------------
	$(formClass + ' ' + confirmBackClass).click(function() {

		if(location.hash == '#confirm') {
			location.hash = '';
		}
	});

	$(window).hashchange(switcher);

	function switcher(){
		if(location.hash == '#confirm') {
			
			$(formClass + ' :input:not(' + formClass + ' :submit)').fadeOut(speed);
			$(confirmHiddenClass).fadeOut(speed);
			$(confirmVisibleClass).fadeIn(speed);
			$(formClass + ' ' + confirmBackClass).fadeIn(speed);
			$(formClass + ' :submit').val(submitName);
			setTimeout(output, speed+10);
			
		}else{
			$(formClass + ' :input:not(' + formClass + ' :submit)').fadeIn(speed);
			$(confirmHiddenClass).fadeIn(speed);
			$(confirmVisibleClass).fadeOut(speed);
			$(formClass + ' ' + confirmBackClass).fadeOut(speed);
			$(formClass + ' :submit').val(confirmName);
			$(formClass + ' label').css('display', '')
			$(formClass + ' .autoConfirmVal').remove();
		}
	}

	//---------------------------------
	// フォームの入力値を取り出して出力
	//---------------------------------
	function output() {
					
		var checkOrRadioNames = '';
		
		$(formClass + ' :input:not(' + formClass + ' :submit)').each(function() {
			
			switch($(this).get(0).tagName) {
				
			//---------------------------------
			// select：複数の値を取得
			//---------------------------------
			case 'SELECT':
				var selects = '';
				$(this).children('option:selected').each(function() {
					if(getOptionHTML) {
						//option要素で囲まれた文字列を取得する場合
						var selectVal = $(this).html();	
					}else{
						//Valueの値を取得する場合
						var selectVal = $(this).val();
					}
					if(selects == '') {
						selects += selectVal;	
					}else{
						selects += ', ' + selectVal;
					}
				});
				$(this).after('<span class="autoConfirmVal">'+ selects +'</span>');	
			break;
			
			//---------------------------------
			// textarea：改行をbrに変換
			//---------------------------------
			case 'TEXTAREA':
				if(convertLf) {
					var val = nl2br($(this).val());
				}else{
					var val = $(this).val();
				}
				
				$(this).after('<span class="autoConfirmVal">'+ val +'</span>');
			break;
			
			default :
				
				switch($(this).attr('type')) {
					
					//---------------------------------
					// hidden, button, submit：何もしない
					//---------------------------------
					case 'hidden':
					case 'button':
					case 'submit':
					break;
					
					//---------------------------------
					// checkbox, radio：選択されたラベルの値を取得
					//---------------------------------
					case 'checkbox':
					case 'radio':
						var checkOrRadioName = $(this).attr('name');
						//同じName属性の要素を既に処理していなければ
						if(checkOrRadioNames.indexOf($(this).attr('name')) == -1) {
							checkOrRadioNames += checkOrRadioName+', ';
							var checks = '';
							$(formClass + ' [name="'+checkOrRadioName+'"]:checked').each(function() {
								if(getLabelCR) {
									//ラベルの値を取得する場合
									var checkOrRadioVal = $('label[for="'+$(this).attr('id')+'"]').html();
								}else{
									//Valueの値を取得する場合
									var checkOrRadioVal = $(this).val();
								}
								if(checks == '') {
									checks += checkOrRadioVal;	
								}else{
									checks += ', ' + checkOrRadioVal;
								}
							});
							$(formClass + ' [name="'+checkOrRadioName+'"]:last').after('<span class="autoConfirmVal">'+ checks +'</span>');	
						}
						$('label[for="'+$(this).attr('id')+'"]').css('display', 'none');
					break;

					//---------------------------------
					// password：入力文字を"*"記号に置き換える
					//---------------------------------
					case 'password':
						$(this).after('<span class="autoConfirmVal">'+ $(this).val().replace(/./g, '*') +'</span>');	
					break;
					
					default :
						$(this).after('<span class="autoConfirmVal">'+ $(this).val() +'</span>');	
				}
			}
			
		});
	}

	//---------------------------------
	// 改行を<br />に置き換える関数
	//---------------------------------
	function nl2br (str) {
		return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1<br />$2');
	}

});