<?php
    //Template Name: Footer-cart
?>
<footer class="footer">
        <div class="footer-wrapper">
            <div class="footer-wrapper_social">
                <?php if( have_rows('social-networks', 'option') ): ?>
                        <?php while( have_rows('social-networks', 'option') ): the_row(); ?>
                            <a href="<?php the_sub_field('link'); ?>">
                                <?php echo getSocialIcon()[ get_sub_field("social-icon")]; ?>
                            </a>
                        <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <p class="footer-wrapper_text"><?php the_field('footer-text', 'option'); ?></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    </body>
</html>