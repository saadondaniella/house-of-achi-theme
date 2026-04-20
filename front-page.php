<?php get_header(); ?>

<?php
$navItems = [
    ['href' => home_url('/about-achi/#who'), 'label' => 'WHO IS ACHI'],
    ['href' => home_url('/about-achi/#way'), 'label' => 'THE ACHI WAY'],
    ['href' => home_url('/about-achi/#talk'), 'label' => 'LET’S TALK'],
    ['href' => home_url('/#cases'), 'label' => 'CASES'],
];
?>

<nav class="hero-nav" aria-label="Sektioner" data-nav>
    <div class="hero-nav-inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="hero-nav-logo" aria-label="Go to homepage">
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/images/logo-white.png'); ?>"
                alt="House of Achi logo"
                data-logo-white="<?php echo esc_url(get_template_directory_uri() . '/images/logo-white.png'); ?>"
                data-logo-dark="<?php echo esc_url(get_template_directory_uri() . '/images/achi-logo.png'); ?>">
        </a>

        <div class="hero-links">
            <?php foreach ($navItems as $item) : ?>
                <a href="<?php echo esc_url($item['href']); ?>">
                    <?php echo esc_html($item['label']); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <button
            class="nav-burger"
            type="button"
            aria-label="Open menu"
            aria-expanded="false"
            aria-controls="mobile-menu"
            data-burger>
            <span></span>
            <span></span>
        </button>
    </div>

    <div class="nav-mobile" id="mobile-menu" data-mobile-menu>
        <div class="nav-mobile-inner">
            <?php foreach ($navItems as $item) : ?>
                <a href="<?php echo esc_url($item['href']); ?>">
                    <?php echo esc_html($item['label']); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</nav>

<main>
    <section class="hero">
        <?php
        $media_type = get_field('hero_media_type');
        $video = get_field('hero_video');
        $image = get_field('hero_image');
        ?>

        <div class="hero-media">
            <?php if ($media_type === 'video' && !empty($video)) : ?>
                <video autoplay muted loop playsinline>
                    <source src="<?php echo esc_url($video['url']); ?>" type="video/mp4">
                </video>
            <?php elseif ($media_type === 'image' && !empty($image)) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="Hero image">
            <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/hero-test.jpg'); ?>" alt="Hero fallback">
            <?php endif; ?>
        </div>

        <div class="hero-overlay">
            <h1 class="hero-title">ACHI</h1>
            <p class="hero-subtitle">INTIMATE CONCEPT BRAND EXPERIENCES</p>
        </div>
    </section>

    <div class="hero-after-text">
        <p>HOUSE OF ACHI creates intimate, captivating brand experiences where aesthetics meet intention.<br>
            We translate identity into atmosphere — shaping moments that are felt, remembered, and shared.<br>
            Rooted in strategy and driven by emotion, each concept is carefully curated to elevate brands <br> beyond the expected.</p>
    </div>

    <section id="cases" class="section section-cases">
        <div class="section-inner">
            <div class="cases-content">
                <h2 class="cases-title">Cases</h2>
            </div>

            <?php
            $cases_query = new WP_Query([
                'post_type' => 'case',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ]);
            ?>

            <?php if ($cases_query->have_posts()) : ?>
                <div class="cases-list">
                    <?php while ($cases_query->have_posts()) : $cases_query->the_post(); ?>
                        <?php
                        $case_preview_media_type = get_field('case_preview_media_type');
                        $case_preview_image = get_field('case_preview_image');
                        $case_preview_video = get_field('case_preview_video');
                        ?>

                        <a href="<?php the_permalink(); ?>" class="case-item">
                            <div class="case-item-media">
                                <?php if ($case_preview_media_type === 'video' && !empty($case_preview_video)) : ?>
                                    <video autoplay muted loop playsinline>
                                        <source
                                            src="<?php echo esc_url($case_preview_video['url']); ?>"
                                            type="<?php echo esc_attr($case_preview_video['mime_type']); ?>">
                                    </video>
                                <?php elseif ($case_preview_media_type === 'image' && !empty($case_preview_image)) : ?>
                                    <img
                                        src="<?php echo esc_url($case_preview_image['url']); ?>"
                                        alt="<?php echo esc_attr(get_the_title()); ?>">
                                <?php elseif (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php endif; ?>
                            </div>

                            <div class="case-item-overlay"></div>
                        </a>

                        <h3 class="case-item-title">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                    <?php endwhile; ?>
                </div>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>Inga cases upplagda ännu.</p>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>