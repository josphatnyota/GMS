$( document ).ready(function() {
    
   $("#seeAnotherField").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldDiv').show();
    $('#otherField').attr('required', '');
    $('#otherField').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldDiv').hide();
    $('#otherField').removeAttr('required');
    $('#otherField').removeAttr('data-error');
  }
});
$("#seeAnotherField").trigger("change");

$("#seeAnotherFieldGroup").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldGroupDiv').show();
    $('#otherField1').attr('required', '');
    $('#otherField1').attr('data-error', 'This field is required.');
    $('#otherField2').attr('required', '');
    $('#otherField2').attr('data-error', 'This field is required.');
    $('#otherField3').attr('required', '');
    $('#otherField3').attr('data-error', 'This field is required.');
    $('#otherField4').attr('required', '');
    $('#otherField4').attr('data-error', 'This field is required.');
    $('#otherField5').attr('required', '');
    $('#otherField5').attr('data-error', 'This field is required.');
    $('#otherField6').attr('required', '');
    $('#otherField6').attr('data-error', 'This field is required.');
    $('#otherField7').attr('required', '');
    $('#otherField7').attr('data-error', 'This field is required.');
    $('#otherField8').attr('required', '');
    $('#otherField8').attr('data-error', 'This field is required.');
    $('#otherField9').attr('required', '');
    $('#otherField9').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv').hide();
    $('#otherField1').removeAttr('required');
    $('#otherField1').removeAttr('data-error');
    $('#otherField2').removeAttr('required');
    $('#otherField2').removeAttr('data-error');
    $('#otherField3').removeAttr('required');
    $('#otherField3').removeAttr('data-error');
    $('#otherField4').removeAttr('required');
    $('#otherField4').removeAttr('data-error');
    $('#otherField5').removeAttr('required');
    $('#otherField5').removeAttr('data-error');
    $('#otherField6').removeAttr('required');
    $('#otherField6').removeAttr('data-error');
    $('#otherField7').removeAttr('required');
    $('#otherField7').removeAttr('data-error');
    $('#otherField8').removeAttr('required');
    $('#otherField8').removeAttr('data-error');
    $('#otherField9').removeAttr('required');
    $('#otherField9').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup").trigger("change");

//third childElementCount
$("#seeAnotherFieldGroup2").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldGroupDiv2').show();
    $('#otherField11').attr('required', '');
    $('#otherField11').attr('data-error', 'This field is required.');
    $('#otherField22').attr('required', '');
    $('#otherField22').attr('data-error', 'This field is required.');
    $('#otherField33').attr('required', '');
    $('#otherField33').attr('data-error', 'This field is required.');
    $('#otherField44').attr('required', '');
    $('#otherField44').attr('data-error', 'This field is required.');
    $('#otherField55').attr('required', '');
    $('#otherField55').attr('data-error', 'This field is required.');
    $('#otherField66').attr('required', '');
    $('#otherField66').attr('data-error', 'This field is required.');
    $('#otherField77').attr('required', '');
    $('#otherField77').attr('data-error', 'This field is required.');
    $('#otherField88').attr('required', '');
    $('#otherField88').attr('data-error', 'This field is required.');
    $('#otherField99').attr('required', '');
    $('#otherField99').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv2').hide();
    $('#otherField11').removeAttr('required');
    $('#otherField11').removeAttr('data-error');
    $('#otherField22').removeAttr('required');
    $('#otherField22').removeAttr('data-error');
    $('#otherField33').removeAttr('required');
    $('#otherField33').removeAttr('data-error');
    $('#otherField44').removeAttr('required');
    $('#otherField44').removeAttr('data-error');
    $('#otherField55').removeAttr('required');
    $('#otherField55').removeAttr('data-error');
    $('#otherField66').removeAttr('required');
    $('#otherField66').removeAttr('data-error');
    $('#otherField77').removeAttr('required');
    $('#otherField77').removeAttr('data-error');
    $('#otherField88').removeAttr('required');
    $('#otherField88').removeAttr('data-error');
    $('#otherField99').removeAttr('required');
    $('#otherField99').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup2").trigger("change");
