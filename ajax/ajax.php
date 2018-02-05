<?php
include '../include/config.php';
include 'apis.php';
include 'controls.php';


if($_POST['q']=='userenabledisable')
{
	userenabledisable();
}
else if($_POST['q']=='userdetail')
{
	userdetail();
}
else if($_POST['q']=='userfreezedunfreezed')
{
	userfreezedunfreezed();
}else if($_POST['q']=='viewuserdetail')
{
	viewuserdetail();
}else if($_POST['q']=='viewbalanceallcurrency')
{
	viewbalanceallcurrency();
}else if($_POST['q']=='getqrcode')
{
	getqrcode();
}else if($_POST['q']=='transactionhistory')
{
	transactionhistory();
}else if($_POST['q']=='viewmyorderlist')
{
	viewmyorderlist();
}else if($_POST['q']=='currencybasedmyorder')
{
	currencybasedmyorder();
}else if($_POST['q']=='currencybasedmysuccessorder')
{
	currencybasedmysuccessorder();
}else if($_POST['q']=='viewmysuccessorderlist')
{
	viewmysuccessorderlist();
}
elseif($_POST['q']=="viewmyorderCurrencylist")
{
	fetchmyordercurrencylist();
}
elseif($_POST['q']=="orderBookBid")
{
	orderBookBid();
}
elseif($_POST['q']=="orderBookAsk") {
	orderBookAskFetch();
}
elseif($_POST['q']=="orderBook")
{
	fetchAllOrder();
}
else if($_POST['q']=='admincurrencybasedmyorder')
{
	admincurrencybasedmyorder();
}
else if($_POST['q']=='admincurrencybasedmysuccessorder')
{
	admincurrencybasedmysuccessorder();
}
else if($_POST['q']=='admin_login')
{
admin_login();
}else if($_POST['q']=='viewmykycdetail')
{
	viewmykycdetail();
}else if($_POST['q']=='kycuserdetail')
{
	kycuserdetail();
}else if($_POST['q']=='kycverifystatus')
{
	kycverifystatus();
}

function kycverifystatus()
{
	$status=$_POST['status'];
	$id=$_POST['id'];
	$obj=NEW controls();
  	$response=$obj->kycverifystatus($id,$status);

  	if($status==2)
  	{
  		$statu='approved';
  	}else{
  		$statu='rejected';
  	}

  	if($response)
  	{
  		echo 'detail^User has been '.$statu.' successfully.^1^detail';
  	}else{
  		echo 'detail^Error occurred while '.$statu.' user!!!^0^detail';
  	}
}


function kycuserdetail()
{

	$detail='';
	$detail .= '<table id="myTable" class="table table-striped table-bordered">
	        <thead>
	            <tr>
	                <th>Email</th>
	                <th>Created Date</th>
	                <th>Kyc Status</th>
	            </tr>
	        </thead>
	        <tbody>';

    $obj=NEW controls();
  	$response=$obj->userdetail();
    $responseData = json_decode($response,true);
    foreach($responseData['users']  as $data)
    {
    	$email=$data['email'];
		$userid=$data['id'];
    	//print_r($data);
	    $detail .= '<tr>';
	    $detail .= '<td>'. $data['email'].'</td>';
	    $detail .= '<td>'. date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
	    $detail .= '<td>';

	    if($data['verificationStatus']=='0')
	    {
	    	 $detail .= '<span class="label label-rouded label-primary">Not Fill</span> ';
	    }elseif($data['verificationStatus']=='1')
	    {
	    	$detail .= '<span class="label label-rouded label-warning">Pending</span> ';
	    	$detail .='<a href="javascript:;" data-toggle="modal" data-target="#myModal"  onclick="viewmykycdetail(\''.$email.'\',\''.$userid.'\');"><span class="label label-rouded label-primary" >KYC Detail</span></a>&nbsp;&nbsp;&nbsp;';
	    }elseif($data['verificationStatus']=='2')
	    {
	    	$detail .= '<span class="label label-rouded label-success">Success</span> ';
	    	$detail .='<a href="javascript:;" data-toggle="modal" data-target="#myModal"  onclick="viewmykycdetail(\''.$email.'\',\''.$userid.'\');"><span class="label label-rouded label-primary" >KYC Detail</span></a>&nbsp;&nbsp;&nbsp;';
	    }elseif($data['verificationStatus']=='3')
	    {
	    	$detail .= '<span class="label label-rouded label-danger">Reject</span> ';
	    	$detail .='<a href="javascript:;" data-toggle="modal" data-target="#myModal"  onclick="viewmykycdetail(\''.$email.'\',\''.$userid.'\');"><span class="label label-rouded label-primary" >KYC Detail</span></a>&nbsp;&nbsp;&nbsp;';
	    }

	   


	    $detail .= '</td>
	    </tr>';
	}
	$detail .= '</tbody>
	</table>';

	echo $detail;
}


