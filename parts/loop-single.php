<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
    <section class="entry-content" itemprop="articleBody">
		<?php the_post_thumbnail('full'); ?>
		<?php the_content(); ?>
	</section> <!-- end article section -->
	<?php comments_template(); ?>

</article> <!-- end article -->
