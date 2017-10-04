
	<div class="sponsors row" data-equalizer data-equalize-on="medium" id="test-eq">
		<div class="skew-sponsor" data-equalizer-watch>

		</div>
		<div class="columns" data-equalizer-watch>


		<img class="image-before" src="<?php echo get_template_directory_uri(); ?>/assets/images/Fichier2.png" alt="">
		<h2>Un grand merci à nos partenaires</h2>
		<?php $sponsors = array(
			'post_type' => 'sponsor',
			'posts_per_page' => '-1'
		);
		$query_sponsor = new WP_Query($sponsors);
		 ?>
		<div class="columns medium-12" >
			<?php if ($query_sponsor->have_posts()): while ($query_sponsor->have_posts()) {
				$query_sponsor->the_post();
				// echo get_the_title();
				echo get_the_post_thumbnail($post,$size='full');
			} ?>

			<?php endif; ?>
			<br>
			<p> Et n'oubliez pas une chose importante : RESPECTONS L'ENVIRONNEMENT ! Et pensez au covoiturage (moins de dépenses d'essence = plus de bières ! </p>

		</div>
		</div>
	</div>




	<footer class="footer" role="contentinfo">
  <div class="centered clearfix">
    <div class="footer-logo small-6 large-3 columns">
      <img class="logo" src="<?php echo get_template_directory_uri();?>/assets/images/logo-asso.jpg">
      <div class="social">
        <a href="https://www.facebook.com/rurhart/" class="facebook">
          <img src="<?php echo get_template_directory_uri();?>/assets/images/facebook-logo-rond-S.png"></a>
        <a href="https://www.instagram.com/" class="twitter">
          <img src="<?php echo get_template_directory_uri();?>/assets/images/Instagram.png"></a>
        <a href="https://www.youtube.com/channel/UCunbWVRBbJlhGEjjTLmaRxA/" class="linkedin">
          <img src="<?php echo get_template_directory_uri();?>/assets/images/youtube.png"></a>
      </div>
    </div>
    <div class="footer-contact small-6 columns large-3">
       <h4>Contact</h4>
       <p>Les Ondes s'en mêlent
       <br>Association Rur'Hart
       <br>St Hillaire de Villefranche<br />Charente Maritime</p>
    </div>
      <div class="footer-links-holder2 small-12 large-3 columns">
				 <h4>Nos amis</h4>
        <ul class="footer-links2">
          <li><a href="https://www.facebook.com/assominderien86/">Association Min'de rien</a></li>
          <li><a href="http://koumonde2012.over-blog.com/2015/10/une-association-qui-vit.html">Association AAJC Togo</a></li>
          <li><a href="http://www.pouiwindin.fr">Association Pouiwindin</a></li>
        </ul>
      </div>
			<div class="footer-links-holder  small-12 large-3 columns">
      <ul class="footer-links">
          <li><a href="">Accueil</a></li>
          <li><a href="">Programmation</a></li>
          <li><a href="">L'association</a></li>
          <li><a href="">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bottom-bar">
  </div>



	</footer> <!-- end .footer -->

			</div>  <!-- end .main-content -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
		<script type="text/javascript">
		jQuery(window).load(function() {
		jQuery('.marquee').marquee({
//speed in milliseconds of the marquee
duration: 350000,
//gap in pixels between the tickers
gap: 0,
//time in milliseconds before the marquee will start animating
delayBeforeStart: 0,
//'left' or 'right'
direction: 'left',
//true or false - should the marquee be duplicated to show an effect of continues flow
duplicated: true
});
});
		</script>
	</body>
	</html> <!-- end page -->
