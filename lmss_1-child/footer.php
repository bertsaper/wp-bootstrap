<?php
// If Single or Archive (Category, Tag, Author or a Date based page).
if (is_single() || is_archive()):
	?>
	</div><!-- /.col -->

	<?php
	get_sidebar();
	?>

	</div><!-- /.row -->
	<?php
endif;
?>
</main><!-- /#main -->
<footer id="footer">
	<div class="container">
		<div class="row footer-area">
			<?php
			if (is_active_sidebar('third_widget_area')):
				?>
				<div class="col-md-12">
					<?php
					dynamic_sidebar('third_widget_area');

					if (current_user_can('manage_options')):
						?>
						<span class="edit-link"><a href="<?php echo esc_url(admin_url('widgets.php')); ?>"
								class="badge bg-secondary">
								<?php esc_html_e('Edit', 'lmss_1'); ?>
							</a></span><!-- Show Edit Widget link -->
						<?php
					endif;
					?>
				</div>
				<?php
			endif;
			?>
		</div><!-- /.row -->
	</div><!-- /.container -->
	<div class="container">
		<div class="row footer-area">
			<div class="col-md-6">
				<p>
					<?php printf(esc_html__('&copy; %1$s %2$s. All rights reserved.', 'lmss_1'), wp_date('Y'), get_bloginfo('name', 'display')); ?>
				</p>
			</div>
		</div><!-- /.row -->
	</div><!-- /.container -->
</footer><!-- /#footer -->
</div><!-- /#wrapper -->

<?php
wp_footer();
?>
</body>

</html>