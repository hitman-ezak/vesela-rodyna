<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <title>
            <?php wp_title('|', true, 'right'); ?>
            <?php bloginfo('name'); ?>
        </title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />        
        <?php wp_head(); ?>
        <!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <section <?php body_class('page') ?> >
            <header id="header">
                <section class="header-top">
                    <div class="logo">
                        <a href="<?php bloginfo('url') ?>" title="Веcела родина"><?php bloginfo('name') ?></a>
                    </div><!--logo-->
                    <div class="language">
                        <ul>
                            <li><a href="#">Eng</a></li>
                            <li><a class="active" href="#">Рус</a></li>
                            <li><a href="#">Укр</a></li>
                        </ul>
                    </div>
                    <nav class="sidebar">
                        <?php
                        $defaults = array(
                            'theme_location' => '',
                            'menu' => '',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => '',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul>%3$s</ul>',
                            'depth' => 0,
                            'walker' => ''
                        );
                        ?>
                        <?php wp_nav_menu($defaults); ?>
                    </nav><!--sidebar-->
                    <div class="phone">
                        <img src="<?php bloginfo('template_url') ?>/img/phone-bg.png" width="21" height="22" alt="Номер телефона">
                        <p>Телефон горячей линии</p>
                        <h2><?php echo simple_fields_value( 'phone', 211, 1 )?></h2>
                    </div><!--phone-->
                </section><!--header top-->
                <?php if (is_home()): ?>
                    <section id="slideshow">

                        <?php
                        
                        $args = array('post_type' => 'slids', 'posts_per_page' => -1);
                        $category_posts = new WP_Query($args);
                            
                        if ($category_posts->have_posts()) :
                            while ($category_posts->have_posts()) :
                                $category_posts->the_post();
                                ?>
                        <?php $cat_ids = simple_fields_value('name_of_category')?>
                                <section class="baner">
                                    <?php the_post_thumbnail('full') ?>
                                    <div class="baner-post-holder">
                                        <article class="baner-post">
                                            <h2><?php the_title() ?></h2>
                                            <?php echo excerpt(50) ?>
                                        </article>
                                        <a class="btn green"href="<?php echo get_term_link((int)$cat_ids[0], 'product_taxonomy')?>">Подробнее</a>
                                    </div><!--baner holder-->
                                </section><!--baner1-->
                                <?php
                            endwhile;
                        else:
                            ?>
                            Nothing found
                        <?php
                        endif;
                        wp_reset_postdata();
                        ?>

                    </section><!--sledeshow-->
                <?php endif; ?>
            </header><!--header-->
            <section class="wrapper">