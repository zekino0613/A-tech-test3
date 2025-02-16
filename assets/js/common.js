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


  // PC-featureスライド
// ーーーーーーーーーーーーー
  jQuery(document).ready(function($) {
    let currentIndex = 0;
    const slideCount = $('.feature-content__image-slider .slide').length;
    const intervalTime = 5000; // 5秒間隔
  
    // スライドを切り替える関数
    function showSlide(index) {
      // タブのアクティブ状態更新
      $('.feature-tabs__tab').removeClass('active').eq(index).addClass('active');
  
      // 画像スライダーの切り替え
      $('.feature-content__image-slider .slide').removeClass('active-slide');
      $('.feature-content__image-slider .slide').eq(index).addClass('active-slide');
  
      // 詳細スライダーの切り替え
      $('.feature-content__description-slider .description-slide').removeClass('active-slide');
      $('.feature-content__description-slider .description-slide').eq(index).addClass('active-slide');
    }
  
    // 自動スライド切り替え
    function startAutoSlide() {
      setInterval(() => {
        currentIndex = (currentIndex + 1) % slideCount;
        showSlide(currentIndex);
      }, intervalTime);
    }
  
    // タブクリック時の動作
    $('.feature-tabs__tab').click(function() {
      currentIndex = $(this).data('index');
      showSlide(currentIndex);
    });
  
    // 初期表示設定
    showSlide(currentIndex);
    startAutoSlide();
  });

// SP-スライダー
// // ーーーーーーーーーーーーー
// 
jQuery(document).ready(function ($) {
  // 画像スライダーを初期化
  $(".feature-content-sp__image-slider").slick({
    slidesToShow: 1, // 中央に1つ表示
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    asNavFor: ".feature-content-sp__description-slider",
    centerMode: true, // 中央配置
    variableWidth: true, // 画像本来のサイズを保持
  });

  // 詳細スライダーを初期化
  $(".feature-content-sp__description-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    infinite: true,
    fade: true, // フェードで切り替え
    asNavFor: ".feature-content-sp__image-slider",
  });
});



// アコーディオン
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
jQuery(document).ready(function ($) {
  function setAccordionHeight(content, isMobile) {
    if (isMobile) {
      // 900px以下の場合
      content.css({
        maxHeight: 150 + 'px', // モバイル用の高さ
        padding: '10px 20px 16px 16px', // モバイル用のパディング
      });
    } else {
      // 900px以上の場合
      const height = content.prop('scrollHeight'); // コンテンツの高さを取得
      content.css({
        maxHeight: 200 + 'px',
        padding: '0px 32px 35px 24px', // デスクトップ用のパディング
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






  


});
  

  

  





