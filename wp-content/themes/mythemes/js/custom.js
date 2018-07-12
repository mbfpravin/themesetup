/*Email validation*/
function isValidEmailAddress(r) {
	var e = RegExp(/^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i);
	return e.test(r)
}

/*Telephone validation*/
function isNumber(elementRef) {
  keyCode=elementRef.charCode;
  // var keyCode = (event.which) ? event.which : (window.event.keyCode) ?    window.event.keyCode : -1;
  // console.log(keyCode);
  if ((keyCode >= 48) && (keyCode <= 57) || (keyCode <= 32)) {
	  return true;
  }  else if (keyCode == 43) {
	  if (jQuery('#'+elementRef.target.id).val().trim().length == 0){
		  return true;
	  } else {
		  return false;
	  }
  }
  return false;
}

/*Name validation*/
function onlyAlphabets(e) {
  try {
	  if (window.event) {
		  var charCode = window.event.keyCode;
	  }else if (e) {
		  var charCode = e.which;
	  } else {
		  return true;
	  }
	  if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 32 || charCode==0 || charCode==8){
		  return true;
	  }else{
		  return false;
	  }
  }
  catch (err) {
	  alert(err.Description);
  }
}


/*validate email with charCode*/
jQuery(document).on('keypress','#email',function(e){
jQuery(this).attr('maxlength','100');
  try {
	  if (window.event) {
		  var charCode = window.event.keyCode;
	  } else if (e) {
		  var charCode = e.which;
	  } else { return true; }
	  if ((charCode > 63 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode > 47 && charCode < 58) || charCode==0 || charCode==8 || charCode==46 || charCode==45 || charCode==95){
		  return true;
	  } else {
		  return false;
	  }
  }
  catch (err) {
	  alert(err.Description);
  }
});

jQuery(document).on('keypress','#telephone',function(e){
  var keyCode=e.charCode;
  if (keyCode == 32 && jQuery('#'+e.target.id).val().trim().length == 0) {
	  return false;
  }
  if (keyCode == 43 && jQuery('#'+e.target.id).val().trim().length == 0) {
	  return true;
  } else {
	  if ((keyCode >= 48) && (keyCode <= 57) || (keyCode <= 32)) {
		  return true;
	  } else {
		  return false;
	  }
  }
  return false;
});

jQuery(document).on('keypress','#firstname',function(e){
  try {
  if (window.event) {
	  var charCode = window.event.keyCode;
  }
  else if (e) {
	  var charCode = e.which;
  }
  else { return true; }
  if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode==0 || charCode==8)
	return true;
  else if ((charCode === 32 && !this.value.length))
	return false;
  else if (charCode == 32)
	return true;
  else
	  return false;
  }
  catch (err) {
   // alert(err.Description);
  }
});

/*allow only one space*/
var lastkey;
var ignoreChars = ' '+String.fromCharCode(0);
jQuery(document).on('keypress','#firstname,#organization,#message,#telephone,#address',function(e){
 e = e || window.event;
 var char = String.fromCharCode(e.charCode);
 if (ignoreChars.indexOf(char) == 0 && ignoreChars.indexOf(lastkey) == 0) {
	 lastkey = char;
	 return false;
 } else {
	 lastkey = char;
	 return true;
 }
});

