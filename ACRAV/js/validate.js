// JavaScript Document
// Declare the loading gif as a variable, which will be used later
var $loading = $('<div class="loading"><img src="images/loading.gif" alt="" /></div>');
 
// Form validation and submit when button is clicked
$('.button').click(function(e){
 
  // Declare the function variables - parent form, form URL and the regex for checking the email
     var $formId = $(this).parents('form');
     var formAction = $formId.attr('action');
     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 
  // In preparation for validating the form - Remove any active default text and previous errors
      defaulttextRemove();
      $('li',$formId).removeClass('error');
      $('span.error').remove();
 
  // Start validation by selecting all inputs with the class "required"
      $('.required',$formId).each(function(){
          var inputVal = $(this).val();
          var $parentTag = $(this).parent();
          if(inputVal == ''){
              $parentTag.addClass('error').append('<span class="error">Required field</span>');
          }
 
      // Run the email validation using the regex for those input items also having class "email"
      if($(this).hasClass('email') == true){
              if(!emailReg.test(inputVal)){
                  $parentTag.addClass('error').append('<span class="error">Enter a valid email address.</span>');
              }
          }
    });
 
    // All validation complete - check whether any errors exist - if not submit form
       if ($('span.error').length == "0") {
           $formId.append($loading.clone());
           $('fieldset',$formId).hide();
           $.post(formAction, $formId.serialize(),function(data){
               $('.loading').remove();
               $formId.append(data).fadeIn();
           });
      }
    // Use the following to prevent the form being submitted the standard way
      e.preventDefault();
});