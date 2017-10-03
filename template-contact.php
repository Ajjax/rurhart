<?php
/*
Template Name: Contact
*/
 ?>

<?php get_header(); ?>
<div class="content contact row">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  ?>
  <div class="container">
    <div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
      <div class="medium-8 columns" data-equalizer-watch>
        <h1 class="grand-titre">Suis nous partout ! </h1>
      </div>
      <div class="medium-2 columns" data-equalizer-watch>
        <a href="https://www.facebook.com/Festival-Les-ondes-sen-m%C3%AAlent-1442703312695699/" class="logocontact facebook" target="_blank"><img class="logocontact facebook" src="<?php echo get_template_directory_uri(); ?>/assets/images/logofacebook.png" alt="vignette facebook"></a>
      </div>
      <div class="medium-2 columns" data-equalizer-watch>
        <a href="https://www.youtube.com/channel/UCunbWVRBbJlhGEjjTLmaRxA" class="logocontact youtube" target="_blank"><img class="logocontact youtube" src="<?php echo get_template_directory_uri(); ?>/assets/images/logoyoutube.png" alt="vignette youtube"></a>
      </div>
    </div>
  </div>
  <div class="introduction">
    <p class="intro">C'est à Saint-Hilaire-de-Villefranche que tu pourras nous retrouver. Cette année, le lieu se situe en Centre-ville sur la route de Saint-Savinien ! Tu peux aussi nous contacter sur le formulaire plus bas, si tu as des questions, ou juste pour laisser un petit message ! :)</p>
  </div>
<div class="row">
  <div class="medium-6 columns">
    <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44460.16855328327!2d-0.5721335055730098!3d45.85609170135863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4800e6c23c8df961%3A0xa19956271e5b107d!2s17770+Saint-Hilaire-de-Villefranche!5e0!3m2!1sfr!2sfr!4v1500117988534" width="100%" height="500px" border="0" style="border:0" allowfullscreen></iframe>
  </div>
  <div class="medium-6 columns">
  </div>
</div>
  <?php
endwhile;
endif;
   ?>
</div>
<?php get_footer(); ?>
