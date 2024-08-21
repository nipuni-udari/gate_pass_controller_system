<?php
error_reporting(0);
include ('connect.php');

if (isset($_GET['datefrom']) && isset($_GET['dateto'])) {
    $datefrom = mysqli_real_escape_string($conn, $_GET['datefrom']);
    $dateto = mysqli_real_escape_string($conn, $_GET['dateto']);

    $query = "SELECT * FROM KEY_REG k INNER JOIN EMB_DB e ON e.HRIS_NO = k.KEY_REG_HRIS 
              WHERE date(k.KEY_REG_DateTime) BETWEEN '$datefrom' AND '$dateto'";

    $result = mysqli_query($conn, $query);
    ?>
    <table>
        <thead>
            <tr>
                <th>Door Name</th>
                <th>Hris Number</th>
                <th>Name</th>
                <th>Key Registry Status</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the result set and display data in table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['KEY_REG_DOOR_NAME']}</td>";
                echo "<td>{$row['KEY_REG_HRIS']}</td>";
                echo "<td>{$row['NAME']}</td>";
                echo "<td>{$row['KEY_REG_STATUS']}</td>";
                echo "<td>{$row['KEY_REG_DateTime']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
} else {
    // Handle case where datefrom and dateto are not set
    echo "Please select a date range.";
}
?>