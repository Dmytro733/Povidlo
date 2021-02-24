<?php
    //Template Name: Cart
?>

<?php get_header(); ?>
    <section class="list-cart">
        <div class="list">
            <div class="hide form-send">
                <span class="form-send_icon">!</span>
                <span class="form-send_text">Корзина поржня!</span>
            </div>
            <div class="terms">
                <span class="product-info_name">Назва</span>
                <span class="value">Ціна одиниці</span>
                <span class="number">Кількість</span>
                <span class="value">Загальна вартість</span>
            </div>
            <ul class="list-cart_items">                   
                <?php foreach($_SESSION['basket_array'] as $basket_item):
            
                    ?>

                
                    <li class="list-cart_item" date-id = '<?php echo $basket_item["id"] ?>'>
                        <span class="product-info_name"><?php echo $basket_item["name"] ?></span>
                        <div class="item_wrap-q">
                            <div class="price value">
                                <span>
                                    <?php echo $basket_item["price"] ?>
                                </span>|
                                <span class="weight">
                                    <?php echo $basket_item["weight"] ?>
                                </span>
                            </div>
                            <div class="quantity__holder number">
                                <div class="holder__button-plus btn">
                                    +
                                </div>
                                <div class="holder__content">
                                    <span><?php echo $basket_item["amount"] ?></span>
                                    <span>шт.</span>
                                </div>
                                <div class="holder__button-minus btn">
                                    -
                                </div>
                            </div>
                        </div>
                        <div class="item_wrap-p">
                            <div class="price value">
                                <span>
                                    <?php echo $basket_item["price"] ?>грн
                                </span>
                            </div>
                            <button class="delete" data-id='<?php echo $basket_item["id"] ?>'>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                    <path d="M15.9478 9.05753C15.6244 9.05753 15.3623 9.31963 15.3623 9.64301V20.7086C15.3623 21.0317 15.6244 21.2941 15.9478 21.2941C16.2712 21.2941 16.5333 21.0317 16.5333 20.7086V9.64301C16.5333 9.31963 16.2712 9.05753 15.9478 9.05753Z" fill="black"/>
                                    <path d="M9.03958 9.05753C8.7162 9.05753 8.4541 9.31963 8.4541 9.64301V20.7086C8.4541 21.0317 8.7162 21.2941 9.03958 21.2941C9.36297 21.2941 9.62506 21.0317 9.62506 20.7086V9.64301C9.62506 9.31963 9.36297 9.05753 9.03958 9.05753Z" fill="black"/>
                                    <path d="M4.00465 7.44267V21.8676C4.00465 22.7202 4.31729 23.5209 4.86343 24.0954C5.40705 24.6715 6.1636 24.9985 6.95537 24.9999H18.0328C18.8248 24.9985 19.5813 24.6715 20.1247 24.0954C20.6709 23.5209 20.9835 22.7202 20.9835 21.8676V7.44267C22.0692 7.1545 22.7727 6.10567 22.6274 4.99167C22.482 3.87789 21.5331 3.04472 20.4097 3.04449H17.4121V2.31265C17.4155 1.69721 17.1722 1.10624 16.7365 0.671478C16.3008 0.236944 15.709 -0.00502319 15.0935 8.26246e-06H9.89465C9.27922 -0.00502319 8.68733 0.236944 8.25166 0.671478C7.81598 1.10624 7.57264 1.69721 7.57607 2.31265V3.04449H4.57847C3.45508 3.04472 2.50619 3.87789 2.36074 4.99167C2.21551 6.10567 2.919 7.1545 4.00465 7.44267ZM18.0328 23.829H6.95537C5.95434 23.829 5.17561 22.969 5.17561 21.8676V7.49413H19.8126V21.8676C19.8126 22.969 19.0338 23.829 18.0328 23.829ZM8.74703 2.31265C8.74314 2.00779 8.86298 1.71436 9.07933 1.49915C9.29545 1.28394 9.58956 1.1657 9.89465 1.17096H15.0935C15.3986 1.1657 15.6927 1.28394 15.9088 1.49915C16.1252 1.71413 16.245 2.00779 16.2411 2.31265V3.04449H8.74703V2.31265ZM4.57847 4.21545H20.4097C20.9918 4.21545 21.4636 4.68726 21.4636 5.26931C21.4636 5.85136 20.9918 6.32317 20.4097 6.32317H4.57847C3.99642 6.32317 3.5246 5.85136 3.5246 5.26931C3.5246 4.68726 3.99642 4.21545 4.57847 4.21545Z" fill="black"/>
                                    <path d="M12.4937 9.05753C12.1703 9.05753 11.9082 9.31963 11.9082 9.64301V20.7086C11.9082 21.0317 12.1703 21.2941 12.4937 21.2941C12.8171 21.2941 13.0792 21.0317 13.0792 20.7086V9.64301C13.0792 9.31963 12.8171 9.05753 12.4937 9.05753Z" fill="black"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0">
                                    <rect width="25" height="25" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                            </button>
                        </div>
                    
                    </li>
                <?php endforeach ?>
            </ul>
            <div class="all-price">
                <span>Всього на суму : <span>171грн.</span></span>
            </div>
        </div>
    </section>
    <section class="deliveryLocation">
        <div class="deliveryLocation_inner">
            <span class="title">Введіть дані для доставки</span>
            <form class="deliveryLocation_form">
                <input class="btn input-name" type="text" size="15"  maxlength="15" placeholder="Ім'я">
                <input class="btn input-phone" type="tel" maxlength="17" autocomplete="off" placeholder="+380 -- -- -- ---">
                <input class="btn input-street" type="text" size="15"  placeholder="Вулиця">
                <input class="btn input-house" type="text" maxlength="12"  autocomplete="off" placeholder="Будинок  ---">
                <input class="btn input-apartment" type="text" maxlength="13" autocomplete="off" placeholder="Квартира  ---">
                <input class="btn input-comentar" type="text" size="35" placeholder="Коментар до замовлення">
                
                <div class="pay">
                    <span>
                        <input type="radio" name="pay" id="cach" checked>
                        <label for="cach">Готівка</label>
                    </span>
                    <span>
                        <input type="radio" name="pay" id="card">
                        <label for="card">Картою Online</label>
                    </span>
                    <input type="submit" value="ПІДТВЕРДИТИ  ЗАМОВЛЕННЯ" class="btn go-to-cart btn-green deliveryLocation-submit"><i class="hide form-sent_icon-btn"><svg width="24" height="17" viewBox="0 0 24 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 7.58537L8.625 16L24 1" stroke="black"/>
                        </svg></i>
                </div>
                
            </form>
            <div class="hide error">
                <span class="error_icon">!</span>
                <span class="error_text">Нажаль Вашу заявку не прийнято. Коректно введіть ім'я (до 50 символів) та номер телефону</span>
            </div>
            <div class="hide form-sent">
                <span class="form-sent_icon">!</span>
                <span class="form-sent_text">В найблищий час з вами зав’яжеться наш менеджер для підтвердження резервації</span>
            </div>
        </div>
    </section>   
    <?php
    if ( is_home() ) :
      get_footer();
    else :
      get_footer('cart');
    endif;
    ?>