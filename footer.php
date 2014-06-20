<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

            </div><!-- /.content-container -->

            <?php AlisiosHooks::content_wrapper_bottom(); ?>

        </div><!-- /.content-wrapper -->

        <?php AlisiosHooks::footer_before(); ?>

        <footer class="footer" role="contentinfo">

            <?php AlisiosHooks::footer_top(); ?>

            <div class="footer-container container">

                <?php AlisiosHooks::footer_in(); ?>

            </div>

            <?php AlisiosHooks::footer_bottom(); ?>

        </footer>

        <?php AlisiosHooks::footer_after(); ?>

    </div><!-- /.inner-wrap -->

    <?php AlisiosHooks::wrapper_before(); ?>

</div><!-- /.outer-wrap -->

<?php AlisiosHooks::body_bottom(); ?>

<!-- BEG wp_footer -->
<?php wp_footer(); ?>
<!-- END wp_footer -->

<?php echo '<!-- Number of Queries:'; echo (get_num_queries()); echo '   Seconds: '; timer_stop(1); echo '-->'; echo "\n"; ?>

</body>
</html>