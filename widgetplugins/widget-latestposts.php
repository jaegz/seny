<div class="widget-carousel">
	<h4>Latest Posts</h4>
	<div class="owl-carousel">
		<?php
  			$orig_post = $post;
  			global $post;
	  				
			$latest_args=array(
	  			'orderby' => 'post_date',
	  			'post_type' => 'post',
	  			'post_status' => 'publish',
	  			'cat' => '-9',
	  			'posts_per_page'=> 3 // Number of related posts to display.
	 		);
   
  			$my_query = new wp_query( $latest_args );
 
  			if ( $my_query->have_posts() ) {
  				
  				while( $my_query->have_posts() ) {
  					$my_query->the_post();			
					$postid = get_the_ID();
					$imgid = get_post_thumbnail_id($postid);
					//medium: 478x178
					$img_src_med = wp_get_attachment_image_url( $imgid, 'medium' );
					$img_srcset_med = wp_get_attachment_image_srcset( $imgid, 'medium' );
					$img_alt = get_post_meta($imgid)[_wp_attachment_image_alt][0];
  				?>
			
				<div class="owl-carousel-slide">
					<a href="<?php the_permalink();?>" class="featured-image">
						<img src="<?php echo esc_url( $img_src_med ); ?>" 
							 srcset="<?php echo esc_attr( $img_srcset_med ); ?>" 
						 	sizes="478px" 
						alt="<?=$img_alt?>">
					</a>
							
					<div class="content">
						<ul class="meta-category-date">
							<li><a href="<?=$catlink?>" class="category"><?=$catname?></a></li>
							<li><?php $post_date = the_time('M j, Y');?><a href="" class="date"><?=$post_date?></a></li>
						</ul><!-- .meta-category-date -->
		
						<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				
						<p><?php the_field('excerpt'); ?></p>
								
						<div class="author">
							by: <?php echo get_the_author_posts_link(); ?>
						</div><!-- .author -->
					</div><!-- .content -->
				</div><!-- .owl-carousel-slide-->	   
				
				<?php } // endwhile
  			} else { ?>
  				<p style="margin:20px;"> No posts found.</p>
  			<?php } //endif posts
  				$post = $orig_post;
  				wp_reset_query();
  			?>
  	</div>
</div>