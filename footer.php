<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

		</div><!-- /.content-wrapper -->

		<footer class="footer" role="contentinfo">

			<div class="footer-content container">

                <p>&copy; 2013 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a>.</p>

			</div><!-- /.footer-content -->

		</footer>

	</div><!-- /.inner-wrap -->

</div><!-- /.outer-wrap -->

<!-- BEG wp_footer -->
<?php wp_footer(); ?>
<!-- END wp_footer -->

<?php echo '<!-- Number of Queries:'; echo (get_num_queries()); echo '   Seconds: '; timer_stop(1); echo '-->'; echo "\n"; ?>

</body>
</html>