//forth childElementCount
$("#seeAnotherFieldGroup3").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldGroupDiv3').show();
    $('#otherField111').attr('required', '');
    $('#otherField111').attr('data-error', 'This field is required.');
    $('#otherField222').attr('required', '');
    $('#otherField222').attr('data-error', 'This field is required.');
    $('#otherField333').attr('required', '');
    $('#otherField333').attr('data-error', 'This field is required.');
    $('#otherField444').attr('required', '');
    $('#otherField444').attr('data-error', 'This field is required.');
    $('#otherField555').attr('required', '');
    $('#otherField555').attr('data-error', 'This field is required.');
    $('#otherField666').attr('required', '');
    $('#otherField666').attr('data-error', 'This field is required.');
    $('#otherField777').attr('required', '');
    $('#otherField777').attr('data-error', 'This field is required.');
    $('#otherField888').attr('required', '');
    $('#otherField888').attr('data-error', 'This field is required.');
    $('#otherField999').attr('required', '');
    $('#otherField999').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv3').hide();
    $('#otherField111').removeAttr('required');
    $('#otherField111').removeAttr('data-error');
    $('#otherField222').removeAttr('required');
    $('#otherField222').removeAttr('data-error');
    $('#otherField333').removeAttr('required');
    $('#otherField333').removeAttr('data-error');
    $('#otherField444').removeAttr('required');
    $('#otherField444').removeAttr('data-error');
    $('#otherField555').removeAttr('required');
    $('#otherField555').removeAttr('data-error');
    $('#otherField666').removeAttr('required');
    $('#otherField666').removeAttr('data-error');
    $('#otherField777').removeAttr('required');
    $('#otherField777').removeAttr('data-error');
    $('#otherField888').removeAttr('required');
    $('#otherField888').removeAttr('data-error');
    $('#otherField999').removeAttr('required');
    $('#otherField999').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup3").trigger("change");
//fifthchild

$("#seeAnotherFieldGroup4").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldGroupDiv4').show();
    $('#otherField1111').attr('required', '');
    $('#otherField1111').attr('data-error', 'This field is required.');
    $('#otherField2222').attr('required', '');
    $('#otherField2222').attr('data-error', 'This field is required.');
    $('#otherField3333').attr('required', '');
    $('#otherField3333').attr('data-error', 'This field is required.');
    $('#otherField4444').attr('required', '');
    $('#otherField4444').attr('data-error', 'This field is required.');
    $('#otherField5555').attr('required', '');
    $('#otherField5555').attr('data-error', 'This field is required.');
    $('#otherField6666').attr('required', '');
    $('#otherField6666').attr('data-error', 'This field is required.');
    $('#otherField7777').attr('required', '');
    $('#otherField7777').attr('data-error', 'This field is required.');
    $('#otherField8888').attr('required', '');
    $('#otherField8888').attr('data-error', 'This field is required.');
    $('#otherField9999').attr('required', '');
    $('#otherField9999').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv4').hide();
    $('#otherField1111').removeAttr('required');
    $('#otherField1111').removeAttr('data-error');
    $('#otherField2222').removeAttr('required');
    $('#otherField2222').removeAttr('data-error');
    $('#otherField3333').removeAttr('required');
    $('#otherField3333').removeAttr('data-error');
    $('#otherField4444').removeAttr('required');
    $('#otherField4444').removeAttr('data-error');
    $('#otherField5555').removeAttr('required');
    $('#otherField5555').removeAttr('data-error');
    $('#otherField6666').removeAttr('required');
    $('#otherField6666').removeAttr('data-error');
    $('#otherField7777').removeAttr('required');
    $('#otherField7777').removeAttr('data-error');
    $('#otherField8888').removeAttr('required');
    $('#otherField8888').removeAttr('data-error');
    $('#otherField9999').removeAttr('required');
    $('#otherField9999').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup4").trigger("change");
//sixthchild

