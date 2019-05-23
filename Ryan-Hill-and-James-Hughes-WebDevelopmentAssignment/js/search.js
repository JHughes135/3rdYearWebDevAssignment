  var update = function(){

  var search_term = $('#search').val();
  var stock_status = $('#stock option:selected').val();
  var prescription_req = $('#prescrip option:selected').val();

  $.post('search.php', {search_term: search_term, stock_status: stock_status,   prescription_req: prescription_req}, function(data){

    $('#search_results').html(data);
  });

  $.post('our-products.php', {search_status: search_status}, function(data){

    $('#search_status').html(data);
  });

}

$('#search').keyup(update);
$('#stock').change(update);
$('#prescrip').change(update);
