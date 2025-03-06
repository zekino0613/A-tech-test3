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



  //ロード後に要素フェードイン 
// ーーーーーーーーーーーーー
  jQuery(document).ready(function ($) {
    $(document).ready(function () {
      $('.fadein').each(function () {
        $(this).addClass('scrollin');
      });
    });
  });


  //スクロール中にフェードイン
// ーーーーーーーーーーーーー
  jQuery(document).ready(function($) {
    // ここにコードを書く。'$'を安全に使用できます。
    var windowHeight = $(window).height();  // ウィンドウの高さを取得

    function checkVisibility() {
      $('.fade-in').each(function() {
        var elementTop = $(this).offset().top;  // 要素の上端
        var scrollPos = $(window).scrollTop() + windowHeight;  // スクロール位置 + ウィンドウの高さ

        if (scrollPos > elementTop + 50) {  // 要素がビューポートの50px内に入ったら
          $(this).addClass('visible');
        }
      });
    }

    $(window).on('scroll', checkVisibility);  // スクロール時にチェック
    checkVisibility();  // 初期ロード時にもチェック
  });




jQuery(document).ready(function ($) {
    console.log("✅ jQuery 読み込み完了");

    // タブの切り替え
    $(".tab-list__item").click(function () {
        console.log("タブがクリックされました:", $(this).text());

        $(".tab-list__item").removeClass("is-btn-active");
        $(this).addClass("is-btn-active");

        let index = $(this).index();
        $(".tab-contents").hide();
        $(".tab-contents").eq(index).fadeIn();
    });

    // フィルタリング機能
    function applyFilter(filterClass) {
        console.log("フィルタリング実行: ", filterClass);

        $(".introduction-thumbnail").each(function () {
            if (filterClass === "all" || $(this).hasClass(filterClass)) {
                $(this).fadeIn();
            } else {
                $(this).fadeOut();
            }
        });
    }

    // カテゴリーフィルタリング
    $(".category-filter").click(function (event) {
        event.preventDefault();
        let filter = $(this).data("filter");
        console.log("カテゴリー選択:", filter);
        applyFilter(filter);
    });

// 都道府県フィルタリング
$(".prefecture-filter").click(function () {
  let filter = $(this).data("filter");
  console.log("都道府県選択:", filter);

  // ✅ URLを更新して遷移
  let url = new URL(window.location);
  url.searchParams.set('prefecture', filter);
  window.location.href = url.toString();
});

// ✅ ページロード時に都道府県フィルターを適用
$(document).ready(function () {
  let url = new URL(window.location);
  let prefecture = url.searchParams.get("prefecture");

  if (prefecture) {
      console.log("ページロード時の都道府県フィルター適用:", prefecture);
      
      // ✅ フィルターを適用
      $(".introduction-thumbnail").each(function () {
          if ($(this).hasClass(prefecture)) {
              $(this).fadeIn();
          } else {
              $(this).fadeOut();
          }
      });

      // ✅ 都道府県タブをアクティブにする
      $(".tab-list__item").removeClass("is-btn-active");
      $(".tab-list__item[data-tab='prefecture']").addClass("is-btn-active");

      $(".tab-contents").hide();
      $("#prefecture-tab").fadeIn();
  }
});

});


// // //お知らせカテゴリータブ
jQuery(document).ready(function($) {
	$(".filter-button").click(function(event) {
			event.preventDefault(); // ページ遷移を防ぐ

			let category = $(this).data("category");
			console.log("選択されたカテゴリー:", category); // ✅ デバッグ用

			// すべてのタブから active クラスを削除し、クリックされたタブに追加
			$(".filter-button").removeClass("active");
			$(this).addClass("active");

			// 記事をフィルタリング
			$(".info-card").each(function() {
					let articleCategory = $(this).data("category");

					if (category === "all" || articleCategory === category) {
							$(this).show();  // 該当する記事を表示
					} else {
							$(this).hide();  // 該当しない記事を非表示
					}
			});
	});
});







  // single-introduction// スライダー