$("#seeAnotherFieldGroup5").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldGroupDiv5').show();
    $('#otherField11111').attr('required', '');
    $('#otherField11111').attr('data-error', 'This field is required.');
    $('#otherField22222').attr('required', '');
    $('#otherField22222').attr('data-error', 'This field is required.');
    $('#otherField33333').attr('required', '');
    $('#otherField33333').attr('data-error', 'This field is required.');
    $('#otherField44444').attr('required', '');
    $('#otherField44444').attr('data-error', 'This field is required.');
    $('#otherField55555').attr('required', '');
    $('#otherField55555').attr('data-error', 'This field is required.');
    $('#otherField66666').attr('required', '');
    $('#otherField66666').attr('data-error', 'This field is required.');
    $('#otherField77777').attr('required', '');
    $('#otherField77777').attr('data-error', 'This field is required.');
    $('#otherField88888').attr('required', '');
    $('#otherField88888').attr('data-error', 'This field is required.');
    $('#otherField99999').attr('required', '');
    $('#otherField99999').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv5').hide();
    $('#otherField11111').removeAttr('required');
    $('#otherField11111').removeAttr('data-error');
    $('#otherField22222').removeAttr('required');
    $('#otherField22222').removeAttr('data-error');
    $('#otherField33333').removeAttr('required');
    $('#otherField33333').removeAttr('data-error');
    $('#otherField44444').removeAttr('required');
    $('#otherField44444').removeAttr('data-error');
    $('#otherField55555').removeAttr('required');
    $('#otherField55555').removeAttr('data-error');
    $('#otherField66666').removeAttr('required');
    $('#otherField66666').removeAttr('data-error');
    $('#otherField77777').removeAttr('required');
    $('#otherField77777').removeAttr('data-error');
    $('#otherField88888').removeAttr('required');
    $('#otherField88888').removeAttr('data-error');
    $('#otherField99999').removeAttr('required');
    $('#otherField99999').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup5").trigger("change");
//seventhchild

$("#seeAnotherFieldGroup6").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldGroupDiv6').show();
    $('#otherField111111').attr('required', '');
    $('#otherField111111').attr('data-error', 'This field is required.');
    $('#otherField222222').attr('required', '');
    $('#otherField222222').attr('data-error', 'This field is required.');
    $('#otherField333333').attr('required', '');
    $('#otherField333333').attr('data-error', 'This field is required.');
    $('#otherField444444').attr('required', '');
    $('#otherField444444').attr('data-error', 'This field is required.');
    $('#otherField555555').attr('required', '');
    $('#otherField555555').attr('data-error', 'This field is required.');
    $('#otherField666666').attr('required', '');
    $('#otherField666666').attr('data-error', 'This field is required.');
    $('#otherField777777').attr('required', '');
    $('#otherField777777').attr('data-error', 'This field is required.');
    $('#otherField888888').attr('required', '');
    $('#otherField888888').attr('data-error', 'This field is required.');
    $('#otherField999999').attr('required', '');
    $('#otherField999999').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv6').hide();
    $('#otherField111111').removeAttr('required');
    $('#otherField111111').removeAttr('data-error');
    $('#otherField222222').removeAttr('required');
    $('#otherField222222').removeAttr('data-error');
    $('#otherField333333').removeAttr('required');
    $('#otherField333333').removeAttr('data-error');
    $('#otherField444444').removeAttr('required');
    $('#otherField444444').removeAttr('data-error');
    $('#otherField555555').removeAttr('required');
    $('#otherField555555').removeAttr('data-error');
    $('#otherField666666').removeAttr('required');
    $('#otherField666666').removeAttr('data-error');
    $('#otherField777777').removeAttr('required');
    $('#otherField777777').removeAttr('data-error');
    $('#otherField888888').removeAttr('required');
    $('#otherField888888').removeAttr('data-error');
    $('#otherField999999').removeAttr('required');
    $('#otherField999999').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup6").trigger("change");
//eighth childElementCount

$("#seeAnotherFieldGroup7").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldGroupDiv7').show();
    $('#otherField1111111').attr('required', '');
    $('#otherField1111111').attr('data-error', 'This field is required.');
    $('#otherField2222222').attr('required', '');
    $('#otherField2222222').attr('data-error', 'This field is required.');
    $('#otherField3333333').attr('required', '');
    $('#otherField3333333').attr('data-error', 'This field is required.');
    $('#otherField4444444').attr('required', '');
    $('#otherField4444444').attr('data-error', 'This field is required.');
    $('#otherField5555555').attr('required', '');
    $('#otherField5555555').attr('data-error', 'This field is required.');
    $('#otherField6666666').attr('required', '');
    $('#otherField6666666').attr('data-error', 'This field is required.');
    $('#otherField7777777').attr('required', '');
    $('#otherField7777777').attr('data-error', 'This field is required.');
    $('#otherField8888888').attr('required', '');
    $('#otherField8888888').attr('data-error', 'This field is required.');
    $('#otherField9999999').attr('required', '');
    $('#otherField9999999').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv7').hide();
    $('#otherField1111111').removeAttr('required');
    $('#otherField1111111').removeAttr('data-error');
    $('#otherField2222222').removeAttr('required');
    $('#otherField2222222').removeAttr('data-error');
    $('#otherField3333333').removeAttr('required');
    $('#otherField3333333').removeAttr('data-error');
    $('#otherField4444444').removeAttr('required');
    $('#otherField4444444').removeAttr('data-error');
    $('#otherField5555555').removeAttr('required');
    $('#otherField5555555').removeAttr('data-error');
    $('#otherField6666666').removeAttr('required');
    $('#otherField6666666').removeAttr('data-error');
    $('#otherField7777777').removeAttr('required');
    $('#otherField7777777').removeAttr('data-error');
    $('#otherField8888888').removeAttr('required');
    $('#otherField8888888').removeAttr('data-error');
    $('#otherField9999999').removeAttr('required');
    $('#otherField9999999').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup7").trigger("change");
