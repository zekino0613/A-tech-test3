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

	<section id="motto">
		<!-- title-icon -->
		<?php
			get_template_part('template-parts/title-icon', null, ['name' => 'motto']);// title-icon をインクルード
		?>
		<div class="motto-content">
			<div class="motto-content__flex">
				<img
						class="motto-content__flex--image"
						src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/yearly-program/yearly-program-3.webp"
						loading="lazy"
						alt="motto-image1">
				<div class="motto-content__flex--textarea">
					<h3 class="textarea-title">
						子ども主体の保育
					</h3>
					<p class="textarea-text">
						変化に富んだ現代において、子どもたち一人ひとりの“個性”と“未来を切り拓く力”を育むため、子ども主体の豊かな保育を実践しています。<br>
						子どもは一人ひとりが可能性にあふれた有能な学び手。<br>
						保育者はさまざまなアイデアを出し合い、子どもたちのやりたいこと、興味があることを最大限に引き出します。<br>
						単に知識を教えるのではなく、自ら取り組む楽しさから学びへの意欲を呼び起こす、非認知能力に主眼を置いた取り組みを進めています。
					</p>
				</div><!-- / -->		
			</div><!-- /.motto__flex -->
			
			<div class="motto-content__flex content2">
				<div class="motto-content__flex--textarea">
					<h3 class="textarea-title">
						自由な風土	
					</h3>
					<p class="textarea-text">				
						保育者が思い思いの先進的な保育を実践できる、自由度の高さが桜のこもれびの特長。古い慣習にとらわれることなく誰もが意見を発信できる、風通しの良い園づくりを行っています。 <br>
						園を創るのは保育者一人ひとりの個性。<br>
						楽しく仲間と助け合いながらアイデアを実現できる風土を大事にしています。<br>
						一方で、本部部門には専門家との共創や優れた保育の実践例を体系化する仕組みがあり、本部と連携することでさらに豊かな保育を実践することができます。
					</p>
				</div><!-- / -->		
				<img
						class="motto-content__flex--image"
						src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/introduction/introduction-img17.webp"
						loading="lazy"
						alt="motto-image2">
			</div><!-- /.motto__flex -->
			
			<div class="motto-content__flex">
				<img
						class="motto-content__flex--image"
						src="<?php echo get_template_directory_uri(); ?>/assets/images/kidsland_image/human/human-wide.webp"
						loading="lazy"
						alt="motto-image3">
				<div class="motto-content__flex--textarea">
					<h3 class="textarea-title">
						ワークライフバランス
					</h3>
					<p class="textarea-text">
					大事にしているのは「安心して働き続けていける会社」であること。<br>
					桜のこもれびでは、働き方の多様化や学びの支援など、<br>
					ワークライフバランスを大切にした環境づくりに努めています。<br>
					働く人を大事にすることが、質の高い保育につながると考えています。
					</p>
				</div><!-- / -->		
			</div><!-- /.motto__flex -->
		</div><!-- / -->	
	</section>
	
	
	<section id="requirements">
		<!-- title-icon -->
		<?php
			get_template_part('template-parts/title-icon', null, ['name' => 'requirements']);// title-icon をインクルード
		?>
		
		<div class="requirements__inner">
			<div class="requirements__inner--list">
				<h3 class="list-label">
					勤務地
				</h3>
				<p class="list-text">
					桜のこもれびキッズランドの各園のいずれか <br>
					<span>※ご希望の勤務地やお住まいの住所から近い園を優先的にご案内します。</span>
				</p>
			</div>
			<div class="requirements__inner--list">
				<h3 class="list-label">
					勤務時間
				</h3>
				<p class="list-text spfz16">
					7:00～18:30のシフト制（延長時間あり）<br>
					9h拘束、実働8時間<br>
					出勤する時間と曜日で基本給が変わります
				</p>
			</div>
			<div class="requirements__inner--list">
				<h3 class="list-label">
					応募資格
				</h3>
				<p class="list-text">
					資格をお持ちの方。<br>
					※資格取得見込みの方はご相談ください。
				</p>
			</div>
			<div class="requirements__inner--list sp-margin">
				<h3 class="list-label ">
					処遇
				</h3>
				<p class="list-text">
					月給　20万～25万（各種手当含む）<br>
					時給制　1120円～1450円（ 勤務時間・勤務曜日は相談可）<br>
					勤務シフトは常勤・非常勤併せて100パターン以上あります。あなたの希望に合う勤務時間を選んで働けます。
				</p>
			</div>
			<div class="requirements__inner--list">
				<h3 class="list-label">
					賞与
				</h3>
				<p class="list-text fzsm">
					年2回※月給制の方に限ります。<br>
					期末賞与：対象年度の業績に応じて支給
				</p>
			</div>
			<div class="requirements__inner--list">
				<h3 class="list-label">
					休日
				</h3>
				<p class="list-text fzsm sp-holiday">
					土日祝日<br>
					または<br>
					月間10日を選べます。
				</p>
			</div>
			<div class="requirements__inner--list margin">
				<h3 class="list-label">
					保険
				</h3>
				<p class="list-text padding">
					厚生年金・健康保険・雇用保険・労災保険　完備
				</p>
			</div>
			<div class="requirements__inner--list teate-pad">
				<h3 class="list-label">
					手当
				</h3>
				<p class="list-text padding">
					延長保育手当・皆勤手当・担当手当など
				</p>
			</div>
			<div class="requirements__inner--list margin2">
				<h3 class="list-label">
					昇給
				</h3>
				<p class="list-text padding">
					年一回（業績評価による）
				</p>
			</div>
			<div class="requirements__inner--list kyuka-pa">
				<h3 class="list-label">
					休暇
				</h3>
				<p class="list-text padding">
					年末年始・産前産後休暇・育児休暇・看護休暇制度あり
				</p>
			</div>
			<div class="requirements__inner--list sonota-pa">
				<h3 class="list-label">
					その他
				</h3>
				<p class="list-text padding">
					交通費全額支給。<br class="brsp">予防接種補助など福利厚生充実。
				</p>
			</div>
		</div><!-- / -->
	</section>


  <section id="FAQ">
    <div class="FAQ__inner">
			<!-- title-icon -->
			<?php
				get_template_part('template-parts/title-icon', null, ['name' => 'FAQ']);// title-icon をインクルード
			?>

      <div class="accordion">
        <div class="accordion-item fade-in">
          <div class="accordion-header">
            <span class="accordion-question">スタッフの資格や経験について教えてください。</span>
            <span class="accordion-icon">▼</span>
          </div>
          <div class="accordion-content">
            <p>当園のスタッフは、保育士や幼稚園教諭など、保育に関する専門的な資格を持つ人材です。<br class="brsp">また、多彩な経験を持ち、子どもたちとの信頼関係を築きながら、
                安心して成長できる環境を提供しています。<br class="brsp">定期的な研修やワークショップを通じて、スキルや知識の向上に努めています。</p>
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