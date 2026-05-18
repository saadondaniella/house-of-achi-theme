<?php
$year = date("Y");
$INSTAGRAM_URL = "https://www.instagram.com/house.of.achi/";
$EMAIL = "hello@houseofachi.com";
?>

<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-topline" aria-hidden="true"></div>

        <div class="footer-grid">

            <div class="footer-col">
                <h3 class="footer-heading">Follow us</h3>
                <div class="footer-icons">
                    <a
                        class="footer-icon"
                        href="<?php echo esc_url($INSTAGRAM_URL); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Instagram"
                        title="Instagram">
                        <img
                            src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png"
                            alt=""
                            aria-hidden="true"
                            loading="lazy" />
                    </a>
                </div>
            </div>

            <div class="footer-col">
                <h3 class="footer-heading">Location</h3>
                <p class="footer-text">Gothenburg</p>
            </div>

            <div class="footer-col">
                <h3 class="footer-heading">Contact</h3>

                <a class="footer-link" href="mailto:<?php echo esc_attr($EMAIL); ?>">
                    <img
                        class="footer-linkicon"
                        src="<?php echo esc_url(get_template_directory_uri() . '/images/icon-mail.png'); ?>"
                        alt=""
                        aria-hidden="true"
                        loading="lazy" />
                    <?php echo esc_html($EMAIL); ?>
                </a>


            </div>
        </div>


    </div>
</footer>

<div class="lightbox" id="lightbox">
    <button class="lightbox-close" type="button">✕</button>
    <img src="" alt="">
</div>

<?php wp_footer(); ?>
</body>

</html>