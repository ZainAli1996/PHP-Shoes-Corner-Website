<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="icon" href="icon/shoes.png" sizes="50x50">
<link rel="stylesheet" href="css/Registration.css">

<style>
  body{
    background-image: url(img/RegBG.jpg);
    background-size: cover;
    background-repeat: no-repeat;
  }
</style>
</head>

<body>

   
                                 <!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-light">
<a class="navbar-brand" href="index.php">
<img src="img/logo.png" alt="" height="50px" width="50px">
<h4><span style="color: #D50000">SHOES</span> CORNER</h4>
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="About.php">ABOUT</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
CATEGORY
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="Kids.html">Kids</a>
<a class="dropdown-item" href="Male.html">Male</a>
<a class="dropdown-item" href="Female.html">Female</a>
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="Contact.php">CONTACT</a>
</li>
<li class="nav-item">
<a class="nav-link" href="Login.php"   style="color: blue !important;">LOGIN</a>
</li>
<li class="nav-item">
<a class="nav-link" href="Registration.php"  style="color: green !important;">REGISTER</a>
</li>
</ul>
</div>
</nav>  

<div class="container">
 
                           <!-- FORM START -->

<form action="actions.php" method="POST" class="needs-validation" novalidate>
<h1>Register Yourself</h1>
<p><b>Please fill in this form to create an account.</b></p>
<hr>
<div class="form-row">
    <div class="col-md-6">
    <label for="fullname">Full Name</label>
      <input type="text" class="form-control" placeholder="Enter Full Name" name="fullname" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6">
    <label for="phone">Contact Number</label>
      <input type="tel" class="form-control" placeholder="Enter Phone Number" name="phone" required>
      <div class="invalid-feedback">
        Please provide a valid Contact Number.
      </div>
      </div>
</div>

<div class="form-row">
  <div class="col-md-6">
    <label for="email">Email</label>
    <div class="input-group">
    <div class="input-group-prepend"><span class="input-group-text" id="inputGroupPrepend">@</span></div>
    <input type="text" class="form-control" placeholder="Enter Email" name="email" aria-describedby="inputGroupPrepend" required>
    <div class="invalid-feedback">Please provide an Email.</div>
    </div>
  </div>

  <input type="hidden" name="user_type" value="user">

  <div class="col-md-6">
    <label for="psw">Password</label>
    <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
  </div>
</div>

<div class="psw_confirm form-row">
    <div class="col-md-8">
    <label for="psw-confirm">Confirm Password</label>
    <input type="password" class="form-control" placeholder="Enter Confirm Password" name="psw_confirm" required>
    </div>
</div>

<button type="submit" name="btn" class="btn btn-success">RIGISTER NOW</button>

</form>
                                <!-- FORM END -->

<script>
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      
      var forms = document.getElementsByClassName('needs-validation');

      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>

</div>
   <h6 class="text-center">Already Have Account? <a href="Login.php"><b>LOG IN</b></a></h6>

</body>
</html>