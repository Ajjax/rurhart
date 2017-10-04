<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">

		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">

		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
			<!--[if IE]>
				<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	    	<meta name="theme-color" content="#121212">
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<!-- Drop Google Analytics here -->
		<!-- end analytics -->

	</head>

	<!-- Uncomment this line if using the Off-Canvas Menu -->

	<body <?php body_class(); ?>>
<div id="wptime-plugin-preloader"></div>
		<div class="off-canvas-wrapper">

			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>

			<div class="off-canvas-content" data-off-canvas-content>

<!-- <?php if(is_front_page()) {
    ?>
        <div class="banner">
          <div>
            <h1 id="title" role="title">Les ondes s'en mêlent</h1>
            <h2 id="subtitle">Association Rurh'art</h2>
          </div>
        </div>
<?php } ?> -->
				<header class="header" role="banner">
          <div id="intro">
            <h1 id="baseline1">Festival associatif</h1>
            <h2 id="title">LES ONDES<br>S'EN MÊLENT</h2>
            <p id="baseline">Prix libre</p>
          </div>

					 <!-- This navs will be applied to the topbar, above all content
						  To see additional nav styles, visit the /parts directory -->
					 <?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>


				</header> <!-- end .header -->
        <?php if (is_page('contact') || is_front_page() || is_home()) {

        ?>
        <div  class='marquee columns small-12' data-duration='15000' data-gap='0' data-duplicated='true'>
        <?php
        $args_diapo = array(
          'post_type' => 'diapo_head',
          'posts_per_pages' => 4
        );

        $query_diapo_photo = new WP_query($args_diapo);

        if ($query_diapo_photo->have_posts()) {
          while ($query_diapo_photo->have_posts()) {
            $query_diapo_photo->the_post();
            ?>
            <div class="marquee-div columns">
            <?php
            if (get_the_post_thumbnail($post, $size='medium')) {
              echo get_the_post_thumbnail($post, $size='medium');
            }
            else {
              the_content();
            }
            wp_reset_postdata();
            ?>
              </div>
            <?php
          }
        }
         ?>
    </div>
    <?php
    } ?>
