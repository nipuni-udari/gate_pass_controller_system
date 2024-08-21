
<?php
error_reporting(0);
include('connect.php');

if (isset($_GET['datefrom']) && isset($_GET['dateto'])) {
    $datefrom = mysqli_real_escape_string($conn, $_GET['datefrom']);
    $dateto = mysqli_real_escape_string($conn, $_GET['dateto']);

    $query = "SELECT * FROM patroll_points pp INNER JOIN patroll_registry pr ON pp.id = pr.id 
    WHERE date(pp.datentime) BETWEEN '$datefrom' AND '$dateto'";

    $result = mysqli_query($conn, $query);
    ?>
    
    <?php
} 
?>

