$j = jQuery.noConflict();

$j('.datatable').DataTable();

$j('[data-mask]').inputmask();
//multiple dropbox
$j('.select2').select2()
//Date picker
// $j('#datepicker').datepicker({
//   autoclose: true
// });
$j('.datepicker').datepicker({
  autoclose: true
});

$j('.treeview')(function () {
  var _this = $j(this);
  if (!(_this.hasClass('active'))) {
    _this.addClass('active');
    _this.children().find('treeview').addClass('menu-open');
  } else {
    _this.removeClass('active');
    _this.children().find('treeview').removeClass('menu-open');
  }
});