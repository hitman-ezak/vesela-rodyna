<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
        <title>
            <?php wp_title('|', true, 'right'); ?>
            <?php bloginfo('name'); ?>
        </title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />        
        <?php wp_head(); ?>
    </head>
    <body>
	<section <?php body_class('page') ?> >
		<header id="header">
			<section class="header-top">
					<div class="logo">
						<a href="<?php bloginfo('url')?>" title="Велела родина"><?php bloginfo('name')?></a>
					</div><!--logo-->
					<div class="language">
						<ul>
							<li><a href="#">Eng</a></li>
							<li><a class="active" href="#">Рус</a></li>
							<li><a href="#">Укр</a></li>
						</ul>
					</div>
					<nav class="sidebar">
                                            <?php $defaults = array(
						'theme_location'  => '',
						'menu'            => '', 
						'container'       => '', 
						'container_class' => '', 
						'container_id'    => '',
						'menu_class'      => '', 
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul>%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					); ?>
					<?php wp_nav_menu($defaults); ?>
					</nav><!--sidebar-->
					<div class="phone">
						<img src="<?php bloginfo('template_url')?>/img/phone-bg.png" width="21" height="22" alt="Номер телефона">
						<p>Телефон горячей линии</p>
						<h2>8 800 20-14-24</h2>
					</div><!--phone-->
			</section><!--header top-->
                        <?php if(is_home()):?>
			<section id="slideshow">
				<section class="baner">
					<img src="<?php bloginfo('template_url')?>/img/baner-img1.png" width="1014" height="288" alt="Узнай больше о кетчупе">
					<div class="baner-post-holder">
						<article class="baner-post">
							<h2>Кетчуп</h2>
							<p>Кетчуп уникален по своей рецептуре: нежный и слегка пряный вкус делает этот кетчуп обязательным состовляющим для мясных, рыбных блюд и различных гарниров.</p>
						</article>
						<div class="post-holder"><a class="btn green"href="#">Подробнее</a></div><!--post holder-->
					</div><!--baner holder-->
				</section><!--baner1-->
				<section class="baner">
					<img src="<?php bloginfo('template_url')?>/img/baner-img1.png" width="1014" height="288" alt="Узнай больше о кетчупе">
					<div class="baner-post-holder">
						<article class="baner-post">
							<h2>Кетчуп</h2>
							<p>Кетчуп уникален по своей рецептуре: нежный и слегка пряный вкус делает этот кетчуп обязательным состовляющим для мясных, рыбных блюд и различных гарниров.</p>
						</article>
						<div class="post-holder"><a class="btn green"href="#">Подробнее</a></div><!--post holder-->
					</div><!--baner holder-->
				</section><!--baner2-->
				<section class="baner">
					<img src="<?php bloginfo('template_url')?>/img/baner-img1.png" width="1014" height="288" alt="Узнай больше о кетчупе">
					<div class="baner-post-holder">
						<article class="baner-post">
							<h2>Кетчуп</h2>
							<p>Кетчуп уникален по своей рецептуре: нежный и слегка пряный вкус делает этот кетчуп обязательным состовляющим для мясных, рыбных блюд и различных гарниров.</p>
						</article>
						<div class="post-holder"><a class="btn green"href="#">Подробнее</a></div><!--post holder-->
					</div><!--baner holder-->
				</section><!--baner3-->
			</section><!--sledeshow-->
                        <?php endif; ?>
		</header><!--header-->
		<section class="wrapper">