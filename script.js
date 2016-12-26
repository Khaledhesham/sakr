var redirect = function(url, method) {
    $('<form>', {
        method: method,
        action: url
    }).submit();
};

$(document).ready(function(){

$("#khaledform").submit(function(e) {

    var url = $(this).attr('action'); // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#khaledform").serialize(), // serializes the form's elements.
           success: function(data)
           {
              if (data == 1)
                alert("confirmed");
              else if (data == 0)
                alert("not confirmed"); 
              else
                alert(data);
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

var $list = new Array();
function GetIndex(a, $id) {
for (var i = 0; i < a.length; i++) {
    if (a[i].id === $id) {
        return i;
    }
}
return -1;
}

$(".SRAddButton").click(function() {
   window.open("http://localhost/database/supplieradd.php");

});
$(".SREditButton").click(function() {
  var $id = $(this).parent().parent().attr('id');
  window.open("http://localhost/database/supplieredit.php?name=" + $id);

});
$(".SRDeleteButton").click(function() {
  var $id = $(this).parent().parent().attr('id');
  $.get( "supplierdelete.php", { name: $id } )
  .done(function( data ) {
    if (data)
      location.reload();
    else
      alert("erorr"); 
  });

});
$(".CRAddButton").click(function() {
   window.open("http://localhost/database/customer.php");

});
$(".WRAddButton").click(function() {
   window.open("http://localhost/database/warehouseadd.php");

});
$(".WREditButton").click(function() {
  var $id = $(this).parent().parent().attr('id');
  window.open("http://localhost/database/warehouseedit.php?name=" + $id);

});
$(".WRDeleteButton").click(function() {
  var $id = $(this).parent().parent().attr('id');
  $.get( "warehousedelete.php", { name: $id } )
  .done(function( data ) {
    if (data)
      location.reload();
    else
      alert("erorr"); 
  });

});
$(".AddButton").click(function() {
   window.open("http://localhost/database/productadd.php");

});
$(".EditButton").click(function() {
  var $id = $(this).parent().parent().attr('id');
   window.open("http://localhost/database/productedit.php?id=" + $id);

});
$(".DeleteButton").click(function() {
  var $id = $(this).parent().parent().attr('id');
  $.get( "productdelete.php", { id: $id } )
  .done(function( data ) {
    if (data)
      location.reload();
    else
      alert("erorr"); 
  });

});

  $(".AddButton").click(function() {
    var $id = $(this).parent().parent().attr('id');
    var $i = GetIndex($list, $id);
    if ($i == -1) {
      var $obj = {
      id: $id,
      count: 1
      };
      $list.push($obj);
      $(".sakr").prepend("<p id='sakr-"+$id+"'>"+$id+" 1</p>");
    }
    else {
      $list[$i].count++;
      $("#sakr-"+$id).html($id+" "+$list[$i].count);
    }
  });

  $("#OrderSendBtn").click(function() {

    $.ajax({
      url: "order.php",
      type: 'POST',
      data: {
          "call": "SendOrder",
          "list": $list
      }
    }).done(function(data) {
      if (data == "success") {
          $("#OrderConfirm").modal('show');
      }
      else {
          $("#OrderError").modal('show');
          $("#OrderError").find(".modal-body").text("The requested items do not exist in the needed quantities.");
      }
    });
  });

  $("#OrderConfirmForm").submit(function(event) {
    event.preventDefault();
    $data = $(this).find("#msg").val();
    $.ajax({
      url: "order.php",
      type: 'POST',
      data: {
        "call": "SendOrderConfirm",
        "list": $list,
        "CustId": $data
      }
    }).done(function(data) {
      $("#OrderConfirm").modal('hide');
      if (data == "customer") {
          $("#OrderError").modal('show');
          $("#OrderError").find(".modal-body").text("Customer does not exist!");
      }
      else if (data == "error") {
          $("#OrderError").modal('show');
          $("#OrderError").find(".modal-body").text("An error occured while submiting the order");
      }
      else {
        console.log(data);
          $("#OrderSuccess").modal('show');
          $("#OrderSuccess").find(".modal-body").text("Order Price is " + data);
      }
    });
  }); 

  $('#OrderSuccess').on('hidden.bs.modal', function () {
    location.reload(false);
  });

  $('#OrderError').on('hidden.bs.modal', function () {
    location.reload(false);
  });

});