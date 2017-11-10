var site_url = $(".siteurl").data("siteurl");
var x = 0;

(function($){
  
  var subject;
  
  $('#subject').change(function(){
    subject = $(this).val();
    $.get(site_url + 'tutorialsession/findtimeblocks/' + $(this).val(), function(data) {
      $('#timeblock').html(data);
      $('#loader').slideUp(200, function(){
        $(this).remove();
      });
    });
  });
  
  
  $('.datatable').DataTable();
  
  $('[data-mask]').inputmask();
  //multiple dropbox
  $('.select2').select2();
  //Date picker
  $('#datepicker').datepicker({
    autoclose: true
  });
  
})(jQuery);

var max_fields = 50; //maximum input boxes allowed
var wrapper;
//Fields wrapper
var add_button = $(".add_field_button"); //Add button ID

// EDIT CHECKLIST
function dothis(tutorialNo){
  wrapper = $('.input_fields_wrap' + tutorialNo);
  console.log(tutorialNo);
  console.log(wrapper);
  $.ajax({
    type: 'GET',
    url: site_url + 'tutorialsession/get_checklist/' + tutorialNo,
    success: function(data){
      $('.items' + tutorialNo).html(data);
    },
  });
  
  //checks if wrapper is empty
  if($(wrapper).html().trim() == false){
    $(wrapper).append(
      '<tr>' +
      '<td class="text-center">' +
      '<input type="hidden" name="status[0]" value="Not Done"/>' +
      '<input type="checkbox" name="status[0]" value="Done" id="status[0]" />' +
      '</td>' +
      '<td>' +
      '<input type="text" name="comment[0]" class="form-control key_addfield" id="comment[0]" />' +
      '</td>' +
      '<td class="text-center">' +
      '</td>' +
      '</tr>'
    );
  }
  // });
}

function addfield(tutorialNo){
  wrapper = $(".input_fields_wrap" + tutorialNo);
  if (x < max_fields) { //max input box allowed
    x++; //text box increment
    $(wrapper).append(
      '<tr>' +
      '<td class="text-center">' +
      '<input type="checkbox" data-id="x" name="status[' +
      x + ']" value="Done" id="status[' + x + ']" />' +
      '</td>' +
      '<td>' +
      '<input type="text" name="comment[' + x +
      ']" class="form-control key_addfield" id="comment[' +
      x + ']" required />' +
      '</td>' +
      '<td class="text-center">' +
      '<button type="button" class="btn btn-danger remove_field' +
      x + '" onclick="removefield()"><i class="fa fa-trash"></i></button>' +
      '</td>' +
      '</tr>'
    ); //add input box
  } else {
    alert(
      'You have reached the maximum limit of allowed items!'
    );
  }
}

function removefield(){
  var tutorialNo = $('.tutorialNo').data('tutno');
  wrapper = $('.input_fields_wrap' + tutorialNo);
  $('.remove_field'+x).parent().parent('tr').remove();
  x--;
}




function viewrequest(tutorialNo) {
  $.get(site_url+'tutorialsession/findtutors/' + $(this).data('sid'), function (data) {
    $("#tutors" + tutorialNo).html(data);
    });
}