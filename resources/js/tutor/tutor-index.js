$(document).ready(function () {
  var max_fields = 50; //maximum input boxes allowed
  var wrapper = $(".input_fields_wrap<?php echo $t['tutorialNo'];?>"); //Fields wrapper
  var add_button = $(".add_field_button"); //Add button ID

  var x = 0; //initial text box count
  $.get('<?php echo site_url();?>/tutorialsession/count_checklist/' +
    <?= $t['tutorialNo']; ?>,
    function (data) {
      x = parseInt(data);
    }, "number");
  $(add_button).click(function (e) { //on add input button click
    e.preventDefault();
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
        '<button class="btn btn-danger remove_field"><i class="fa fa-trash"></i></button>' +
        '</td>' +
        '</tr>'
      ); //add input box
    } else {
      alert(
        'You have reached the maximum limit of allowed items!'
      );
    }
  });

  $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
    e.preventDefault();
    $(this).parent().parent('tr').remove();
    x--;
  });

  // EDIT CHECKLIST
  $(".modal<?php echo $t['tutorialNo']; ?>").click(function () {
    $.ajax({
      type: 'GET',
      url: '<?php echo site_url();?>/tutorialsession/get_checklist/' + '<?= $t['
      tutorialNo ']; ?>',
      success: function (data) {
        $(".items<?php echo $t['tutorialNo'];?>").html(data);
      },
    });

    //checks if wrapper is empty
    if ($(wrapper).html().trim() == false) {
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
  });
});