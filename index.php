<?php
require_once ("include/initialize.php");
// if(isset($_SESSION['IDNO'])){
// 	redirect(web_root.'index.php');

// }
// }
 include('configGoogle.php');
 include('configFacebook.php');
// }
if(isset($_GET["code"])){

  $tokenGoogle = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);



  if(!isset($tokenGoogle['error'])){
    $google_client->setAccessToken($tokenGoogle['access_token']);
    //Store "access_token" value in $_SESSION variable for future use.
    //Create Object of Google Service OAuth 2 class
    $google_service = new Google_Service_Oauth2($google_client);
    //Get user profile data from google
    $data = $google_service->userinfo->get();
    $customer = New Customer();
    //$customer->CUSUNAME = $data['email'];
    //$db = new PDO("mysql:host=localhost;dbname=db_ecommerce", "root", "");
    //$user = $customer::existingUser($db,$data['email']);
    $cus = new Customer();
    $cusres = $cus::cusAuthenticationSocial($data['email']);
    if(!($cusres==true)){

      if(!empty($data['given_name'])){
        $customer->FNAME = $data['given_name'];
      }

      if(!empty($data['family_name']))
      {
        $customer->LNAME= $data['family_name'];
      }

      if(!empty($data['email']))
      {
       $customer->CUSUNAME = $data['email'];
      }

      if(!empty($data['gender']))
      {
       $customer->GENDER = $data['gender'];
      }
      $customer->DATEJOIN     = date('Y-m-d h-i-s');
      $customer->TERMS      = 1;
      $customer->create();
      $cus = new Customer();
   	  $cus::cusAuthenticationSocial($data['email']);
    }
    else{
        redirect(web_root."index.php?q=profile");
    }
  }

  else{
    $facebook_helper = $facebook->getRedirectLoginHelper();

    $tokenFacebook = $facebook_helper->getAccessToken();
    $facebook->setDefaultAccessToken($tokenFacebook);
    $graph_response = $facebook->get("/me?fields=name,email", $tokenFacebook);
    $facebook_user_info = $graph_response->getGraphUser();
    $customer = New Customer();

    $cus = new Customer();
    $cusres = $cus::cusAuthenticationSocial($facebook_user_info['email']);
     if(!($cusres==true)){

      if(!empty($facebook_user_info['id']))
         {
          $customer->CUSPHOTO = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
         }

         if(!empty($facebook_user_info['name']))
         {
          $customer->FNAME = $facebook_user_info['name'];
         }

         if(!empty($facebook_user_info['email']))
         {
          $customer->CUSUNAME = $facebook_user_info['email'];
         }
          $customer->DATEJOIN     = date('Y-m-d h-i-s');
          $customer->TERMS      = 1;
         $customer->create();
         $cus = new Customer();
    		$cusres = $cus::cusAuthenticationSocial($facebook_user_info['email']);

     }else{
        redirect(web_root."index.php?q=profile");
    }


  }

}



$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';




switch ($view) {


	case 'product' :
        $title="Products";
		$content='menu.php';
		break;
 	case 'cart' :
        $title="Cart List";
		$content='cart.php';
		break;
 	case 'profile' :
        $title="Profile";
		$content='customer/profile.php';
		break;

	case 'trackorder' :
        $title="Track Order";
		$content='customer/trackorder.php';
		break;

	case 'orderdetails' :

         If(!isset($_SESSION['orderdetails'])){
         $_SESSION['orderdetails'] = "Order Details";
		}
		$content='customer/orderdetails.php';


	if( isset($_SESSION['orderdetails'])){
      if (@count($_SESSION['orderdetails'])>0){
        	$title = 'Cart List' . '| <a href="">Order Details</a>';
		      }
		    }
		break;

	case 'billing' :
	 If(!isset($_SESSION['billingdetails'])){
         $_SESSION['billingdetails'] = "Order Details";
		}
		$content='customer/customerbilling.php';
		if( isset($_SESSION['billingdetails'])){
      if (@count($_SESSION['billingdetails'])>0){
        	$title = 'Cart List' . '| <a href="">Billing Details</a>';
		      }
		    }
		break;

	case 'contact' :
        $title="Contact Us";
		$content='contact.php';
		break;
 	case 'single-item' :
        $title="Product";
		$content='single-item.php';
		break;

	case 'recoverpassword' :
        $title="Recover Password";
		$content='passwordrecover.php';
		break;
	default :
	    $title="Home";
		$content ='home.php';

}




require_once("theme/templates.php");


?>
