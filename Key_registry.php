<?php
error_reporting(0);
?>

<?php
include ('connect.php');
?>


<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title> Gate Pass Controller </title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link href="vendors/flatpickr/flatpickr.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <link href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />



    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="assets/js/config.js"></script>
    <script src="vendors/simplebar/simplebar.min.js"></script>
    <script src="vendors/flatpickr/flatpickr.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="vendors/prism/prism-okaidia.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="assets/css/theme-rtl.css" rel="stylesheet" id="style-rtl">
    <link href="assets/css/theme.css" rel="stylesheet" id="style-default">
    <link href="assets/css/user-rtl.css" rel="stylesheet" id="user-style-rtl">
    <link href="assets/css/user.css" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">


            <div class="content">

                <div class="card mb-3">
                    <div class="bg-holder d-none d-lg-block bg-card"
                        style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-lg-10">

                                <h2 class="fw-light overflow-hidden text-primary">WELCOME TO <span
                                        class="typed-text fw-bold ms-1"
                                        data-typed-text='["GATE PASS CONTROLLER"]'></span></h2>

                            </div>
                            <div class="col">

                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-0 me-2" id="switchDarkModeExample" type="checkbox"
                                        data-theme-control="theme" />
                                    <label for="switchDarkModeExample">Dark Mode</label>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="card bg-transparent-50 overflow-hidden">
                                    <div class="card-header position-relative">

                                        <!--/.bg-holder-->

                                        <div class="position-relative z-2">
                                            <div>
                                                <?php
                                                date_default_timezone_set('Asia/Colombo');
                                                $currentHour = date('H');

                                                // Define the  greeting based on the time
                                                
                                                if ($currentHour < 12) {
                                                    $greeting = "Good Morning";
                                                } elseif ($currentHour < 18) {
                                                    $greeting = "Good Afternoon";
                                                } else {
                                                    $greeting = "Good Evening";
                                                }

                                                // Display the greeting
                                                echo "<h3 class=\"text-success\" id=\"greeting\">$greeting</h3>";
                                                ?>
                                                <p>Stay Connected to Your Gate Pass Updates</p>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="col-auto">

                                                <select class="form-control" id="doorSelect" style="width: 100%">
                                                <!-- Add an option for selecting all doors -->
                                                <option value="">Select The Door name</option>
                                                <?php
                                                // Assuming $conn is your database connection
                                                $query = "SELECT DISTINCT door_name FROM key_permission";
                                                $selectDoor = mysqli_query($conn, $query);

                                                // Check if query executed successfully
                                                if ($selectDoor && mysqli_num_rows($selectDoor) > 0) {
                                                    while ($row = mysqli_fetch_assoc($selectDoor)) {
                                                        echo '<option value="' . $row['door_name'] . '">' . $row['door_name'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">No doors found</option>';
                                                }
                                                ?>
                                            </select>
                                        
                                    </div>

                                </div>



                                <div class="col-md-4 mt-3 mt-md-0">
                                    <div class="col-auto">

                                        <input class="form-control" id="ipInputmask"
                                            data-input-mask='{"mask":"999.99.99.99"}'
                                            placeholder="ENTER YOUR HRIS NUMBER" type="text" />
                                    </div>
                                </div>


                                <div class="col-md-4 mt-3 mt-md-0">
                                    <div class="col-auto">

                                        <button class="btn btn-primary w-100" onclick="FILTER_KEY()" type="button"
                                            value="searchbutton">Verify Authorization</button>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                <?php

                $query = "SELECT k.*, e.*
              FROM key_permission k
              INNER JOIN EMB_DB e 
              ON (e.DIVISION = k.division)";

                $result = mysqli_query($conn, $query);

                ?>

                <form id="keyForm" method="post" action="save_key.php">
                    <input type="hidden" id="door_nameInput" name="door_name">
                    <input type="hidden" id="hrisNoInput" name="hrisNo">
                    <input type="hidden" id="epfInput" name="epf">
                    <input type="hidden" id="nameInput" name="name">
                    <input type="hidden" id="btnStatusInput" name="btn_status">


                    <div class="card" id="DIV_IN_OUT" style="visibility: hidden">
                        <div class="card-header border-bottom">
                            <div class="row flex-between-end">
                                <div class="col-auto align-self-center">
                                    <button id="btnIn" name="btnIn" class="btn btn-success me-1 mb-1"
                                        type="button">In</button>
                                    <button id="btnOut" name="btnOut" class="btn btn-danger me-1 mb-1"
                                        type="button">Out</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="content">
                    <div class="card mb-3">
                        <div class="card-body position-relative">
                            <h4 class="text-secondary">Key Access History</h4>
                            <div id="tableKeyHistory"
                                data-list='{"valueNames":["door","hris","epf","name","status", "date&time"],"page":7,"pagination":true}'>
                                <div class="row justify-content-end g-0">
                                    <div class="col-auto col-sm-5 mb-3">
                                        <form>
                                            <div class="input-group">
                                                <input class="form-control form-control-sm shadow-none search"
                                                    type="search" placeholder="Search..." aria-label="search" />
                                                <div class="input-group-text bg-transparent">
                                                    <span class="fa fa-search fs-10 text-600"></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive scrollbar">
                                    <table class="table table-bordered table-striped fs-10 mb-0">
                                        <thead class="bg-200 ">
                                            <tr>
                                                <th scope="col" class="text-info" data-sort="door">Door Name</th>
                                                <th scope="col" class="text-info" data-sort="hris">Hris Number</th>
                                                <th scope="col" class="text-info" data-sort="epf">EPF Number</th>
                                                <th scope="col" class="text-info" data-sort="name">Name</th>
                                                <th scope="col" class="text-info" data-sort="status">Access Status</th>
                                                <th scope="col" class="text-info" data-sort="date&time">Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            $query = "SELECT k.*, e.* 
                                                FROM KEY_REG k
                                                INNER JOIN EMB_DB e 
                                                ON (e.HRIS_NO = k.KEY_REG_HRIS OR e.EPF_NO = k.KEY_REG_EPf)
                                                ORDER BY KEY_REG_DateTime DESC;";


                                            $result = mysqli_query($conn, $query);

                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {

                                                    ?>
                                                    <tr class="align-middle">

                                                        <td class="text-nowrap door">
                                                            <?php echo $row['KEY_REG_DOOR_NAME']; ?>
                                                        </td>
                                                        <td class="text-nowrap hris">
                                                            <?php echo $row['KEY_REG_HRIS']; ?>
                                                        </td>
                                                        <td class="text-nowrap epf">
                                                            <?php echo $row['EPF_NO']; ?>
                                                        </td>
                                                        <td class="text-nowrap name">
                                                            <?php echo $row['NAME']; ?>
                                                        </td>
                                                        <td class="text-nowrap status">
                                                            <?php echo $row['KEY_REG_STATUS']; ?>
                                                        </td>
                                                        <td class="text-nowrap date&time">
                                                            <?php echo $row['KEY_REG_DateTime']; ?>
                                                        </td>

                                                    </tr>


                                                <?php }
                                            } else {
                                                echo '<tr><td colspan="4"> No results found </td></tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                                        data-list-pagination="prev">
                                        <span class="fas fa-chevron-left"></span>
                                    </button>
                                    <ul class="pagination mb-0"></ul>
                                    <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                                        data-list-pagination="next">
                                        <span class="fas fa-chevron-right"> </span>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                        <div class="row g-0 justify-content-between fs-10 mt-4 mb-3">
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600">Thank you for creating with Hayleys Fentons <span
                                        class="d-none d-sm-inline-block">|
                                    </span><br class="d-sm-none" /> 2024 &copy;</p>
                            </div>
                            <div class="col-12 col-sm-auto text-center">

                            </div>
                        </div>
                    </footer>
        </div>
        

    </main>


    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/typed.js/typed.umd.js"></script>
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/prism/prism.js"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    <?php

    // Fetch data from the key_permission table
    $query = "SELECT door_name, division FROM key_permission";
    $result = mysqli_query($conn, $query);

    // Initialize an empty array to store door-name-to-division mapping
    $doorDivisionMap = [];

    // Store the mapping in the array
    while ($row = mysqli_fetch_assoc($result)) {
        $doorDivisionMap[$row['door_name']] = $row['division'];
    }

    // Fetch data from the EMB_DB table
    $query = "SELECT HRIS_NO, DIVISION FROM EMB_DB";
    $result = mysqli_query($conn, $query);

    // Initialize an empty array to store HRIS_NO-to-division mapping
    $hrisDivisionMap = [];

    // Store the mapping in the array
    while ($row = mysqli_fetch_assoc($result)) {
        $hrisDivisionMap[$row['HRIS_NO']] = $row['DIVISION'];
    }
    ?>

    <script>

        function selectDoor(door_name) {
            document.getElementById('doorSelect').innerText = door_name;
        }


        // Store the door-name-to-division and HRIS_NO-to-division mappings in JavaScript variables
        var doorDivisionMap = <?php echo json_encode($doorDivisionMap); ?>;
        var hrisDivisionMap = <?php echo json_encode($hrisDivisionMap); ?>;

        // Function to check authorization
        function FILTER_KEY() {
            var selectDoor = document.getElementById('doorSelect').value.trim();
            var hrisNo = document.getElementById('ipInputmask').value.trim();
            var btnIn = document.getElementById('btnIn');
            var btnOut = document.getElementById('btnOut');
            var DIV_IN_OUT = document.getElementById('DIV_IN_OUT');


            // Check if the HRIS_NO is associated with the selected door's division
            if (doorDivisionMap[selectDoor] === hrisDivisionMap[hrisNo]) {
                

                Swal.fire({
                    icon: 'success',
                    title: 'Access Granted!',
                    text: 'You have been successfully authorized to proceed ',
                    showConfirmButton: false,
                    timer: 1600
                });
                DIV_IN_OUT.style.visibility = 'visible';
                btnIn.style.display = 'inline-block';
                btnOut.style.display = 'inline-block';

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Access Denied!',
                    text: 'You are not authorized to proceed further',
                    confirmButtonColor: '#1394f0',
                    confirmButtonText: 'OK'
                });


                DIV_IN_OUT.style.visibility = 'hidden';
                btnIn.style.display = 'none';
                btnOut.style.display = 'none';
            }
        }
    </script>

    <script>

        document.getElementById('btnIn').addEventListener('click', function () {
            document.getElementById('door_nameInput').value = document.getElementById('doorSelect').innerText.trim();
            document.getElementById('hrisNoInput').value = document.getElementById('ipInputmask').value.trim();
            document.getElementById('btnStatusInput').value = 'IN';
            document.getElementById('keyForm').submit();
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'You have successfully checked in',
                confirmButtonColor: '#28a745',
                confirmButtonText: 'OK'
            });

        });

        document.getElementById('btnOut').addEventListener('click', function () {
            document.getElementById('door_nameInput').value = document.getElementById('doorSelect').innerText.trim();
            document.getElementById('hrisNoInput').value = document.getElementById('ipInputmask').value.trim();
            document.getElementById('btnStatusInput').value = 'OUT';
            document.getElementById('keyForm').submit();
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'You have successfully checked out',
                confirmButtonColor: '#28a745',
                confirmButtonText: 'OK'
            });

        });

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        // Initialize Select2 for the select input element
        $(document).ready(function () {
            $('#doorSelect').select2({
                placeholder: "Select a key",
                allowClear: true // Option to clear the selection
            });
        });
    </script>
</body>

</html>