function viewmykycdetail()
{
	$email=$_POST['email'];
	$userid=$_POST['userid'];
	$obj=New controls();
	$response=$obj->kycdetailByuserid($userid);
	$responseData = json_decode($response, true);
	$data='';
	//	print_r($responseData);
	//print_r($responseData['user']['verificationDetails'][0]);
 	
 		$detail=$responseData['user']['verificationDetails'][0];
 		$detailuser=$responseData['user'];

 		//print_r($detailuser['taxProofImageName']);echo "<br><br><br><br><br>";
 		$taxprooima=explode(",/var/www/html/", $detailuser['taxProofImageName']);
 		$addprooima=explode("/var/www/html/", $detailuser['addressProofImageName']);

 		
 		
 	
 		$data .='
 		<div><h4 style="font-weight:bold;text-align:center;text-decoration:underline;font-size: 25px;">Kyc Detail</h4>
 		<a href="javascript:;" class="btn btn btn-success btn-outline btn-1b kycbtn" onclick="kycverifystatus(\''.$detailuser['id'].'\',2);">Approve</a>
 		<a href="javascript:;" class="btn btn btn-danger btn-outline btn-1b kycbtn" onclick="kycverifystatus(\''.$detailuser['id'].'\',3);">Reject</a>
 		</div>
 		<div id="messagestatus"></div>
 		<table class="table table-bordered">
			    <tbody>
			      <tr>
			        <th colspan="6"  style="font-weight:bold;text-align:center;text-decoration:underline;">User Detail</th>
			        	       
			      </tr>
			      <tr>
			        <th>First name</th>
			        <td>'.$detail['firstName'].'</td>	
			        <th>Middle name</th>
			        <td>'.$detail['middleName'].'</td>	
			         <th>Last name</th>
			        <td>'.$detail['lastName'].'</td>	       
			      </tr>
			      <tr>
			        <th>Address 1</th>
			        <td colspan="5">'.$detail['addLine1'].'</td>
			      </tr>
			      <tr>
			        <th>Address 2</th>
			        <td colspan="5">'.$detail['addLine2'].'</td>
			      </tr> <tr>
			        <th colspan="6"  style="font-weight:bold;text-align:center;text-decoration:underline;">Account Detail</th>
			        	       
			      </tr>
			      <tr>
			        <th>Date of Birth</th>
			        <td>'.$detail['DOB'].'</td>
			        <th>Verification date</th>
			        <td>'.date('d-M-Y',strtotime($detail['verificationDate'])).'</td>
			        <th>City</th>
			        <td>'.$detail['city'].'</td>
			      </tr>
			      <tr>
			        <th>State</th>
			        <td>'.$detail['state'].'</td>
			        <th>Pincode</th>
			        <td>'.$detail['pincode'].'</td>
			        <th>MobileNumber</th>
			        <td>'.$detail['mobileNumber'].'</td>
			      </tr>	      
			      <tr>
			        <th>Bank Account Holder Name</th>
			        <td>'.$detail['bankAccountHolderName'].'</td>
			        <th>Bank Account Number</th>
			        <td>'.$detail['bankAccountNumber'].'</td>
			        <th>Bank Name</th>
			        <td>'.$detail['bankName'].'</td>
			      </tr>	      
			      <tr>
			        <th>IFSC Code</th>
			        <td>'.$detail['IFSCCode'].'</td>
			        <th>Tax Proof Number</th>
			        <td>'.$detail['taxProofNumber'].'</td> 
			        <th>Address Proof Type</th>
			        <td>'.$detail['addressProofType'].'</td>
			      </tr>			      
			     	      
			      <tr>   
			       <th>Address Proof Number</th>
			        <td>'.$detail['addressProofNumber'].'</td>		
			      </tr>
			      <tr>
			         <th>Tax Proof Image</th>
			        <td colspan="5">';
			       foreach ($taxprooima as $tximg) {
			      		 if($tximg!=''){$data .= '<a href="'.SITE_URL.$tximg.'" target="_blank"><img src="'.SITE_URL.$tximg.'" style="width:10%;margin-left:  10px;"></a>';}
			       }
			        $data .='</td>
			       </tr>
			       <tr>
			         <th>Address Proof Image</th>
			        <td colspan="5">';
			       foreach ($addprooima as $addimg) {
			       	$a=str_replace(",","",$addimg);
			      		 if($addimg!=''){$data .= '<a href="'.SITE_URL.$tximg.'" target="_blank"><img src="'.SITE_URL.$a.'" style="width:10%;margin-left:10px;"></a>';}
			       }
			        $data .='</td>
			      </tr>
			    </tbody>
			  </table>';

 	echo $data;
}

