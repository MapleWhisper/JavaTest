<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php get_header(); ?>
<!-- - - - - - - - - - - - Entry - - - - - - - - - - - - - - -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php
        the_content();        
        tmm_link_pages();
        ?>

		<div class="clear"></div>

		<?php      
		
		tmm_layout_content(get_the_ID(), 'default');
				// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
				comments_template();
		endif;

    endwhile;

endif;
?>
<!-- - - - - - - - - - - - end Entry - - - - - - - - - - - - - - -->

<?php get_footer(); ?>

