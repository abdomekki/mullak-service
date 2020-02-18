$('.popover-dismiss').popover({
  trigger: 'focus'
})


$(document).ready(function(){
  $('#create_excel').click(function(){
    var excel_data=$('#user_table').html();
    var page="excel.php?id="+excel_data;
    console.log(excel_data);
    window.location.href=page;
  })
})