<?php
// Template Name: Accueil
?>

<?php get_header(); ?>


<center><div class="tab-photos2">
  <TABLE>
  <TR>
    <TD><img src="http://localhost:8888/Dev/wp-content/uploads/2017/07/13988142_1597155610583801_3125596113726369945_o-min-e1500152931195.jpg" width="300"  alt="je ce je veux"></TD>
    <TD><img src="http://localhost:8888/Dev/wp-content/uploads/2017/07/13909283_1597152880584074_570859487345729590_o.jpg" width="300"  alt="je ce je veux"></TD>
    <TD><img src="http://localhost:8888/Dev/wp-content/uploads/2017/07/13925878_1597172150582147_8628150722564755975_o.jpg" width="300"  alt="je ce je veux"></TD>
    <TD><img src="http://localhost:8888/Dev/wp-content/uploads/2017/07/13909167_1597155667250462_5308929691864973921_o.jpg" width="300"  alt="je ce je veux"></TD>
  </TR>
</TABLE>
</div>
</center>


<?php
$args=array(
  'post_type' => 'slider',
  'post_per_page' => 4
);
// The Query
$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) { ?>
  <div class="content-row" data-equalizer data-equalize-on="medium" id="test-eq">
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
  <div class="programmation">
    <img class="image-before" src="<?php echo get_template_directory_uri() ;?>/assets/images/Fichier1.png" alt=""><img class="image-before" src="<?php echo get_template_directory_uri() ;?>/assets/images/Fichier1.png" alt=""><h2 class="programmation-before">Programmation</h2>

    <?php
    $categorie = get_category_by_slug('programmation');
    $categorie = $categorie->term_id;
    $categories = get_categories (array(
      'parent' =>  $categorie,
      'orderby' => 'date',
      'order' => 'name'
    )
    );
    // var_dump($categories);
    $categorie = $categories[0]->term_id;
    // var_dump($categorie);
      // La requete pour aller chercher les artistes
    $args_programmation = array(
      'post_type' => 'artiste',
      'cat' => $categorie
    );
    // Execute la requete
    $query_prog = new WP_Query($args_programmation);

    ?>
    <!-- Boucle qui affiche les artistes -->
    <?php if ($query_prog->have_posts()) {
      //  Tableau des jours
      $tab_date=[];

      //  contenu des artistes
      $content='';

      //  compteur de loop
      $cpt=0;

      while ($query_prog->have_posts()) {
        $query_prog->the_post();
        ?>
        <?php

        // vars -> on récupère le custom fields des jours
        $field = get_field_object('date');
        $value = $field['value'];
        $label = $field['choices'][ $value ];

        // On rempli le tableau des jours
        if(!in_array($label, $tab_date, true)){
          array_push($tab_date, $label);
        }

        // Par défaut on affiche les artistes du vendredi

        $content .= "<div class='columns medium-3 artiste end' style='background-image:url(";
        $content .= get_the_post_thumbnail_url($post, $size='large');
        $content .= ");'>";
        $content .= "<p>".get_the_title()."</p>";
        $content .= "</div>";
        $cpt ++;
      }

      // Affichage des bouton jours
      echo "<div class='conteneur_artistes'>";
      echo "<div class='columns_artiste_date'>";
      foreach ($tab_date as $key) {
        echo "<a class='date click_artiste' value='".$key."'>".$key."</a>";
      }
      echo "</div>";
      // affichage des columns des artistes
      echo "<div class=' row ajax_artiste'> ".$content."</div>";
    } ?>
  </div>



  <div class="">
    <?php the_field('remerciemens'); ?>
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
            echo "<div class='columns medium-5' data-equalizer-watch ><div class='skew-green' data-equalizer-watch></div><h2>".get_the_title()."</h2>";
            echo get_the_content();
            echo "</div>";
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
jQuery('#cascade-slider').cascadeSlider({

});
</script>
