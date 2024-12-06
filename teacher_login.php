<?php
session_start();
if(!isset($_SESSION['tid']))
{
  if (isset($_POST['login']))
  {
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    if($email=="admin@gmail.com" and $pass=='root')
    {
        $_SESSION['tid']=1;
        $_SESSION['temail']='admin@gmail.com';
        $_SESSION['tname']='ADMIN';
        header('location:t_dashboard.php');
    }
    else
    {
        echo '<script>alert("Please Eneter valid email and password")</script>';
    }  
}
}
else
{
  header('location:t_dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <title>Student Assignment system</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">PEER GRADE HUB</span>
      </div>
    </div>
  </nav>
  <br><br>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="card" style="width: 40rem;">
        <div class="card-body">
          <center>
            <h5 class="card-title text-center">Faculty Login</h5>
            <hr>
           
          </center>
          <br>
          <form method="POST">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label" >Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="pass" required>
              </div>
            </div> 
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary" name="login">Sign in</button>
            </div>
          </form>
          <br>
            Cookies must be enabled in your browser 
          <br>
          <br><br>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ"
    crossorigin="anonymous"></script>
</body>

</html>