//nineth childElementCount
$("#seeAnotherFieldGroup8").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldGroupDiv8').show();
    $('#otherField11111111').attr('required', '');
    $('#otherField11111111').attr('data-error', 'This field is required.');
    $('#otherField22222222').attr('required', '');
    $('#otherField22222222').attr('data-error', 'This field is required.');
    $('#otherField33333333').attr('required', '');
    $('#otherField33333333').attr('data-error', 'This field is required.');
    $('#otherField44444444').attr('required', '');
    $('#otherField44444444').attr('data-error', 'This field is required.');
    $('#otherField55555555').attr('required', '');
    $('#otherField55555555').attr('data-error', 'This field is required.');
    $('#otherField66666666').attr('required', '');
    $('#otherField66666666').attr('data-error', 'This field is required.');
    $('#otherField77777777').attr('required', '');
    $('#otherField77777777').attr('data-error', 'This field is required.');
    $('#otherField88888888').attr('required', '');
    $('#otherField88888888').attr('data-error', 'This field is required.');
    $('#otherField99999999').attr('required', '');
    $('#otherField99999999').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv8').hide();
    $('#otherField11111111').removeAttr('required');
    $('#otherField11111111').removeAttr('data-error');
    $('#otherField22222222').removeAttr('required');
    $('#otherField22222222').removeAttr('data-error');
    $('#otherField33333333').removeAttr('required');
    $('#otherField33333333').removeAttr('data-error');
    $('#otherField44444444').removeAttr('required');
    $('#otherField44444444').removeAttr('data-error');
    $('#otherField55555555').removeAttr('required');
    $('#otherField55555555').removeAttr('data-error');
    $('#otherField66666666').removeAttr('required');
    $('#otherField66666666').removeAttr('data-error');
    $('#otherField77777777').removeAttr('required');
    $('#otherField77777777').removeAttr('data-error');
    $('#otherField88888888').removeAttr('required');
    $('#otherField88888888').removeAttr('data-error');
    $('#otherField99999999').removeAttr('required');
    $('#otherField99999999').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup8").trigger("change");
//tenth child

$("#seeAnotherFieldGroup9").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldGroupDiv9').show();
    $('#otherField111111111').attr('required', '');
    $('#otherField111111111').attr('data-error', 'This field is required.');
    $('#otherField222222222').attr('required', '');
    $('#otherField222222222').attr('data-error', 'This field is required.');
    $('#otherField333333333').attr('required', '');
    $('#otherField333333333').attr('data-error', 'This field is required.');
    $('#otherField444444444').attr('required', '');
    $('#otherField444444444').attr('data-error', 'This field is required.');
    $('#otherField555555555').attr('required', '');
    $('#otherField555555555').attr('data-error', 'This field is required.');
    $('#otherField666666666').attr('required', '');
    $('#otherField666666666').attr('data-error', 'This field is required.');
    $('#otherField777777777').attr('required', '');
    $('#otherField777777777').attr('data-error', 'This field is required.');
    $('#otherField888888888').attr('required', '');
    $('#otherField888888888').attr('data-error', 'This field is required.');
    $('#otherField999999999').attr('required', '');
    $('#otherField999999999').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv9').hide();
    $('#otherField111111111').removeAttr('required');
    $('#otherField111111111').removeAttr('data-error');
    $('#otherField222222222').removeAttr('required');
    $('#otherField222222222').removeAttr('data-error');
    $('#otherField333333333').removeAttr('required');
    $('#otherField333333333').removeAttr('data-error');
    $('#otherField444444444').removeAttr('required');
    $('#otherField444444444').removeAttr('data-error');
    $('#otherField555555555').removeAttr('required');
    $('#otherField555555555').removeAttr('data-error');
    $('#otherField666666666').removeAttr('required');
    $('#otherField666666666').removeAttr('data-error');
    $('#otherField777777777').removeAttr('required');
    $('#otherField777777777').removeAttr('data-error');
    $('#otherField888888888').removeAttr('required');
    $('#otherField888888888').removeAttr('data-error');
    $('#otherField999999999').removeAttr('required');
    $('#otherField999999999').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup9").trigger("change");
