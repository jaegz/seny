if (jQuery('#form').length) {
    $form = jQuery('#form');

    $form.on('submit', function(e){
    
        e.preventDefault();

        // validate form with parsleyjs
        $form.parsley().validate();

        // continue submit if valid
        if ($form.parsley().isValid()) {

            
            var formData = new FormData(this);
            // ajax nonce declared in functions.php localization
            formData.append("security", ajaxpath.ajax_nonce);
            // submit handler declared in functions.php
            formData.append("action", "formSubmitHandler_ajax");
            
            // test form data
            // for (const pair of formData.entries()) { console.log(pair[0], pair[1]); }
            
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange=function() {
                if(xhr.readyState==4 && xhr.status==200) {
                    console.log(xhr.responseText);
                }
            }
            // ajaxurl declared in functions.php localization
            xhr.open("POST", ajaxpath.ajaxurl, true);
            xhr.send(formData);
    
            // fade out form and display success message
            $form.addClass('form-submitted-fadeout');
            jQuery('.box').append('<div class="form-success">Thank you for your application. SENY will respond back to you shortly.</div>');

        } else {
            return;
        }
        
    });
}
