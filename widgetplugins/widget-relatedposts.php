<div class="widget-carousel">
	<h4>Related Posts</h4>
	<div class="owl-carousel">
		<?php
  			$orig_post = $post;
  			global $post;
  			$tags = wp_get_post_tags($post->ID);
   
  			if ($tags) {
  				$tag_ids = array();
  				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	  				
	  				$related_args=array(
	  					'tag__in' => $tag_ids,
	  					'post__not_in' => array($post->ID),
	  					'posts_per_page'=> 3, // Number of related posts to display.
	  					'caller_get_posts'=> 1
	 				 );
   
  					$my_query = new wp_query( $related_args );
 
  					if ( $my_query->have_posts() ) {
  					while( $my_query->have_posts() ) {
  						$my_query->the_post();
  						// $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						// $thumbUrl = $thumb['0'];
						
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
							</a><!-- .featured-image -->
							<!--
							<a href="<?php the_permalink() ?>" class="featured-image" style="background-image: url('<?=$thumbUrl?>');">
							</a>--><!-- .featured-image -->
							
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
  					} else {
  						?><p style="margin:20px;"> No related posts found.</p><?php
  					} //endif posts
  			} //endif tags
  			$post = $orig_post;
  			wp_reset_query();
  		?>
  	</div>
</div>