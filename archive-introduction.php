<?php
// ---header読み込み ---
get_template_part('template-parts/header'); // header.php をインクルード
?>

<main>
    <!-- title-heading -->
    <?php get_template_part('template-parts/title-heading'); ?>

    <!-- 投稿カード -->
    <div class="introduction-list pink-bk">
        <?php get_template_part('template-parts/title-icon', null, ['name' => 'archive-introduction']); ?>

        <div class="introduction-list__inner">
            <div class="tab">
                <!-- タブリスト -->
                <div class="tab-list">
                    <button class="tab-list__item is-btn-active" data-tab="category">園の種類<br>から探す</button>
                    <button class="tab-list__item" data-tab="prefecture">都道府県<br>から探す</button>
                </div>

                <div class="tab-contents-wrap">
                    <!-- 園の種類カテゴリー -->
                    <div class="tab-contents is-contents-active" id="category-tab">
                        <ul>
                            <?php
                            $category_order = ["許可保育所", "小規模保育所", "小規模保育事業 A型"];
                            $category_terms = [];
                            foreach ($category_order as $name) {
                                $term = get_term_by('name', $name, 'category');
                                if ($term) {
                                    $category_terms[] = $term;
                                }
                            }

                            if (!empty($category_terms)) {
                                foreach ($category_terms as $term) {
                                    echo '<li><a href="#" class="category-filter" data-filter="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</a></li>';
                                }
                            } else {
                                echo '<li>カテゴリーが見つかりません。</li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- 都道府県カテゴリー -->
                    <div class="tab-contents" id="prefecture-tab" style="display: none;">
                        <ul>
                            <?php
                            $prefecture_terms = get_terms([
                                'taxonomy'   => 'prefecture',
                                'hide_empty' => false,
                                'parent'     => 0,
                            ]);
                            $sorted_prefectures = sort_prefectures_by_region($prefecture_terms);

                            foreach ($sorted_prefectures as $term) {
                                $slug = sanitize_title($term->name);
                                echo '<li><a href="#" class="prefecture-filter" data-filter="' . esc_attr($slug) . '">' . esc_html($term->name) . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $selected_prefecture = isset($_GET['prefecture']) ? rawurldecode(sanitize_text_field($_GET['prefecture'])) : '';

            // WP_Query の条件
            $args = [
                'post_type'      => 'introduction',
                'posts_per_page' => 9,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'paged'          => $paged,
            ];

            if (!empty($selected_prefecture)) {
                $args['tax_query'] = [[
                    'taxonomy' => 'prefecture',
                    'field'    => 'name',
                    'terms'    => $selected_prefecture,
                ]];
            }

            $introduction_query = new WP_Query($args);

            if ($introduction_query->have_posts()) :
                while ($introduction_query->have_posts()) : $introduction_query->the_post();
                    $prefecture_terms = get_the_terms(get_the_ID(), 'prefecture');
                    $prefecture_name = (!empty($prefecture_terms) && !is_wp_error($prefecture_terms)) ? esc_html($prefecture_terms[0]->name) : '都道府県不明';
                    $prefecture_slug = (!empty($prefecture_terms) && !is_wp_error($prefecture_terms)) ? sanitize_title($prefecture_terms[0]->slug) : '';

                    $categories = get_the_terms(get_the_ID(), 'category');
                    $category_name = (!empty($categories) && !is_wp_error($categories)) ? esc_html($categories[0]->name) : '未分類';
                    $category_slug = (!empty($categories) && !is_wp_error($categories)) ? sanitize_title($categories[0]->slug) : 'default';
            ?>

                    <a href="<?php the_permalink(); ?>" class="introduction-thumbnail <?php echo esc_attr($prefecture_slug . ' ' . $category_slug); ?>">
                        <?php
                        $thumbnail = get_field('thumbnail_image');
                        $default_image = get_template_directory_uri() . '/assets/images/kidsland_image/design-parts/no-image.webp';
                        ?>
                        <img class="thumbnail__inner--image" src="<?php echo esc_url($thumbnail ? wp_get_attachment_image_url($thumbnail, 'full') : $default_image); ?>" alt="<?php the_title(); ?>" class="nursery-thumbnail">
                        <span class="news-header__flex--category"> <?php echo $category_name; ?> </span>
                        <p class="nursery-prefecture"> <?php echo $prefecture_name; ?> </p>
                        <h2 class="nursery-name"> <?php the_title(); ?> </h2>
                    </a>

            <?php endwhile; ?>

                <div class="pagination">
                    <div class="pagination__inner">
                        <?php
                        echo paginate_links([
                            'total'   => $introduction_query->max_num_pages,
                            'current' => $paged,
                            'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                            'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                            'format'    => '/page/%#%/',
                            'base'      => home_url('/introduction/page/%#%/'),
                        ]);
                        ?>
                    </div>
                </div>

            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>

    <!-- recruitセクション -->
    <?php get_template_part('template-parts/recruit'); ?>
</main>

<!-- ---footer読み込み --->
<?php get_template_part('template-parts/footer'); ?>
