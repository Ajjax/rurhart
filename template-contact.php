<?php
/*
Template Name: Contact
*/
 ?>

<?php get_header(); ?>
<div class="content contact row">
  <?php if (have_posts()) {
    the_post();
  ?>
  <div class="container">
    <div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
      <div class="medium-8 columns" data-equalizer-watch>
        <h1>Suis nous sur les réseaux sociaux ! </h1>
      </div>
      <div class="medium-2 columns" data-equalizer-watch>
        <img class="logocontact facebook" src="<?php echo get_template_directory_uri(); ?>/assets/images/logofacebook.png">
      </div>
      <div class="medium-2 columns" data-equalizer-watch>
        <img class="logocontact" src="<?php echo get_template_directory_uri(); ?>/assets/images/logoyoutube.png">
      </div>

    </div>
  </div>


  <div>
    <p class="intro">C'est à Saint-Hilaire-de-Villefranche que tu pourras nous retrouver. Cette année, le lieu se situe en Centre-ville sur la route de Saint-Savinien !</p>
    <p class="intro2">Tu peux aussi nous laisser un petit message sur le formulaire plus bas, si tu as des questions, ou juste pour laisser un petit message ! :)
  </div>

<div class="row">
  <div class="medium-6 columns">
    <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44460.16855328327!2d-0.5721335055730098!3d45.85609170135863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4800e6c23c8df961%3A0xa19956271e5b107d!2s17770+Saint-Hilaire-de-Villefranche!5e0!3m2!1sfr!2sfr!4v1500117988534" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
  <div class="medium-6 columns">
    <?php echo do_shortcode('[contact-form-7 id="158" title="Contact"]'); ?>
  </div>
</div>

  <?php the_content(); ?>




  <?php
  } ?>
</div>

<?php get_footer(); ?>
