<?php
/**
 * The template for displaying the footer.
 *
 * @package blue-monday
 */

?>  
            </div>

            <footer class="footer" role="contentinfo">
                 <?php
                /**
                 * Functions hooked in to blue_monday_footer action.
                 *
                 * @hooked blue_monday_template_footer_widgets -10 
                 * @hooked blue_monday_template_copyright -15
                 */ 
                    do_action('blue_monday_footer'); 
                ?>
            </footer>

        <?php wp_footer(); ?>
    </body>

</html>