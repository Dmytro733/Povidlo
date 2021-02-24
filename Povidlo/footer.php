<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * 
 * @package Povidli
 */

    $comments_post = new WP_Query( [ 
        'post_type' => 'comments',
    ]);

?>
<footer class="footer">
        <?php if( $comments_post->have_posts() ): ?> 
            <div class="comments">
                <div class="comments_items">
                    <?php while ( $comments_post->have_posts() ) : $comments_post->the_post(); ?>
                        <div class="comment_item">
                            <div class="comment_img" style="background-image: url('<?php the_field("comment-img-user") ?>');"></div>
                            <div class="comment_info">
                                <span class="comment_name"><?php the_field("name-user") ?></span>
                                <div class="rate">
                                    <span class="rate_user"><?php the_field("comment-user-rate") ?></span>
                                    <span>/</span>
                                    <span>5</span>
                                </div>
                                <p class="text"><?php the_field("comment-user-text") ?></p>
                            </div>
                        </div>
                    <?php  endwhile;?>    
                </div>
            </div>
        <?php endif;?>
        
        <div class="company-info" id="company-info">
            <div class="company-info_wrapper">
                <div class="company-info_inner">
                    <div class="company-info_top row">
                        
                        <div class="left-top">
                            <span class="work-time_title">Ми відкриті</span>
                            <?php if( have_rows('work-schedule', 'option') ): ?>
                                <ul class="work-time">
                                    <?php while( have_rows('work-schedule', 'option') ): the_row(); ?>
                                        <li class="work-time_item"><span class="item-days"><?php the_sub_field('work-day'); ?></span><span class="item-hours"><?php echo get_sub_field('open-time'). " - " .get_sub_field('close-time'); ?></span></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        
                        <div class="right-top">
                            <span class="contact_title">Контакти</span>
                            <?php if( have_rows('contacts', 'option') ): ?>
                                <ul class="contact">
                                    <?php while( have_rows('contacts', 'option') ): the_row(); ?>
                                        <li><?php the_sub_field('contact-number'); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                            <form class="contact_form">
                                <textarea name="message" placeholder="*Твоє повідомлення"></textarea>
                                <input class="btn input-name" type="text" placeholder="*Ім'я">
                                <input class="btn input-phone" type="text" placeholder="*+380 -- -- -- ---">
                                <button class="btn go-to-cart btn-green booking-submit">Ндіслати</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="company-info_bottom row">
                    <div class="left-bottom">
                        <div class="location">
                            <span class="location_text-city">Івано-Франківськ</span>
                            <span class="location_text-street">вулиця Юліана Целевича, 34</span>
                        </div>
                    </div>
                    <div class="right-bottom">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2620.515985292118!2d24.702074515905228!3d48.94366010265256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4730c1abe6ad3ff9%3A0xca9f7c79f557c12!2z0YPQuy4g0K7Qu9C40LDQvdCwINCm0LXQu9C10LLQuNGH0LAsIDM0LCDQmNCy0LDQvdC-LdCk0YDQsNC90LrQvtCy0YHQuiwg0JjQstCw0L3Qvi3QpNGA0LDQvdC60L7QstGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCA3NjAwMA!5e0!3m2!1sru!2sua!4v1612437460496!5m2!1sru!2sua" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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