$(document).ready(function () {
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
        '<select name="subject['+ x +']" class="form-control" id="expertise" required>' +                                 
        '<option value="">Select a subject</option>'

        $.each(subjID, function(){
          $(this).append('<option value="'['subjectID'].'">'.$subject['subjectCode'].'</option>');
        })

        +
        '</select>' +
        '</div>'+
        '<div class="col-md-2">' + 
        '<button type="button" class="btn btn-danger form-control remove_field" style="width:50%;">' +
        '<i class="fa fa-trash"></i>' +
        '</button>' +
        '</div>'+
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
  
});