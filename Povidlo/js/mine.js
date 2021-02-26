$(document).ready(function(){
    var burgerIcon = $('.burger'),
        listMenu = $('.header_menu-items'),
        cart = $('.cart'),
        cartMenu = $('.cart-in-menu'),
        allTotalPrice = $('.all_total_price');
        
    burgerIcon.click(() =>{
        listMenu.toggleClass('burger-active');
        cart.toggleClass('opacity-style');
        cartMenu.toggleClass('hide');
    })

    $(document).on('click', '.delete', function(){
        let dishId = $(this).attr('data-id');
        $.post(urlAdminAjax, {
            action: "delete_from_basket",
            id: dishId,
        },function(data) {
            let basket = JSON.parse(data);
            renderBasket(basket, basketListItems);
        })
    })

    $('.prices_menu-items .item').click(function(){
        let foodAtr = $(this).attr('data-type-of-food');
        $('.prices_wrapper').addClass('hide');
        $(`.prices_wrapper[data-type-of-food = ${foodAtr}]`).removeClass('hide');
    });

    $('.prices_footer .footer-pagination_next').click(function(){
        let foodAtr = $(this).attr('date-page');
        $('.prices_products').addClass('hide');
        $(`.prices_products[date-page = ${foodAtr}]`).removeClass('hide');
    });

    $('.prices_footer .footer-pagination_prev').click(function(){
        let foodAtr = $(this).attr('date-page');
        $('.prices_products').addClass('hide');
        $(`.prices_products[date-page = ${foodAtr}]`).removeClass('hide');
    });

    $('.slider_menu-items .item').click(function(){
        let imgAtr = $(this).attr('data-type-img');
        $('.wrap').addClass('hide');
        $(`.wrap[data-type-img = ${imgAtr}]`).removeClass('hide');

    });

    $('.cart').click(function(){
        location.href = "корзина";
    })

    $('.go-to-cart').click(function(){
        location.href = "корзина";
    })
    
    /*
    * add_to_basket_action
    */ 

    $('.add-product').click(function(){
        let dishId = $(this).offsetParent('.product').attr('date-id'),
            amount = $(this).offsetParent('.product').attr('date-amount'),
            total_price = $(this).offsetParent('.product').attr('date-total-price');
            console.log(total_price)
        $.post(urlAdminAjax, {
            action: "add_to_basket",
            id: dishId,
            amount: amount,
            totalPrice: total_price
        },function(data) {
            let basket = JSON.parse(data);
            renderBasketAmount(basket);
        })
    });

    function renderBasketAmount(basket){
        let total_amount = 0; 
        basket.forEach(function(item){
            let pars_amount = parseInt(item.amount);
            total_amount += pars_amount;
            return total_amount;
        });
        $('.cart-number').text(total_amount);
        $('.product').attr('date-amount', 1);
        $('.cart-number').removeClass('hide');
    };

    /*
    * add_amount_product
    */

    // $('.holder__button-plus').click(function(){
    //     if($(this).parent().parent().parent().hasClass("cart")){
    //         let price = parseInt($(this).parent().prev().children('.price').text());
    //         let amount = $(this).parent().parent().parent('.product').attr('date-amount'),
    //             pars_amount = parseInt(amount);
    //             pars_amount++;
    //         $(this).parent().parent().parent('.product').attr('date-amount', pars_amount);
    //         let render_amount = $(this).parent().parent().parent('.product').attr('date-amount');
    //         $(this).next().children('.amount').text(render_amount);

    //         let totalPrice = total_price(price ,render_amount);

    //         $(this).parent().parent().next().children().children('.total_price').text(totalPrice);

    //         // allTotalPrice.text(all_total_price(totalPrice));
            
    //     }else{
    //         let price = parseInt($(this).parent().parent().prev().prev().children(0).text());
    //         let amount = $(this).offsetParent('.product').attr('date-amount'),
    //             pars_amount = parseInt(amount);
    //             pars_amount++;
    //         $(this).offsetParent('.product').attr('date-amount', pars_amount);
    //         let render_amount = $(this).offsetParent('.product').attr('date-amount');
    //         $(this).next().children('.amount').text(render_amount);
    //         $(this).next().next().on('click');

    //         let totalPrice = total_price(price ,render_amount);
            
    //         $(this).offsetParent('.product').attr('date-total-price', totalPrice);
    //     }
    // });

    // console.log($('.holder__button-plus'));

    /*
    * reduce_amount_product
    */
    
    $('.holder__button-minus').click(function(){
        if($(this).parent().parent().parent().hasClass("cart")){
            let price = parseInt($(this).parent().prev().children('.price').text());

            let amount = $(this).parent().parent().parent('.product').attr('date-amount'),
                pars_amount = parseInt(amount);
                pars_amount--;
            $(this).parent().parent().parent('.product').attr('date-amount', pars_amount);

            let render_amount = $(this).parent().parent().parent('.product').attr('date-amount');
            
            if(render_amount == 1){
                $(this).off();
            }

            $(this).prev().children('.amount').text(render_amount);

            let totalPrice = total_price(price ,render_amount);
            $(this).offsetParent('.product').attr('date-total-price', totalPrice);

            // $(this).parent().parent().next().children().children('.total_price').text(totalPrice);

            // allTotalPrice.text(all_total_price(totalPrice));
            
        }else{
            let price = parseInt($(this).parent().parent().prev().prev().children(0).text());

            let amount = $(this).offsetParent('.product').attr('date-amount'),
                pars_amount = parseInt(amount);
                pars_amount--;
            $(this).offsetParent('.product').attr('date-amount', pars_amount);
            let render_amount = $(this).offsetParent('.product').attr('date-amount');
            
            if(render_amount == 1){
                $(this).off();
            }
            $(this).prev().children('.amount').text(render_amount);

            let totalPrice = total_price(price ,render_amount);

            $(this).offsetParent('.product').attr('date-total-price', totalPrice);
        }
        
    });

    function total_price(amount, price){
        return amount * price;
    }


    productShow();
    slickGallery();
    slickNovelty();
    slickShare();
    slickComments();
    priceShow();
    sliderShow();
    showLogoScrollBottom()
});



