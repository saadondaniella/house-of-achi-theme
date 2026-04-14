<?php
$year = date("Y");
$INSTAGRAM_URL = "https://www.instagram.com/house.of.achi/";
$EMAIL = "hello@houseofachi.com";
$PHONE = "+46 70 000 00 00";
?>

<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-topline" aria-hidden="true"></div>

        <div class="footer-grid">
            <div class="footer-brand">
                <a href="<?php echo home_url('/'); ?>" class="footer-logo" aria-label="House of Achi">
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/images/achi-logo.png"
                        alt="House of Achi logo"
                        loading="lazy" />
                </a>
            </div>

            <div class="footer-col">
                <h3 class="footer-heading">Follow us</h3>
                <div class="footer-icons">
                    <a
                        class="footer-icon"
                        href="<?php echo $INSTAGRAM_URL; ?>"
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

                <a class="footer-link" href="mailto:<?php echo $EMAIL; ?>">
                    <img
                        class="footer-linkicon"
                        src="<?php echo get_template_directory_uri(); ?>/images/icon-mail.png"
                        alt=""
                        aria-hidden="true"
                        loading="lazy" />
                    <?php echo $EMAIL; ?>
                </a>

                <a class="footer-link" href="tel:<?php echo str_replace(' ', '', $PHONE); ?>">
                    <img
                        class="footer-linkicon"
                        src="<?php echo get_template_directory_uri(); ?>/images/icon-chat.png"
                        alt=""
                        aria-hidden="true"
                        loading="lazy" />
                    <?php echo $PHONE; ?>
                </a>
            </div>
        </div>


    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>