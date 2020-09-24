<!DOCTYPE html>

<html lang="en">  
<head>
<title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</head>  
<body>
<div class="container">

<h1>Login</h1>
	<body>
    <form action="loginresult.php" method="post">
	
            <label for="username">Username</label>

            <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Enter 'a'">
            </div>
            <label for="password">Password</label>
            <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Enter 'a'"> 
            </div>      
            <input class="btn btn-primary" type="submit" value="Login">
</div>  
    </form>
    </body>
</html>