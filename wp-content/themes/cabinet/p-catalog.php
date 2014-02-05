<?php
/**
 * Template Name: Каталог продукции
 */
get_header();?>
<section class="catalog-content">    
    <?php $terms = apply_filters('taxonomy-images-get-terms', NULL, array('taxonomy' => 'product_taxonomy'))?>
    
    <?php print_r($terms); ?>
    <?php foreach($terms as $term){?>
    <?php if($term->term_id == 4):?>
    <article class="catalog-post big mayo">
        <?php echo wp_get_attachment_image($term->image_id, 'full'); ?>
        <h3><?php echo $term->name?></h3>
        <p><?php echo $term->description?></p>
        <a href="<?php echo get_term_link($term->slug, 'product_taxonomy') ?>" class="btn blue">Подробнее</a>
    </article><!--catalog post-->
    <?php endif; }?>

    <?php foreach($terms as $term){?>
    <?php if($term->term_id == 5):?>
    <article class="catalog-post big kethup">
        <?php echo wp_get_attachment_image($term->image_id, 'full'); ?>
        <h3><?php echo $term->name?></h3>
        <p><?php echo $term->description?></p>
        <a href="<?php echo get_term_link($term->slug, 'product_taxonomy') ?>" class="btn red">Подробнее</a>
    </article><!--catalog post-->
    <?php endif; }?>

    <?php foreach($terms as $term){?>
    <?php if($term->term_id == 6):?>
    <article class="catalog-post small">
        <?php echo wp_get_attachment_image($term->image_id, 'full'); ?>
        <h3><?php echo $term->name?></h3>
        <p><?php echo $term->description?></p>
        <a href="<?php echo get_term_link($term->slug, 'product_taxonomy') ?>" class="btn red">Подробнее</a>
    </article><!--catalog post-->
    <?php endif; }?>

    <?php foreach($terms as $term){?>
    <?php if($term->term_id == 7):?>
    <article class="catalog-post small tomato">
        <?php echo wp_get_attachment_image($term->image_id, 'full'); ?>
        <h3><?php echo $term->name?></h3>
        <p><?php echo $term->description?></p>
        <a href="<?php echo get_term_link($term->slug, 'product_taxonomy') ?>" class="btn red">Подробнее</a>
    </article><!--catalog post-->
    <?php endif; }?>

    <?php foreach($terms as $term){?>
    <?php if($term->term_id == 8):?>
    <article class="catalog-post small mustard">
        <?php echo wp_get_attachment_image($term->image_id, 'full'); ?>
        <h3><?php echo $term->name?></h3>
        <p><?php echo $term->description?></p>
        <a href="<?php echo get_term_link($term->slug, 'product_taxonomy') ?>" class="btn yellow">Подробнее</a>
    </article><!--catalog post-->
    <?php endif; }?>
    
</section><!--catalog content-->
<?php get_footer(); ?>