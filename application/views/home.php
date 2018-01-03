<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Sign in to Notekeep</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.26" />
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
</head>

<body id="signin">

<header role="site-navigation">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2"><h1 class="logo"><a href="/" title="return to homepage">Notekepping</a></h1></div>
      <div class="col-md-8"></div>
      <div class="col-md-2">
        <ul class="list-inline list-cst-css">
            <li><a href="/signup/" class="register active">Create an account</a></li>
            <li><a href="/signin/" class="sign-in active">Sign in</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>

<div class="container inner-cst-css">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
         <?php echo validation_errors(); ?>
         <form method="post" id="loginform" class="loginform">
            <div class="form-login">
            <h4>Please Sign in</h4>
            <input type="text" id="userName" name="username" class="form-control input-sm chat-input" placeholder="username" />
            </br>
            <input type="text" id="userPassword" name="password" class="form-control input-sm chat-input" placeholder="password" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <a href="javascript:void(0)" id="login-btn" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>
            </span>
            </div>
            </div>
        </form>
     
    </div>
    <div class="col-md-4"></div>
  </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>	
</body>

</html>