// ーーーーーーーーーーーーー
  jQuery(document).ready(function ($) {
    $(".slider").slick({
      autoplay: true,          // 自動再生
      autoplaySpeed: 0,        // 個々のスライドの待ち時間をなくす
      dots: false,             // ドットナビゲーションを非表示
      arrows: false,           // 矢印ナビゲーションを非表示
      infinite: true,          // 無限ループ
      slidesToShow: 1,         // **常に1枚表示（variableWidth で調整）**
      slidesToScroll: 1,       // 1枚ずつスクロール
      speed: 16000,            // **15秒で1周（スムーズな流れ）**
      // rtl: true,               // **右から左へスライド**
      cssEase: "linear",       // **一定のスピードを維持**
      pauseOnHover: false,     // **ホバーで止めない**
      variableWidth: true,     // **スムーズな流れるスライド**
      centerMode: false,        // **中央基準を削除（カクつき防止）**
        responsive: [
            {
              breakpoint: 1024,
              settings: {
              slidesToShow: 1 // **PCと同じスライド数**
              }
            },
            {
              breakpoint: 768,
              settings: {
               slidesToShow: 1 // **スマホでもPCと同じ見え方にする**
            }
          }
        ]
  });
});



// アコーディオン
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
jQuery(document).ready(function ($) {
  function setAccordionHeight(content, isMobile) {
    if (isMobile) {
      // 900px以下の場合
      content.css({
        maxHeight: 300 + 'px', // モバイル用の高さ
        padding: '0', // モバイル用のパディング
      });
    } else {
      // 900px以上の場合
      const height = content.prop('scrollHeight'); // コンテンツの高さを取得
      content.css({
        maxHeight: 200 + 'px',
        padding: '13px 6px 0px', // デスクトップ用のパディング
      });
    }
  }

  function isMobileView() {
    return window.matchMedia('(max-width: 900px)').matches;
  }

  $('.accordion-header').on('click', function () {
    const parentItem = $(this).closest('.accordion-item');
    const content = parentItem.find('.accordion-content');

    // 他のアコーディオンを閉じる
    $('.accordion-item').not(parentItem).removeClass('active');
    $('.accordion-content')
      .not(content)
      .css({
        maxHeight: '0',
        padding: '0 16px',
      });

    // 現在のアコーディオンをトグル
    if (parentItem.hasClass('active')) {
      parentItem.removeClass('active');
      content.css({
        maxHeight: '0',
        padding: '0 16px',
      });
    } else {
      parentItem.addClass('active');
      setAccordionHeight(content, isMobileView());
    }
  });

  // 初期状態で最初のアコーディオンを開く
  const firstItem = $('.accordion-item').first();
  const firstContent = firstItem.find('.accordion-content');
  firstItem.addClass('active');
  setAccordionHeight(firstContent, isMobileView());

  // 画面リサイズ時の動作を追加
  $(window).on('resize', function () {
    $('.accordion-item.active .accordion-content').each(function () {
      setAccordionHeight($(this), isMobileView());
    });
  });
});

//TOPページへ戻るボタン
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
(function ($) {
  $(document).ready(function () {
    const scrollToTopButton = $('#scrollToTop');

    // スクロールイベントでボタンの表示/非表示を制御
    $(window).on('scroll', function () {
      if ($(this).scrollTop() > 300) {
        scrollToTopButton.addClass('show');
      } else {
        scrollToTopButton.removeClass('show');
      }
    });

    // ボタンをクリックしてページトップへスムーズスクロール
    scrollToTopButton.on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 600); // 600msでトップへ移動
    });
  });
})(jQuery);




