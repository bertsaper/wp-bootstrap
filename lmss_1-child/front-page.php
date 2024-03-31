<?php
/**
 * Template Name: Homepage
 * Description: The template for displaying the homepage.
 *
 */

get_header('homepage');


$page_id = get_option( 'page_for_posts' );
?>
<div class="row">
	<div class="col-12">
		<?php
			echo apply_filters( 'the_content', get_post_field( 'post_content', $page_id ) );

			edit_post_link( __( 'Edit', 'lmss_1' ), '<span class="edit-link">', '</span>', $page_id );
		?>
	</div><!-- /.col -->
</div><!-- /.row -->
<?php
get_footer();
