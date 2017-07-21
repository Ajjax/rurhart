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
        <h1>Titre</h1>
      </div>
      <div class="medium-2 columns" data-equalizer-watch>
        <img class="logocontact" src="<?php echo get_template_directory_uri(); ?>/assets/images/logofacebook.png">
      </div>
      <div class="medium-2 columns" data-equalizer-watch>
        <img class="logocontact" src="<?php echo get_template_directory_uri(); ?>/assets/images/logoyoutube.png">
      </div>

    </div>
  </div>


  <div>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>

  <div>
    <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44460.16855328327!2d-0.5721335055730098!3d45.85609170135863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4800e6c23c8df961%3A0xa19956271e5b107d!2s17770+Saint-Hilaire-de-Villefranche!5e0!3m2!1sfr!2sfr!4v1500117988534" width="800" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>

  <?php the_content(); ?>




  <?php
  } ?>
</div>

<?php get_footer(); ?>
