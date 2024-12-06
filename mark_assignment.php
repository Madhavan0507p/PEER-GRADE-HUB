<?php
session_start();
if (isset($_SESSION['tid']) && isset($_POST['marks']) && isset($_POST['u_id']) && isset($_POST['aid'])) {
    $marks = $_POST['marks'];
    $u_id = $_POST['u_id'];
    $aid = $_POST['aid'];

    require_once 'conn.php';
    $conn = new mysqli($hm, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    // Insert or update the marks for the student
    $q = "SELECT * FROM marks WHERE u_id = $u_id AND aid = $aid";
    $res = $conn->query($q);
    
    if ($res->num_rows > 0) {
        // Update marks if already exists
        $q = "UPDATE marks SET marks = $marks WHERE u_id = $u_id AND aid = $aid";
    } else {
        // Insert marks if not exists
        $q = "INSERT INTO marks (u_id, aid, marks) VALUES ($u_id, $aid, $marks)";
    }

    if ($conn->query($q) === TRUE) {
        header("Location: t_dashboard.php?aid=$aid&aname=" . urlencode($_GET['aname']) . "&sub=" . urlencode($_GET['sub']));
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header('Location: index.html');
}
?>
