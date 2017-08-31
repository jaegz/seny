<?php
/***************** custom code added by uday ***********************************/
	$util = ESAPI::getHTTPUtilities();
/***************** custom code added by uday ***********************************/
?>

<div class="widget-eloqua">
	<form name="subsside1470069307569" id="form126">
		<input value="subsside1470069307569" type="hidden" name="elqFormName"  />
		<input value="983435340" type="hidden" name="elqSiteId"  />
	    <input name="elqCampaignId" type="hidden"  />
		<label>sign up now to receive our latest blog posts</label>
		<input id="field0" class="emailAddress" name="emailAddress" type="text" placeholder="E-mail Address" />
		<input id="field1" type="hidden" name="firstName" value="" />
		<input id="field2" type="hidden" name="ms-BlogSignup" value="on" />
		<input type="hidden" value="<?php echo $util->getCSRFToken() ?>" name="token" id="token"/>
		<input type="submit" value="Subscribe" class="button"/>
	</form>
</div><!-- .widget-eloqua -->