<?php
/**
 * Cabinet functions and definitions.
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
function my_style_method(){
	wp_register_style( 
	'cycle',
	get_template_directory_uri() . '/css/jquery.fancybox-1.3.4.css',
	array(),	
	false,
	'screen'
	 );
    wp_enqueue_style( 'fancybox' );
    
    wp_enqueue_script(
		'cycle',
		get_template_directory_uri().'/js/cycle.js',
		array('jquery')
	);
    
    wp_enqueue_script(
		'main',
		get_template_directory_uri().'/js/main.js'
	);
}
add_action('wp_enqueue_scripts', 'my_style_method');

function register_my_menus() {
  register_nav_menus(
    array(
      	'nav-menu' => __( 'Navigation Menu' ),
    	'recipes-menu' => 'Меню рецептов',
        'news-menu' => 'Меню новостей'
    )
  );
  
  
}
add_action( 'init', 'register_my_menus' );

add_filter('body_class','my_class_names');
function my_class_names($classes) {
	// добавим класс 'class-name' в массив классов $classes
	$classes[] = 'class-name';
	return $classes;
}

add_theme_support( 'post-thumbnails' );


function custom_excerpt_length( $length ) {
	return 9999;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more( $more ) {
	return ' ..';
}
add_filter('excerpt_more', 'new_excerpt_more');




function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'..';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }
    
    function content_custom($limit, $content_in) {
      $content = explode(' ', $content_in, $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }
    
    
    
    


function create_post_types() {
    
    
    /************************Посты продукции***********************************/
    $labels = array(
        'name' => _x('Продукция', 'post type general name'),
        'singular_name' => _x('Продукт', 'post type singular name'),
        'add_new' => _x('Добавить новый', 'Продукт'),
        'add_new_item' => __('Добавить новый продукт'),
        'edit_item' => __('Редактировать продукт'),
        'new_item' => __('Новый продукт'),
        'all_items' => __('Все продукты'),
        'view_item' => __('Просмотреть продукт'),
        'search_items' => __('Поиск продукциии'),
        'not_found' => __('Продукт не найдены'),
        'not_found_in_trash' => __('Продукции в корзине не найдено'),
        'parent_item_colon' => '',
        'menu_name' => 'Продукция'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail', 'editor'),
        'taxonomies' => array('post_tag')
    );
    register_post_type('product', $args);
    
    
    
     /************************Посты рецептов***********************************/
    $labels = array(
        'name' => _x('Рецепты', 'post type general name'),
        'singular_name' => _x('Рецепт', 'post type singular name'),
        'add_new' => _x('Добавить новый', 'Рецепт'),
        'add_new_item' => __('Добавить новый рецепт'),
        'edit_item' => __('Редактировать рецепт'),
        'new_item' => __('Новый рецепт'),
        'all_items' => __('Все рецепты'),
        'view_item' => __('Просмотреть рецепт'),
        'search_items' => __('Поиск рецептов'),
        'not_found' => __('Рецепт не найдены'),
        'not_found_in_trash' => __('Рецепта в корзине не найдено'),
        'parent_item_colon' => '',
        'menu_name' => 'Рецепты'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail', 'editor'),
        'taxonomies' => array('post_tag')
    );
    register_post_type('recipes', $args);
    
    
    
    /************************Посты слайдов***********************************/
    $labels = array(
        'name' => _x('Слайды', 'post type general name'),
        'singular_name' => _x('Слайд', 'post type singular name'),
        'add_new' => _x('Добавить новый', 'Слайд'),
        'add_new_item' => __('Добавить новый слайд'),
        'edit_item' => __('Редактировать слайд'),
        'new_item' => __('Новый слайд'),
        'all_items' => __('Все слайды'),
        'view_item' => __('Просмотреть слайд'),
        'search_items' => __('Поиск слайдов'),
        'not_found' => __('Слайды не найдены'),
        'not_found_in_trash' => __('Слайдов в корзине не найдено'),
        'parent_item_colon' => '',
        'menu_name' => 'Слайды'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail'),
        'taxonomies' => array('post_tag')
    );
    register_post_type('slids', $args);
    
    
    /************************Посты акций***********************************/
    $labels = array(
        'name' => _x('Акции', 'post type general name'),
        'singular_name' => _x('Акция', 'post type singular name'),
        'add_new' => _x('Добавить новую', 'Акцию'),
        'add_new_item' => __('Добавить новую акцию'),
        'edit_item' => __('Редактировать акцию'),
        'new_item' => __('Новая акция'),
        'all_items' => __('Все акции'),
        'view_item' => __('Просмотреть акцию'),
        'search_items' => __('Поиск акций'),
        'not_found' => __('Акции не найдены'),
        'not_found_in_trash' => __('Акций в корзине не найдено'),
        'parent_item_colon' => '',
        'menu_name' => 'Акции'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor', 'thumbnail'),
        'taxonomies' => array('post_tag')
    );
    register_post_type('akcii', $args);
    
    
    
    
    /************************Стрица настроек***********************************/
    $labels = array(
        'name' => _x('Настройки сайта', 'post type general name'),
        'singular_name' => _x('Настройки сайта', 'post type singular name'),
        'add_new' => 'добавить новую',
        'menu_name' => 'Настройки сайта'
    );

    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'page',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title'));

    register_post_type('settings', $args);
}
add_action('init', 'create_post_types');


function product_tax() {    
    register_taxonomy(
        'product_taxonomy', 'product', array(
        'hierarchical' => true,
        'label' => 'Категории',
        'query_var' => true,
        'rewrite' => array('slug' => 'product_taxonomies')
            )
    );
    
    register_taxonomy(
            'recipes_taxonomy', 'recipes', array(
        'hierarchical' => true,
        'label' => 'Категории',
        'query_var' => true,
        'rewrite' => array('slug' => 'recipes_taxonomies')
            )
    );
}
add_action('init', 'product_tax');

