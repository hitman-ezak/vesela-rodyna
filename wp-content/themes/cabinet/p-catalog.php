<?php
/**
 * Template Name: Каталог продукции
 */
get_header();?>
<section class="catalog-content">    
    <?php $terms = apply_filters('taxonomy-images-get-terms', NULL, array('taxonomy' => 'product_taxonomy'))?>
    
    <?php foreach($terms as $term): ?>
    <article class="catalog-post big mayo">
        <?php echo wp_get_attachment_image($term->image_id, 'full'); ?>
        <h3><?php echo $term->name?></h3>
        <p><?php echo $term->description?></p>
        <a href="<?php echo get_term_link($term->slug, 'product_taxonomy') ?>" class="btn blue">Подробнее</a>
    </article><!--catalog post-->
    <?php endforeach; ?>

</section><!--catalog content-->
<?php get_footer(); ?>