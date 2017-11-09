var site_url = $(".siteurl").data("siteurl");
var x = 0;

(function ($) {

  var subject;

  $("#subject").change(function () {
    subject = $(this).val();
    $.get(site_url + 'tutorialsession/findtimeblocks/' + $(this).val(), function (data) {
      $("#timeblock").html(data);
      $('#loader').slideUp(200, function () {
        $(this).remove();
      });
    });
  });

  $('.findtb').click(function (e) {
    var tutorialNo = $('.tutorialNo').data('no');
    var subject = $('.tutno').data('tutno');
    var site_url = $(".url").val();
    console.log(tutorialNo);
    $.get(site_url + 'tutorialsession/findtimeblocks/' + $(this).val(), function (
      data) {
      $(".timeblock" + tutorialNo).html(data);
    });
  });

  var subjects = $(".subjID").data("subjID");
  // var subjects = $(".subj").data("subj");
  var site_url = $(".siteurl").data("siteurl");

  console.log(subjects);

  var x = 0; //initial text box count
  var max_fields = 2; //maximum input boxes allowed
  var wrapper = $(".input_fields_wrap"); //Fields wrapper
  var add_button = $(".add_field_button"); //Add button ID


  $(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    if (x < max_fields) { //max input box allowed
      x++; //text box increment
      $(wrapper).append(
        '<div class="col-md-12">' +
        '<div class="form-group col-md-10">' +
        '<select name="subject[' + x + ']" class="form-control" id="expertise" required>' +
        '<option value="">Select a subject</option>'. 

          $.each(subjects, function () {
          $(this).append('<option value="'['subjectID']'">'.$subject['subjectCode'].'</option>');
        })

        +
        '</select>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<button type="button" class="btn btn-danger form-control remove_field" style="width:50%;">' +
        '<i class="fa fa-trash"></i>' +
        '</button>' +
        '</div>' +
        '</div>'
      ); //add input box
    } else {
      alert(
        'You have reached the maximum limit of allowed items!'
      );
    }
  });

  $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
    e.preventDefault();
    $(this).parent().parent('div').remove();
    x--;
  });

  $('.datatable').DataTable();

  $('[data-mask]').inputmask();
  //multiple dropbox
  $('.select2').select2()
  //Date picker
  $('#datepicker').datepicker({
    autoclose: true
  });

  // $('.treeview')(function () {
  //   var _this = $(this);
  //   if (!(_this.hasClass('active'))) {
  //     _this.addClass('active');
  //     _this.children().find('treeview').addClass('menu-open');
  //   } else {
  //     _this.removeClass('active');
  //     _this.children().find('treeview').removeClass('menu-open');
  //   }
  // });

})(jQuery);

  var max_fields = 50; //maximum input boxes allowed
  var wrapper;
   //Fields wrapper
  var add_button = $(".add_field_button"); //Add button ID

   //initial text box count
  // $.get(site_url + 'tutorialsession/count_checklist/' +
  //   tutorialNo,
  //   function (data) {
  //     x = parseInt(data);
  //   }, "number");

  // EDIT CHECKLIST
function dothis(tutorialNo) {
  wrapper = $(".input_fields_wrap" + tutorialNo);
  console.log(tutorialNo);
  // $(".modal" + tutorialNo).on('click.modal"' + tutorialNo, function () {
    console.log(wrapper);
    $.ajax({
      type: 'GET',
      url: site_url + 'tutorialsession/get_checklist/' + tutorialNo,
      success: function (data) {
        $(".items" + tutorialNo).html(data);
      },
    })
    
    //checks if wrapper is empty
      if($(wrapper).html().trim() == false) {
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
  wrapper = $(".input_fields_wrap" + tutorialNo);
  $(".remove_field"+x).parent().parent('tr').remove();
  x--;
}