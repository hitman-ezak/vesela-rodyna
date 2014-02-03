<?php

/**
 * Template Name: Контакты
 */
get_header();
?>

 <?php while (have_posts()) : the_post(); 
    $field_group_values = simple_fields_fieldgroup('group_kontakts');
 ?>
            
<section class="content contact">
    <header class="contact-title">
        <h2><?php the_title()?></h2>
        
        <p><?php echo $field_group_values['adres']?></p>
    </header>
    <div class="map">
        <?php the_content()?>
    </div>
    <article class="contact-info">
        <article class="contact-time">
            <img src="<?php bloginfo('template_url')?>/img/contact-img1.png" width="48" height="48" alt="Время работы">
            <h6>Время работы</h6>
            <p><?php echo $field_group_values['vremya']?></p>
        </article>
        <article class="contact-phone">
            <img src="<?php bloginfo('template_url')?>/img/contact-img2.png" width="48" height="48" alt="Номер телефона">
            <ul>
                <li>
                    <h6>Приемная</h6>
                    <p><?php echo $field_group_values['priemnaya']?></p>
                </li>
                <li>
                    <h6>Отдел продаж</h6>
                    <p><?php echo $field_group_values['otdel_prodaj']?></p>
                </li>
                <li>
                    <h6>Отдел маркетинга</h6>
                    <p><?php echo $field_group_values['otdel_marketinga']?></p>
                </li>
            </ul>
        </article>
    </article><!--contact info-->
    <form action="">
        <h2>Отправить сообщение</h2>
        <?php echo do_shortcode('[contact-form-7 id="158" title="Контактная форма 1"]') ?>
    </form>
</section><!--content-->

        <?php endwhile; // end of the loop.  ?>
            

<?php get_footer(); ?>