<?php
// Template Name: Accueil
?>

<?php get_header(); ?>

<?php
  $texte_prog = get_field('texte_programmation');
 ?>


<?php
$args=array(
  'post_type' => 'slider',
  'post_per_page' => 4
);
// The Query
$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) { ?>
  <div class="content-row columns"  data-equalize-on="small" id="test-eq">
    <div class="background-slider" data-equalizer-watch></div>
    <div class="cascade-slider_container"  id="cascade-slider" data-equalizer-watch>
      <div class="cascade-slider_slides" >
        <?php while ( $the_query->have_posts() ) {
          $the_query->the_post();
          $image = get_field('image');
          $video = get_field('video');
          ?>
          <div class="cascade-slider_item" style="background-image: url(<?php echo $image['url']; ?>" alt="<?php echo $image['alt'];?>);">
            <?php if ($video): ?>
              <?php echo "<iframe src='https://www.youtube.com/embed/";
                echo $video['vid'];
                echo "?showinfo=0&controls=0&autohide=1'width='100%' height='100%' frameborder='0' allowfullscreen control></iframe>"; ?>
              <?php endif; ?>
            </div>
            <?php
          }
          wp_reset_postdata();
        }
        ?>
      </div>
      <span class="cascade-slider_arrow cascade-slider_arrow-left arrow left " data-action="prev"></span>
      <span class="cascade-slider_arrow cascade-slider_arrow-right arrow right " data-action="next"></span>
    </div>
  </div>



  <!-- Programmation -->
  <div class="orange columns medium-12 ">
    <div class="programmation column row">
      <div class="medium-12 columns day">
        <img class="image-before" src="<?php echo get_template_directory_uri() ;?>/assets/images/Fichier1.png" alt=""><h2 class="programmation-before">Programmation</h2>
      </div>
        <?php
          $page = get_page_by_title( 'Programme du festival');
          // var_dump($page);
          $annee = get_field('annee_de_programmation', $page->ID);
          $args_programmation = array(
            'post_type' => 'artiste',
            'tag_id' => $annee->term_id,
            'posts_per_page' => -1,
            'meta_key'			=> 'date_de_levènement_artistique',
  	         'orderby'			=> 'meta_value',
  	          'order'				=> 'ASC'
            );
            // Execute la requete
            $query_prog = new WP_Query($args_programmation);

            if ($query_prog->have_posts()) {
                $array = array();
              while ($query_prog->have_posts()) {
                $query_prog->the_post();


                setup_postdata( $post );

                $date = get_field('date_de_levènement_artistique',$post);

                $lejour = explode(',',$date);

                  // if (!in_array($lejour[0], $array)) {
                  //   array_push($array,$lejour[0]);
                  //   echo "<div class='columns medium-12'><p><i class='fa fa-calendar' aria-hidden='true'> ".$lejour[0]."</i></p></div>";
                  // }

                  echo "<div class='columns medium-3'>";

                  $time = explode('-',$date);
                  if (!$time[1]) {
                    $time[1] =' A venir';
                  }

                  echo "<div class='row columns medium-12'  style='background-image:url(".get_the_post_thumbnail_url($post, $size='medium').");background-size:cover;width:100%;height:200px;'><figcaption><h3>".get_the_title()."</h3><p><i class='fa fa-calendar' aria-hidden='true'><span>".$lejour[0]."</span></i> <i class='fa fa-clock-o' aria-hidden='true'>".$time[1]."</i></p></figcaption><div class='medium-12 columns'>";

      // Infos des groupes
                  echo "</div></div></div>";
                  wp_reset_postdata();
                }
              } ?>
            <div class="columns medium-12 show-prg">

              <?php
              $page = get_page_by_title( 'Programme du festival');
              $url = get_permalink($page->ID);

               ?>
              <a href="<?php echo $url;?>">Détails de la programmation</a>
            </div>
            </div>
            <div class="column texte_prog medium-10">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>




<!-- Fin programmation -->


  <?php
  $remerciements = array('post_type'=>'association','post_per_page'=>1, 'meta_key'=> 'affichage_page_daccueil',
	'meta_value'	=> '1');
  $query_remerciements = new WP_Query($remerciements);
   ?>
   <?php if ($query_remerciements->have_posts()): while ($query_remerciements->have_posts()) {
     $query_remerciements->the_post();
     ?>
     <div class="green">
       <div class="row remerciements" data-equalizer data-equalize-on="medium" id="test-eq">
            <?php
            echo "<div class='columns medium-5' data-equalizer-watch ><div class='skew-green' data-equalizer-watch></div><div class='padding-top-7'><h2>".get_the_title()."</h2><p>";
            echo the_content();
            echo "</p></div></div>";
            $image = get_the_post_thumbnail_url($post,$size='full');
         ?>
         <div class="medium-7 columns" style="background-image:url('<?php echo $image; ?>');" data-equalizer-watch></div>
       </div>
     </div>

  <?php
   } ?>

   <?php endif; ?>


<?php get_footer(); ?>

<script type="text/javascript">
jQuery(document).ready(function() {
jQuery('#cascade-slider').cascadeSlider({

});
});
</script>
