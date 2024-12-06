<?php
session_start();
if (isset($_SESSION['tid']) && isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    $aneme = $_GET['aname'];
    $sub = $_GET['sub'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <title>Teacher Dashboard</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <h1 class="navbar-brand">
        PEER GRADE HUB
      </h1>
      <span class="navbar-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square"
          viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
          <path
            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
        </svg>
        <?php echo "  ".$_SESSION['tname']." "?><br><br><a href="logout.php" class="btn btn-danger"
          style="color:white">Logout</a>
      </span>
    </div>
  </nav>
  <br>
  <div class="container">
    <nav class="navbar navbar-light border" style="background-color: #e3f2fd;">
      <!-- Navbar content -->
      <ul class="nav nav-pills ">
        <li class="nav-item p-2">
          <a class="nav-link active" aria-current="page" href="t_dashboard.php">Assignment</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href="create_assignment.php">New Assignment</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href="allstud.php">All Student</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href="addstud.php">Add Student</a>
        </li>
      </ul>
    </nav>

    <br>

    <div class="row justify-content-md-center">
      <div class="card">
        <div class="card-body">
          <div class="alert alert-primary">
            <h1>
             Assignment : <?php echo $aneme?>
            </h1>
            <h5 class="card-title">
              Subject :<?php echo $sub?>
            </h5>
          </div>
        </div>

        <div class="row row-cols-1 row-cols-md-5 g-4">

        <?php
            require_once 'conn.php';
            $conn = new mysqli($hm, $un, $pw, $db);
            if ($conn->connect_error) die($conn->connect_error);
            $q = "SELECT * FROM subdetail WHERE aid=$aid";
            $res = $conn->query($q);
            $arr = $res->fetch_all(MYSQLI_ASSOC);
            foreach ($arr as $a) {
        ?>
          <div class="col">
            <div class="card h-100">
              <img src="https://png.pngtree.com/png-clipart/20190705/original/pngtree-vector-assignment-icon-png-image_4276060.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $a['u_name']?></h5>
                <p class="card-text"><?php echo $a['comm']?></p>
                <a href="drive/<?php echo $a['u_id'].'_'.$a['aid'].'.'.$a['ext'];?>" class="btn btn-success">View Assignment</a>
                
                <!-- Form to provide marks -->
                <form method="POST" action="mark_assignment.php">
                  <div class="mt-2">
                    <label for="marks" class="form-label">Enter Marks</label>
                    <input type="number" class="form-control" id="marks" name="marks" min="0" required>
                    <input type="hidden" name="u_id" value="<?php echo $a['u_id']; ?>">
                    <input type="hidden" name="aid" value="<?php echo $aid; ?>">
                  </div>
                  <button type="submit" class="btn btn-primary mt-2">Submit Marks</button>
                </form>
              </div>
              <div class="card-footer">
                <small class="text-muted"><?php echo $a['time']?></small>
              </div>
            </div>
          </div>
        <?php
            }
        ?>  
        </div>
    </div>

    <br>
  </div>
</body>

</html>
<?php
} else {
    header('location:index.html');
}
?>
