document.addEventListener("DOMContentLoaded", function () {


(function ($) {
  $(document).ready(function () {
    const $hamburger = $(".hamburger");
    const $overlayMenu = $("#overlay-menu");
    const $body = $("body");
    const $html = $("html");

    // ハンバーガーメニューの開閉
    $hamburger.on("click", function () {
      const isOpen = $(this).toggleClass("is-open").hasClass("is-open");
      $overlayMenu.toggleClass("is-open", isOpen);
      $body.toggleClass("no-scroll", isOpen);
      $html.toggleClass("no-scroll", isOpen); // HTMLにもクラスを追加
    });

    // メニュー内リンクをクリックしたときに閉じる
    $overlayMenu.find("a").on("click", function () {
      $hamburger.removeClass("is-open");
      $overlayMenu.removeClass("is-open");
      $body.removeClass("no-scroll");
      $html.removeClass("no-scroll");
    });

    // メニュー外クリックで閉じる
    $(document).on("click", function (event) {
      if (
        !$overlayMenu.is(event.target) &&
        !$overlayMenu.has(event.target).length &&
        !$hamburger.is(event.target) &&
        !$hamburger.has(event.target).length
      ) {
        $hamburger.removeClass("is-open");
        $overlayMenu.removeClass("is-open");
        $body.removeClass("no-scroll");
        $html.removeClass("no-scroll");
      }
    });
  });
})(jQuery);





//FV mainvisual scrollアイコン
jQuery(function($) {
	function toggleInfoPost() {
			let mainvisual = $('#mainvisual'); // ファーストビューの要素を取得
			let infoPost = $('.scroll-content');

			if (mainvisual.length) {
					let fvOffset = mainvisual.offset().top;
					let fvHeight = mainvisual.outerHeight();
					let scrollTop = $(window).scrollTop();

					if (scrollTop > fvOffset + fvHeight) {
							infoPost.fadeOut(); // FVが見えなくなったら非表示
					} else {
							infoPost.fadeIn(); // FVが見えている間は表示
					}
			}
	}

	// 初回実行
	toggleInfoPost();

	// スクロール時に実行
	$(window).on('scroll', function() {
			toggleInfoPost();
	});
});



//FV mainvisu info
jQuery(function($) {
	function toggleInfoPost() {
			let mainvisual = $('#mainvisual'); // ファーストビューの要素を取得
			let infoPost = $('.info-post');

			if (mainvisual.length) {
					let fvOffset = mainvisual.offset().top;
					let fvHeight = mainvisual.outerHeight();
					let scrollTop = $(window).scrollTop();

					if (scrollTop > fvOffset + fvHeight) {
							infoPost.fadeOut(); // FVが見えなくなったら非表示
					} else {
							infoPost.fadeIn(); // FVが見えている間は表示
					}
			}
	}

	// 初回実行
	toggleInfoPost();

	// スクロール時に実行
	$(window).on('scroll', function() {
			toggleInfoPost();
	});
});



// // 個別ページ  Service-サービス内容
// jQuery(function ($) {
// 	$('.service-list__tab').on('click', function () {
// 		var tabID = $(this).data('tab');

// 		$('.service-list__tab').removeClass('is-active');
// 		$(this).addClass('is-active');

// 		$('.service-textarea__desc').removeClass('is-show').fadeOut(200);
// 		$('#' + tabID).fadeIn(300).addClass('is-show');
// 	});
// });

jQuery(function ($) {
  $('.service-list__tab').on('click', function () {
    const tabID = $(this).data('tab');

    $('.service-list__tab').removeClass('is-active');
    $(this).addClass('is-active');

    // フェード切り替え
    $('.service-textarea__desc').removeClass('is-show');
    setTimeout(function () {
      $('#' + tabID).addClass('is-show');
    }, 20); // 少し遅延を入れるとCSS transitionが確実に反映されます
  });
});




// 採用情報フォーム
// ラジオボタンで「その他」選択の時にだけテキストエリアが入力できるようにする
jQuery(document).ready(function ($) {
  function toggleOtherTextarea() {
      let selectedValue = $(".inquiry-checkbox input:checked").val();

      if (selectedValue === "その他") {
          $(".other-textarea").prop("disabled", false).focus();
      } else {
          $(".other-textarea").prop("disabled", true).val("");
      }
  }

  // ページロード時に適用（リロード後の状態保持対策）
  toggleOtherTextarea();

  // ラジオボタンの変更を監視
  $(".inquiry-checkbox input").change(function () {
      toggleOtherTextarea();
  });
});

//採用情報フォーム確認画面
// ダブルクリックでカレンダー表示
jQuery(document).ready(function ($) {
  $(".birthdate").on("dblclick", function () {
      this.showPicker();
  });
});


//採用情報フォーム確認画面
// ラジオボタンで「その他」選択の時にだけテキストエリアが出力されるようにする
// jQuery(document).ready(function ($) {
//   function toggleOtherTextarea() {
//       let selectedValue = $(".confirm-radio").text().trim();
//       let otherLabel = $(".confirm-other-text");
//       let otherTextarea = $(".confirm-other-textarea");

//       console.log("選択中のラジオボタン:", selectedValue);
//       console.log("その他入力値:", otherTextarea.text().trim());

//       if (selectedValue === "その他" && otherTextarea.text().trim() !== "") {
//           otherLabel.removeClass("hidden");
//           otherTextarea.removeClass("hidden");
//       } else {
//           otherLabel.addClass("hidden");
//           otherTextarea.addClass("hidden");
//       }
//   }

//   // 初期状態で実行
//   toggleOtherTextarea();
// });


document.addEventListener("DOMContentLoaded", function() {
	let submitBtn = document.querySelector(".btn");
	if (submitBtn) {
			let icon = document.createElement("i");
			icon.classList.add("fa-solid", "fa-angle-right");
			submitBtn.appendChild(icon);
	}
});

// 【同意チェック欄】のバリデーション
jQuery(function ($) {
	const $form = $('.wpcf7 form'); // CF7のフォーム
	const $checkbox = $('#agree-check');
	const $errorMsg = $('#agree-error');

	$form.on('submit', function (e) {
		if (!$checkbox.prop('checked')) {
			e.preventDefault(); // フォーム送信を止める
			$errorMsg.fadeIn(); // エラーメッセージ表示
		} else {
			$errorMsg.fadeOut(); // エラー非表示
		}
	});
});





});










