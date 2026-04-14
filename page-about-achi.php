<?php
get_header();

$page_id = get_queried_object_id();

$nav_items = [
    [
        'href' => home_url('/about-achi/#who'),
        'label' => 'WHO IS ACHI',
    ],
    [
        'href' => home_url('/about-achi/#way'),
        'label' => 'THE ACHI WAY',
    ],
    [
        'href' => home_url('/about-achi/#talk'),
        'label' => 'LET’S TALK',
    ],
    [
        'href' => home_url('/#cases'),
        'label' => 'CASES',
    ],
];

$who_title = get_field('who_title', $page_id);
$who_text = get_field('who_text', $page_id);

$way_title = get_field('way_title', $page_id);
$way_value_title = get_field('way_value_title', $page_id);
$way_value_text = get_field('way_value_text', $page_id);

$contact_title = get_field('contact_title', $page_id);
$contact_text = get_field('contact_text', $page_id);
$contact_email = get_field('contact_email', $page_id);

$way_items = [
    get_field('way_item_1', $page_id),
    get_field('way_item_2', $page_id),
    get_field('way_item_3', $page_id),
    get_field('way_item_4', $page_id),
    get_field('way_item_5', $page_id),
    get_field('way_item_6', $page_id),
];
?>

<nav class="hero-nav hero-nav-dark" aria-label="Sections" data-nav>
    <div class="hero-nav-inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="hero-nav-logo" aria-label="Go to homepage">
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/images/achi-logo.png'); ?>"
                alt="House of Achi logo">
        </a>

        <div class="hero-links">
            <?php foreach ($nav_items as $item) : ?>
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
            <?php foreach ($nav_items as $item) : ?>
                <a href="<?php echo esc_url($item['href']); ?>">
                    <?php echo esc_html($item['label']); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</nav>

<main class="page-main about-main">
    <section id="who" class="section section-who">
        <div class="section-inner">
            <div class="who-content">
                <?php if (!empty($who_title)) : ?>
                    <h1 class="who-title"><?php echo esc_html($who_title); ?></h1>
                <?php endif; ?>

                <?php if (!empty($who_text)) : ?>
                    <div class="who-text">
                        <?php echo wp_kses_post($who_text); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="way" class="section section-way">
        <div class="section-inner">
            <div class="way-content">
                <?php if (!empty($way_title)) : ?>
                    <h2 class="way-title"><?php echo esc_html($way_title); ?></h2>
                <?php endif; ?>

                <?php
                $has_way_items = false;

                foreach ($way_items as $item) {
                    if (!empty($item)) {
                        $has_way_items = true;
                        break;
                    }
                }
                ?>

                <?php if ($has_way_items) : ?>
                    <ul class="way-list">
                        <?php foreach ($way_items as $item) : ?>
                            <?php if (!empty($item)) : ?>
                                <li><?php echo esc_html($item); ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (!empty($way_value_title) || !empty($way_value_text)) : ?>
                    <div class="way-value">
                        <?php if (!empty($way_value_title)) : ?>
                            <h3><?php echo esc_html($way_value_title); ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($way_value_text)) : ?>
                            <p><?php echo esc_html($way_value_text); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="talk" class="section section-talk">
        <div class="section-inner">
            <div class="who-content">
                <?php if (!empty($contact_title)) : ?>
                    <h2 class="contact-title"><?php echo esc_html($contact_title); ?></h2>
                <?php endif; ?>

                <?php if (!empty($contact_text)) : ?>
                    <div class="who-text">
                        <?php echo wp_kses_post($contact_text); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($contact_email)) : ?>
                    <p>
                        <a href="mailto:<?php echo esc_attr($contact_email); ?>">
                            <?php echo esc_html($contact_email); ?>
                        </a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>