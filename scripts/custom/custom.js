// offcanas controls
function init_offcanvas($) {

	var $offcanvasTrigger   = $('.offcanvasTrigger');
	var $translateOffcanvas = $('.translateOffcanvas');
	var $offcanvasOverlay   = $('.offcanvas-overlay');

	var clicked = false;

	$offcanvasTrigger.on('click', function(e) {
  		e.preventDefault();

  		clicked = !clicked;
  		
  		var i = $offcanvasTrigger.index(this);
  		var $isOpen = $('.isOpen');
    
  		if ($(this).hasClass('isOpen')) {
    		$isOpen.removeClass('isOpen');
  		} else {
    		$isOpen.removeClass('isOpen');
    		$offcanvasTrigger.eq(i).toggleClass('isOpen');
    		$translateOffcanvas.eq(i).toggleClass('isOpen');
    		$offcanvasOverlay.toggleClass('isOpen');
  		}
	});
}

// mobile top bar control
function init_scrollHideNav($) {
  if($('.navigationbar').css('display') == 'none'){
    return; //exit
  }
  var userScroll;
  var lastScrollTop = 0;
  var delta = 5;
  var navbarSmall = $('.navigationbar');
  var navbarHeight = navbarSmall.outerHeight();
  var $translateOffcanvas = $('.translateOffcanvas');

  $(window).scroll(function(event){
    userScroll = true;
  });

  setInterval(function(){
    if(userScroll){
      hasScrolled();
      userScroll = false;
    }
  }, 250);

  function hasScrolled(){
    var st = $(this).scrollTop();
    
    if (Math.abs(lastScrollTop - st) <= delta ) {
      return;
    }

    if (st > lastScrollTop && st > navbarHeight) {
      if ($translateOffcanvas.hasClass('isOpen')) {
        // do nothing
      }
      else {
          navbarSmall.removeClass('navDown').addClass('navUp');
      }
    } else {
      if (st + $(window).height() < $(document).height()) { 
        navbarSmall.removeClass('navUp').addClass('navDown');
      }
    }
    lastScrollTop = st;
  }
}



function init_fixSticky($) {
  $(window).scroll(function(){
    var sticky = $('.sticky'),
        offset = $('.mobile-nav-offset')
        scroll = $(window).scrollTop();

    if (scroll >= 80) {
      sticky.addClass('fixed');
      offset.addClass('fixed');
    } else { 
      sticky.removeClass('fixed');
      offset.removeClass('fixed');
    }
  });
}


function init_emailSupport_ajax($){

    //var allowed_file_size = "1048576"; // 1MB


    // validation and submit handler
    $('#emailSupport').validate({
      //debug : true, 
      rules : {
        email : {
          required: true,
          email: true
        },
        subject : {
          required: true
        },
        description : {
          required: true
        },
        attachment : {
          required: false,
          accept: "image/png,image/gif,image/jpeg,application/pdf,application/vnd.ms-excel,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/zip,application/x-7z-compressed"
        }
      },
      messages : {
        email : {
          required: "Please enter an e-mail address.",
          email: "Please enter a valid e-mail address."
        },
        subject : {
          required: "Please include an e-mail subject."
        },
        description : {
          required: "Please include a discription of your request."
        },
        attachment : {
          accept: "Invalid file type (Allowed files: png, gif, jpeg, pdf, doc, docx, xls, zip)."
        }
      },
      submitHandler: function(form) {
        ajax_submit();
      }
    });

    function ajax_submit(){
      
      // cache form and input values
      var $form = $('#emailSupport');
          $from_email = $('#email').val(),
          $from_subject = $('#subject').val(),
          $from_description = $('#description').val();
          $from_attachment = $('#attachment')[0].files[0];
      
      // build custom FormData
      var $form_data = new FormData();
      $form_data.append('action', 'ajax_send_email');
      $form_data.append('from_email', $from_email);
      $form_data.append('from_subject', $from_subject);
      $form_data.append('from_description', $from_description);
      $form_data.append('from_attachment', $from_attachment);

      $.ajax({
        type: 'post',
        url: ajax_supportEmail.ajaxurl, //path to localized admin-ajax.php',        
        data : $form_data,
        processData: false,
        contentType: false,  
        success: function(res){
          //alert('The server responded: ' + res); // uncomment to debug
          $form.each(function(){this.reset()});
          $form.append("<p class='success'>Thanks for contacting Matador Support!<br>We'll get back to you as soon as possible.<span class='exit'>X</span></p>");
          $('.success').find('.exit').on('click', function(){
            $form.find('.success').fadeOut();
          });
        },
        error: function(){
          $form.append("<p class='error'>AJAX Error: Form failed to submit. Contact the site admin: support@matadorapp.com<span class='exit'>X</span></p>");
          $('.error').find('.exit').on('click', function(){
            $form.find('.error').fadeOut();
          });
        }
      });
    }
}


jQuery(document).ready(function($) {
  //global
  init_offcanvas($);
  init_scrollHideNav($);
  init_fixSticky($);

  //support page only
  init_emailSupport_ajax($);
});

