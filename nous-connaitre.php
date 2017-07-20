<?php
/*
Template Name: Nous connaitre
*/
?>

<?php get_header(); ?>
<div class="content">
  <div class="presentation">
  <div class="row">
    <?php if (have_posts()): the_post();?>

      <?php the_content(); ?>
    </div>
  </div>
<?php endif; ?>

<?php $args = array('post_type'=>'association');
$query = new WP_Query($args);
if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();
    ?>

    
    <div class="article">
      <div class="row remerciements" data-equalizer data-equalize-on="medium" id="test-eq">
           <?php
           echo "<div class='columns medium-5' data-equalizer-watch ><div class='skew-green' data-equalizer-watch></div><h2>".get_the_title()."</h2>";
           echo the_content();
           echo "</div>";
           $image = get_the_post_thumbnail_url($post,$size='full');
        ?>
        <div class="medium-7 columns" style="background-image:url('<?php echo $image; ?>');" data-equalizer-watch></div>
      </div>
    </div>

    <?php
  }
}
?>
  </div>
<?php get_footer(); ?>
