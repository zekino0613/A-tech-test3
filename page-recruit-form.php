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


    
  <section id="FAQ">
    <div class="FAQ__inner">
      <div class="section-title fade-in">
        <span class="section-title__shadow">FAQ</span>
        <h2 class="section-title__main">FAQ</h2>
        <span class="section-title__small">よくある質問</span>
      </div>

      <div class="accordion">
        <div class="accordion-item fade-in">
          <div class="accordion-header">
            <span class="accordion-question">スタッフの資格や経験について教えてください。</span>
            <span class="accordion-icon">▼</span>
          </div>
          <div class="accordion-content">
            <p>当園のスタッフは、保育士や幼稚園教諭など、保育に関する専門的な資格を持つ人材です。また、多彩な経験を持ち、子どもたちとの信頼関係を築きながら、
                安心して成長できる環境を提供しています。定期的な研修やワークショップを通じて、スキルや知識の向上に努めています。</p>
          </div>
        </div>

        <div class="accordion-item fade-in">
          <div class="accordion-header">
            <span class="accordion-question">子どもたちに提供される食事や健康管理について教えてください。</span>
            <span class="accordion-icon">▼</span>
          </div>
          <div class="accordion-content">
            <p>当園では、バランスの取れた食事や健康管理に特に配慮しています。栄養士の監修のもと、子どもたちの成長に必要な栄養を考慮した食事を提供しています。
                また、日々の健康管理や安全管理にも十分な配慮をし、保護者の皆様に安心してお子さまをお預けいただける環境を整えています。</p>
          </div>
        </div>

        <div class="accordion-item fade-in">
          <div class="accordion-header">
            <span class="accordion-question">保護者とのコミュニケーションはどのように行われていますか？</span>
            <span class="accordion-icon">▼</span>
          </div>
          <div class="accordion-content">
            <p>当園では、保護者との密なコミュニケーションを大切にしています。定期的な面談や保護者会、またはLINEやメールなどのSNSを通じて、
                子どもたちの様子や日々の過ごし方についての情報共有を行っています。保護者の皆様との信頼関係を築きながら、お子さまの成長を共にサポートしています。
            </p>
          </div>
        </div>

      </div>
    </div><!-- /.FAQ__inner -->
  </section>


    <div class="contact-form-wrapper fade-in">
      <?php echo apply_shortcodes('[contact-form-7 id="81f108b" title="採用情報"]'); ?>
    </div>
    







  </main>





<!-- ---footer読み込み ----------------------------------------------->
<?php
  get_template_part('template-parts/footer'); // footer.php をインクルード
?>
<!-- ---------------------------------------------------------------------->
</body>     