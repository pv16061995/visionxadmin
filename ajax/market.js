
url_api=$('#urlapi').val();

io.sails.url =url_api
window.ioo = io;
socket = io.connect( url_api, {
reconnection: true,
reconnectionDelay: 1000,
reconnectionDelayMax : 5000,
reconnectionAttempts: 99999
});
socket.on( 'connect', function () {} );
socket.on( 'disconnect', function () { socket.connect();  } );

function bidAmount() {
          var a = new BigNumber(document.getElementById('bid_rate').value);
          var b = new BigNumber(document.getElementById('bid_vol').value);
          var result = (a).times(b);
          if (!isNaN(result)) {
              document.getElementById('bid_amount').value = result;
          }
    }
    function bidAmountTotal()
      {
          var res= new BigNumber(document.getElementById('bid_amount').value);
          var a = new BigNumber(document.getElementById('bid_vol').value);
          var b = new BigNumber(document.getElementById('bid_rate').value);
          if(res)
          {
            var equal=(res).dividedBy(b);
            document.getElementById('bid_vol').value=equal;
          }
      }
      function askAmount() {
          var a = new BigNumber(document.getElementById('ask_rate').value);
          var b = new BigNumber(document.getElementById('ask_vol').value);
          var result = (a).times(b);
          if (!isNaN(result)) {
              document.getElementById('ask_amount').value = result;
          }
      }
      function askTotalAmount()
      {
        var a = new BigNumber(document.getElementById('ask_amount').value);
        var b = new BigNumber(document.getElementById('ask_vol').value);
        var res = new BigNumber(document.getElementById('ask_rate').value);
          if(res)
          {
            var equal=(res).dividedBy(b);
            document.getElementById('ask_vol').value=equal;
          }
      }



  function orderBookBid()
  {
    var sub_curr=$('#sub_curr').val();
  	var main_curr=$('#main_curr').val();
    $.post("ajax/ajax.php",{
      q:"orderBookBid",
      sub_curr:sub_curr,
      main_curr:main_curr
      },
      function(data){
      $('#getallbiddetail').html(data);
      }
      );
}

function orderBookAsk()
{
  var sub_curr=$('#sub_curr').val();
  var main_curr=$('#main_curr').val();
  $.post("ajax/ajax.php",{
    q:"orderBookAsk",
    sub_curr:sub_curr,
    main_curr:main_curr
    },
    function(data){
    $('#getallaskdetail').html(data);
    }
    );
}

// function fetchOrderBook(email)
// {
//   var sub_curr=$('#sub_curr').val();
//   var main_curr=$('#main_curr').val();
//   $.post("ajax/ajax.php",{
//     q:"orderBook",
//     sub_curr:sub_curr,
//     main_curr:main_curr,
//     email:email
//     },
//     function(data){
//     $('#order-table').html(data);
//     }
//     );
// }
function admincurrencybasedmyorder(email,subcatgory)
{
	//$('#currencybasedmyorderdetail').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$.post("ajax/ajax.php",{
		email:email,
		subcatgory:subcatgory,
		q:"admincurrencybasedmyorder"
		},
		function(data){
    $('#order-table').html(data);;
		$('#overlay').hide();
		}
		);
}

function admincurrencybasedmysuccessorder(email,subcatgory)
{
	//$('#currencybasedmyorderdetail').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		email:email,
		subcatgory:subcatgory,
		q:"admincurrencybasedmysuccessorder"
		},
		function(data){
		$('#adminsuccesscurreny').html(data);
		$('#overlay').hide();
		}
		);
}
