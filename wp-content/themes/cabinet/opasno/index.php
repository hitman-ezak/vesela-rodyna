<?php
/**
 * The main template file.
 */
get_header();
?>
<section class="content">
    <article class="post-box stock">
        <header class="post-header">
            <div class="title-img"><div class="img-holder"></div></div>
            <h2>Акция</h2>
        </header>
        <?php
        $akciya = new WP_Query(array('post_type'=>'akcii','orderby' => 'rand', 'posts_per_page' => 1));

        if ($akciya->have_posts()) :
            while ($akciya->have_posts()) :
                $akciya->the_post();
                ?>
        
                <article class="post">
                    <h3><?php echo $akciya->post->post_title?></h3>
                    <?php the_post_thumbnail('medium')?>
                    
                    <?php echo $akciya->post->post_content?>
                </article><!--post-->
                <footer class="post-footer"><a href="<?php echo $akciya->post->guid ?>">Подробнее</a></footer>

                <?php
            endwhile;
        else:
            ?>
            Nothing found
        <?php endif;
        wp_reset_postdata(); ?>
    </article><!--post-box1-->
    <article class="post-box news">
        <header class="post-header">
            <div class="title-img"><div class="img-holder"></div></div>
            <h2>Новости</h2>
        </header>
        <article class="post">
        <?php
        $args = array('cat' => 1, 'posts_per_page' => '3');
        $category_posts = new WP_Query($args);

        if ($category_posts->have_posts()) :
            while ($category_posts->have_posts()) :
                $category_posts->the_post();
                ?>
                <article class="holder">
                <time><?php echo mysql2date('j.m.Y', $category_posts->post->post_date);?></time>
                <a href="<?php echo $category_posts->post->guid ?>"><?php echo $category_posts->post->post_title ?></a>
            </article>
                <?php
            endwhile;
        else:
            ?>
            Nothing found
        <?php endif;
        wp_reset_postdata(); ?>
            
        </article>
        <footer class="post-footer">
            <a href="<?php echo get_category_link(1); ?>">Архив новостей</a>
        </footer>
    </article><!--post box2-->
    
    
    <article class="post-box recipes">
        <header class="post-header">
            <div class="title-img"><div class="img-holder"></div></div>
            <h2>Рецепты</h2>
        </header>
        <article class="post">
            <?php
        $args = array('post_type' => 'recipes', 'posts_per_page' => '3');
        $category_posts = new WP_Query($args);

        if ($category_posts->have_posts()) :
            while ($category_posts->have_posts()) :
                $category_posts->the_post();
                ?>
                <article class="holder">
                <figure>
                    <figcaption><a href="<?php echo $category_posts->post->guid?>"><P><?php echo $category_posts->post->post_title?></P></a></figcaption>
                    <?php the_post_thumbnail('medium')?>
                </figure>
             </article>
                <?php
            endwhile;
        else:
            ?>
            Nothing found
        <?php endif;
        wp_reset_postdata();
        ?>
            
        </article>
        <footer class="post-footer">
            <a href="<?php echo get_term_link( 9, 'recipes_taxonomy' ); ?>">Все рецепты</a>
        </footer>
    </article><!--post box2-->
    
    
    <article class="post-box we">
        <header class="post-header">
            <div class="title-img"><div class="img-holder"></div></div>
            <h2>Мы</h2>
        </header>        
        <?php
        $args = array('page_id' => 41);
        $category_posts = new WP_Query($args);

        if ($category_posts->have_posts()) :
            while ($category_posts->have_posts()) :
                $category_posts->the_post();
                ?>
                <article class="post">
                    <article class="holder">
                        <?php the_content() ?>
                    </article>
                </article>
                <?php
            endwhile;
        else:
            ?>
            Nothing found
        <?php endif;
        wp_reset_postdata();
        ?>
    </article><!--post box3-->
</section><!--content-->
<?php get_footer()?>