function userenabledisable()
{
	$obj=NEW controls();
	$response=$obj->userenablediable($_POST['email'],$_POST['status']);
    $responseData = json_decode($response, true);
 	print_r($responseData);
}

function userfreezedunfreezed()
{

  $obj=NEW controls();
  $response=$obj->userfreezedunfreezed($_POST['email'],$_POST['status']);
  $responseData = json_decode($response, true);

  print_r($responseDataData);
}


function userdetail()
{

	$detail='';
	$detail .= '<table id="myTable" class="table table-striped table-bordered">
	        <thead>
	            <tr>
	                <th>Email</th>
	                <th>Created Date</th>
	                <th>Action</th>
	            </tr>
	        </thead>
	        <tbody>';

    $obj=NEW controls();
  	$response=$obj->userdetail();
    $responseData = json_decode($response,true);
    foreach($responseData['users']  as $data)
    {
    	//print_r($data);
	    $detail .= '<tr>';
	    $detail .= '<td>'. $data['email'].'</td>';
	    $detail .= '<td>'. date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
	    $detail .= '<td>';

	    if($data['isUserDisable']==true){
	        $detail .= '<a href="javascript:;" class="btn btn-success" data-toggle="tooltip" title="Activate" onclick="userenabledisable(\''.$data['email'].'\',0);"><i class="fa fa-eye"></i> </a>&nbsp;&nbsp;&nbsp;';
	     }else{
	        $detail .= '<a href="javascript:;" class="btn btn-danger" data-toggle="tooltip" title="Deactivate"  onclick="userenabledisable(\''.$data['email'].'\',1);"><i class="fa fa-eye-slash"></i> </a>&nbsp;&nbsp;&nbsp;';
	    }

	    if($data['isUserFreezed']==false)
	    {
	    	$detail .= '<a href="javascript:;" class="btn btn-danger"  data-toggle="tooltip" title="Freeze" onclick="userfreezedunfreezed(\''.$data['email'].'\',0);"><i class="fa fa-clock-o"></i> </a>&nbsp;&nbsp;&nbsp;';
	    }else{
	    	$detail .= '<a href="javascript:;" class="btn btn-success"  data-toggle="tooltip" title="Unfreeze" onclick="userfreezedunfreezed(\''.$data['email'].'\',1);"><i class="fa fa-clock-o"></i> </a>&nbsp;&nbsp;&nbsp;';

	    }


	    $detail .= '<a href="javascript:;" class="btn btn-info"  data-toggle="tooltip" title="History"><i class="fa fa-sticky-note "></i> </a>&nbsp;&nbsp;&nbsp;';

	    //$detail .= '<a href="javascript:;" class="btn btn-primary"  data-toggle="modal" title="Detail" data-target="#userdetail" onclick="viewuserdetail(\''.$data['email'].'\');"><i class="fa fa-book "></i> </a>&nbsp;&nbsp;&nbsp;';

	    $detail .= '<a href="'.BASE_PATH.'viewuserdetail?uid='.base64_encode($data['email']).'&id='.base64_encode($data['id']).'" class="btn btn-primary"  data-toggle="tooltip" title="Detail"><i class="fa fa-book "></i> </a>&nbsp;&nbsp;&nbsp;';

	    $detail .= '</td>
	    </tr>';
	}
	$detail .= '</tbody>
	</table>';

	echo $detail;
}


function viewuserdetail()
{
	$email=$_POST['email'];
	$userid=$_POST['userid'];

	$detail='';
 	$detail .= '<table class="table table-striped table-bordered"><thead>';
    $detail .='<tr>';
	$detail .='<th style="width:30%">'.$email.'</th>';
	$detail .='<td><a href="javascript:;"  onclick="viewbalanceallcurrency(\''.$email.'\');"><span class="label label-rouded label-success" >View Balance</span></a>&nbsp;&nbsp;&nbsp;';
	// $detail .='<a href="javascript:;"  onclick=""><span class="label label-rouded label-info" >View Transaction</span></a>&nbsp;&nbsp;&nbsp;';
	$detail .='<a href="javascript:;" onclick="viewmyorderlist(\''.$email.'\');"><span class="label label-rouded label-warning" >Current Order</span></a>&nbsp;&nbsp;&nbsp;';
	$detail .='<a href="javascript:;"  onclick="viewmysuccessorderlist(\''.$email.'\');"><span class="label label-rouded label-primary" >Success Order</span></a>&nbsp;&nbsp;&nbsp;';
	//$detail .='<a href="javascript:;"  onclick="viewmykycdetail(\''.$email.'\',\''.$userid.'\');"><span class="label label-rouded label-primary" >KYC Detail</span></a>&nbsp;&nbsp;&nbsp;';
	$detail .='</td>';
	$detail .='</tr>';
	$detail .= '</thead>
	</table>';
 	echo $detail;
}