//weddingtype
$("#seeAnotherFieldGroup10").change(function() {
  if ($(this).val() == "Married") {
    $('#otherFieldGroupDiv10').show();
    $('#weddingtype').attr('required', '');
    $('#weddingtype').attr('data-error', 'This field is required.');
    $('#weddingdate').attr('required', '');
    $('#weddingdate').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv10').hide();
    $('#weddingtype').removeAttr('required');
    $('#weddingtype').removeAttr('data-error');
    $('#weddingdate').removeAttr('required');
    $('#weddingdate').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup10").trigger("change");
//remarried

$("#seeAnotherFieldGroup10").change(function() {
  if ($(this).val() == "Remarried") {
    $('#otherFieldGroupDivrem').show();
    $('#weddingtype').attr('required', '');
    $('#weddingtype').attr('data-error', 'This field is required.');
    $('#weddingdate').attr('required', '');
    $('#weddingdate').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDivrem').hide();
    $('#weddingtype').removeAttr('required');
    $('#weddingtype').removeAttr('data-error');
    $('#weddingdate').removeAttr('required');
    $('#weddingdate').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup10").trigger("change");
//natureofwork
$("#seeAnotherFieldGroup11").change(function() {
  if ($(this).val() == "Employed") {
    $('#otherFieldGroupDiv11').show();
    $('#employername').attr('required', '');
    $('#employername').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv11').hide();
    $('#employername').removeAttr('required');
    $('#employername').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup11").trigger("change");
//unemployed

});
$("#seeAnotherFieldGroup12").change(function() {
  if ($(this).val() == "yes") {
    $('#otherFieldGroupDiv12').show();
    $('#otherField11111111111').attr('required', '');
    $('#otherField11111111111').attr('data-error', 'This field is required.');
    $('#otherField22222222222').attr('required', '');
    $('#otherField22222222222').attr('data-error', 'This field is required.');
    $('#otherField33333333333').attr('required', '');
    $('#otherField33333333333').attr('data-error', 'This field is required.');
    $('#otherField44444444444').attr('required', '');
    $('#otherField44444444444').attr('data-error', 'This field is required.');
    $('#otherField55555555555').attr('required', '');
    $('#otherField55555555555').attr('data-error', 'This field is required.');
    $('#otherField66666666666').attr('required', '');
    $('#otherField66666666666').attr('data-error', 'This field is required.');
    $('#otherField77777777777').attr('required', '');
    $('#otherField77777777777').attr('data-error', 'This field is required.');
    $('#otherField88888888888').attr('required', '');
    $('#otherField88888888888').attr('data-error', 'This field is required.');
    $('#otherField99999999999').attr('required', '');
    $('#otherField99999999999').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv12').hide();
    $('#otherField11111111111').removeAttr('required');
    $('#otherField11111111111').removeAttr('data-error');
    $('#otherField22222222222').removeAttr('required');
    $('#otherField22222222222').removeAttr('data-error');
    $('#otherField33333333333').removeAttr('required');
    $('#otherField33333333333').removeAttr('data-error');
    $('#otherField44444444444').removeAttr('required');
    $('#otherField44444444444').removeAttr('data-error');
    $('#otherField55555555555').removeAttr('required');
    $('#otherField55555555555').removeAttr('data-error');
    $('#otherField66666666666').removeAttr('required');
    $('#otherField66666666666').removeAttr('data-error');
    $('#otherField77777777777').removeAttr('required');
    $('#otherField77777777777').removeAttr('data-error');
    $('#otherField88888888888').removeAttr('required');
    $('#otherField88888888888').removeAttr('data-error');
    $('#otherField99999999999').removeAttr('required');
    $('#otherField99999999999').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup12").trigger("change");