<?php

class controls
{
	public function userenablediable($email,$status)
	{
			$postData = array(
		  		"userMailId"=> $email
		     	);
		    $context = stream_context_create(array(
		    	"ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false),
			    'http' => array(
			      'method' => 'POST',
			      'header' => "Content-Type: application/json\r\n",
			      'content' => json_encode($postData)
			      )
			    ));

		  if($status==0)
		  {
		  	$response = file_get_contents(URL_API.'admin/enableUser', false, $context);

		  }else{
		  	$response = file_get_contents(URL_API.'admin/disableUser', false, $context);

		  }

		  return $response;
	}

	public function userfreezedunfreezed($email,$status)
	{
			   $postData = array(
		  			"userMailId"=> $email
	     	   );
			  $context = stream_context_create(array(
			  	"ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false),
			    'http' => array(
			      'method' => 'POST',
			      'header' => "Content-Type: application/json\r\n",
			      'content' => json_encode($postData)
			      )
			    ));

			  if($status==0)
			  {
			  	$response = file_get_contents(URL_API.'admin/freezUser', false, $context);

			  }else{
			  	$response = file_get_contents(URL_API.'admin/unfreezUser', false, $context);

			  }
			  return $response;
	}

	public function userdetail()
	{
		$context=stream_context_create(array("ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false)));
		$response = file_get_contents(URL_API.'admin/getAllUsers',false,$context);
		return $response;
	}


	public function viewbalanceallcurrency($email)
	{
		$url_api=URL_API;
        $postData = array(
          "userMailId"=> $email

          );

          $context = stream_context_create(array(
          	"ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false),
            'http' => array(
              'method' => 'POST',
              'header' => "Content-Type: application/json\r\n",
              'content' => json_encode($postData)
              )
            ));
         $response = file_get_contents($url_api.'user/getAllDetailsOfUser', false, $context);
         return $response;
	}

	public function getqrcode($email,$curr)
	{
		$url_api = URL_API;
		$postData = array(
					  "userMailId"=>$email
					  );
		$context = stream_context_create(array(
		  "ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false),
		  'http' => array(
		    'method' => 'POST',
		    'header' => "Content-Type: application/json\r\n",
		    'content' => json_encode($postData)
		    )
	  ));

	 $userapi = file_get_contents($url_api.'user/getAllDetailsOfUser', false, $context);
	 $userapidetail = json_decode($userapi, true);

		if(isset($curr))
		{
			  $currencyname=$curr;

			  switch ($currencyname) {
			    case 'BTC':
			                if($userapidetail['user']['isBTCAddress']==0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewBTCAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];

			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userBTCAddress'];


			                }
			        break;
			        case 'BCH':
			                if($userapidetail['user']['isBCHAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewBCHAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];

			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userBCHAddress'];

			                }
			        break;
			        case 'LTC':
			                if($userapidetail['user']['isLTCAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewLTCAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];

			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userLTCAddress'];

			                }
			        break;
			        case 'INRW':
			                if($userapidetail['user']['isINRAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewINRAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];

			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userINRAddress'];

			                }
			        break;
			        case 'USDW':
			          if($userapidetail['user']['isUSDAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewUSDAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userUSDAddress'];
			                }
			        break;
			        case 'GBPW':
			          if($userapidetail['user']['isGBPAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewGBPAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userGBPAddress'];
			                }
			        break;
			        case 'BRLW':
			        if($userapidetail['user']['isBRLAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewBRLAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userBRLAddress'];
			                }
			        break;
			        case 'PLNW':
			          if($userapidetail['user']['isPLNAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewPLNAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userPLNAddress'];
			                }
			        break;
			        case 'CADW':
			           if($userapidetail['user']['isCADAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewCADAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userCADAddress'];
			                }
			        break;
			        case 'TRYW':
			          if($userapidetail['user']['isTRYAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewTRYAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                   $bcc_address = $userapidetail['user']['userTRYAddress'];
			                }
			        break;
			        case 'RUBW':
			         if($userapidetail['user']['isRUBAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewRUBAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userRUBAddress'];
			                }
			        break;
			        case 'MXNW':
			          if($userapidetail['user']['isMXNAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewMXNAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userMXNAddress'];
			                }
			        break;
			        case 'CZKW':
			          if($userapidetail['user']['isCZKAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewCZKAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userCZKAddress'];
			                }
			        break;
			        case 'ILSW':
			          if($userapidetail['user']['isILSAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewILSAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                   $bcc_address = $userapidetail['user']['userILSAddress'];
			                }
			        break;
			        case 'NZDW':
			          if($userapidetail['user']['isNZDAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewNZDAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userNZDAddress'];
			                }
			        break;
			        case 'JPYW':
			           if($userapidetail['user']['isJPYAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewJPYAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                   $bcc_address = $userapidetail['user']['userJPYAddress'];
			                }
			        break;
			        case 'SEKW':
			           if($userapidetail['user']['isSEKAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewSEKAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userSEKAddress'];
			                }
			        break;
			        case 'AUDW':
			           if($userapidetail['user']['isAUDAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewAUDAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                   $bcc_address = $userapidetail['user']['userAUDAddress'];
			                }
			        break;
			         case 'EURW':
			          if($userapidetail['user']['isEURAddress']== 0)
			                {
			                  $response = file_get_contents($url_api.'addrgen/getNewEURAddress', false, $context);
			                          $responseData = json_decode($response, true);
			                        if (isset($responseData)) {
			                            $bcc_address = $responseData['newaddress'];
			                        }
			                }
			                else
			                {
			                    $bcc_address = $userapidetail['user']['userEURAddress'];
			                }
			        break;
			    }
			}

		return $bcc_address;
	}

	public function transactionhistory($email,$curr)
	{
		if(isset($curr))
		{
			$postData = array("userMailId"=>$email);
			$context = stream_context_create(array(
			  "ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false),
			  'http' => array(
			    'method' => 'POST',
			    'header' => "Content-Type: application/json\r\n",
			    'content' => json_encode($postData)
			    )
			  ));

			$currencyname=$_POST['curr'];
			if($currencyname=='INRW' || $currencyname=='EURW' || $currencyname=='USDW' || $currencyname=='GBPW' || $currencyname=='BRLW'
			 || $currencyname=='PLNW' || $currencyname=='CADW' || $currencyname=='TRYW' || $currencyname=='RUBW'
			  || $currencyname=='MXNW' || $currencyname=='CZKW' || $currencyname=='ILSW' || $currencyname=='NZDW' || $currencyname=='USDW'
			   || $currencyname=='SEKW' || $currencyname=='AUDW' || $currencyname=='BTC' || $currencyname=='BCH' || $currencyname=='LTC'
			 )
			 {
			   $response = file_get_contents($url_api.'tx/getTxsList'.substr($currencyname,0,3), false, $context);
			 }else{
			   $currencyname='INRW';
			   $response = file_get_contents($url_api.'tx/getTxsList'.substr($currencyname,0,3), false, $context);
			 }

		}
		return $response;
	}
	public function getallusercount()
		{
			$url_api=URL_API;
			$context = stream_context_create(array(
		      "ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false)	  
		  		));
		    $response = file_get_contents($url_api.'admin/getAllUsers',false,$context);
		    return $response;
		}

		public function getallcurrencybalances()
		{
			$url_api=URL_API;
			$context = stream_context_create(array(
		      "ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false)	  
		  		));
		    $response = file_get_contents($url_api.'admin/getCurrenciesDetails',false,$context);
		    return $response;
		}

		public function getalltickets()
		{
			$url_api=URL_API;
			$context = stream_context_create(array(
		      "ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false)	  
		  		));
		    $response = file_get_contents($url_api.'ticket/getAllTickets',false,$context);
		    return $response;
		}
		
	public function orderBookBidFetch($sub_curr,$main_curr)
	{
		$url_api=URL_API;
		  $context = stream_context_create(array(
      "ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false)	  
  		));
        $response= file_get_contents($url_api.'trademarket'.strtolower($main_curr.$sub_curr).'/getAllBid'.$sub_curr,false,$context);
        return $response;
	}

public function orderBookAskFetchData($sub_curr,$main_curr)
{
	$url_api=URL_API;
	  $context = stream_context_create(array(
      "ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false)
  		));
	 $response = file_get_contents($url_api.'trademarket'.strtolower($main_curr.$sub_curr).'/getAllAsk'.$sub_curr,false,$context);
	 return $response;
}

public function admin_userlogin($email_id,$password)
{
		$url_api=URL_API;
		$localIP=$_SERVER['REMOTE_ADDR'];
    $postData = array(
   "email" => $email_id,
   "password" => $password,
   "ip"=>$localIP
  );
    $context = stream_context_create(array(
      "ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false),
	  'http' => array(
	    'method' => 'POST',
	    'header' => "Content-Type: application/json\r\n",
	    'content' => json_encode($postData)
	    )
  ));
$response = file_get_contents($url_api.'auth/authentcate', true, $context);
return $response;
}


public function kycdetailByuserid($id)
{
		$url_api=URL_API;
		$postData = array(
			   "userId" => $id
	  		);
	    $context = stream_context_create(array(
	      "ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false),
		  'http' => array(
		    'method' => 'POST',
		    'header' => "Content-Type: application/json\r\n",
		    'content' => json_encode($postData)
		    )
	  ));
	$response = file_get_contents($url_api.'verification/getVerificationDetails', true, $context);
	return $response;
}


public function kycverifystatus($id,$status)
{
		$url_api=URL_API;
		$postData = array(
			   "userId" => $id,
			   "status" => $status
	  		);
	    $context = stream_context_create(array(
	      "ssl"=>array('verify_peer'=>false,'verify_peer_name'=>false),
		  'http' => array(
		    'method' => 'POST',
		    'header' => "Content-Type: application/json\r\n",
		    'content' => json_encode($postData)
		    )
	  ));
	$response = file_get_contents($url_api.'verification/updateKYCformStatusByUserId', true, $context);
	return $response;
}


}



?>
