
$('.findtb').click(function (e) {
  var tutorialNo = $('.tutorialNo').data('tutno');
  var subject = $(this).val();
  var site_url = $(".url").val();
  $.get(site_url + 'tutorialsession/findtimeblocks/' + $(this).val(), function (
    data) {
    $(".timeblock"+tutorialNo).html(data);
  });
});
