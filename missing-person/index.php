<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <title>Rest API Authentication Example</title>

  <!-- Bootstrap 4 CSS and custom CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="res/css/custom.css" />

</head>
<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="#" id='home'>Home</a>
        <a class="nav-item nav-link" href="#" id='update_account'>Account</a>
        <a class="nav-item nav-link" href="#" id='logout'>Logout</a>
        <a class="nav-item nav-link" href="#" id='login'>Login</a>
        <a class="nav-item nav-link" href="#" id='sign_up'>Sign Up</a>


    </div>

  </div>
</nav>
<!-- /navbar -->

<!-- container -->
<main role="main" class="container starter-template">

  <div class="row">
    <div class="col">

      <!-- where prompt / messages will appear -->
      <div id="response"></div>

      <!-- where main content will appear -->
      <div id="content"></div>
    </div>
  </div>

</main>
<!-- /container -->

<!-- jQuery & Bootstrap 4 JavaScript libraries -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="api/app/member.js"></script>

</body>
</html>
