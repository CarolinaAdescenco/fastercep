<?php get_header()?>
    <?php if ( have_posts() ) { while ( have_posts() ) { the_post() ?>

        <!-- Loop para CPT -->
        <div class="d-block mx-0 my-5 item-servicos">                       
            <?php  
                $args_exemplo = array('post_type' => 'produto', 'posts_per_page' => -1);
                $query_exemplo = new WP_Query($args_exemplo);

                if ($query_exemplo -> have_posts()) {
                    while ( $query_exemplo -> have_posts()) {						
                        $query_exemplo -> the_post();                   
            ?>   

                <a href="<?php the_permalink()?>" class="p-3">
                    <figure>
                        <img src="<?php the_field('imagem_externa')?>" class="img-fluid">
                        <figcaption>
                            <h5><?php the_title()?></h5>
                        </figcaption>
                    </figure>
                </a>

            <?php
                        } 
                    wp_reset_query();
                }
            ?>
        </div>

        <!-- Loop foreach -->
        <?php foreach(get_field('paragrafos') as $info){ ?>
            <p><?php echo $info['paragrafo']?></p>
            <img src="<?php echo $info['imagem']?>" alt="Descrição da imagem" title="Título da imagem">
        <?}?>

        <!-- Retirar formatação content -->
        <p><?php echo striptags(get_the_content())?></p>

        <!-- Retirar formatação content de outra página -->
        <p><?php echo strip_tags(get_post(19) -> post_content)?></p>

        <!-- Imagem destacada -->
        <img src="<?php the_post_thumnail_url()?>" alt="Descrição da imagem" title="Título da imagem">



    <?php } wp_reset_postdata(); } ?>
<?php get_footer()?>