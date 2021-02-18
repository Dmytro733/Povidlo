<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * 
 * @package Povidlo
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); wp_title(); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="http://kenwheeler.github.io/slick/slick/slick-theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    
</head>
<body>
    <header class="header">
        <div class="header_menu">
            <div class="burger hide">
                <span>
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.87109 7.98051C1.28795 7.98051 0 9.24111 0 10.7906C0 12.3402 1.28795 13.6008 2.87109 13.6008C4.45424 13.6008 5.74219 12.3402 5.74219 10.7906C5.74219 9.24111 4.45424 7.98051 2.87109 7.98051ZM2.87109 11.995C2.19259 11.995 1.64062 11.4547 1.64062 10.7906C1.64062 10.1265 2.19259 9.5863 2.87109 9.5863C3.5496 9.5863 4.10156 10.1265 4.10156 10.7906C4.10156 11.4547 3.5496 11.995 2.87109 11.995Z" fill="#333333" fill-opacity="0.2"/>
                        <path d="M10.8711 7.98051C9.28795 7.98051 8 9.24111 8 10.7906C8 12.3402 9.28795 13.6008 10.8711 13.6008C12.4542 13.6008 13.7422 12.3402 13.7422 10.7906C13.7422 9.24111 12.4542 7.98051 10.8711 7.98051ZM10.8711 11.995C10.1926 11.995 9.64062 11.4547 9.64062 10.7906C9.64062 10.1265 10.1926 9.5863 10.8711 9.5863C11.5496 9.5863 12.1016 10.1265 12.1016 10.7906C12.1016 11.4547 11.5496 11.995 10.8711 11.995Z" fill="#333333"/>
                        <path d="M18.8711 7.98051C17.2879 7.98051 16 9.24111 16 10.7906C16 12.3402 17.2879 13.6008 18.8711 13.6008C20.4542 13.6008 21.7422 12.3402 21.7422 10.7906C21.7422 9.24111 20.4542 7.98051 18.8711 7.98051ZM18.8711 11.995C18.1926 11.995 17.6406 11.4547 17.6406 10.7906C17.6406 10.1265 18.1926 9.5863 18.8711 9.5863C19.5496 9.5863 20.1016 10.1265 20.1016 10.7906C20.1016 11.4547 19.5496 11.995 18.8711 11.995Z" fill="#333333" fill-opacity="0.2"/>
                        <path d="M2.87109 15.8106C1.28795 15.8106 0 17.0712 0 18.6207C0 20.1703 1.28795 21.4309 2.87109 21.4309C4.45424 21.4309 5.74219 20.1703 5.74219 18.6207C5.74219 17.0712 4.45424 15.8106 2.87109 15.8106ZM2.87109 19.8251C2.19259 19.8251 1.64062 19.2848 1.64062 18.6207C1.64062 17.9566 2.19259 17.4164 2.87109 17.4164C3.5496 17.4164 4.10156 17.9566 4.10156 18.6207C4.10156 19.2848 3.5496 19.8251 2.87109 19.8251Z" fill="#333333"/>
                        <path d="M10.8711 15.8106C9.28795 15.8106 8 17.0712 8 18.6207C8 20.1703 9.28795 21.4309 10.8711 21.4309C12.4542 21.4309 13.7422 20.1703 13.7422 18.6207C13.7422 17.0712 12.4542 15.8106 10.8711 15.8106ZM10.8711 19.8251C10.1926 19.8251 9.64062 19.2848 9.64062 18.6207C9.64062 17.9566 10.1926 17.4164 10.8711 17.4164C11.5496 17.4164 12.1016 17.9566 12.1016 18.6207C12.1016 19.2848 11.5496 19.8251 10.8711 19.8251Z" fill="#333333" fill-opacity="0.2"/>
                        <path d="M18.8711 15.8106C17.2879 15.8106 16 17.0712 16 18.6207C16 20.1703 17.2879 21.4309 18.8711 21.4309C20.4542 21.4309 21.7422 20.1703 21.7422 18.6207C21.7422 17.0712 20.4542 15.8106 18.8711 15.8106ZM18.8711 19.8251C18.1926 19.8251 17.6406 19.2848 17.6406 18.6207C17.6406 17.9566 18.1926 17.4164 18.8711 17.4164C19.5496 17.4164 20.1016 17.9566 20.1016 18.6207C20.1016 19.2848 19.5496 19.8251 18.8711 19.8251Z" fill="#333333"/>
                        <path d="M2.87109 0.150391C1.28795 0.150391 0 1.41099 0 2.96052C0 4.51005 1.28795 5.77064 2.87109 5.77064C4.45424 5.77064 5.74219 4.51005 5.74219 2.96052C5.74219 1.41099 4.45424 0.150391 2.87109 0.150391ZM2.87109 4.16486C2.19259 4.16486 1.64062 3.62462 1.64062 2.96052C1.64062 2.29642 2.19259 1.75618 2.87109 1.75618C3.5496 1.75618 4.10156 2.29642 4.10156 2.96052C4.10156 3.62462 3.5496 4.16486 2.87109 4.16486Z" fill="#333333"/>
                        <path d="M10.8711 0.150391C9.28795 0.150391 8 1.41099 8 2.96052C8 4.51005 9.28795 5.77064 10.8711 5.77064C12.4542 5.77064 13.7422 4.51005 13.7422 2.96052C13.7422 1.41099 12.4542 0.150391 10.8711 0.150391ZM10.8711 4.16486C10.1926 4.16486 9.64062 3.62462 9.64062 2.96052C9.64062 2.29642 10.1926 1.75618 10.8711 1.75618C11.5496 1.75618 12.1016 2.29642 12.1016 2.96052C12.1016 3.62462 11.5496 4.16486 10.8711 4.16486Z" fill="#333333" fill-opacity="0.2"/>
                        <path d="M18.8711 0.150391C17.2879 0.150391 16 1.41099 16 2.96052C16 4.51005 17.2879 5.77064 18.8711 5.77064C20.4542 5.77064 21.7422 4.51005 21.7422 2.96052C21.7422 1.41099 20.4542 0.150391 18.8711 0.150391ZM18.8711 4.16486C18.1926 4.16486 17.6406 3.62462 17.6406 2.96052C17.6406 2.29642 18.1926 1.75618 18.8711 1.75618C19.5496 1.75618 20.1016 2.29642 20.1016 2.96052C20.1016 3.62462 19.5496 4.16486 18.8711 4.16486Z" fill="#333333"/>
                    </svg>
                </span>
            </div>
            <div class="header_scroll-logo">
                <svg width="124" height="47" viewBox="0 0 124 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42.9054 40.9167C40.5108 40.8114 37.0833 39.1987 34.454 36.2584C33.6069 35.3094 32.7374 34.0141 34.1929 33.0482C35.4757 32.1994 36.3959 33.0906 37.2786 34.1211C41.1362 38.6198 47.3866 38.8829 51.74 34.8239C52.0161 34.5659 52.2903 34.3044 52.5513 34.0345C53.3495 33.2094 54.2191 32.1807 55.5168 33.0753C57.0325 34.1194 56.0803 35.3179 55.2314 36.2533C52.5476 39.2445 49.1501 41.0304 42.9054 40.9167Z" fill="#2A993A"/>
                    <path d="M9.49378 6.90455C12.0687 6.67877 14.3881 7.61076 16.6005 8.8076C17.7743 9.44082 18.3171 10.4526 17.5583 11.5442C16.8409 12.5781 15.7385 12.1621 14.8201 11.6359C11.0845 9.49685 7.37152 9.35085 3.66979 11.6885C2.64059 12.337 1.69967 12.2487 0.961577 11.349C0.193434 10.4068 0.878942 9.72603 1.63206 9.14204C3.86136 7.40875 6.48694 6.75346 9.49378 6.90455Z" fill="#2A993A"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M79.7237 42.1339C83.5644 37.5503 84.4752 32.2129 84.2123 27.704C84.2043 27.4495 84.1967 27.2005 84.1893 26.9565C84.0917 23.7602 84.0204 21.4264 83.4498 19.1394C83.2144 18.2329 82.8817 17.3493 82.4563 16.5013C81.6262 14.8087 80.3998 13.729 78.0728 13.8343C74.5194 13.9939 71.2985 16.1736 69.9369 19.5485C69.2677 21.2077 69.3544 22.8997 69.4412 24.5946C69.453 24.8263 69.4649 25.0581 69.4748 25.2899C69.5068 26.0573 69.4767 26.8467 68.4982 27.0029C67.5667 27.1523 67.0521 26.4426 66.8305 25.7517C66.625 25.064 66.5432 24.351 66.5882 23.6398C66.6162 23.0919 66.6883 22.5446 66.7603 21.9978C66.8572 21.2621 66.9539 20.5272 66.9432 19.793C66.9263 18.6471 66.421 17.6557 64.8134 17.7236C63.2057 17.7915 63.1757 18.8304 63.2302 19.883C63.3372 21.9065 63.0912 23.8894 62.278 25.7772C61.8704 26.7244 61.1849 27.6276 59.8928 27.5597C58.7383 27.499 58.4249 26.6321 58.1395 25.8427C58.1055 25.7485 58.0718 25.6554 58.0372 25.565C57.3618 23.7961 57.4584 21.9619 57.5551 20.1271C57.5606 20.0231 57.5661 19.9191 57.5714 19.8151C57.6259 18.7812 57.5639 17.7049 55.9694 17.6489C54.5665 17.5962 53.8903 18.4484 53.7946 19.5163C53.5467 22.2376 53.5354 24.9725 54.7336 27.5546C56.2812 30.8938 60.0712 31.9073 63.3147 29.7327C64.3007 29.0723 64.7984 29.1792 65.7168 29.6698C67.3188 30.5255 69.0598 30.4592 70.7106 29.6902C70.8509 29.6248 70.9858 29.5514 71.1176 29.4797C71.7622 29.129 72.335 28.8174 73.124 29.663C73.9466 30.5492 74.2152 31.2622 73.5447 32.3182C72.7784 33.522 71.5407 34.157 70.31 34.7883C70.102 34.895 69.8942 35.0016 69.6889 35.1108C69.4429 35.2418 69.1953 35.3704 68.9479 35.4988C67.6089 36.1938 66.2764 36.8854 65.2397 37.9543C62.1277 41.1629 63.6358 45.5631 68.2672 46.412C73.0658 47.2845 76.8877 45.5139 79.7237 42.1339ZM75.1823 40.8794C79.331 37.3687 80.5649 32.9191 80.302 27.996C80.3985 25.2787 80.1145 22.5613 79.4569 19.9084C79.4512 19.8854 79.4456 19.8622 79.44 19.839C79.1855 18.7915 78.9002 17.6168 77.5957 17.3959C76.0875 17.1413 75.1316 18.2023 74.3672 19.2209C72.3558 21.915 72.8647 24.4717 75.8697 27.2168C78.6962 29.787 78.6962 32.4743 75.9223 35.1006C74.7015 36.2584 73.261 37.1225 71.7585 37.939C70.8082 38.4585 69.8616 38.9848 68.9526 39.5586C67.899 40.2241 67.5685 41.1748 68.1676 42.1933C68.7216 43.1253 69.7677 43.3138 70.8627 43.0422C72.4775 42.6534 73.9612 41.9105 75.1823 40.8794Z" fill="#FA5C81"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9329 24.7297V22.353C14.9334 22.0983 14.9382 21.8434 14.943 21.5883C14.9545 20.9796 14.966 20.3702 14.9197 19.7624C14.6812 16.4588 12.8087 14.1704 10.1418 13.858C8.97943 13.7126 7.79665 13.7769 6.66191 14.0472C5.52716 14.3175 4.46296 14.7885 3.53086 15.4329C2.59875 16.0773 1.81723 16.8824 1.2315 17.8015C0.64577 18.7207 0.267455 19.7357 0.118421 20.7878C-0.302534 23.7393 0.475402 26.5805 1.24856 29.4043L1.26782 29.4746C1.57395 30.5628 2.53178 30.9142 3.70935 30.6053C4.85123 30.3116 5.10665 29.5086 4.91884 28.5681C4.83009 28.1018 4.71804 27.6375 4.60603 27.1735C4.41467 26.3807 4.22345 25.5885 4.14881 24.7874C4.12367 24.5147 4.09192 24.2406 4.0601 23.9658C3.87798 22.3933 3.69346 20.8 4.73103 19.3346C5.68323 17.9901 7.14439 17.4316 8.81214 17.62C10.2707 17.7844 10.5339 18.9057 10.7862 19.9804C10.8048 20.0598 10.8234 20.1389 10.8424 20.2174C11.0913 21.344 11.1401 22.4993 10.987 23.6398C10.4743 28.3491 12.7768 31.0551 18.1989 29.1555C19.0189 28.8691 19.3533 29.1953 19.7045 29.538C19.7885 29.62 19.8734 29.7028 19.9662 29.7785C24.1825 33.2094 30.4647 32.8003 34.1815 28.838C37.5471 25.2509 36.9085 18.625 32.9251 15.8018C27.9706 12.2911 19.5361 15.4029 17.8289 21.4041C17.5153 22.5075 17.2354 23.6178 17.2786 24.7891C17.3087 25.5785 16.7565 26.244 15.8569 26.2135C14.9329 26.1812 14.9329 25.3918 14.9329 24.7297ZM21.1343 23.9149C21.1136 26.8263 23.187 28.5087 26.8549 28.5562C30.0815 28.5987 32.4216 26.4851 32.5136 23.4429C32.6019 20.4619 30.5135 18.1531 27.7189 18.1429C24.188 18.1429 21.1568 20.7929 21.1343 23.9149Z" fill="#FA5C81"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M110.992 31.483C117.175 33.5711 123.201 29.0604 123.164 22.4991C123.141 18.3976 121.321 15.5489 118.039 14.4828C114.002 13.1671 110.017 14.1297 107.093 17.216C104.862 19.5689 104.37 22.3123 105.16 25.2713C105.418 26.239 105.174 27.2134 104.186 27.4273C103.177 27.6412 102.914 26.8675 102.674 26.163C102.623 26.0119 102.572 25.864 102.516 25.7297C102.453 25.5839 102.461 25.4134 102.469 25.2404C102.474 25.1193 102.48 24.9969 102.462 24.8809C102.407 24.5422 102.352 24.2035 102.297 23.8649C101.907 21.45 101.518 19.0355 101.107 16.6235C100.858 15.1619 99.8285 14.3487 98.2734 14.0771C96.7709 13.819 95.6591 14.4692 94.705 15.4063C93.6018 16.4935 93.3114 17.8681 93.0211 19.2425C92.9991 19.3468 92.977 19.4512 92.9546 19.5554C92.8879 19.8675 92.824 20.1806 92.7601 20.4939C92.3799 22.3584 91.9986 24.2283 91.0033 25.9215C90.9688 25.9801 90.9326 26.0448 90.8946 26.1127C90.502 26.814 89.9154 27.8617 89.0181 26.1592C88.5486 25.2713 87.542 25.307 86.7137 25.5701C85.8066 25.8587 85.4591 26.5904 85.5267 27.4833C85.6601 29.203 87.125 30.5153 89.0613 30.6851C91.5235 30.8973 92.8927 29.5986 93.9444 27.8772C95.5051 25.329 96.0685 22.5347 96.4441 19.6844C96.4527 19.6204 96.4592 19.5481 96.4662 19.4707C96.5139 18.9406 96.5824 18.1778 97.4921 18.3008C98.093 18.381 98.1287 18.9347 98.1619 19.4476C98.1687 19.5535 98.1754 19.6577 98.187 19.7557C98.2572 20.3482 98.3248 20.941 98.3925 21.5339C98.609 23.4315 98.8256 25.3296 99.1261 27.2168C99.5355 29.7836 101.586 31.5797 104.028 30.5119C106.356 29.4963 107.882 30.1677 109.501 30.8802C109.982 31.0919 110.471 31.3072 110.992 31.483ZM113.773 28.7192C116.739 28.7786 119.576 25.5837 119.595 22.1748C119.618 19.355 117.606 17.0361 115.082 16.9868C111.741 16.902 108.635 19.7761 108.651 22.9286C108.668 25.9674 111.054 28.6649 113.773 28.7192Z" fill="#FA5C81"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M41.4102 7.79749C38.7565 11.6647 38.3189 15.9886 38.1799 20.3736C38.1705 23.3309 38.4616 26.2457 39.7556 28.9891C40.8074 31.2164 42.693 32.5762 45.4106 32.6441C47.7319 32.7086 49.9593 30.9193 50.8683 28.4645C52.1567 24.981 51.8318 21.5823 49.9537 18.333C49.3659 17.3161 49.2025 16.6761 50.5716 15.9444C52.2907 15.0153 53.5993 13.5751 54.2733 11.8701C55.3194 9.33045 54.803 6.81625 52.8103 5.15596C51.0111 3.65865 48.0211 3.41588 45.4519 4.55499C43.7878 5.26213 42.3846 6.38791 41.4102 7.79749ZM46.1167 8.64632C42.5803 11.8039 41.8121 15.8188 41.7858 21.0102C41.7406 22.9874 42.1122 24.9544 42.8808 26.806C43.3353 27.8653 43.8912 29.1147 45.4951 28.8431C46.9281 28.6004 47.4126 27.4222 47.5197 26.2339C47.7976 23.2511 47.3938 20.4415 45.2659 17.929C43.4292 15.7713 43.7991 14.9717 46.5806 13.746C48.4437 12.9261 50.2899 12.0739 50.9002 10.0265C51.1989 9.03169 51.0599 8.23379 50.2072 7.5038C49.3395 6.76187 48.5506 7.14501 47.79 7.51445C47.7291 7.54401 47.6685 7.57347 47.6079 7.60227C47.0573 7.88286 46.555 8.23458 46.1167 8.64632Z" fill="#FA5C81"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M94.2808 3.35816C94.3447 0.883004 93.1746 0.0172126 90.5021 0.000236226C84.8753 -0.0337166 80.6515 3.59583 80.4468 8.64292C80.3547 11.0926 81.3426 12.4337 83.7353 12.4643C90.1077 12.5441 94.1437 8.75496 94.2808 3.35816ZM85.3394 9.10469C87.5818 8.96548 90.3163 6.6533 90.538 4.69083C90.692 3.33272 90.2149 2.93208 88.8176 3.25123C86.4775 3.7741 84.5055 5.83674 84.1111 7.90447C83.9045 8.98077 84.359 9.1641 85.3394 9.10469Z" fill="#2A993A"/>
                    <path d="M114.256 21.0985C115.402 21.1681 116.238 21.7045 116.172 22.6739C116.099 23.7638 115.205 24.5226 113.954 24.56C112.639 24.5973 112.1 23.6466 112.145 22.6926C112.196 21.6349 113.075 21.0832 114.256 21.0985Z" fill="#2A973A"/>
                </svg>
            </div>
            <?php wp_nav_menu([
							'theme_location' => 'header-menu',
							'container' => false,
							'menu_class' => 'header_menu-items',
							'menu_id' => 'Navigation'	
						] ); ?>
            <div class="cart">
                <span>Корзина</span>
                    <svg width="30" height="30" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 24C6.13261 24 6.25979 23.9473 6.35355 23.8536C6.44732 23.7598 6.5 23.6326 6.5 23.5V20.5C6.5 20.3674 6.44732 20.2402 6.35355 20.1464C6.25979 20.0527 6.13261 20 6 20C5.86739 20 5.74021 20.0527 5.64645 20.1464C5.55268 20.2402 5.5 20.3674 5.5 20.5V23.5C5.5 23.6326 5.55268 23.7598 5.64645 23.8536C5.74021 23.9473 5.86739 24 6 24Z" fill="#333333"/>
                    <path d="M30.5 14.5H23.6293L18.8961 2.45185C18.7694 2.1301 18.5354 1.862 18.2338 1.6929C17.9321 1.52379 17.5813 1.46406 17.2407 1.52381C16.9001 1.58355 16.5906 1.75911 16.3645 2.02078C16.1384 2.28245 16.0097 2.61417 16 2.95985C15.991 2.61381 15.8625 2.28155 15.6364 2.01941C15.4104 1.75727 15.1006 1.58139 14.7597 1.52158C14.4187 1.46178 14.0676 1.52173 13.7658 1.69129C13.464 1.86084 13.2301 2.12955 13.1039 2.45185L8.37069 14.5H1.5C1.36739 14.5 1.24021 14.5527 1.14645 14.6465C1.05268 14.7403 1 14.8674 1 15V18C1.00012 18.121 1.04404 18.2377 1.12364 18.3287C1.20324 18.4197 1.31312 18.4788 1.43294 18.495L2.848 29.8152C2.96806 30.7757 3.82175 31.5 4.83388 31.5H27.1661C28.1782 31.5 29.0319 30.7757 29.152 29.8152L30.5671 18.495C30.6869 18.4788 30.7968 18.4197 30.8764 18.3287C30.956 18.2377 30.9999 18.121 31 18V15C31 14.8674 30.9473 14.7403 30.8536 14.6465C30.7598 14.5527 30.6326 14.5 30.5 14.5ZM17.0417 2.80053C17.0812 2.70991 17.1467 2.63305 17.2299 2.57965C17.3132 2.52626 17.4103 2.49873 17.5092 2.50055C17.608 2.50237 17.7041 2.53345 17.7853 2.58987C17.8665 2.64629 17.9291 2.72552 17.9653 2.81753L23.2826 16.3522L22.3518 16.7178L17.0347 3.18316C17.0105 3.1221 16.9986 3.05683 16.9998 2.99114C17.001 2.92546 17.0152 2.86067 17.0417 2.80053ZM21.5847 17.5H10.4153L11.201 15.5H20.799L21.5847 17.5ZM15.8961 3.54885C15.9592 3.3889 15.9943 3.21931 16 3.04747C16.0057 3.21931 16.0408 3.3889 16.1039 3.54885L20.4062 14.5H11.5938L15.8961 3.54885ZM14.0347 2.8176C14.058 2.75557 14.0935 2.69881 14.1389 2.6506C14.1844 2.6024 14.239 2.56371 14.2996 2.5368C14.3601 2.50988 14.4254 2.49527 14.4917 2.49382C14.558 2.49237 14.6238 2.5041 14.6855 2.52834C14.7472 2.55258 14.8034 2.58883 14.851 2.635C14.8985 2.68117 14.9364 2.73633 14.9624 2.79727C14.9885 2.85821 15.0021 2.92372 15.0026 2.98999C15.0031 3.05626 14.9904 3.12196 14.9653 3.18328L9.64819 16.7178L8.71744 16.3522L14.0347 2.8176ZM2 15.5H7.97781L7.60388 16.4519C7.55539 16.5753 7.55792 16.7129 7.61091 16.8345C7.6639 16.956 7.76301 17.0516 7.88644 17.1L8.9045 17.5H2V15.5ZM28.1597 29.6912C28.1021 30.1524 27.6749 30.5 27.1659 30.5H4.83388C4.32506 30.5 3.89794 30.1524 3.84013 29.6912L2.44138 18.5H29.5586L28.1597 29.6912ZM30 17.5H23.0955L24.1136 17.1C24.237 17.0516 24.3361 16.956 24.3891 16.8345C24.4421 16.7129 24.4446 16.5753 24.3961 16.4519L24.0222 15.5H30V17.5Z" fill="#333333"/>
                    <path d="M6 29C6.13261 29 6.25979 28.9473 6.35355 28.8536C6.44732 28.7598 6.5 28.6326 6.5 28.5V25.5C6.5 25.3674 6.44732 25.2402 6.35355 25.1464C6.25979 25.0527 6.13261 25 6 25C5.86739 25 5.74021 25.0527 5.64645 25.1464C5.55268 25.2402 5.5 25.3674 5.5 25.5V28.5C5.5 28.6326 5.55268 28.7598 5.64645 28.8536C5.74021 28.9473 5.86739 29 6 29Z" fill="#333333"/>
                    <path d="M8 24C8.13261 24 8.25979 23.9473 8.35355 23.8536C8.44732 23.7598 8.5 23.6326 8.5 23.5V20.5C8.5 20.3674 8.44732 20.2402 8.35355 20.1464C8.25979 20.0527 8.13261 20 8 20C7.86739 20 7.74021 20.0527 7.64645 20.1464C7.55268 20.2402 7.5 20.3674 7.5 20.5V23.5C7.5 23.6326 7.55268 23.7598 7.64645 23.8536C7.74021 23.9473 7.86739 24 8 24Z" fill="#333333"/>
                    <path d="M8 29C8.13261 29 8.25979 28.9473 8.35355 28.8536C8.44732 28.7598 8.5 28.6326 8.5 28.5V25.5C8.5 25.3674 8.44732 25.2402 8.35355 25.1464C8.25979 25.0527 8.13261 25 8 25C7.86739 25 7.74021 25.0527 7.64645 25.1464C7.55268 25.2402 7.5 25.3674 7.5 25.5V28.5C7.5 28.6326 7.55268 28.7598 7.64645 28.8536C7.74021 28.9473 7.86739 29 8 29Z" fill="#333333"/>
                    <path d="M10 24C10.1326 24 10.2598 23.9473 10.3536 23.8536C10.4473 23.7598 10.5 23.6326 10.5 23.5V20.5C10.5 20.3674 10.4473 20.2402 10.3536 20.1464C10.2598 20.0527 10.1326 20 10 20C9.86739 20 9.74021 20.0527 9.64645 20.1464C9.55268 20.2402 9.5 20.3674 9.5 20.5V23.5C9.5 23.6326 9.55268 23.7598 9.64645 23.8536C9.74021 23.9473 9.86739 24 10 24Z" fill="#333333"/>
                    <path d="M10 29C10.1326 29 10.2598 28.9473 10.3536 28.8536C10.4473 28.7598 10.5 28.6326 10.5 28.5V25.5C10.5 25.3674 10.4473 25.2402 10.3536 25.1464C10.2598 25.0527 10.1326 25 10 25C9.86739 25 9.74021 25.0527 9.64645 25.1464C9.55268 25.2402 9.5 25.3674 9.5 25.5V28.5C9.5 28.6326 9.55268 28.7598 9.64645 28.8536C9.74021 28.9473 9.86739 29 10 29Z" fill="#333333"/>
                    <path d="M12 24C12.1326 24 12.2598 23.9473 12.3536 23.8536C12.4473 23.7598 12.5 23.6326 12.5 23.5V20.5C12.5 20.3674 12.4473 20.2402 12.3536 20.1464C12.2598 20.0527 12.1326 20 12 20C11.8674 20 11.7402 20.0527 11.6464 20.1464C11.5527 20.2402 11.5 20.3674 11.5 20.5V23.5C11.5 23.6326 11.5527 23.7598 11.6464 23.8536C11.7402 23.9473 11.8674 24 12 24Z" fill="#333333"/>
                    <path d="M12 29C12.1326 29 12.2598 28.9473 12.3536 28.8536C12.4473 28.7598 12.5 28.6326 12.5 28.5V25.5C12.5 25.3674 12.4473 25.2402 12.3536 25.1464C12.2598 25.0527 12.1326 25 12 25C11.8674 25 11.7402 25.0527 11.6464 25.1464C11.5527 25.2402 11.5 25.3674 11.5 25.5V28.5C11.5 28.6326 11.5527 28.7598 11.6464 28.8536C11.7402 28.9473 11.8674 29 12 29Z" fill="#333333"/>
                    <path d="M20 24C20.1326 24 20.2598 23.9473 20.3536 23.8536C20.4473 23.7598 20.5 23.6326 20.5 23.5V20.5C20.5 20.3674 20.4473 20.2402 20.3536 20.1464C20.2598 20.0527 20.1326 20 20 20C19.8674 20 19.7402 20.0527 19.6464 20.1464C19.5527 20.2402 19.5 20.3674 19.5 20.5V23.5C19.5 23.6326 19.5527 23.7598 19.6464 23.8536C19.7402 23.9473 19.8674 24 20 24Z" fill="#333333"/>
                    <path d="M20 29C20.1326 29 20.2598 28.9473 20.3536 28.8536C20.4473 28.7598 20.5 28.6326 20.5 28.5V25.5C20.5 25.3674 20.4473 25.2402 20.3536 25.1464C20.2598 25.0527 20.1326 25 20 25C19.8674 25 19.7402 25.0527 19.6464 25.1464C19.5527 25.2402 19.5 25.3674 19.5 25.5V28.5C19.5 28.6326 19.5527 28.7598 19.6464 28.8536C19.7402 28.9473 19.8674 29 20 29Z" fill="#333333"/>
                    <path d="M22 24C22.1326 24 22.2598 23.9473 22.3536 23.8536C22.4473 23.7598 22.5 23.6326 22.5 23.5V20.5C22.5 20.3674 22.4473 20.2402 22.3536 20.1464C22.2598 20.0527 22.1326 20 22 20C21.8674 20 21.7402 20.0527 21.6464 20.1464C21.5527 20.2402 21.5 20.3674 21.5 20.5V23.5C21.5 23.6326 21.5527 23.7598 21.6464 23.8536C21.7402 23.9473 21.8674 24 22 24Z" fill="#333333"/>
                    <path d="M22 29C22.1326 29 22.2598 28.9473 22.3536 28.8536C22.4473 28.7598 22.5 28.6326 22.5 28.5V25.5C22.5 25.3674 22.4473 25.2402 22.3536 25.1464C22.2598 25.0527 22.1326 25 22 25C21.8674 25 21.7402 25.0527 21.6464 25.1464C21.5527 25.2402 21.5 25.3674 21.5 25.5V28.5C21.5 28.6326 21.5527 28.7598 21.6464 28.8536C21.7402 28.9473 21.8674 29 22 29Z" fill="#333333"/>
                    <path d="M24 24C24.1326 24 24.2598 23.9473 24.3536 23.8536C24.4473 23.7598 24.5 23.6326 24.5 23.5V20.5C24.5 20.3674 24.4473 20.2402 24.3536 20.1464C24.2598 20.0527 24.1326 20 24 20C23.8674 20 23.7402 20.0527 23.6464 20.1464C23.5527 20.2402 23.5 20.3674 23.5 20.5V23.5C23.5 23.6326 23.5527 23.7598 23.6464 23.8536C23.7402 23.9473 23.8674 24 24 24Z" fill="#333333"/>
                    <path d="M24 29C24.1326 29 24.2598 28.9473 24.3536 28.8536C24.4473 28.7598 24.5 28.6326 24.5 28.5V25.5C24.5 25.3674 24.4473 25.2402 24.3536 25.1464C24.2598 25.0527 24.1326 25 24 25C23.8674 25 23.7402 25.0527 23.6464 25.1464C23.5527 25.2402 23.5 25.3674 23.5 25.5V28.5C23.5 28.6326 23.5527 28.7598 23.6464 28.8536C23.7402 28.9473 23.8674 29 24 29Z" fill="#333333"/>
                    <path d="M26 24C26.1326 24 26.2598 23.9473 26.3536 23.8536C26.4473 23.7598 26.5 23.6326 26.5 23.5V20.5C26.5 20.3674 26.4473 20.2402 26.3536 20.1464C26.2598 20.0527 26.1326 20 26 20C25.8674 20 25.7402 20.0527 25.6464 20.1464C25.5527 20.2402 25.5 20.3674 25.5 20.5V23.5C25.5 23.6326 25.5527 23.7598 25.6464 23.8536C25.7402 23.9473 25.8674 24 26 24Z" fill="#333333"/>
                    <path d="M26 29C26.1326 29 26.2598 28.9473 26.3536 28.8536C26.4473 28.7598 26.5 28.6326 26.5 28.5V25.5C26.5 25.3674 26.4473 25.2402 26.3536 25.1464C26.2598 25.0527 26.1326 25 26 25C25.8674 25 25.7402 25.0527 25.6464 25.1464C25.5527 25.2402 25.5 25.3674 25.5 25.5V28.5C25.5 28.6326 25.5527 28.7598 25.6464 28.8536C25.7402 28.9473 25.8674 29 26 29Z" fill="#333333"/>
                    <path d="M16 24C16.1326 24 16.2598 23.9473 16.3536 23.8536C16.4473 23.7598 16.5 23.6326 16.5 23.5V20.5C16.5 20.3674 16.4473 20.2402 16.3536 20.1464C16.2598 20.0527 16.1326 20 16 20C15.8674 20 15.7402 20.0527 15.6464 20.1464C15.5527 20.2402 15.5 20.3674 15.5 20.5V23.5C15.5 23.6326 15.5527 23.7598 15.6464 23.8536C15.7402 23.9473 15.8674 24 16 24Z" fill="#333333"/>
                    <path d="M16 29C16.1326 29 16.2598 28.9473 16.3536 28.8536C16.4473 28.7598 16.5 28.6326 16.5 28.5V25.5C16.5 25.3674 16.4473 25.2402 16.3536 25.1464C16.2598 25.0527 16.1326 25 16 25C15.8674 25 15.7402 25.0527 15.6464 25.1464C15.5527 25.2402 15.5 25.3674 15.5 25.5V28.5C15.5 28.6326 15.5527 28.7598 15.6464 28.8536C15.7402 28.9473 15.8674 29 16 29Z" fill="#333333"/>
                    <path d="M14 24C14.1326 24 14.2598 23.9473 14.3536 23.8536C14.4473 23.7598 14.5 23.6326 14.5 23.5V20.5C14.5 20.3674 14.4473 20.2402 14.3536 20.1464C14.2598 20.0527 14.1326 20 14 20C13.8674 20 13.7402 20.0527 13.6464 20.1464C13.5527 20.2402 13.5 20.3674 13.5 20.5V23.5C13.5 23.6326 13.5527 23.7598 13.6464 23.8536C13.7402 23.9473 13.8674 24 14 24Z" fill="#333333"/>
                    <path d="M14 29C14.1326 29 14.2598 28.9473 14.3536 28.8536C14.4473 28.7598 14.5 28.6326 14.5 28.5V25.5C14.5 25.3674 14.4473 25.2402 14.3536 25.1464C14.2598 25.0527 14.1326 25 14 25C13.8674 25 13.7402 25.0527 13.6464 25.1464C13.5527 25.2402 13.5 25.3674 13.5 25.5V28.5C13.5 28.6326 13.5527 28.7598 13.6464 28.8536C13.7402 28.9473 13.8674 29 14 29Z" fill="#333333"/>
                    <path d="M18 24C18.1326 24 18.2598 23.9473 18.3536 23.8536C18.4473 23.7598 18.5 23.6326 18.5 23.5V20.5C18.5 20.3674 18.4473 20.2402 18.3536 20.1464C18.2598 20.0527 18.1326 20 18 20C17.8674 20 17.7402 20.0527 17.6464 20.1464C17.5527 20.2402 17.5 20.3674 17.5 20.5V23.5C17.5 23.6326 17.5527 23.7598 17.6464 23.8536C17.7402 23.9473 17.8674 24 18 24Z" fill="#333333"/>
                    <path d="M18 29C18.1326 29 18.2598 28.9473 18.3536 28.8536C18.4473 28.7598 18.5 28.6326 18.5 28.5V25.5C18.5 25.3674 18.4473 25.2402 18.3536 25.1464C18.2598 25.0527 18.1326 25 18 25C17.8674 25 17.7402 25.0527 17.6464 25.1464C17.5527 25.2402 17.5 25.3674 17.5 25.5V28.5C17.5 28.6326 17.5527 28.7598 17.6464 28.8536C17.7402 28.9473 17.8674 29 18 29Z" fill="#333333"/>
                </svg>
                <span class="cart-number">1</span>
            </div>
        </div>
    </header>