/*********Mobile Validation*********/
var ua = navigator.userAgent.toLowerCase();
if (ua.indexOf("android") > -1 && !(ua.indexOf('chrome firefox') > -1)) {
	$(document).on('keyup keypress','#firstname',function(e) {
		var regex = /^[a-zA-Z]$/;
		var regexSpace = /^[a-zA-Z\s]$/;
		var str = $(this).val();
		var subStr = str.substr(str.length - 1);
		if (!regex.test(subStr)) {
			if (str.length == 1) {
				$(this).val(str.substr(0, (str.length - 1)));
			}
			else if (str.length > 1) {
				if (!regexSpace.test(subStr)) {
					$(this).val(str.substr(0, (str.length - 1)));
				}
			}
			else {
				$(this).val();
			}
		}
	});
}
var ua = navigator.userAgent.toLowerCase();
if (ua.indexOf("android") > -1 && !(ua.indexOf('chrome firefox') > -1)) {
	$(document).on('keyup keypress','#email',function(e) {
		var regex = /^[a-zA-Z0-9@_-]$/;
		var regexSpace = /^[a-zA-Z0-9.@_!#$%^&()=,[]|{}]$/;
		var str = $(this).val();
		var subStr = str.substr(str.length - 1);
		if (!regex.test(subStr)) {
			if (str.length == 1) {
				$(this).val(str.substr(0, (str.length - 1)));
			}
			else if (str.length > 1) {
				if (!regexSpace.test(subStr)) {
					$(this).val(str.substr(0, (str.length - 1)));
				}
			}
			else {
				$(this).val();
			}
		}
	});
}
var ua = navigator.userAgent.toLowerCase();
if (ua.indexOf("android") > -1 && !(ua.indexOf('chrome firefox') > -1)) {
	jQuery('#telephone').prop('type','tel');
	$('#telephone').bind('input keyup keypress', function(e) {
		var regex = /^[0-9]*$/;
		var regexSpace = /^[+0-9]*$/;
		var str = $(this).val();
		var subStr = str.substr(str.length - 1);
		if (regex.test(subStr)) {
		   $(this).val();
		}
		else {
			if (str.length == 1) {
			   $(this).val(str.substr(0, (str.length - 1)));
			} 
			else if (str.length > 1) {
				if (!regexSpace.test(subStr)) {
				   $(this).val(str.substr(0, (str.length - 1)));
				}
			}
			else {
				$(this).val();
			}
		}
	}); 
}

$(function(){
	// create foolproof method
	var stringifyNumber = ['second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth'];
	$('.component-benefits-content li').each(function(){
		$(this).addClass(stringifyNumber[$(this).index()]);
	});

	// create foolproof method
	$('.control-card').each(function(){
		$(this).addClass(stringifyNumber[$(this).index()]);
	});


  jQuery( document ).on('click',"#contact_submit",function() {
	   var name=jQuery('#firstname').val();
	   var email=jQuery('#email').val();
	   var telephone=jQuery('#telephone').val();
	   var organization=jQuery('#organization').val();
	   var message=jQuery('#message').val();
	   var address=jQuery('#address').val();
	   /*var city=jQuery('#city').val();
	   var state=jQuery('#state').val();*/
	   var existingCustomer=jQuery('input[name=existing_customer]:checked', '#contact_us_frm').val();
	   var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	   var x=0;
	    if (name=='' || name == undefined) {
		   jQuery('#err_firstname').parents('.form-row').addClass('error-row');
		   jQuery('#err_firstname').text("Please enter your name").show();
		   x++;
	    } else {
		   jQuery('#err_firstname').parents('.form-row').removeClass('error-row');
		   jQuery('#err_firstname').hide();
	    }
		if (email!='') {
		   if (!regex.test(email)) {
			   jQuery('#err_login_email').hide();
			   jQuery('#err_login_email').parents('.form-row').addClass('error-row');
			   jQuery('#err_login_email').text("Please enter a valid email address").show();
			   x++;
		   } else {
			   jQuery('#err_login_email').parents('.form-row').removeClass('error-row');
			   jQuery('#err_login_email').hide();
		   }
	    } else {
		   jQuery('#err_login_email').hide();
		   jQuery('#err_login_email').text("Please enter your email address").show();
		   jQuery('#err_login_email').parents('.form-row').addClass('error-row');
		   x++;
	    }
	    if (organization=='' || organization == undefined) {
		   jQuery('#err_organization').parents('.form-row').addClass('error-row');
		   jQuery('#err_organization').text("Please enter your organization name").show();
		   x++;
	    } else {
		   jQuery('#err_organization').parents('.form-row').removeClass('error-row');
		   jQuery('#err_organization').hide();
	    }
	    if (telephone=='' || telephone == undefined) {
		   jQuery('#err_telephone').parents('.form-row').addClass('error-row');
		   jQuery('#err_telephone').text("Please enter your telephone number").show();
		   x++;
	    } else {
		   jQuery('#err_telephone').parents('.form-row').removeClass('error-row');
		   jQuery('#err_telephone').hide();
	    }
	    if (message=='' || message ==undefined) {
		   jQuery('#err_message').parents('.form-row').addClass('error-row');
		   jQuery('#err_message').text("Please enter your message").show();
		   x++;
	    } else {
		   jQuery('#err_message').parents('.form-row').removeClass('error-row');
		   jQuery('#err_message').hide();
	    }
	    if (address=='' || address ==undefined) {
		   jQuery('#err_address').parents('.form-row').addClass('error-row');
		   jQuery('#err_address').text("Please enter your address").show();
		   x++;
	    } else {
		   jQuery('#err_address').parents('.form-row').removeClass('error-row');
		   jQuery('#err_address').hide();
	    }
	    /*if (state=='' || state ==undefined) {
		   jQuery('#err_state').parents('.form-row').addClass('error-row');
		   jQuery('#err_state').text("Please select your state").show();
		   x++;
	    } else {
		   jQuery('#err_state').parents('.form-row').removeClass('error-row');
		   jQuery('#err_state').hide();
	    }
	    if (city=='' || city ==undefined) {
		   jQuery('#err_city').parents('.form-row').addClass('error-row');
		   jQuery('#err_city').text("Please enter your city").show();
		   x++;
	    } else {
		   jQuery('#err_city').parents('.form-row').removeClass('error-row');
		   jQuery('#err_city').hide();
	    }*/
	    if (existingCustomer=='' || existingCustomer ==undefined) {
		   jQuery('#err_existing_customer').parents('.checkboxradio').addClass('error-row');
		   jQuery('#err_existing_customer').text("Please choose whether you are a existing customer or not").show();
		   x++;
	    } else {
		   jQuery('#err_existing_customer').parents('.form-row').removeClass('error-row');
		   jQuery('#err_existing_customer').hide();
	   }
	   
	   if (x==0) {
		   return true;
	   }
	   return false;
   });
   
    jQuery( document ).on('click',"#applyonline_submit",function() {
       var name=jQuery('#applicantname').val();
       var email=jQuery('#applicantemail').val();
       var telephone=jQuery('#applicanttelephone').val();
       var message=jQuery('#applicantmessage').val();
       var resume=jQuery('#file-upload-value').val();
       var job_id=jQuery("#career_id").val();
       var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
       var x=0;
       if (name=='' || name == undefined) {
           jQuery('#err_firstname').parents('.form-row').addClass('error-row');
           jQuery('#err_firstname').text("Please enter your name").show();
           x++;
       } else {
           jQuery('#err_firstname').parents('.form-row').removeClass('error-row');
           jQuery('#err_firstname').hide();
       }
        if (email!='') {
            if (!regex.test(email)) {
               jQuery('#err_login_email').hide();
               jQuery('#err_login_email').parents('.form-row').addClass('error-row');
               jQuery('#err_login_email').text("Please enter a valid email address").show();
               x++;
            } else {
               jQuery('#err_login_email').parents('.form-row').removeClass('error-row');
               jQuery('#err_login_email').hide();
            }
        }   else {
           jQuery('#err_login_email').hide();
           jQuery('#err_login_email').text("Please enter your email address").show();
           jQuery('#err_login_email').parents('.form-row').addClass('error-row');
           x++;
        }
        if (telephone=='' || telephone == undefined) {
           jQuery('#err_telephone').parents('.form-row').addClass('error-row');
           jQuery('#err_telephone').text("Please enter your telephone number").show();
           x++;
        } else {
           jQuery('#err_telephone').parents('.form-row').removeClass('error-row');
           jQuery('#err_telephone').hide();
        }
        if (message=='' || message ==undefined) {
           jQuery('#err_message').parents('.form-row').addClass('error-row');
           jQuery('#err_message').text("Please enter your message").show();
           x++;
        } else {
           jQuery('#err_message').parents('.form-row').removeClass('error-row');
           jQuery('#err_message').hide();
        }
        if (resume!='') {
            var fileName = document.getElementById("filename").value;
            var idxDot = fileName.lastIndexOf(".") + 1;
            var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
            if (extFile=="doc" || extFile=="docx" || extFile=="pdf" || extFile=="DOC" || extFile=="DOCX" || extFile=="PDF"){
                $('#file-upload-value').parents(".form-row").find(".error-message").remove();
                $('#file-upload-value').parents('.form-row').removeClass('error-row');
                
            }else{
                if ($('#file-upload-value').parents('.form-row').find('.error-message').length==0) {
                $('<div class="error-message">Please Upload doc or pdf files</div>').appendTo($('#file-upload-value').parents(".form-row")).slideDown();
                } else {
                    $('#file-upload-value').parents(".form-row").find(".error-message").text('Please Upload doc or pdf files').slideDown();
                }
                x++;
            }

        } else {
        	jQuery('#err_resume').parents('.form-row').addClass('error-row');
            jQuery('#err_resume').text("Please upload your resume").show();
            x++;
        }
        if (x==0) {
           var file = jQuery("#filename").prop("files")[0];
           jQuery.ajax({
		        url : templateUri+"/ajax.php",
		        type : 'POST',
		        data : new FormData($("#applyonline_frm")[0]),
		        cache: false,
	            contentType: false,
	            processData: false,
		        success : function(data) {
		       		window.location.href = blogUri + "/career-openings/apply-now/thank-you/"
		       }
	        });
            return false;
        }
       return false;
   });
    jQuery( document ).on('click',"#report_submit",function() {
       var name=jQuery('#reportname').val();
       var email=jQuery('#reportemail').val();
       var telephone=jQuery('#reporttelephone').val();
       var regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
       var x=0;
       if (name=='' || name == undefined) {
           jQuery('#err_firstname').parents('.form-row').addClass('error-row');
           jQuery('#err_firstname').text("Please enter your name").show();
           x++;
       } else {
           jQuery('#err_firstname').parents('.form-row').removeClass('error-row');
           jQuery('#err_firstname').hide();
       }
        if (email!='') {
           if (!regex.test(email)) {
               jQuery('#err_login_email').hide();
               jQuery('#err_login_email').parents('.form-row').addClass('error-row');
               jQuery('#err_login_email').text("Please enter a valid email address").show();
               x++;
           } else {
               jQuery('#err_login_email').parents('.form-row').removeClass('error-row');
               jQuery('#err_login_email').hide();
           }
        } else {
           jQuery('#err_login_email').hide();
           jQuery('#err_login_email').text("Please enter your email address").show();
           jQuery('#err_login_email').parents('.form-row').addClass('error-row');
           x++;
        }
        if (telephone=='' || telephone == undefined) {
           jQuery('#err_telephone').parents('.form-row').addClass('error-row');
           jQuery('#err_telephone').text("Please enter your telephone number").show();
           x++;
        } else {
           jQuery('#err_telephone').parents('.form-row').removeClass('error-row');
           jQuery('#err_telephone').hide();
        }
        if (x==0) {
		   return true;
	    }
	    return false;
   });
   $(".input-item").not(".non-mandatory").bind({                
	   keyup: function() {
		   var $thisValue = $(this).val();
		   var $errorText  = $(this).parents('.form-row').find('label').attr('data-error');
		   if ($thisValue.length == 0) {
			  if($(this).parents('.form-row').find('.error-message').is(':hidden')) {
				$(this).parents('.floating-item').next('.error-message').css('display','none');
				$(this).parents('.form-row').addClass('error-row');
				$(this).parents('.floating-item').next('.error-message').text($errorText).slideDown();
			  }
		   } else if ($thisValue.length != 0) {
			  $(this).parents('.form-row').removeClass('error-row');
			  $(this).parents('.form-row').find('.error-message').hide();
			  if ($(this).hasClass('validate-email')) {
				  if (0 == isValidEmailAddress($(this).val())) {
					  e = 'Please enter a valid email address';
					  $(this).parents(".form-row").addClass("error-row");
					  $(this).parents(".form-row").find(".error-message").length ? $(this).parents(".form-row").find(".error-message").text(e).show() : $('<div class="error-message">' + e + "</div>").appendTo($(this).parents(".form-row")).show();

				  } else {
					  $(this).parents(".form-row").removeClass("error-row");
					  $(this).parents(".form-row").find(".error-message").fadeOut(function() {
						  $(this).remove();
					  });
				  }
			  } else if ($(this).hasClass('validate-mobile')) {
				  if ($(this).val().length < 10) {
					  e = 'Please enter a valid contact number';
					  $(this).parents(".form-row").addClass("error-row");
					  $(this).parents(".form-row").find(".error-message").length ? $(this).parents(".form-row").find(".error-message").text(e).show() : $('<div class="error-message">' + e + "</div>").appendTo($(this).parents(".form-row")).show();

				  } else {
					  $(this).parents(".form-row").removeClass("error-row");
					  $(this).parents(".form-row").find(".error-message").fadeOut(function() {
						  $(this).remove();
					  });
				  }
			  }
		   }
	   },
	   blur: function() {
		   var $thisValue = $(this).val();
		   var $errorText  = $(this).parents('.form-row').find('label').attr('data-error');
		   $(this).parent('.floating-item').removeClass('input-animate');
		   if ($thisValue.length == 0) {
			   if($(this).parents('.form-row').find('.error-message').is(':hidden')) {
				$(this).parents('.floating-item').next('.error-message').css('display','none');
				$(this).parents('.form-row').addClass('error-row');
				$(this).parents('.floating-item').next('.error-message').text($errorText).slideDown();
			   }
		   } else {
			   $(this).parents('.form-row').removeClass('error-row');
			   $(this).parents('.form-row').find('.error-message').hide();
			   if ($(this).hasClass('validate-email')) {
				  if (0 == isValidEmailAddress($(this).val())) {
						  e = 'Please enter a valid email address';
						  $(this).parents(".form-row").addClass("error-row");
						  $(this).parents(".form-row").find(".error-message").length ? $(this).parents(".form-row").find(".error-message").text(e).show() : $('<div class="error-message">' + e + "</div>").appendTo($(this).parents(".form-row")).show();

					  } else {
						  $(this).parents(".form-row").removeClass("error-row");
						  $(this).parents(".form-row").find(".error-message").fadeOut(function() {
							  $(this).remove();
						  });
					  }
				  } else if ($(this).hasClass('validate-mobile')) {
					  if ($(this).val().length < 10) {
						  e = 'Please enter a valid contact number';
						  $(this).parents(".form-row").addClass("error-row");
						  $(this).parents(".form-row").find(".error-message").length ? $(this).parents(".form-row").find(".error-message").text(e).show() : $('<div class="error-message">' + e + "</div>").appendTo($(this).parents(".form-row")).show();

					  } else {
						  $(this).parents(".form-row").removeClass("error-row");
						  $(this).parents(".form-row").find(".error-message").fadeOut(function() {
							  $(this).remove();
						  });
					  }
				  }
		   }
	   }
   });

   var slickLength = $('.slider-card').find('.slick-slide').length;
   if(slickLength < 3){
	  $('.slider-card').addClass('middleBlk');
   }else{
	  $('.slider-card').removeClass('middleBlk');
   }
});