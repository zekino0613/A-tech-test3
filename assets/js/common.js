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


// スライド部分マウスクリックで掴めるようにする

jQuery(function($) {
	const $slider = $('.service-list-wrap');
	let isDown = false;
	let startX;
	let scrollLeft;

	$slider.on('mousedown touchstart', function(e) {
		isDown = true;
		$slider.addClass('dragging');
		startX = e.pageX || e.originalEvent.touches[0].pageX;
		scrollLeft = $slider.scrollLeft();
	});

	$(document).on('mouseup touchend', function() {
		isDown = false;
		$slider.removeClass('dragging');
	});

	$(document).on('mousemove touchmove', function(e) {
		if (!isDown) return;
		e.preventDefault();
		const x = e.pageX || e.originalEvent.touches[0].pageX;
		const walk = (x - startX) * 1.5; // スクロール速度
		$slider.scrollLeft(scrollLeft - walk);
	});
});






// // // 【同意チェック欄】のバリデーション
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




// // // JSだけでのバリデーションチェック実装

// jQuery(function ($) {
//   $('.gradient-entry-button').on('click', function () {
//     const $form = $(this).closest('form');
//     let isValid = true;

//     // バリデーションチェック（省略せずすべて含む）
//     const $name = $form.find('[name="your-name"]');
//     const $furigana = $form.find('[name="furigana"]');
//     const $email = $form.find('[name="email"]');
//     const emailVal = $email.val();
//     const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     const $checkboxes = $form.find('input[name="checkbox-2[]"]');
//     const $agree = $form.find('#agree-check');

//     if (!$name.val()) { showError($name, '必須項目を入力してください'); isValid = false; } else { clearError($name); }
//     if (!$furigana.val()) { showError($furigana, '必須項目を入力してください'); isValid = false; } else { clearError($furigana); }
//     if (!emailVal) {
//       showError($email, '必須項目を入力してください'); isValid = false;
//     } else if (!emailPattern.test(emailVal)) {
//       showError($email, 'メールアドレスの形式が正しくありません'); isValid = false;
//     } else {
//       clearError($email);
//     }

//     const $checkboxError = $('#checkbox-error');
//     if (!$checkboxes.is(':checked')) { $checkboxError.fadeIn(); isValid = false; } else { $checkboxError.fadeOut(); }

//     const $agreeError = $('#agree-error');
//     if (!$agree.prop('checked')) { $agreeError.fadeIn(); isValid = false; } else { $agreeError.fadeOut(); }

//     // ✅ Contact Form 7 送信イベントを発火（ここが重要）
//     if (isValid) {
//       $form.find('input.wpcf7-submit').click();
//     }
//   });

//   function showError($field, message) {
//     if ($field.next('.error-message').length === 0) {
//       $field.after('<p class="error-message" style="color:red;">' + message + '</p>');
//     }
//   }

//   function clearError($field) {
//     $field.next('.error-message').remove();
//   }
// });


});








