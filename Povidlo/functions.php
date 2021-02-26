<?php
session_start();

register_nav_menus(
	array(
		'header-menu' => 'Primary'
	)
);

function wpspec_menu_desc( $item_output, $item, $depth, $args ) {
	if ($item->description) {
		$item_output = str_replace( '</a>', '<p class="description">' . $item->description . '</p></a>', $item_output );
	}
	
	return $item_output;
}
 
add_filter( 'walker_nav_menu_start_el', 'wpspec_menu_desc', 10, 4 );

add_theme_support(
	'custom-logo',
	array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	)
);

/*
* add_to_basket_action
*/

add_action('wp_ajax_add_to_basket', 'add_to_basket_action');
add_action('wp_ajax_nopriv_add_to_basket', 'add_to_basket_action');

function add_to_basket_action(){
	$product_id = $_POST['id'];
	$amount_product = $_POST['amount'];
	// $_SESSION['basket_array'] = [];
	// wp_die();
	$basket_array = add_to_basket($_SESSION['basket_array'] ,$product_id, $amount_product);
	$_SESSION['basket_array'] = $basket_array; 	
	echo json_encode($basket_array);
	wp_die();
}

function is_product_in_basket($basket, $product_id){
	if(!$basket)return false;
	
	foreach($basket as $basket_item){
		if($basket_item["id"] == $product_id) return true;
	}
	return false;
}

function add_to_basket($basket ,$product_id, $amount_product){
	
	if(is_product_in_basket($basket, $product_id)){
		foreach($basket as $key => $basket_item){
			if($basket_item["id"] == $product_id){
				$basket[$key]["amount"]++;
			}
		}
	}else{
		array_push($basket, [
			"name" => get_field("food-name", $product_id) , 
			"amount"=> $amount_product, 
			"id" => $product_id, 
			"price" =>get_field("price", $product_id), 
			"weight"=>get_field("weight", $product_id), 
		]);
	}

	return $basket;
}

/*
* delete_from_basket_action
*/
add_action('wp_ajax_delete_from_basket', 'delete_from_basket_action');
add_action('wp_ajax_nopriv_delete_from_basket', 'delete_from_basket_action');

function delete_from_basket_action(){
	$product_id = $_POST['id'];
	// $_SESSION['basket_array'] = [];
	// wp_die();
	$basket_array = delete_from_basket($_SESSION['basket_array'] ,$product_id);
	$_SESSION['basket_array'] = $basket_array;
	echo json_encode($basket_array);
	wp_die();
}

function delete_from_basket($basket, $product_id){
	foreach($basket as $key => $basket_item){
		if($basket_item['id'] == $product_id){
			unset($basket[$key]);
			sort($basket);
		}
	}
	return $basket;
}

function render_total_price(){

}

/**
 * Enqueue scripts and styles.
 */
function povidlo_scripts() {
	wp_style_add_data( 'povidlo-style', 'rtl', 'replace' );

    wp_enqueue_script( 'jQuery.js', get_template_directory_uri() . '/js/jQuery.js');
	wp_enqueue_script( 'povidlo-my.js', get_template_directory_uri() . '/js/mine.js');
	wp_enqueue_script( 'cart-povidlo.js', get_template_directory_uri() . '/js/cart.js');

	
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap-grid.min.css');
	wp_enqueue_style( 'povidlo-style', get_template_directory_uri() . '/css/style.css');

}
add_action( 'wp_enqueue_scripts', 'povidlo_scripts' );


add_theme_support('post-thumbnails');

/*
*register taxonomy for foods
*/

add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
	register_taxonomy( 'category-foods', [ 'foods' ], [
		'labels'                => [
			'name'              => 'Категорії страв',
			'singular_name'     => 'Категорії страв',
			'search_items'      => 'Пошук категорії',
			'all_items'         => 'Всі категорії',
			'view_item '        => 'Переглянути категорію',
			'parent_item'       => 'Батьківська категорія',
			'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => 'Редагувати категорію',
			'update_item'       => 'Update Genre',
			'add_new_item'      => 'Додати нову категорію',
			'new_item_name'     => 'New Genre Name',
			'menu_name'         => 'Категорії страв',
		],
		'description'           => '',
		'public'                => true,
		'hierarchical'			=> true
	] );
}

/*
*register post foods
*/

