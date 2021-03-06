<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package safetyexecsny
 */

get_header(); ?>

	<section id="banner" class="front-page">
		<h2>WOWNEATFounded in 1944 to further the progress of the safety professional and advance the theory and practice of safety management.</h2>
		<!--
		<ul class="actions">
			<li><a href="#" class="button special">Sign Up</a></li>
			<li><a href="#" class="button">Learn More</a></li>
		</ul>
		-->
	</section>

	<section id="main" class="container front-page">
		<section class="box two-col">
			<div class="main-col">
				<header>
					<h2>Latest News</h2>
				</header>

				<?php
                    $home_query = new WP_Query();
                    if ( have_posts() ) : while ( have_posts() ) : the_post();

                    echo($home_query);
                ?>
                    <header>
                        <h1 class="page-title screen-reader-text">
                            <?php single_post_title(); ?>
                        </h1>
                    </header>
                    <?php
                        get_template_part( 'template-parts/content-excerpt', get_post_format() );
                        the_posts_navigation();
                    else :
					    get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</div>

			<aside>
				<?php get_sidebar(); ?>
			</aside>
		</section>

		<section class="box">
			<header>
				<h2>Who We Are</h2>
			</header>
			<img src="http://nj.assewp.org/wp-content/uploads/sites/110/2017/07/Safety2017.png" alt="" style="width:100%;">
			<p><br>Safety Executives of New York, Inc. (SENY) is a non-profit organization whose objective is to further the progress of the safety professional and advance the theory and practice of safety management.</p>
			<p>SENY was founded in 1944. Membership is limited to the senior safety manager for his/her organization in the metropolitan New York area. Current members represent organizations in a variety of endeavors including manufacturing, retail, construction, public service, financial services and insurance. As the responsibilities of the safety professional have expanded over the years into health, environmental and security, so has SENY's focus to meet our member’s needs.</p>
			<p>Our meetings include the annual Professional Development Conference, held in the spring of each year. The Professional Development Conference is open to the public and is attended by safety, risk managment, security and operating management personnel.</p>
		</section>
	</section><!-- #primary -->

<?php
get_footer();
