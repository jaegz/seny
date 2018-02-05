<?php
/**
 * Template Name: Form Test Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package safetyexecsny
 */

get_header(); ?>

	<section id="banner">
		<h2><?php the_title();?></h2>
	</section>

	<section id="main" class="container">
		<div class="box">
			<form id="testform">
                <div class="form-section">
                    <h4>General Information</h4>
                    <label for="firstname">First Name</label>
					<input type="text" name="firstname" required maxlength="42" data-parsley-trigger="focusout" data-parsley-error-message="Please enter your first name"/>
					<input type="file" name="file">
					<input type="submit" class="btn btn-default pull-right" value="APPLY">
                </div>
            </form>
		</div>
	</section>

<?php
get_footer();
