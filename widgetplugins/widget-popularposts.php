<div class="widget-carousel">
	<h4>Popular Posts</h4>
	<div class="owl-carousel">
		<?php
		$queried_object = get_queried_object();
		
		$popular_posts = get_field('popular_posts', $queried_object);

		if( $popular_posts ): ?>
		    
		    <?php foreach( $popular_posts as $post_object): 

		        $postid_popular = $post_object->ID;//get_the_ID();
				$imgid_popular = get_post_thumbnail_id($postid_popular);
				
				//medium: 478x178
				$img_src_med = wp_get_attachment_image_url( $imgid_popular, 'medium' );
				$img_srcset_med = wp_get_attachment_image_srcset( $imgid_popular, 'medium' );
		        $img_alt = get_post_meta($imgid_popular)[_wp_attachment_image_alt][0];
		        $post_author = get_post_field( 'post_author', $post_object->ID );
		    ?>
		        
		    <div class="owl-carousel-slide">
		    		<a href="<?php the_permalink();?>" class="featured-image">
		    			<img src="<?php echo esc_url( $img_src_med ); ?>" 
		    				 srcset="<?php echo esc_attr( $img_srcset_med ); ?>" 
		    				 sizes="478px" 
		    			alt="<?=$img_alt?>">
		    		</a><!-- .featured-image -->
		    		<!--
		    		<a href="<?php echo get_permalink($post_object->ID); ?>" class="featured-image" style="background-image: url('<?=$thumbUrl?>');"></a>
		    		--><!-- .featured-image -->
		        							
		        	<div class="content">
		        		<ul class="meta-category-date">
		        			<li><?php echo get_the_time('M j, Y', $post_object->ID);?></li>
		        		</ul><!-- .meta-category-date -->
		        		
		        		<h3><a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a></h3>
		        		
		        		<p><?php the_field('excerpt', $post_object->ID); ?></p>
		        								
		        		<div class="author">
		        			by: <a href="<?php echo get_author_posts_url($post_author); ?>"><?php the_author_meta( 'display_name', $post_author ); ?></a>
		        		</div><!-- .author -->
		        	</div><!-- .content -->
		        </div><!-- .owl-carousel-slide-->	   
		    <?php endforeach; ?>

		    <?php else : ?>
		    	<p style="margin:20px;"> No popular posts selected</p>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
  	</div><!-- .owl-carousel -->
</div><!-- .widget-carousel -->