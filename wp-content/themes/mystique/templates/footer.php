<?php

/*
 * @template  Mystique
 * @revised   December 20, 2011
 * @author    digitalnature, http://digitalnature.eu
 * @license   GPL, http://www.opensource.org/licenses/gpl-license
 */

// Document footer.
// This is a template part which is displayed on every page of the website.

?>

         </div>
       </div>
       <!-- /main -->

       <?php atom()->action('after_main'); ?>

       <?php if(atom()->MenuExists('footer')): ?>
       <div class="nav nav-footer page-content">
          <?php atom()->Menu($location = 'footer', $class = 'slide-up'); ?>
       </div>
       <?php endif; ?>

       <!-- footer -->
       <div class="shadow-left page-content">
         <div class="shadow-right">

           <div id="footer">

             <a style="text-align:center;" href="www.shfuliao.com">富辽投资管理公司 All Rights Reserved</a>
           </div>

         </div>
       </div>
       <!-- /footer -->

       <a class="go-top" href="#page"><?php atom()->te('Go to Top'); ?></a>

     </div>
    <!-- /page-ext -->


    <!-- <?php echo do_shortcode('[load]'); ?> -->

  </div>
  <!-- page -->

  <?php atom()->end(); ?>

</body>
</html>
