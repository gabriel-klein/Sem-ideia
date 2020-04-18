$(document).on('ajaxSuccess', function(e, xhr){
  if(!$('#modal').length){
      $('body').append($('<div id="modal"></div>'));
  }
 $('#modal').html(xhr.responseText);
});