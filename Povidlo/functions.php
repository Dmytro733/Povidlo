<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * 
 * @package Povidlo
 */
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

/**
 * Enqueue scripts and styles.
 */
function povidlo_scripts() {
	wp_style_add_data( 'povidlo-style', 'rtl', 'replace' );

    wp_enqueue_script( 'jQuery.js', get_template_directory_uri() . '/js/jQuery.js');
	wp_enqueue_script( 'povidlo-my.js', get_template_directory_uri() . '/js/mine.js');

	
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
	
}
?>