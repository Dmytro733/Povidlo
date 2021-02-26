$(document).ready(function(){
    var burgerIcon = $('.burger'),
        listMenu = $('.header_menu-items'),
        cart = $('.cart'),
        cartMenu = $('.cart-in-menu');
        
    burgerIcon.click(() =>{
        listMenu.toggleClass('burger-active');
        cart.toggleClass('opacity-style');
        cartMenu.toggleClass('hide');
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
            amount = $(this).offsetParent('.product').attr('date-amount');
        $.post(urlAdminAjax, {
            action: "add_to_basket",
            id: dishId,
            amount: amount
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

    $('.holder__button-plus').click(function(){
        let amount = $(this).offsetParent('.product').attr('date-amount'),
            pars_amount = parseInt(amount);
            pars_amount++;
        $(this).offsetParent('.product').attr('date-amount', pars_amount);
        let render_amount = $(this).offsetParent('.product').attr('date-amount');
        $(this).next().children('.amount').text(render_amount);
        // console.log($(this));
        $(this).next().next().on('click');
    });

    // console.log($('.holder__button-plus'));

    /*
    * reduce_amount_product
    */
    
    $('.holder__button-minus').click(function(){
        let amount = $(this).offsetParent('.product').attr('date-amount'),
            pars_amount = parseInt(amount);
            pars_amount--;
        $(this).offsetParent('.product').attr('date-amount', pars_amount);
        let render_amount = $(this).offsetParent('.product').attr('date-amount');
        
        if(render_amount == 1){
            $(this).off();
        }
        $(this).prev().children('.amount').text(render_amount);
    });

    

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
    