function viewbalanceallcurrency()
{

	$email=$_POST['email'];
 	$detail='';
	$detail .= '<div class="row"></div><table id="myTable1" class="table table-striped table-bordered table color-bordered-table success-bordered-table">
	        <thead>
	            <tr>
	                <th>Currency Name</th>
	                <th>Balance</th>
	                <th>Freeze Balance</th>
	                <th>Total</th>
	                <th>Actions</th>
	            </tr>
	        </thead>
	        <tbody>';
    $obj=NEW allapi();
	$data=$obj->getallcurrency();
	$result=json_decode($data);

	$obj=NEW controls();
	$response=$obj->viewbalanceallcurrency($email);
    $responseData = json_decode($response, true);
    $i=1;
    foreach($result as $currencyname){
    $cun=substr($currencyname,0,3);
	$detail .= '<tr>';
	$detail .= '<td>'. $currencyname.'</td>';
	if($responseData['user'][$cun.'balance']=='')
	{
		$detail .= '<td>0</td>';
	}else{
		$detail .= '<td>'.$responseData['user'][$cun.'balance'].'</td>';
	}

	if($responseData['user']['Freezed'.$cun.'balance']=='')
	{
		$detail .= '<td>0</td>';
	}else{
		$detail .= '<td>'.$responseData['user']['Freezed'.$cun.'balance'].'</td>';
	}

	$detail .= '<td>'.$total=$responseData['user'][$cun.'balance']+$responseData['user']['Freezed'.$cun.'balance'].'</td>';
	$detail .= '<td>';
	$detail .= '<a href="javascript:;" class="btn btn-success"  data-toggle="modal" title="Qr Code" data-target="#qrcode" onclick="getqrcode(\''.$email.'\',\''.$currencyname.'\')"><i class="fa fa-qrcode "></i> </a>&nbsp;&nbsp;&nbsp;';
	$detail .= '<a href="javascript:;" class="btn btn-success"  data-toggle="modal" title="History" data-target="#transactiondetail" onclick="transactionhistory(\''.$email.'\',\''.$currencyname.'\')"><i class="fa fa-book "></i> </a>&nbsp;&nbsp;&nbsp;';
	$detail .= '</td>';
	$detail .= '</tr>';

	$i++;}

    $detail .= '</tbody>
              </table>';
    echo $detail;
}


function getqrcode()
{
	$email = $_POST['email'];
    $curr=$_POST['curr'];
    $obj=NEW controls();
	$bcc_address=$obj->getqrcode($email,$curr);

	$detail='';
	$detail .='<div class="alert alert-success" style="margin-top:18px;">'.$bcc_address.'</div>';
 	$detail .= '<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl='.$bcc_address.'"
                                                alt="QR Code" style="width:200px;border:0;"/>';
    echo $detail;
}


function transactionhistory()
{
	$detail='';
	$detail .= '<table id="myTable" class="table table-striped table-bordered">
	        <thead>
	            <tr>
	                <th>Date</th>
	                <th>Address</th>
	                <th>Type</th>
	                <th>Amount</th>
	                <th>Confirmations</th>
	            </tr>
	        </thead>
	        <tbody>';
	        $email = $_POST['email'];
	        $curr = $_POST['curr'];
	        $obj=NEW controls();
			$response=$obj->transactionhistory($email,$curr);
 			$responseData = json_decode($response,true);
		    if (isset($responseData['tx'])) {
		      $transactionList_BTC = $responseData['tx'];
		  	}

      foreach (array_reverse($transactionList_BTC) as $transaction) {
              if ($transaction['category']=="send") {
                  $tx_type = '<b style="color: #FF0000;">Sent</b>';

        $detail .= '<tr>
        <td>'.date('n/j/Y h:i a', $transaction['time']).'</td>
        <td>'.$transaction['address'].'</td>
        <td>'.$tx_type.'</td>
        <td>'.abs($transaction['amount']).'</td>
        <td>'.$transaction['confirmations'].'</td>
        </tr>';
          $i++;} }

	$detail .= '</tbody>
	</table>';

	echo $detail;
}


