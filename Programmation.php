<?php
/*
Template Name: Programmation
*/
 ?>

<?php get_header(); ?>

<!-- Content -->

<div class="prog-content-row">


  <center><div class="tab-photos">
    <TABLE>
  	<TR>
  		<TD><img src="http://localhost:8888/Dev/wp-content/uploads/2017/07/13988142_1597155610583801_3125596113726369945_o-min-e1500152931195.jpg" width="300"  alt="je ce je veux"></TD>
      <TD><img src="http://localhost:8888/Dev/wp-content/uploads/2017/07/dbb097_8c3cecb302fb43e68a4c900c3367bfa1-min.jpg" width="320"  alt="je ce je veux"></TD>
      <TD><img src="http://localhost:8888/Dev/wp-content/uploads/2017/07/13913896_1597167323915963_2542599409663938264_o-min.jpg" width="300"  alt="je ce je veux"></TD>
      <TD><img src="http://localhost:8888/Dev/wp-content/uploads/2017/07/14876672_1626561960976499_5779394756825962611_o-min.jpg" width="300"  alt="je ce je veux"></TD>
    </TR>
  </TABLE>
  </div>
</center>




  <?php $annee = get_field('annee_de_programmation');  ?>
  <h2><?php echo get_the_title(); ?></h2>

  <?php
  if ($annee) {

  $args = array('post_type' => 'artiste',  'tag_id' => $annee->term_id);
  $query = new WP_Query($args);
  ?>

<!-- Boucle des artistes -->
<?php
  if ($query->have_posts()) {
    $tab_date=[];
   echo "<div class='row'>";
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
      echo "<div class='columns medium-3 col-artiste'>";
      echo get_the_post_thumbnail();
      echo "<h3>".get_the_title()."</h3>";
      echo "<p>";
      echo the_field('description');
      echo "</p>";
      // Infos des groupes
      echo "</div>";

    }
echo "</div>";
  }
    }
 ?>

</div>

<!-- Footer -->
<?php get_footer(); ?>
