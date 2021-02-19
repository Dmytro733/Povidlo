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
                <a href="#">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.3302 0.615234H4.64932C2.07815 0.615578 0.61512 2.07883 0.615234 4.65024V15.3311C0.615578 17.9023 2.07883 19.3653 4.65024 19.3652H10.6311V12.1143H8.1958V9.27612H10.6311V7.18746C10.6311 4.76532 12.1098 3.44696 14.2704 3.44696C15.3053 3.44696 16.1946 3.52409 16.4539 3.55854V6.09009H14.964C13.7884 6.09009 13.5608 6.64867 13.5608 7.46853V9.27612H16.3715L16.0052 12.1143H13.5608V19.3652H15.3302C17.9017 19.3653 19.3651 17.9022 19.3652 15.3307V4.64932C19.365 2.07815 17.9016 0.61512 15.3302 0.615234Z" fill="#fff"/>
                    </svg>
                </a>
                <a href="#">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                        <path d="M19.9804 5.88005C19.9336 4.81738 19.7617 4.0868 19.5156 3.45374C19.2616 2.78176 18.8709 2.18014 18.359 1.68002C17.8589 1.1721 17.2533 0.777435 16.5891 0.527447C15.9524 0.281274 15.2256 0.109427 14.163 0.0625732C13.0923 0.0117516 12.7525 0 10.0371 0C7.32173 0 6.98185 0.0117516 5.9152 0.0586052C4.85253 0.105459 4.12195 0.277459 3.48904 0.523479C2.81692 0.777435 2.2153 1.16814 1.71517 1.68002C1.20726 2.18014 0.812743 2.78573 0.562602 3.44992C0.31643 4.0868 0.144583 4.81341 0.0977294 5.87609C0.0469078 6.9467 0.0351562 7.28658 0.0351562 10.002C0.0351562 12.7173 0.0469078 13.0572 0.0937614 14.1239C0.140615 15.1865 0.312615 15.9171 0.558787 16.5502C0.812743 17.2221 1.20726 17.8238 1.71517 18.3239C2.2153 18.8318 2.82088 19.2265 3.48508 19.4765C4.12195 19.7226 4.84856 19.8945 5.91139 19.9413C6.97788 19.9883 7.31791 19.9999 10.0333 19.9999C12.7487 19.9999 13.0885 19.9883 14.1552 19.9413C15.2179 19.8945 15.9484 19.7226 16.5813 19.4765C17.9254 18.9568 18.9881 17.8941 19.5078 16.5502C19.7538 15.9133 19.9258 15.1865 19.9727 14.1239C20.0195 13.0572 20.0313 12.7173 20.0313 10.002C20.0313 7.28658 20.0273 6.9467 19.9804 5.88005ZM18.1794 14.0457C18.1364 15.0225 17.9723 15.5499 17.8356 15.9015C17.4995 16.7728 16.808 17.4643 15.9367 17.8004C15.5851 17.9372 15.0538 18.1012 14.0809 18.1441C13.026 18.1911 12.7096 18.2027 10.0411 18.2027C7.37255 18.2027 7.05221 18.1911 6.00113 18.1441C5.02438 18.1012 4.49693 17.9372 4.1453 17.8004C3.71171 17.6402 3.31704 17.3862 2.9967 17.0541C2.6646 16.7298 2.41065 16.3391 2.2504 15.9055C2.11365 15.5539 1.94959 15.0225 1.90671 14.0497C1.8597 12.9948 1.8481 12.6783 1.8481 10.0097C1.8481 7.34122 1.8597 7.02087 1.90671 5.96995C1.94959 4.99319 2.11365 4.46575 2.2504 4.11412C2.41065 3.68038 2.6646 3.28586 3.00067 2.96536C3.32483 2.63327 3.71553 2.37931 4.14927 2.21921C4.5009 2.08247 5.03231 1.9184 6.0051 1.87537C7.05999 1.82851 7.37652 1.81676 10.0449 1.81676C12.7174 1.81676 13.0337 1.82851 14.0848 1.87537C15.0616 1.9184 15.589 2.08247 15.9406 2.21921C16.3742 2.37931 16.7689 2.63327 17.0893 2.96536C17.4213 3.28967 17.6753 3.68038 17.8356 4.11412C17.9723 4.46575 18.1364 4.99701 18.1794 5.96995C18.2262 7.02484 18.238 7.34122 18.238 10.0097C18.238 12.6783 18.2262 12.9908 18.1794 14.0457Z" fill="#fff"/>
                        <path d="M10.0362 4.86426C7.19976 4.86426 4.89844 7.16543 4.89844 10.002C4.89844 12.8385 7.19976 15.1397 10.0362 15.1397C12.8727 15.1397 15.1739 12.8385 15.1739 10.002C15.1739 7.16543 12.8727 4.86426 10.0362 4.86426ZM10.0362 13.3347C8.19605 13.3347 6.70345 11.8423 6.70345 10.002C6.70345 8.16172 8.19605 6.66927 10.0362 6.66927C11.8764 6.66927 13.3689 8.16172 13.3689 10.002C13.3689 11.8423 11.8764 13.3347 10.0362 13.3347Z" fill="#fff"/>
                        <path d="M16.5767 4.6611C16.5767 5.32346 16.0397 5.86052 15.3772 5.86052C14.7148 5.86052 14.1777 5.32346 14.1777 4.6611C14.1777 3.99858 14.7148 3.46167 15.3772 3.46167C16.0397 3.46167 16.5767 3.99858 16.5767 4.6611Z" fill="#fff"/>
                        </g>
                        <defs>
                        <clipPath id="clip0">
                        <rect width="20" height="20" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
            <p class="footer-wrapper_text">Вже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює композицію сторінки. Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення літер на відміну від, наприклад</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    </body>
</html>