function viewmyorderlist()
{
    $email=$_POST['email'];


    $obj=NEW allapi();
	$data=$obj->getallcategory();
	$result=json_decode($data);
	$datasub=$obj->getallSubcategory();
	$subcat=json_decode($datasub, true);
	$detail='';
	$i=1;
	$detail .='<div class="row">
		<div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top:10px;">
                    <ul class="nav nav-pills m-b-30 ">';
            foreach($result as $cat) {
            $detail .='<li class="nav-item">
            <a href="javascript:;" class="nav-link';if($i==1){$detail .=' active';}$detail .='" data-toggle="tab" onclick="currencydetailshow(\''.$cat->id.'\');">'.$cat->name.'</a> </li>';
        	$i++;}
            $detail .='</ul><div class="tab-content br-n pn">';
            $detail .= '<table class="table table-striped table-bordered table color-bordered-table warning-bordered-table">
	        <thead>
	            <tr>
	                <th>Currency Name</th>

	            </tr>
	        </thead>
	        <tbody>';

	        foreach($result as $cat) {
	        	$detail .='<tbody id="navpills-'.$cat->id.'" class="tab-pane subcatgoryhide">';
            foreach($subcat[$cat->id]['subcat'] as $subcatgory)
			{
            $detail .='
            <tr>
			  <td><a href="javascript:;" onclick="currencybasedmyorder(\''.$email.'\',\''.$subcatgory.'\');">'.$subcatgory.'</a></td>
			</tr>';
            }
            $detail .='</tbody>';
        	}

                     $detail .='</table></div>
                            </div>
                        </div>
                        </div>';

	$detail .='<div class="col-sm-8"><div id="currencybasedmyorderdetail"></div>';

	        echo $detail;


}

function currencybasedmyorder()
{
	$email=$_POST['email'];
	$subcatgory=$_POST['subcatgory'];
    $curre=explode("/",$subcatgory);
    $currency1=$curre['0'];
    $currency2=$curre['1'];



    $detail='';
    $detail .= '<table id="myorderdetail" class="table table-striped table-bordered table color-bordered-table warning-bordered-table">
	        <thead>
	            <tr>
                	<th width="15%">Order Date</th>
					<th width="8%">BID/ASK	</th>
					<th width="15%">Units '.$currency1.'</th>
					<th width="15%">ACTUAL RATE	</th>
					<th width="15%">Units Total '.$currency1.'</th>
					<th width="15%">Units Total '.$currency2.'</th>

	            </tr>
	        </thead>
	        <tbody>';
	$currency1=substr($currency1,0,3);
	$i=0;
    $obj=NEW controls();
    $response=$obj->viewbalanceallcurrency($email);
    $responseData = json_decode($response, true);

    $bid=$responseData['user']['bids'.$currency1];
    $ask=$responseData['user']['asks'.$currency1];

    $repon=array_merge($bid,$ask);

    foreach($repon as $data)
    {

    	if($data['status']=='2')
    	{
    		if($data['bidAmount'.$currency1])
    		{
    			$detail .='<tr>';
			    $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
			    $detail .='<td>BID</td>';
			    $detail .='<td>'.$data['bidAmount'.$currency1].'</td>';
			    $detail .='<td>'.$data['bidRate'].'</td>';
			    $detail .='<td>'.$data['totalbidAmount'.$currency1].'</td>';
			    $detail .='<td>'.$data['totalbidAmount'.$currency2].'</td>';
			    $detail .='</tr>';
    		}else if($data['askAmount'.$currency1]){
    			$detail .='<tr>';
			    $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
			    $detail .='<td>ASK</td>';
			    $detail .='<td>'.$data['askAmount'.$currency1].'</td>';
			    $detail .='<td>'.$data['askRate'].'</td>';
			    $detail .='<td>'.$data['totalaskAmount'.$currency1].'</td>';
			    $detail .='<td>'.$data['totalaskAmount'.$currency2].'</td>';
			    $detail .='</tr>';
    		}

   	}
   }

   echo $detail;

}


function viewmysuccessorderlist()
{
    $email=$_POST['email'];


    $obj=NEW allapi();
	$data=$obj->getallcategory();
	$result=json_decode($data);
	$datasub=$obj->getallSubcategory();
	$subcat=json_decode($datasub, true);
	$detail='';
	$i=1;
	$detail .='<div class="row">
		<div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top:10px;">
                    <ul class="nav nav-pills m-b-30">';
            foreach($result as $cat) {
            $detail .='<li class="nav-item">
            <a href="javascript:;" class="nav-primary-clr nav-link';if($i==1){$detail .=' active';}$detail .='" data-toggle="tab" onclick="currencydetailshow(\''.$cat->id.'\');">'.$cat->name.'</a> </li>';
        	$i++;}
            $detail .='</ul><div class="tab-content br-n pn">';
            $detail .= '<table class="table table-striped table-bordered table color-bordered-table primary-bordered-table">
	        <thead>
	            <tr>
	                <th>Currency Name</th>

	            </tr>
	        </thead>
	        <tbody>';

	        foreach($result as $cat) {
	        	$detail .='<tbody id="navpills-'.$cat->id.'" class="tab-pane subcatgoryhide">';
            foreach($subcat[$cat->id]['subcat'] as $subcatgory)
			{
            $detail .='
            <tr>
			  <td><a href="javascript:;" onclick="currencybasedmysuccessorder(\''.$email.'\',\''.$subcatgory.'\');">'.$subcatgory.'</a></td>
			</tr>';
            }
            $detail .='</tbody>';
        	}

                     $detail .='</table></div>
                            </div>
                        </div>
                        </div>';

	$detail .='<div class="col-sm-8"><div id="currencybasedmyorderdetail"></div>';

	        echo $detail;


}


