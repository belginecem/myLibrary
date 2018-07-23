<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sign in">
    <meta name="author" content="EBelgin">
    <link rel="icon" href="/public/assets/images/icon.png">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="/public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/public/assets/css/login_style.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="/Admin/login_validation" method="post" class="form-signin">
      <img class="mb-4" src="/public/assets/images/icon.png" alt="icon" width="90" height="90">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <h6 style="color:red"><?php if(isset($error)){ echo $error;}?></h6> 
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
      <div class="checkbox mb-3">
       <!--  <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label> -->
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
  </body>
</html>