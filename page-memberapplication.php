<?php
/**
 * Template Name: Member Application Page
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
			<h4>Eligibility Requirements for SENY Membership</h4>
            <ul>
                <li>Must work in the NY/Metro Area.</li>
                <li>Must work in the EH&amp;S Field.</li>
                <li>Must be highest ranking EH&amp;S officer of the company for the Metro Area.</li>
                <li>One member per Parent Corporation. If there is a safety director of a subsidiary corporation who has independent direction
                    of a subsidiary program, such person may become a member, in addition to the safety director, of the parent.</li>
            </ul>
            <p>
                <small>All fields are required.</small>
            </p>
            <hr>

            <form id="form">
                <div class="form-section">
                    <h4>General Information</h4>
                    <label for="first-name">First Name</label>
                    <input type="text" name="first-name" required maxlength="42" data-parsley-trigger="focusout" data-parsley-error-message="Please enter your first name"
                    />
                    <label for="last-name">Last Name</label>
                    <input type="text" name="last-name" required maxlength="42" data-parsley-trigger="focusout" data-parsley-error-message="Please enter your last name"
                    />
                    <label for="phone-number">Phone Number (555-555-5555)</label>
                    <input type="text" name="phone-number" required maxlength="16" data-parsley-trigger="focusout" data-parsley-pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$"
                        data-parsley-error-message="Please enter a valid phone number" />
                    <label for="email">Email Address</label>
                    <input type="email" name="email" required maxlength="42" data-parsley-trigger="focusout" data-parsley-error-message="Please enter a valid email"
                    />
                    <div class="progress-bar">
                        <div class="bar-25">step 1 of 4</div>
                    </div>
                </div>
                <div class="form-section">
                    <h4>Employment Information</h4>
                    </p>
                    <label for="employer">Employer</label>
                    <input type="text" name="employer" required maxlength="100" data-parsley-trigger="change" data-parsley-error-message="Please enter your employer"
                    />
                    <label for="business-address">Business Address</label>
                    <input type="text" name="business-address" required maxlength="100" data-parsley-trigger="change" data-parsley-error-message="Please enter your business address"
                    />
                    <label for="business-city">Business City</label>
                    <input type="text" name="business-city" required maxlength="42" data-parsley-trigger="change" data-parsley-error-message="Please enter your business city"
                    />
                    <label for="business-state">Business State</label>
                    <select name="business-state" required data-parsley-trigger="change" data-parsley-error-message="Please choose your business state">
                        <option value="" disabled="" selected="" hidden="">Select a US State...</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                    <label for="business-zip">Business Zip</label>
                    <input type="text" name="business-zip" required maxlength="10" data-parsley-trigger="change" data-parsley-type="digits" data-parsley-error-message="Please enter your business zip"
                    />
                    <div class="progress-bar">
                        <div class="bar-50">step 2 of 4</div>
                    </div>
                </div>
                <div class="form-section">
                    <h4>Current Position</h4>
                    </p>
                    <label for="title">Title</label>
                    <input type="text" name="title" required maxlength="42" data-parsley-trigger="change" data-parsley-error-message="Please enter your title"/>
                    <label for="time-current">Length of time in current position</label>
                    <input type="text" name="time-current" required maxlength="42" data-parsley-trigger="change" data-parsley-error-message="Please enter the length of time in current position"/>
                    <label for="time-ehs">Length of time in the EH&amp;S profession</label>
                    <input type="text" name="time-ehs" required maxlength="42" data-parsley-trigger="change" data-parsley-error-message="Please enter the length of time in the EH&amp;S profession"/>
                    <label for="report">Title of person to whom you report</label>
                    <input type="text" name="report" required maxlength="42" data-parsley-trigger="change" data-parsley-error-message="Please enter the title of the person whom you report"/>
                    <label for="scope">Define your management scope and responsibilities (250 characters max)</label>
                    <textarea name="scope" rows="6" required maxlength="250" data-parsley-trigger="change" data-parsley-error-message="Please fill out this field"></textarea>
                    <label for="related">Additional Professional Experience (safety related affiliations, organizations, committees)</label>
                    <textarea name="related" rows="6" required maxlength="250" data-parsley-trigger="change" data-parsley-error-message="Please fill out this field"></textarea>
                    <div class="progress-bar">
                        <div class="bar-75">step 3 of 4</div>
                    </div>
                </div>
                <div class="form-section">
                    <h4>Resume Upload (should reflect at least last 5 years of work experience)</h4>
                    <input type="file" name="file" required data-parsley-filemaxmegabytes="100" data-parsley-filemimetypes="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, " data-parsley-error-message="Please upload your resume in either .PDF, .DOC, or .DOCX format" />
                    <small>PDF or MS Word formats (DOC, DOCX)</small>
                    <br/><br/>
                    <label for="date">Application Completed On: </label>
                    <input type="hidden" name="date" />
                    <div class="progress-bar">
                        <div class="bar-100">step 4 of 4</div>
                    </div>
                </div>
                <div class="form-navigation">
                    <button type="button" class="button alt previous btn btn-info pull-left">&lt; Previous</button>
                    <button type="button" class="button alt next btn btn-info pull-right">Next &gt;</button>
                    <!-- 
                    <div class="recaptcha">
                        ADD GOOGLE reCAPTCHA
                    </div>
                     -->
                    <input type="submit" class="btn btn-default pull-right btn__apply" value="APPLY">
                    <span class="clearfix"></span>
                </div>
            </form>
		</div>
	</section>

<?php
get_footer();