add_action( 'init', 'register_post_foods' );
function register_post_foods(){
	register_post_type( 'foods', [
		'labels' => [
			'name'               => 'Страви', // основное название для типа записи
			'singular_name'      => 'Страва', // название для одной записи этого типа
			'add_new'            => 'Добавити страву', // для добавления новой записи
			'add_new_item'       => 'Добавити нову страву', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагувати страву', // для редактирования типа записи
			'search_items'       => 'Пошук страви', // для поиска по этим типам записи
		],
		'public'              => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-food',
		'supports'            => [ 'title'], 
		'taxonomies'          => ['category-foods'],
		'has_archive'         => false,
	] );
}

/*
*register post novelty
*/

add_action( 'init', 'register_post_novelty' );

function register_post_novelty(){
	register_post_type( 'novelty', [
		'labels' => [
			'name'               => 'Новинки', // основное название для типа записи
			'singular_name'      => 'Новинка', // название для одной записи этого типа
			'add_new'            => 'Добавити новинку', // для добавления новой записи
			'add_new_item'       => 'Добавити нову новинку', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагувати новинку', // для редактирования типа записи
			'search_items'       => 'Пошук по новинках', // для поиска по этим типам записи
		],
		'public'              => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-food',
		'supports'            => [ 'title'],
		'has_archive'         => false,
	] );
}

/*
*register post share
*/

add_action( 'init', 'register_post_share' );
function register_post_share(){
	register_post_type( 'share', [
		'labels' => [
			'name'               => 'Акції', // основное название для типа записи
			'singular_name'      => 'Акція', // название для одной записи этого типа
			'add_new'            => 'Добавити акцію', // для добавления новой записи
			'add_new_item'       => 'Добавити нову акцію', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагувати акцію', // для редактирования типа записи
			'search_items'       => 'Пошук акцій', // для поиска по этим типам записи
		],
		'public'              => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-food',
		'supports'            => [ 'title' ],
		'has_archive'         => false,
	] );
}

/*
*register post comments
*/

add_action( 'init', 'register_post_comments' );
function register_post_comments(){
	register_post_type( 'comments', [
		'labels' => [
			'name'               => 'Коментарі', // основное название для типа записи
			'singular_name'      => 'Коментар', // название для одной записи этого типа
			'add_new'            => 'Добавити коментар', // для добавления новой записи
			'add_new_item'       => 'Добавити новий коментар', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагувати коментар', // для редактирования типа записи
			'search_items'       => 'Пошук по коментарях', // для поиска по этим типам записи
		],
		'public'              => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-edit',
		'supports'            => [ 'title' ],
		'has_archive'         => false,
	] );
}


