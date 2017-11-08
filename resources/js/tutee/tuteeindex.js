$a = jQuery.noConflict();

$a('.findtb').click(function (e) {
  var subject = $a(this).val();
  var site_url = $a(".url").val();
  $a.get(site_url + 'tutorialsession/findtimeblocks/' + $a(this).val(), function (
    data) {
    $a(".timeblock"+subject).html(data);
  });
});