function showLogoScrollBottom(){
    let headerMenu = $('.header_menu');
    let logoShow = $('.header_scroll-logo');

    $(document).scroll(function() {
        let scroll =  $(window).scrollTop();
        if(scroll > 50){
            headerMenu.addClass("header_scroll");
            logoShow.css({ display : "block"});
        }else{
            headerMenu.removeClass("header_scroll");
            logoShow.css({ display : "none"});
        }
        
    });
}

function productShow(){
    let foodAtr = $('.prices_products').attr('date-page');
    $('.prices_products').addClass('hide');
    $(`.prices_products[date-page = ${foodAtr}]`).removeClass('hide');
}

function priceShow(){
    let foodAtr = $('.prices_menu-items .item').attr('data-type-of-food');
    $('.prices_wrapper').addClass('hide');
    $(`.prices_wrapper[data-type-of-food = ${foodAtr}]`).removeClass('hide');
}

function sliderShow(){
    let imgAtr = $('.slider_menu-items .item').attr('data-type-img');
    $('.wrap').addClass('hide');
    $(`.wrap[data-type-img = ${imgAtr}]`).removeClass('hide');
}

function slickGallery(){
    $('.wrap').not('.slick-initialized').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        prevArrow: '<div class="arrow-left"><svg class="left" width="42" height="132" viewBox="0 0 42 132" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="42" height="132" transform="translate(42 132) rotate(180)" fill="white"/><path d="M25 74L17 66L25 58" stroke="#333333"/></svg></div>',
        nextArrow: '<div class="arrow-right"><svg class="right" width="42" height="132" viewBox="0 0 42 132" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="42" height="132" fill="white"/><path d="M17 58L25 66L17 74" stroke="#333333"/></svg></div>',
        responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: true,
                infinite: false
              }
            }
        ]
    });
}

function slickShare(){
    $('.share-items').slick({
        infinite: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="footer-pagination_prev btn btn-green"><svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.5L0.999999 8.5L9 0.5" stroke="#333333"/></svg></button>',

        nextArrow: '<button class="footer-pagination_next btn btn-green"><svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 0.5L9 8.5L1 16.5" stroke="#333333"/></svg></button>',
        responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                arrows: false
              }
            }
        ]  
    });
}

function slickComments(){
    $('.comments_items').slick({
        infinite: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="footer-pagination_prev btn btn-green"><svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.5L0.999999 8.5L9 0.5" stroke="#333333"/></svg></button>',

        nextArrow: '<button class="footer-pagination_next btn btn-green"><svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 0.5L9 8.5L1 16.5" stroke="#333333"/></svg></button>',
        responsive: [
            {
              breakpoint: 768,
              settings: {
                infinite: false,
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
    });
}

function slickNovelty(){
    $('.novelty_items').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button class="footer-pagination_prev btn btn-green"><svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.5L0.999999 8.5L9 0.5" stroke="#333333"/></svg></button>',

        nextArrow: '<button class="footer-pagination_next btn btn-green"><svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 0.5L9 8.5L1 16.5" stroke="#333333"/></svg></button>',
        responsive: [
            {
              breakpoint: 768,
              settings: {
                infinite: false,
                arrows: false
              }
            }
        ]
    });
}

function hideBlocks(){
    $('.all-price').addClass('hide');
    $('.terms').addClass('hide');
};

function showMessage(){
    $('.list-cart .form-send').removeClass('hide');
}

function renderBasket(array, basketList){
    basketList.html('');
    if(array.length){ 
        array.forEach(function(item){
            let liBasket =
            `<li class="list-cart_item" data-id='${item.id}'>
                    <span class="product-info_name">${item.name}</span>
                    <div class="item_wrap-q">
                        <div class="price value">
                            <span>
                                ${item.price}
                            </span>|
                            <span class="weight">
                                ${item.weight}
                            </span>
                        </div>
                        <div class="quantity__holder number">
                            <div class="holder__button-plus btn">
                                +
                            </div>
                            <div class="holder__content">
                                <span>${item.amount}</span>
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
                                ${item.price}грн
                            </span>
                        </div>
                        <button class="delete" data-id='${item.id}'>
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
                </li>`
            basketList.append(liBasket);
        })
    }else{
        hideBlocks();
        showMessage();
    }
}
    