/*
*options page acf
*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Settings footer',
		'menu_title'	=> 'Settings footer',
		'menu_slug' 	=> 'settings-footer',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Work schedule',
		'menu_title'	=> 'Work schedule',
		'parent_slug'	=> 'settings-footer',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contacts',
		'menu_title'	=> 'Contacts',
		'parent_slug'	=> 'settings-footer',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social',
		'menu_title'	=> 'Social',
		'parent_slug'	=> 'settings-footer',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer text',
		'menu_title'	=> 'Footer text',
		'parent_slug'	=> 'settings-footer',
	));
	
}

function getSocialIcon (){
	$socials_svgs = array(
		'GitHub' => '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 640 640"><path d="M319.988 7.973C143.293 7.973 0 151.242 0 327.96c0 141.392 91.678 261.298 218.826 303.63 16.004 2.964 21.886-6.957 21.886-15.414 0-7.63-.319-32.835-.449-59.552-89.032 19.359-107.8-37.772-107.8-37.772-14.552-36.993-35.529-46.831-35.529-46.831-29.032-19.879 2.209-19.442 2.209-19.442 32.126 2.245 49.04 32.954 49.04 32.954 28.56 48.922 74.883 34.76 93.131 26.598 2.882-20.681 11.15-34.807 20.315-42.803-71.08-8.067-145.797-35.516-145.797-158.14 0-34.926 12.52-63.485 32.965-85.88-3.33-8.078-14.291-40.606 3.083-84.674 0 0 26.87-8.61 88.029 32.8 25.512-7.075 52.878-10.642 80.056-10.76 27.2.118 54.614 3.673 80.162 10.76 61.076-41.386 87.922-32.8 87.922-32.8 17.398 44.08 6.485 76.631 3.154 84.675 20.516 22.394 32.93 50.953 32.93 85.879 0 122.907-74.883 149.93-146.117 157.856 11.481 9.921 21.733 29.398 21.733 59.233 0 42.792-.366 77.28-.366 87.804 0 8.516 5.764 18.473 21.992 15.354 127.076-42.354 218.637-162.274 218.637-303.582 0-176.695-143.269-319.988-320-319.988l-.023.107z"/></svg>',
		'linkedIn' => '<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 122.88"><defs><style>.cls-1{fill:#0077b5;}.cls-1,.cls-2{fill-rule:evenodd;}.cls-2{fill:#fff;}</style></defs><title>linkedin-square-color</title><path class="cls-1" d="M25.2,0H97.68a25.27,25.27,0,0,1,25.2,25.2V97.68a25.27,25.27,0,0,1-25.2,25.2H25.2A25.27,25.27,0,0,1,0,97.68V25.2A25.27,25.27,0,0,1,25.2,0Z"/><polygon class="cls-2" points="30.43 50.37 43.72 50.37 43.72 90.23 30.43 90.23 30.43 50.37 30.43 50.37"/><path class="cls-2" d="M43.72,39.29a6.65,6.65,0,1,1-6.64-6.64,6.64,6.64,0,0,1,6.64,6.64Z"/><path class="cls-2" d="M52.58,50.37H64.84v6.28H65c1.71-3.06,5.88-6.28,12.11-6.28,12.93,0,15.33,8.05,15.33,18.52V90.23H79.67V71.32C79.67,66.81,79.58,61,73,61s-7.67,4.91-7.67,10V90.23H52.58V50.37Z"/></svg>',
		'Telegram' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 333334 333334" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><defs><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="162482" y1="307276" x2="170852" y2="26057.5"><stop offset="0" stop-color="#19a8dd"/><stop offset=".678" stop-color="#2ab2e2"/><stop offset="1" stop-color="#3cbde8"/></linearGradient></defs><circle cx="166667" cy="166667" r="166667" fill="url(#a)"/><path d="M246886 91205l-29735 149919s-4158 10396-15594 5404l-68618-52606-24952-12059-42002-14140s-6446-2288-7069-7277c-624-4992 7277-7694 7277-7694l166970-65498s13722-6030 13722 3951z" fill="#fefefe"/><path d="M127666 239440s-2003-188-4499-8089c-2495-7901-15178-49487-15178-49487l100846-64043s5822-3535 5614 0c0 0 1040 623-2079 3534s-79222 71320-79222 71320l-5481 46765z" fill="#d4e6f1"/><path d="M159250 214094l-27141 24745s-2122 1609-4443 601l5197-45965 26387 20619z" fill="#b6d0e5"/></svg>',
		'Facebook' => '	<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15.3302 0.615234H4.64932C2.07815 0.615578 0.61512 2.07883 0.615234 4.65024V15.3311C0.615578 17.9023 2.07883 19.3653 4.65024 19.3652H10.6311V12.1143H8.1958V9.27612H10.6311V7.18746C10.6311 4.76532 12.1098 3.44696 14.2704 3.44696C15.3053 3.44696 16.1946 3.52409 16.4539 3.55854V6.09009H14.964C13.7884 6.09009 13.5608 6.64867 13.5608 7.46853V9.27612H16.3715L16.0052 12.1143H13.5608V19.3652H15.3302C17.9017 19.3653 19.3651 17.9022 19.3652 15.3307V4.64932C19.365 2.07815 17.9016 0.61512 15.3302 0.615234Z" fill="#6C6C6C"/>
						</svg>',
		'Instagram' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0)">
							<path d="M19.9804 5.88005C19.9336 4.81738 19.7617 4.0868 19.5156 3.45374C19.2616 2.78176 18.8709 2.18014 18.359 1.68002C17.8589 1.1721 17.2533 0.777435 16.5891 0.527447C15.9524 0.281274 15.2256 0.109427 14.163 0.0625732C13.0923 0.0117516 12.7525 0 10.0371 0C7.32173 0 6.98185 0.0117516 5.9152 0.0586052C4.85253 0.105459 4.12195 0.277459 3.48904 0.523479C2.81692 0.777435 2.2153 1.16814 1.71517 1.68002C1.20726 2.18014 0.812743 2.78573 0.562602 3.44992C0.31643 4.0868 0.144583 4.81341 0.0977294 5.87609C0.0469078 6.9467 0.0351562 7.28658 0.0351562 10.002C0.0351562 12.7173 0.0469078 13.0572 0.0937614 14.1239C0.140615 15.1865 0.312615 15.9171 0.558787 16.5502C0.812743 17.2221 1.20726 17.8238 1.71517 18.3239C2.2153 18.8318 2.82088 19.2265 3.48508 19.4765C4.12195 19.7226 4.84856 19.8945 5.91139 19.9413C6.97788 19.9883 7.31791 19.9999 10.0333 19.9999C12.7487 19.9999 13.0885 19.9883 14.1552 19.9413C15.2179 19.8945 15.9484 19.7226 16.5813 19.4765C17.9254 18.9568 18.9881 17.8941 19.5078 16.5502C19.7538 15.9133 19.9258 15.1865 19.9727 14.1239C20.0195 13.0572 20.0313 12.7173 20.0313 10.002C20.0313 7.28658 20.0273 6.9467 19.9804 5.88005ZM18.1794 14.0457C18.1364 15.0225 17.9723 15.5499 17.8356 15.9015C17.4995 16.7728 16.808 17.4643 15.9367 17.8004C15.5851 17.9372 15.0538 18.1012 14.0809 18.1441C13.026 18.1911 12.7096 18.2027 10.0411 18.2027C7.37255 18.2027 7.05221 18.1911 6.00113 18.1441C5.02438 18.1012 4.49693 17.9372 4.1453 17.8004C3.71171 17.6402 3.31704 17.3862 2.9967 17.0541C2.6646 16.7298 2.41065 16.3391 2.2504 15.9055C2.11365 15.5539 1.94959 15.0225 1.90671 14.0497C1.8597 12.9948 1.8481 12.6783 1.8481 10.0097C1.8481 7.34122 1.8597 7.02087 1.90671 5.96995C1.94959 4.99319 2.11365 4.46575 2.2504 4.11412C2.41065 3.68038 2.6646 3.28586 3.00067 2.96536C3.32483 2.63327 3.71553 2.37931 4.14927 2.21921C4.5009 2.08247 5.03231 1.9184 6.0051 1.87537C7.05999 1.82851 7.37652 1.81676 10.0449 1.81676C12.7174 1.81676 13.0337 1.82851 14.0848 1.87537C15.0616 1.9184 15.589 2.08247 15.9406 2.21921C16.3742 2.37931 16.7689 2.63327 17.0893 2.96536C17.4213 3.28967 17.6753 3.68038 17.8356 4.11412C17.9723 4.46575 18.1364 4.99701 18.1794 5.96995C18.2262 7.02484 18.238 7.34122 18.238 10.0097C18.238 12.6783 18.2262 12.9908 18.1794 14.0457Z" fill="#6C6C6C"/>
							<path d="M10.0362 4.86426C7.19976 4.86426 4.89844 7.16543 4.89844 10.002C4.89844 12.8385 7.19976 15.1397 10.0362 15.1397C12.8727 15.1397 15.1739 12.8385 15.1739 10.002C15.1739 7.16543 12.8727 4.86426 10.0362 4.86426ZM10.0362 13.3347C8.19605 13.3347 6.70345 11.8423 6.70345 10.002C6.70345 8.16172 8.19605 6.66927 10.0362 6.66927C11.8764 6.66927 13.3689 8.16172 13.3689 10.002C13.3689 11.8423 11.8764 13.3347 10.0362 13.3347Z" fill="#6C6C6C"/>
							<path d="M16.5767 4.6611C16.5767 5.32346 16.0397 5.86052 15.3772 5.86052C14.7148 5.86052 14.1777 5.32346 14.1777 4.6611C14.1777 3.99858 14.7148 3.46167 15.3772 3.46167C16.0397 3.46167 16.5767 3.99858 16.5767 4.6611Z" fill="#6C6C6C"/>
							</g>
							<defs>
							<clipPath id="clip0">
							<rect width="20" height="20" fill="white"/>
							</clipPath>
							</defs>
						</svg>',
		'YouTube' => '<?xml version="1.0" encoding="utf-8"?><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 92.2" style="enable-background:new 0 0 122.88 92.2" xml:space="preserve"><style type="text/css"><![CDATA[
						.st0{fill-rule:evenodd;clip-rule:evenodd;fill:#FF0000;}
						.st1{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
					]]></style><g><path class="st0" d="M6.36,0h110.16c3.5,0,6.36,2.86,6.36,6.36v67.08c0,3.5-2.86,6.36-6.36,6.36H6.36C2.86,79.8,0,76.94,0,73.44 V6.36C0,2.86,2.86,0,6.36,0L6.36,0z"/><path class="st0" d="M23.91,82.89h75.06c0.09,0,0.17,0.08,0.17,0.17v8.96c0,0.09-0.08,0.17-0.17,0.17H23.91 c-0.1,0-0.17-0.08-0.17-0.17v-8.96C23.73,82.96,23.81,82.89,23.91,82.89L23.91,82.89z"/><polygon class="st1" points="46.32,56.92 46.32,21.64 76.56,39.34 46.32,56.92"/></g></svg>'
	);

	return $socials_svgs;
}



?>