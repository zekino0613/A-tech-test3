<!-- ---header読み込み ----------------------------------------------->
<?php
    get_template_part('template-parts/header'); // header.php をインクルード
  ?>
  <!-- ---------------------------------------------------------------------->
  <main>
  <!-- title-heading -->
  <?php
      get_template_part('template-parts/title-heading'); // title-heading をインクルード
  ?>


  <section id="contact-form-section">
    <div class="contact-form-section__inner">
			<div class="contact-form-section__inner--textarea fade-in">
				<p>
					下記フォームにご記入の上、送信してください。折り返し、弊社担当よりご連絡させて頂きます。<br>
					また、ご入力頂きました個人に関する情報につきましては、弊社で責任をもって管理し、お問い合わせへのご回答及び弊社のサービス向上のために利用させて頂き、第三者への開示や他の目的で利用は致しません。
					詳しくは個人情報保護方針をご覧ください。
				</p>
				<a class="privacy-policy" href="<?php echo home_url('/privacy-policy/'); ?>">
					弊社への登録に際して、お預かりする個人情報の扱いについて
        </a>
			</div>
			
      <div class="contact-form-wrapper fade-in">
        <?php echo apply_shortcodes('[contact-form-7 id="6e37d1f" title="ご予約・お問い合わせ"]'); ?>
      </div>
    </div><!-- /contact-form-section__inner -->
  </section>
</main>




<!-- ---footer読み込み ----------------------------------------------->
<?php
  get_template_part('template-parts/footer'); // footer.php をインクルード
?>
<!-- ---------------------------------------------------------------------->
</body>     