// page-price-menuの各セクションへのページジャンプ
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
jQuery(document).ready(function ($) {
  // ヘッダーの高さを指定
  var headerHeight = 250; // ヘッダーの高さ（px）

  // ページ内リンクのクリックイベント
  $('a[href*="#"]').on('click', function (e) {
      // 現在のリンク先
      var target = $(this.hash);
      if (target.length) {
          e.preventDefault(); // デフォルトの動作をキャンセル

          // スクロール位置を計算
          var scrollTo = target.offset().top - headerHeight;

          // スムーズスクロール
          $('html, body').animate(
              {
                  scrollTop: scrollTo,
              },
              500 // スクロール速度（ms）
          );
      }
  });
});






//-------------------------------------------------------------------------------
// wordpressテンプレートパーツ
//-------------------------------------------------------------------------------
// 【テンプレートmainvisual】-------------↓

//背景パララックス
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// 
jQuery(function ($) {
  const parallaxImage = $('.parallax-image');
  const salonConcept = $('.section-title');
  const parallaxSection = $('.parallax-section');

  // SALON CONCEPT の終了位置を取得
  const salonEnd = salonConcept.offset().top + salonConcept.outerHeight();

  // レスポンシブ画像の切り替え
  function setResponsiveImage() {
    const windowWidth = $(window).width();
    let imageUrl = parallaxSection.parent().data('desktop'); // デスクトップ用デフォルト

    // if (windowWidth <= 900) {
    //   imageUrl = parallaxSection.parent().data('tablet'); // タブレット用画像
    // }
    if (windowWidth <= 900) {
      imageUrl = parallaxSection.parent().data('mobile'); // モバイル用画像
    }

    parallaxImage.css('background-image', `url(${imageUrl})`);
  }

  // 初期表示時とリサイズ時に画像を切り替え
  setResponsiveImage();
  $(window).on('resize', setResponsiveImage);

  // パララックス効果
  $(window).on('scroll', function () {
    const scrollTop = $(window).scrollTop();

    if (scrollTop < salonEnd) {
      // スクロール位置が SALON CONCEPT の中にある場合
      parallaxImage.css({
        top: salonEnd - scrollTop + 'px',
      });
    } else {
      // 通常セクションに入った場合
      parallaxImage.css({
        top: '80px', // 固定位置
      });
    }
  });
});




// document.addEventListener("DOMContentLoaded", function () {
//   // すべてのカレンダーアイコンを取得
//   const calendarIcons = document.querySelectorAll(".custom-calendar-icon");

//   calendarIcons.forEach((icon) => {
//     icon.addEventListener("click", function () {
//       // アイコンの data-target 属性から対応する input[type="date"] を特定
//       const targetId = icon.getAttribute("data-target");
//       const targetInput = document.getElementById(targetId);

//       if (targetInput) {
//         targetInput.showPicker(); // カレンダーを表示する
//       }
//     });
//   });
// });


// 採用情報フォーム
// ラジオボタンで「その他」選択の時にだけテキストエリアが入力できるようにする
jQuery(document).ready(function ($) {
  function toggleOtherTextarea() {
      let selectedValue = $(".inquiry-radio input:checked").val();
      
      if (selectedValue === "その他") {
          $(".other-textarea").prop("disabled", false).focus();
      } else {
          $(".other-textarea").prop("disabled", true).val("");
      }
  }

  // ページロード時に適用（リロード後の状態保持対策）
  toggleOtherTextarea();

  // ラジオボタンの変更を監視
  $(".inquiry-radio input").change(function () {
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
jQuery(document).ready(function ($) {
  function toggleOtherTextarea() {
      let selectedValue = $(".confirm-radio").text().trim();
      let otherLabel = $(".confirm-other-text");
      let otherTextarea = $(".confirm-other-textarea");

      console.log("選択中のラジオボタン:", selectedValue);
      console.log("その他入力値:", otherTextarea.text().trim());

      if (selectedValue === "その他" && otherTextarea.text().trim() !== "") {
          otherLabel.removeClass("hidden");
          otherTextarea.removeClass("hidden");
      } else {
          otherLabel.addClass("hidden");
          otherTextarea.addClass("hidden");
      }
  }

  // 初期状態で実行
  toggleOtherTextarea();
});




});
  

  

  





