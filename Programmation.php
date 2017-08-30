<?php
/*
Template Name: Programmation
*/
 ?>

<?php get_header(); ?>

<!-- Content -->

<div class="prog-content-row orange columns ">



<div class="row columns">


  <?php $annee = get_field('annee_de_programmation');  ?>
    <img class="image-before" src="<?php echo get_template_directory_uri() ;?>/assets/images/Fichier1.png" alt=""><img class="image-before" src="<?php echo get_template_directory_uri() ;?>/assets/images/Fichier1.png" alt=""><h2><?php echo get_the_title(); ?></h2>

  <?php
  if ($annee) {

  $args = array(
    'post_type' => 'artiste',
    'tag_id' => $annee->term_id,
    'posts_per_page' => -1,
    'meta_key'			=> 'date_de_levènement_artistique',
	'orderby'			=> 'meta_value',
	'order'				=> 'ASC'
  );
  $query = new WP_Query($args);
  ?>
<!-- Boucle des artistes -->
<?php

  if ($query->have_posts()) {
    $array = array();
    $close = false;
    while ($query->have_posts()) {
      $query->the_post();
      setup_postdata( $post );
$date = get_field('date_de_levènement_artistique',$post);

$lejour = explode(',',$date);
if (!in_array($lejour[0], $array)) {
  array_push($array,$lejour[0]);
  if ($close == true) {
     echo "</div>";
  }
  echo "<div class='grid-item grid-sizer-full'><p><i class='fa fa-calendar' aria-hidden='true'><span>".$lejour[0]."</span></i></p></div>";

  echo "<div class='row columns grid'>";

  $close = true;
}
else{
  $close = false;
  }
  if ($close == true) {

  }
      echo "<div class=' col-artiste grid-item grid-sizer'>";

        $time = explode('-',$date);
        if (!$time[1]) {
        $time[1] =' A venir';
        }

        echo "<h4>".get_the_title()."</h4><i class='fa fa-clock-o' aria-hidden='true'><span>".$time[1]."</span></i>";




        echo "<div class='row columns medium-12'><div class='medium-12 columns'>";

      echo get_the_post_thumbnail($post, $size='large');

      echo "</div><div class='columns medium-12 description'><p>";
      echo the_field('description');
      echo "</p></div>";
      // Infos des groupes
      echo "</div></div>";

      wp_reset_postdata();


    }
    echo "</div>";
  }
    }
 ?>
</div>
</div>

<!-- Footer -->
<?php get_footer(); ?>


<script type="text/javascript">
jQuery(document).ready(function() {
var $grid = jQuery('.grid').isotope({
  itemSelector: '.grid-item',
   percentPosition: true,
masonry: {
  columnWidth:'.grid-sizer'
}
});

$grid.imagesLoaded().progress( function() {
  $grid.isotope('layout');
});
// change size of item by toggling gigante class
$grid.on( 'click', '.grid-item', function() {
  if(jQuery(this).hasClass('gigante') == false){
    jQuery('.gigante').toggleClass('gigante');
  }
jQuery(this).toggleClass('gigante');
// trigger layout after item size changes
$grid.isotope('layout');
});
});
</script>
