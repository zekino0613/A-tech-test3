<?php
get_template_part('template-parts/header'); // header.php をインクルード
?>

<main>
  <?php 
    get_template_part('template-parts/para-mainvisual'); // header.php をインクルード
  ?> 


  <section id="section-contects" class="reserve">
    <!-- パンくずリスト -->
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<nav id="breadcrumbs">', '</nav>');
    }
    ?>
  </section>

  <div class="privacy-policy">
    <div class="privacy-policy__inner">

      <div class="privacy-download">
        <div class="privacy-download__textarea">
          <h2 class= "privacy-download__textarea--title fade-in">
          未成年のお客様は必ずお読みください
          </h2>    
          <p class= "privacy-download__textarea--text fade-in">
          脱毛箇所を問わず、未成年のお客様が施術を受けるためには、<br class="brsp">保護者の同意が必要です。<br>
          「未成年契約同意書」をダウンロードし、保護者にご記入いただいた上で初回ご来店時に持参ください。
          </p>
        </div><!-- /privacy-download__textarea -->

        <div class="download-content">
          <p class="download-content__text fade-in">未成年契約同意書</p>
          <a class="download-content__button btn fade-in" href="http://a-test.local/wp-content/uploads/2024/11/VALENTINE-ROSE-minors-consent-form.docx"
            download="未成年契約同意書.pdf" class="btn-download">
            <i class="fas fa-file-download"></i> Download
          </a>
        </div>
      </div><!-- /privacy-download -->

      <div class="contact-section">
        <div class="contact">
          <div class="contact__info">
            <h2 class="contact__info--title fade-in">TEL</h2>
            <p class="contact__info--description fade-in">
              サービス・料金の質問や無料体験のご予約などを希望の方は、ご希望の店舗にお問い合わせください。<br>
              なお、施術中は、お電話に対応することができない可能性がありますので、あらためてお電話いただくか、メールフォームからお問い合わせください。
            </p>
          </div>

          <div class="contact__details">
            <a class="contact__details--number fade-in" href="tel:0123456789">01-2345-6789</a>
            <span class="contact__details--hours fade-in">9:00〜22:00 定休日なし</span>
          </div>
        </div>
      </div>
    </div><!-- / -->
  </div><!-- /privacy-policy -->


  <section id="contact-form-section">
    <div class="contact-form-section__inner">
      <div class="mail-steps">   
        <div class="mail-steps__textarea">
          <h2 class="mail-steps__textarea--title fade-in">MAIL FORM</h2>
          <p class="mail-steps__textarea--description fade-in">
            脱毛の無料体験や施術のご予約などをご希望の方は、<br />
            以下のフォームに必要事項を入力の上でお問い合わせください。<br />
            なお、当日または翌日のご予約を希望の方は、お電話で問い合わせください。
          </p>
        </div><!-- / -->


        <div class="mail-steps__container fade-in">
          <div class="mail-step">
            <p class="mail-step__number">Step 01</p>
            <p class="mail-step__text">内容入力</p>
          </div>
          <div class="mail-step">
            <p class="mail-step__number">Step 02</p>
            <p class="mail-step__text">内容確認</p>
          </div>
          <div class="mail-step">
            <p class="mail-step__number">Step 03</p>
            <p class="mail-step__text">送信完了</p>
          </div>
        </div>
      </div>

      <div class="contact-thanks fade-in"> 
        <h2>お問い合わせありがとう<br class="brsp">ございます。</h2>

        <div class="flex">
          <p>3営業日以内に担当の者から連絡いたします。</p>

          <a class="back" href="<?php echo home_url('/'); ?>#">
            TOPに戻る
          </a>
        </div>
      </div>
    </div><!-- /contact-form-section__inner -->  
  </section>
</main>



<?php
  get_template_part('template-parts/reserve-footer'); // reserve-footer.php をインクルード
?>  
</body>       