function currencybasedmysuccessorder()
{
	$email=$_POST['email'];
	$subcatgory=$_POST['subcatgory'];
    $curre=explode("/",$subcatgory);
    $currency1=$curre['0'];
    $currency2=$curre['1'];



    $detail='';
    $detail .= '<table id="myorderdetail" class="table table-striped table-bordered table color-bordered-table primary-bordered-table">
	        <thead>
	            <tr>
                	<th width="15%">Order Date</th>
					<th width="10%">BID/ASK</th>
					<th width="20%">Units '.$currency1.'</th>
					<th width="20%">ACTUAL RATE	</th>
					<th width="20%">Units Total '.$currency1.'</th>
					<th width="15%">Units Total '.$currency2.'</th>

	            </tr>
	        </thead>
	        <tbody>';
	$currency1=substr($currency1,0,3);
	$obj=NEW controls();
    $response=$obj->viewbalanceallcurrency($email);
    $responseData = json_decode($response, true);
    $bid=$responseData['user']['bidsINR'];
    $ask=$responseData['user']['asksINR'];
    $repon=array_merge($bid,$ask);
    foreach($repon as $data)
    {
    	if($data['status']=='1')
    	{
    		if($data['bidAmount'.$currency1])
    		{
    			$detail .='<tr>';
			    $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
			    $detail .='<td>BID</td>';
			    $detail .='<td>'.$data['bidAmount'.$currency1].'</td>';
			    $detail .='<td>'.$data['bidRate'].'</td>';
			    $detail .='<td>'.$data['totalbidAmount'.$currency1].'</td>';
			    $detail .='<td>'.$data['totalbidAmount'.$currency2].'</td>';
			    $detail .='</tr>';
    		}else if($data['askAmount'.$currency1]){
    			$detail .='<tr>';
			    $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
			    $detail .='<td>ASK</td>';
			    $detail .='<td>'.$data['askAmount'.$currency1].'</td>';
			    $detail .='<td>'.$data['askRate'].'</td>';
			    $detail .='<td>'.$data['totalaskAmount'.$currency1].'</td>';
			    $detail .='<td>'.$data['totalaskAmount'.$currency2].'</td>';
			    $detail .='</tr>';
    		}

   		}
   }

   echo $detail;

}
function fetchmyordercurrencylist()
{
	$obj=NEW allapi();
$data=$obj->getallcategory();
$result=json_decode($data);
$datasub=$obj->getallSubcategory();
$subcat=json_decode($datasub, true);
$detail='';
$i=1;
$detail .='<div class="panel panel-default">
							<div class="panel-body" style="padding-top:10px;">
									<ul class="nav nav-pills m-b-30 ">';
					foreach($result as $cat) {
					$detail .='<li class="nav-item">
										<a href="javascript:;" class="nav-link';if($i==1){$detail .=' active';}
					$detail .='" data-toggle="tab" onclick="currencydetailshow(\''.$cat->id.'\');">'.$cat->name.'</a> </li>';
				$i++;}

					$detail .='</ul><div class="tab-content br-n pn">';
					$detail .= '<table class="table table-striped table-bordered table color-bordered-table warning-bordered-table">
				<thead>
						<tr>
								<th>Currency Name</th>

						</tr>
				</thead>
				<tbody>';

				foreach($result as $cat) {
					$detail .='<tbody id="navpills-'.$cat->id.'" class="tab-pane subcatgoryhide">';
					foreach($subcat[$cat->id]['subcat'] as $subcatgory)
		{
					$detail .='
					<tr>
			<td><a href="'.BASE_PATH.'market?curr='.base64_encode($subcatgory).'">'.$subcatgory.'</a></td>
		</tr>';
					}
					$detail .='</tbody>';
				}

									 $detail .='</table></div>
													</div>';

				echo $detail;
}


