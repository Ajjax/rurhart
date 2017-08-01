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
    'posts_per_page' => -1
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
      $field = get_field_object('date');
      $value = $field['value'];
      $label = $field['choices'][ $value ];
      // On rempli le tableau des jours
      if(!in_array($label, $tab_date, true)){

        echo "<div class='columns'>";
        array_push($tab_date, $label);
        echo "<h2>".$label."</h2></div>";
      }

      echo "<div class=' columns medium-3 col-artiste end grid-item'>";

        echo "<h3>".get_the_title()."</h3>";
        echo "<div class='row columns medium-12'><div class='medium-12 columns'>";
      echo get_the_post_thumbnail($post, $size='large');

      echo "</div><div class='columns medium-12 description'><p>";
      echo the_field('description');
      echo "</p></div>";
      // Infos des groupes
      echo "</div></div>";
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
   percentPosition: true,
masonry: {
  columnWidth: 25
}
});

$grid.imagesLoaded().progress( function() {
  $grid.isotope('layout');
});
// change size of item by toggling gigante class
$grid.on( 'click', '.grid-item', function() {
jQuery(this).toggleClass('gigante');
// trigger layout after item size changes
$grid.isotope('layout');
});
});
</script>
