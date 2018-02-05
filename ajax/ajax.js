
function userenabledisable(email,status)
{
	   //$('#reload').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	   $('#overlay').show();
	   $.post("ajax/ajax.php",{

			email:email,
			status:status,
			q:"userenabledisable"
			},
			function(data){
			userdetail();
			$('#overlay').hide();
			}
		);

}
function userfreezedunfreezed(email,status)
{
	   //$('#reload').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	   $('#overlay').show();
	   $.post("ajax/ajax.php",{

			email:email,
			status:status,
			q:"userfreezedunfreezed"
			},
			function(data){
			userdetail();
			$('#overlay').hide();
			}
		);

}
function userdetail()
{
	//$('#reload').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		q:"userdetail"
		},
		function(data){
		$("#reload").html(data);
		$('#myTable').dataTable({
		"sPaginationType": "full_numbers"
		});
		$('[data-toggle=tooltip]').tooltip();
		$('[data-toggle=modal]').tooltip();
		$('#overlay').hide();
		}

		);
}
function viewuserdetail(email,userid)
{

	//$('#viewuserbalance').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
	email:email,
	userid:userid,
	q:"viewuserdetail"
	},
	function(data){
	$('#viewuserbalance').html(data);
	$('#overlay').hide();
	}
	);
}

function viewmykycdetail(email,userid)
{

	//$('#viewuserbalance').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
	email:email,
	userid:userid,
	q:"viewmykycdetail"
	},
	function(data){
	$('#userbalancelist').html(data);
	$('#overlay').hide();
	}
	);
}

function viewbalanceallcurrency(email)
{
	//$('#userbalancelist').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		email:email,
		q:"viewbalanceallcurrency"
		},
		function(data){

		$('#userbalancelist').html(data);
		$('#myTable1').dataTable({
		"sPaginationType": "full_numbers"
		});
		$('[data-toggle=tooltip]').tooltip();
		$('[data-toggle=modal]').tooltip();
		$('#overlay').hide();
		}
		);
}


function getqrcode(email,curr)
{
	//$('#getqrcode').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		email:email,
		curr:curr,
		q:"getqrcode"
		},
		function(data){

		$('#getqrcode').html(data);
		$('[data-toggle=tooltip]').tooltip();
		$('#overlay').hide();
		}

		);
}

function transactionhistory(email,curr)
{
	//$('#gettransactiondetail').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		email:email,
		curr:curr,
		q:"transactionhistory"
		},
		function(data){

		$('#gettransactiondetail').html(data);
		$('#myTable').dataTable({
		"sPaginationType": "full_numbers"
		});
		$('[data-toggle=tooltip]').tooltip();
		$('#overlay').hide();
		}
		);
}
function viewmyorderlist(email)
{
	//$('#userbalancelist').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		email:email,
		q:"viewmyorderlist"
		},
		function(data){

		$('#userbalancelist').html(data);
		$('#myTable1').dataTable({
		"sPaginationType": "full_numbers"
		});
		$('#myTable2').dataTable({
		"sPaginationType": "full_numbers"
		});
		currencydetailshow('1');
		$('[data-toggle=tooltip]').tooltip();
		$('[data-toggle=modal]').tooltip();
		$('#overlay').hide();
		}
		);
}

function currencydetailshow(id)
{
	$('.subcatgoryhide').hide();
	$('#navpills-'+id).show();
}

function currencybasedmyorder(email,subcatgory)
{
	//$('#currencybasedmyorderdetail').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		email:email,
		subcatgory:subcatgory,
		q:"currencybasedmyorder"
		},
		function(data){

		$('#currencybasedmyorderdetail').html(data);
		$('#myorderdetail').dataTable({
		"sPaginationType": "full_numbers"
		});
		$('[data-toggle=tooltip]').tooltip();
		$('[data-toggle=modal]').tooltip();
		$('#overlay').hide();
		}
		);
}



function currencybasedmysuccessorder(email,subcatgory)
{
	//$('#currencybasedmyorderdetail').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		email:email,
		subcatgory:subcatgory,
		q:"currencybasedmysuccessorder"
		},
		function(data){

		$('#currencybasedmyorderdetail').html(data);
		$('#myorderdetail').dataTable({
		"sPaginationType": "full_numbers"
		});
		$('[data-toggle=tooltip]').tooltip();
		$('[data-toggle=modal]').tooltip();
		$('#overlay').hide();
		}
		);
}


function viewmysuccessorderlist(email)
{
	//$('#userbalancelist').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		email:email,
		q:"viewmysuccessorderlist"
		},
		function(data){
		$('#userbalancelist').html(data);
		$('#myTable1').dataTable({
		"sPaginationType": "full_numbers"
		});
		$('#myTable2').dataTable({
		"sPaginationType": "full_numbers"
		});
		currencydetailshow('1');
		$('[data-toggle=tooltip]').tooltip();
		$('[data-toggle=modal]').tooltip();
		$('#overlay').hide();
		}
		);
}

function getCurrencytList()
{
	//$('#userbalancelist').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		q:"viewmyorderCurrencylist"
		},
		function(data){

		$('#allCurrencyList').html(data);
		// $('#myTable1').dataTable({
		// "sPaginationType": "full_numbers"
		// });
		// $('#myTable2').dataTable({
		// "sPaginationType": "full_numbers"
		// });
		// currencydetailshow('1');
		// $('[data-toggle=tooltip]').tooltip();
		// $('[data-toggle=modal]').tooltip();
		$('#overlay').hide();
		}
		);
}

function maketcurrenypass(curr)
{
	var	data=curr.split('/');
	$('#sub_curr').val(data[0].substr(0,3));
	$('#main_curr').val(data[1]);
	$(".curr_sub").text(data[0]);
	$(".curr_main").text(data[1]);
}


function kycuserdetail()
{
	//$('#reload').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		q:"kycuserdetail"
		},
		function(data){
		$("#reload").html(data);
		$('#myTable').dataTable({
		"sPaginationType": "full_numbers"
		});
		$('[data-toggle=tooltip]').tooltip();
		$('[data-toggle=modal]').tooltip();
		$('#overlay').hide();
		}

		);
}


function kycverifystatus(id,status)
{
	//$('#reload').html('<img src="images/loader.gif" class="img-responsive" style="margin-left: 35%;">');
	$('#overlay').show();
	$.post("ajax/ajax.php",{
		id:id,
		status:status,
		q:"kycverifystatus"
		},
		function(data){
			dat=data.split('^');
			//alert(dat[2]);
			if(dat[2]=='1')
			{
				$('#messagestatus').html('<div class="alert alert-success"><strong>Success!</strong> '+dat[1]+'</div>');
			}else{
				$('#messagestatus').html('<div class="alert alert-danger"><strong>failed!</strong> '+dat[1]+'</div>');
			}
		//$('#messagestatus').html('');
		kycuserdetail();
		 setTimeout(function(){ $("#messagestatus").hide(); }, 5000);
		}

		);
}
