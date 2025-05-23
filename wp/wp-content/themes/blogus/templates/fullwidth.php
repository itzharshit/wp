<?php

/**
 * Template Name: Full Width Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Blogus
 */

get_header(); ?>
<main id="content" class="full-width-class content">
  <div class="container">
    <!--==================== breadcrumb section ====================-->
    <?php do_action('blogus_action_archive_page_title'); ?>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-card-box padding-20"> <?php 
          while ( have_posts() ) : the_post(); 
            the_content(); 

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;

          endwhile; // End of the loop. ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer();