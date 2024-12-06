<?php
session_start();
if (isset($_SESSION['id'])) {
    require_once 'conn.php';
    $conn = new mysqli($hm, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $q = "SELECT * FROM assi";
    $res = $conn->query($q);
    $sr = 1;
    $arr = $res->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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
  <br>
  </body>

<body>
  <div class="container">
    <h1>Assignments</h1>
    <hr>
    <div class="table-responsive">
      <table class="table">
        <thead class="table-dark">
          <th scope="col">Sr No</th>
          <th scope="col">Assignment</th>
          <th scope="col">Subject</th>
          <th scope="col">Action</th>
          <th scope="col">Marks Obtained</th>
        </thead>
        <tbody>
          <?php
          foreach ($arr as $a) {
              if ($a['year'] == $_SESSION['year']) {
                  $qMarks = "SELECT marks FROM marks WHERE u_id = " . $_SESSION['id'] . " AND aid = " . $a['aid'];
                  $resMarks = $conn->query($qMarks);
                  $marks = $resMarks->num_rows > 0 ? $resMarks->fetch_assoc()['marks'] : 'Not Graded';
          ?>
                  <tr>
                    <td><?php echo $sr ?></td>
                    <td><?php echo $a['assignment'] ?></td>
                    <td><?php echo $a['subject'] ?></td>
                    <td>
                      <?php
                      $word = $_SESSION['id'];
                      $s_ar = explode(',', $a['record']);
                      $uni = false;
                      foreach ($s_ar as $arr) {
                          if ($arr == $word) {
                              $uni = true;
                              break;
                          }
                      }
                      if ($uni) {
                          echo '<div class="alert alert-primary" role="alert">Assignment Successfully Submitted</div>';
                      } else {
                          echo "<a href='assignment_upload.php?aid=" . $a['aid'] . "' class='btn btn-success'>Add Attachment</a>";
                      }
                      ?>
                    </td>
                    <td><?php echo $marks ?></td>
                  </tr>
          <?php
                  $sr++;
              }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
<?php
} else {
    header('location:index.html');
}
?>
