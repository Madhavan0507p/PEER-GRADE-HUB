<?php
session_start();
$aname='';
$sub='';
$aid='';
$year='';
$rec='';
if(isset($_SESSION['id']))
{
    if(isset($_GET['aid']))
    {
        require_once 'conn.php';
        $conn=new mysqli($hm,$un,$pw,$db);
        $aid=$_GET['aid'];
        if($conn->connect_error)die($conn->connect_error);
        $q="select * from assi where aid='$aid'";
        $res=$conn->query($q);
        $arr=$res->fetch_array(MYSQLI_ASSOC);
        // print_r($arr);
        $aname=$arr['assignment'];
        $sub=$arr['subject'];
        $aid=$arr['aid'];
        $year=$arr['year'];
        $rec=$arr['record'];
        $word=$_SESSION['id'];
        $s_ar = explode(',', $arr['record']);
        $uni=false;
            foreach($s_ar as $arr)
            {
              if($arr ==$word)
              {
                $uni=true;
                break;

              }  
            }
        if($uni or $year!=$_SESSION['year'])
        {
            header('location:s_dashboard.php');
        }
        else
        {
?>
        

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <title>Student Dashboard</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <h1 class="navbar-brand"  >
        PEER GRADE HUB
    
</h1>
      <span class="navbar-text">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
</svg><?php echo "  ".$_SESSION['name']." "?><br><br><a href="logout.php" class="btn btn-danger" style="color:white">Logout</a>
      </span>
    </div>
  </nav>

  <div class="container">
    <br>    
        <div class="row justify-content-md-center">
    <div class="card" style="width: 40rem;">
        <div class="card-body">
        <div class="alert alert-primary">
            
            <h5 class="card-title">Assignment : <?php echo $aname;?></h5>
            <h5 class="card-title">Subject : <?php echo $sub;?></h5>
            <hr>
            <div class="alert alert-danger" role="alert">
              Note : File size must be less than 50MB , Dont Reload the tab after submitting
              (Format : ".pdf")
            </div>
        </div>
          <hr>
          <form method="POST" action='uploadass.php' enctype="multipart/form-data">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-4 col-form-label">Add atachment <sup style='color:red'>*</sup></label>
              <div class="input-group">
                    
              <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name='assigf' aria-label="Upload" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label" >Comment</label>
              <div class="col-sm-10">
                  <textarea  id="" cols="30" rows="10"class="form-control" id="inputPassword3" name="comm"></textarea>
              </div>
              <input type="hidden" name="aid" value=<?php echo $aid; ?> readonly>
              <input type="hidden" name="rec" readonly value=<?php echo $rec; ?> >


            </div> 
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary" name="upload">Submit</button>
            </div>
          </form>
         
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
  </div>
</body>

</html>
<?php 
}
}
else
{
    header('location:s_dashboard.php');
}


}
else
{
  header('location:index.html');
}
?>