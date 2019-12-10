<div class="item one">
  <div class="text">
    <?php the_content(); ?>

    <span><?php the_title(); ?> <i class="far fa-grin-hearts"></i></span>
  </div>
  <div class="client">
    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
  </div>
</div>