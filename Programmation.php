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
    $tab_date=[];
   echo "<div class='row grid'>";
    while ($query->have_posts()) {

      $query->the_post();

      // vars -> on récupère le custom fields des jours


// get raw date

setup_postdata( $post );

$date = get_field('date_de_levènement_artistique',$post);



// $timestamp = $dtime->getTimestamp();
// $timestamp = new DateTime($timestamp);
// $timestamp = $timestamp->format('DD d MM, yy');
?>


  <?php

      // $value = $field['value'];
      // $label = $field['choices'][ $value ];
      // On rempli le tableau des jours
      // if(!in_array($label, $tab_date, true)){
      //
      //   echo "<div class='columns grid-sizer-full grid-item '>";
      //   array_push($tab_date, $label);
      //   echo "<h2>".$label."</h2></div>";
      // }

      echo "<div class=' columns col-artiste end grid-item grid-sizer'>";

        echo "<h3>".get_the_title()."</h3>";

        echo $date;
    
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
  itemSelector: '.grid-item ',
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
