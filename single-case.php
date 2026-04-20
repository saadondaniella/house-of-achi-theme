<?php

declare(strict_types=1);

get_header();
?>

<main class="case-single-main" id="top">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <?php
            $case_description = get_field('case_description');
            $case_city = get_field('case_city');

            $case_detail_media_type = get_field('case_detail_media_type');
            $case_detail_image = get_field('case_detail_image');
            $case_detail_video = get_field('case_detail_video');
            ?>

            <article class="case-single">
                <div class="case-single-inner">
                    <div class="case-back-link-wrap">
                        <a href="<?php echo esc_url(home_url('/#cases')); ?>" class="case-back-link">
                            BACK TO CASES
                        </a>
                    </div>

                    <header class="case-single-header">
                        <h1 class="case-single-title"><?php the_title(); ?></h1>

                        <?php if (!empty($case_description)) : ?>
                            <p class="case-single-description">
                                <?php echo esc_html($case_description); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($case_city)) : ?>
                            <p class="case-single-city">
                                <?php echo esc_html($case_city); ?>
                            </p>
                        <?php endif; ?>
                    </header>

                    <section class="case-single-media">
                        <?php if ($case_detail_media_type === 'video' && !empty($case_detail_video)) : ?>
                            <video autoplay muted loop playsinline class="case-single-video">
                                <source
                                    src="<?php echo esc_url($case_detail_video['url']); ?>"
                                    type="<?php echo esc_attr($case_detail_video['mime_type']); ?>">
                            </video>
                        <?php elseif ($case_detail_media_type === 'image' && !empty($case_detail_image)) : ?>
                            <img
                                src="<?php echo esc_url($case_detail_image['url']); ?>"
                                alt="<?php echo esc_attr($case_detail_image['alt'] ?: get_the_title()); ?>"
                                class="case-single-image">
                        <?php endif; ?>
                    </section>

                    <section class="case-single-content">
                        <?php the_content(); ?>
                    </section>

                    <div class="case-back-to-top-wrap">
                        <a href="#top" class="case-back-to-top">
                            BACK TO TOP
                        </a>
                    </div>
                </div>
            </article>

        <?php endwhile; ?>
    <?php endif; ?>
</main>