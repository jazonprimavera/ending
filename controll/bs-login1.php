<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="39318148952-mnpsqilhqc7cg6o36ri5pqbd510e4fp0.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<title>Bootstrap Sign in Form with Social Login Buttons</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 30px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .login-form .hint-text {
		color: #777;
		padding-bottom: 15px;
		text-align: center;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .login-btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .or-seperator {
        margin: 20px 0 10px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }
    .social-btn .btn {
        margin: 10px 0;
        font-size: 15px;
        text-align: left; 
        line-height: 24px;       
    }
	.social-btn .btn i {
		float: left;
		margin: 4px 15px  0 5px;
        min-width: 15px;
	}
	.input-group-addon .fa{
		font-size: 18px;
	}
</style>
</head>
<body>
<div class="login-form">
        <h2 class="text-center">Sign in</h2>		
        <div class="text-center social-btn">
            <div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=593645991190979&autoLogAppEvents=1">
			</script>
			<?php
			
			require 'vendor/autoload.php';
			$fb = new Facebook\Facebook([
			 'app_id' => '593645991190979',
			 'app_secret' => 'e88d17d662e47976b43cd40e94696de4',
			 'default_graph_version' => 'v2.10',
			]);
			$helper = $fb->getRedirectLoginHelper();
			$permissions = ['email']; // optional
			try {
				
			if (isset($_SESSION['facebook_access_token'])) {
				header('Location: https://iceinventory.000webhostapp.com/?p=admin');

			} else {
			  $accessToken = $helper->getAccessToken();
			}
			} catch(Facebook\Exceptions\facebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}
			if (isset($accessToken)) {
			if (isset($_SESSION['facebook_access_token'])) {
			$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} else {
			// getting short-lived access token
			$_SESSION['facebook_access_token'] = (string) $accessToken;
			  // OAuth 2.0 client handler
			$oAuth2Client = $fb->getOAuth2Client();
			// Exchanges a short-lived access token for a long-lived one
			$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
			$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
			// setting default access token to be used in script
			$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			}
			// redirect the user to the profile page if it has "code" GET variable
			if (isset($_GET['code'])) {
			header('Location: https://iceinventory.000webhostapp.com/?p=admin');
			}
			// getting basic info about user
			try {
			header('Location: https://iceinventory.000webhostapp.com/?p=admin');
			$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
			$requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture
			$picture = $requestPicture->getGraphUser();
			$profile = $profile_request->getGraphUser();
			$fbid = $profile->getProperty('id');           // To Get Facebook ID
			$fbfullname = $profile->getProperty('name');   // To Get Facebook full name
			$fbemail = $profile->getProperty('email');    //  To Get Facebook email
			$fbpic = "<img src='".$picture['url']."' class='img-rounded'/>";
			# save the user nformation in session variable
			$_SESSION['fb_id'] = $fbid.'</br>';
			$_SESSION['fb_name'] = $fbfullname.'</br>';
			$_SESSION['fb_email'] = $fbemail.'</br>';
			$_SESSION['fb_pic'] = $fbpic.'</br>';
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			// redirecting user back to app login page
			header("Location: ./");
			exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
			}
			} else {
			// replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used            
			$loginUrl = $helper->getLoginUrl('https://iceinventory.000webhostapp.com/?p=admin', $permissions);
			echo '<a href="' . $loginUrl . '"><div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="true" data-use-continue-as="true"></div></a>';
			}
			?>
			<div id="my-signin2" data-onsuccess="onSuccess" data-redirecturi="https://iceinventory.000webhostapp.com/?p=admin"></div>
			<script>
    function onSuccess(googleUser) {
        window.location="https://iceinventory.000webhostapp.com/?p=admin";
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 340,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
        </div>
		<div class="or-seperator"><i>or</i></div>
		<form action="email.php" method="post">
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Email" required="required">
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block login-btn">Sign in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right text-success">Forgot Password?</a>
        </div>  
        
    <div class="hint-text small">Don't have an account? <a href="#" class="text-success">Register Now!</a></div>
		</form>
</div>
</body>
</html>                            