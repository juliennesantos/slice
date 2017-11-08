// $ = jQuery.noConflict();

$(document).ready(function(){

  $('.datatable').DataTable();
  
  $('[data-mask]').inputmask();
  //multiple dropbox
  $('.select2').select2()
  //Date picker
  // $('#datepicker').datepicker({
  //   autoclose: true
  // });
  $('.datepicker').datepicker({
    autoclose: true
  });
  
  $('.treeview')(function () {
    var _this = $(this);
    if (!(_this.hasClass('active'))) {
      _this.addClass('active');
      _this.children().find('treeview').addClass('menu-open');
    } else {
      _this.removeClass('active');
      _this.children().find('treeview').removeClass('menu-open');
    }
  });

});