<?php
/**
 * Template part for displaying posts
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="blogger singlebox">
		<?php if( get_theme_mod( 'the_writers_blog_single_post_image',true) != '') { ?>
			<div class="post-image">
			    <?php 
			    	if(has_post_thumbnail()) { 
			        	the_post_thumbnail(); 
			      	}
			    ?>
		 	</div>
	 	<?php } ?>
	 	<?php if( get_theme_mod('the_writers_blog_show_hide_single_post_categories',true) != ''){ ?>
		<div class="category">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_category(); ?><span class="screen-reader-text"><?php esc_html_e( 'Category','the-writers-blog' );?></span></a>
		</div>
	 <?php } ?>
		<?php if( get_theme_mod( 'the_writers_blog_single_post_date',true) != '' || get_theme_mod( 'the_writers_blog_single_post_comment',true) != '' || get_theme_mod( 'the_writers_blog_single_post_author',true) != '') { ?>
			<div class="post-info">
				<?php if( get_theme_mod( 'the_writers_blog_single_post_date',true) != '') { ?>
				  <i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_single_post_date_icon_changer','fa fa-calendar')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('the_writers_blog_seperator_metabox') ); ?>
				<?php } ?>
				<?php if( get_theme_mod( 'the_writers_blog_single_post_author',true) != '') { ?>
				  <i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_single_post_author_icon_changer','fa fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('the_writers_blog_seperator_metabox') ); ?>
				<?php } ?>
				<?php if( get_theme_mod( 'the_writers_blog_single_post_comment',true) != '') { ?>
				  <i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_single_post_comment_icon_changer','fas fa-comments')); ?>"></i><span class="entry-comments"><?php comments_number( __('0 Comments','the-writers-blog'), __('0 Comments','the-writers-blog'), __('% Comments','the-writers-blog') ); ?></span><?php echo esc_html( get_theme_mod('the_writers_blog_seperator_metabox') ); ?>
				<?php } ?>
				<?php if( get_theme_mod( 'the_writers_blog_single_post_time',true) != '' ) { ?>
        	<span class="entry-time"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_single_post_time_icon_changer','fas fa-clock')); ?>"></i> <?php echo esc_html( get_the_time() ); ?></span>
        <?php }?>
			</div>
        <?php }?>
		<h1 class="text-capitalize"><?php the_title();?></h1>
		<div class="text">
	    	<?php the_content();?>
	  	</div>
	  	<?php if( get_theme_mod( 'the_writers_blog_tags_hide',true) != '') { ?>
		  	<div class="tags"><p><?php
		      if( $tags = get_the_tags() ) {
		        echo '<span class="meta-sep"></span>';
		        foreach( $tags as $content_tag ) {
		          $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
		          echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '">' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
		        }
		      } ?></p></div>
	    <?php } ?>
	</div>
</article>

<?php if (get_theme_mod('the_writers_blog_related_posts',true) != '') {
  get_template_part( 'template-parts/post/related-posts' );
}