function orderBookBid()
	{
		$i=0;
		$sub_curr=$_POST['sub_curr'];
		$main_curr=$_POST['main_curr'];
		$obj=NEW controls();
	  $response=$obj->orderBookBidFetch($sub_curr,$main_curr);
	 $responseData = json_decode($response, true);
	 // echo "<pre>";
	 // print_r($responseData);
	 // echo "</pre>";
		$detail='';
			$detail .='<p>Total BID  <span class="curr_sub">'.$sub_curr.'</span> '.$responseData['bidAmount'.$sub_curr.'Sum'].'</p>
			<p>Total BID <span class="curr_main">'.$main_curr.'</span>  '.$responseData['bidAmount'.$main_curr.'Sum'].'</p>
			<table class="table color-table info-table">
							<thead>
									<tr>
											<th>Bid</th>
											<th>Amount</th>
											<th>Price</th>
											<th>Total('.$main_curr.')</th>
									</tr>
							</thead>
							<tbody>';
							foreach ($responseData['bids'.$sub_curr] as $bidsValue) {
								$detail .='<tr>
										<td>BID</td>
										<td>'.$bidsValue['bidAmount'.$sub_curr].'</td>
										<td>'.$bidsValue['bidRate'].'</td>
										<td>'.$bidsValue['bidAmount'.$main_curr].'</td>
								</tr>';
							$i++;}
								$detail .='</tbody>
					</table>';

			echo $detail;
	}

	function orderBookAskFetch()
	{
		$i=0;
		$sub_curr=$_POST['sub_curr'];
		$main_curr=$_POST['main_curr'];
		$obj=NEW controls();
	  $response=$obj->orderBookAskFetchData($sub_curr,$main_curr);
	 $responseData = json_decode($response, true);
	 // echo "<pre>";
	 // print_r($responseData);
	 // echo "</pre>";
		$detail='';
			$detail .='<p>Total ASK  <span class="curr_sub">'.$sub_curr.'</span> '.$responseData['askAmount'.$sub_curr.'Sum'].'</p>
			<p>Total ASK <span class="curr_main">'.$main_curr.'</span>  '.$responseData['askAmount'.$main_curr.'Sum'].'</p>
			<table class="table color-table info-table">
							<thead>
									<tr>
											<th>Ask</th>
											<th>Amount</th>
											<th>Price</th>
											<th>Total('.$main_curr.')</th>
									</tr>
							</thead>
							<tbody>';
							foreach ($responseData['asks'.$sub_curr] as $bidsValue) {
								$detail .='<tr>
										<td>ASK</td>
										<td>'.$bidsValue['askAmount'.$sub_curr].'</td>
										<td>'.$bidsValue['askRate'].'</td>
										<td>'.$bidsValue['askAmount'.$main_curr].'</td>
								</tr>';
							$i++;}
								$detail .='</tbody>
					</table>';

			echo $detail;
	}

	function fetchAllOrder()
	{
		$i=0;
		$sub_curr=$_POST['sub_curr'];
		$main_curr=$_POST['main_curr'];
		$email=$_POST['email'];
		// $obj=NEW controls();
	 //  $response=$obj->orderFetchData($sub_curr,$main_curr);
	 // $responseData = json_decode($response, true);
	 $obj=NEW controls();
	 $response=$obj->viewbalanceallcurrency($email);
	 $responseData = json_decode($response, true);
	 echo "<pre>";
	 print_r($responseData);
	 echo "</pre>";
		$detail='';
			$detail .='<table class="table color-table success-table">
							<thead>
									<tr>
											<th>ORDER DATE</th>
											<th>BID/ASK</th>
											<th>UNITS '.$sub_curr.'</th>
											<th>ACTUAL RATE</th>
											<th>UNITS TOTAL '.$sub_curr.'</th>
											<th>UNITS TOTAL '.$main_curr.'</th>
											<th>ACTION</th>
									</tr>
							</thead>
							<tbody>';
							foreach ($responseData['asks'.$sub_curr] as $bidsValue) {
								$detail .='<tr>
										<td>ASK</td>
										<td>'.$bidsValue['askAmount'.$sub_curr].'</td>
										<td>'.$bidsValue['askRate'].'</td>
										<td>'.$bidsValue['askAmount'.$main_curr].'</td>
										<td>'.$bidsValue['askAmount'.$sub_curr].'</td>
										<td>'.$bidsValue['askRate'].'</td>
										<td>'.$bidsValue['askAmount'.$main_curr].'</td>
								</tr>';
							$i++;}
								$detail .='</tbody>
					</table>';

			echo $detail;
	}

	function admincurrencybasedmyorder()
	{
		$email=$_POST['email'];
		$subcatgory=$_POST['subcatgory'];
	    $curre=explode("/",$subcatgory);
	    $currency1=$curre['0'];
	    $currency2=$curre['1'];



	    $detail='';
	    $detail .= '<table id="myorderdetail" class="table color-table warning-table">
		        <thead>
		            <tr>
	                	<th width="15%">Order Date</th>
						<th width="8%">BID/ASK	</th>
						<th width="15%">Units '.$currency1.'</th>
						<th width="15%">ACTUAL RATE	</th>
						<th width="15%">Units Total '.$currency1.'</th>
						<th width="15%">Units Total '.$currency2.'</th>

		            </tr>
		        </thead>
		        <tbody>';
		$currency1=substr($currency1,0,3);
		$i=0;
	    $obj=NEW controls();
	    $response=$obj->viewbalanceallcurrency($email);
	    $responseData = json_decode($response, true);

	    $bid=$responseData['user']['bids'.$currency1];
	    $ask=$responseData['user']['asks'.$currency1];

	    $repon=array_merge($bid,$ask);

	    foreach($repon as $data)
	    {

	    	if($data['status']=='2')
	    	{
	    		if($data['bidAmount'.$currency1])
	    		{
	    			$detail .='<tr>';
				    $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
				    $detail .='<td>BID</td>';
				    $detail .='<td>'.$data['bidAmount'.$currency1].'</td>';
				    $detail .='<td>'.$data['bidRate'].'</td>';
				    $detail .='<td>'.$data['totalbidAmount'.$currency1].'</td>';
				    $detail .='<td>'.$data['totalbidAmount'.$currency2].'</td>';
				    $detail .='</tr>';
	    		}else if($data['askAmount'.$currency1]){
	    			$detail .='<tr>';
				    $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
				    $detail .='<td>ASK</td>';
				    $detail .='<td>'.$data['askAmount'.$currency1].'</td>';
				    $detail .='<td>'.$data['askRate'].'</td>';
				    $detail .='<td>'.$data['totalaskAmount'.$currency1].'</td>';
				    $detail .='<td>'.$data['totalaskAmount'.$currency2].'</td>';
				    $detail .='</tr>';
	    		}

	   	}
	   }

	   echo $detail;

	}

	function admincurrencybasedmysuccessorder()
	{
		$email=$_POST['email'];
		$subcatgory=$_POST['subcatgory'];
	    $curre=explode("/",$subcatgory);
	    $currency1=$curre['0'];
	    $currency2=$curre['1'];



	    $detail='';
	    $detail .= '<table id="myorderdetailTable" class="table table-striped table-bordered table color-bordered-table primary-bordered-table">
		        <thead>
		            <tr>
	                	<th width="15%">Order Date</th>
						<th width="10%">BID/ASK'.$currency1.'</th>
						<th width="20%">Units '.$currency1.'</th>
						<th width="20%">ACTUAL RATE	</th>
						<th width="20%">Units Total '.$currency1.'</th>
						<th width="15%">Units Total '.$currency2.'</th>

		            </tr>
		        </thead>
		        <tbody>';
		$currency1=substr($currency1,0,3);
		$obj=NEW controls();
	    $response=$obj->viewbalanceallcurrency($email);
	    $responseData = json_decode($response, true);
	    $bid=$responseData['user']['bids'.$currency1];
	    $ask=$responseData['user']['asks'.$currency1];
	    $repon=array_merge($bid,$ask);
	    foreach($repon as $data)
	    {
	    	if($data['status']=='1')
	    	{
	    		if($data['bidAmount'.$currency1])
	    		{
	    			$detail .='<tr>';
				    $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
				    $detail .='<td>BID</td>';
				    $detail .='<td>'.$data['bidAmount'.$currency1].'</td>';
				    $detail .='<td>'.$data['bidRate'].'</td>';
				    $detail .='<td>'.$data['totalbidAmount'.$currency1].'</td>';
				    $detail .='<td>'.$data['totalbidAmount'.$currency2].'</td>';
				    $detail .='</tr>';
	    		}else if($data['askAmount'.$currency1]){
	    			$detail .='<tr>';
				    $detail .='<td>'.date('d-M-Y h:i:s',strtotime($data['createdAt'])).'</td>';
				    $detail .='<td>ASK</td>';
				    $detail .='<td>'.$data['askAmount'.$currency1].'</td>';
				    $detail .='<td>'.$data['askRate'].'</td>';
				    $detail .='<td>'.$data['totalaskAmount'.$currency1].'</td>';
				    $detail .='<td>'.$data['totalaskAmount'.$currency2].'</td>';
				    $detail .='</tr>';
	    		}

	   		}
	   }

	   echo $detail;

	}

	function admin_login()
	{
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$obj=NEW controls();
	$respose=$obj->admin_userlogin($email,$pass);
	$responseData=json_decode($respose,true);
	$_SESSION['admin_email']=$responseData['user']['email'];
	$_SESSION['admin_id']=$responseData['user']['id'];
	//print_r($responseData);
	echo 'detail^'.$responseData['statusCode'].'^'.$responseData['message'].'^detail';
	//echo $email.$pass;
	}
?>
