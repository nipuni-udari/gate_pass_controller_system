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
    <title>Gate Pass Controller Admin Panel</title>

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
                                        class="typed-text fw-bold ms-1" data-typed-text='["GATEPASS CONTROLLER ADMIN PANEL"]'></span></h2>

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

                                                // Define the  greeting based on the time of day
                                                
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
                                                <p>Stay Engaged with Gate Pass Updates</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            
                                <div class="row mt-3">

                                    <div class="d-flex justify-content-between align-items-end">

                                        <form id="dateRangeForm" method="post">
                                            <div class="row mt-2">

                                                <div class="d-flex justify-content-between align-items-end">

                                                    <div class="col-6">
                                                        <label class="form-label" for="INPUT_FILTER_KEY_DATE">Select
                                                            Date Range</label>
                                                        <input class="form-control datetimepicker"
                                                            id="INPUT_FILTER_KEY_DATE" type="text"
                                                            placeholder="Y-m-d to Y-m-d"
                                                            data-options='{"mode":"range","dateFormat":"Y-m-d","disableMobile":true}' />
                                                    </div>

                                                    <div class="col-auto">

                                                        <button class="btn btn-primary" onclick="FILTER_KEY_DATE()"
                                                            type="button" value="searchbutton">Search</button>

                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>


            <?php

            $query = "SELECT * FROM  key_permission ";
            $result = mysqli_query($conn, $query);

            ?>


            <div class="content">

                <div class="card mb-3" id="Key_Histroy_Table">
                    <div class="card-body position-relative">
                        <h4 class="text-secondary">Key Access History</h4>
                        <div id="tableKeyHistory"
                            data-list='{"valueNames":["door","hris","epf","name","status", "date&time"],"page":10,"pagination":true}'>
                            <div class="row justify-content-end g-0">
                                <div class="col-auto col-sm-5 mb-3">

                                </div>
                            </div>
                            <div class="table-responsive scrollbar">
                                <table id="KeyTable" class="table table-bordered table-striped fs-10 mb-0">
                                    <thead class="bg-200 ">
                                        <tr>
                                            <th scope="col" data-sort="door">Door Name</th>
                                            <th scope="col" data-sort="hris">Hris Number</th>
                                            <th scope="col" data-sort="hris">EPF Number</th>
                                            <th scope="col" data-sort="name">Name</th>
                                            <th scope="col" data-sort="status">Access Status</th>
                                            <th scope="col" data-sort="date&time">Date and Time</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <?php

                                        if (isset($_GET['datefrom']) && isset($_GET['dateto'])) {
                                            $datefrom = mysqli_real_escape_string($conn, $_GET['datefrom']);
                                            $dateto = mysqli_real_escape_string($conn, $_GET['dateto']);

                                            $query = "SELECT * FROM KEY_REG k INNER JOIN EMB_DB e ON e.HRIS_NO = k.KEY_REG_HRIS 
                                            WHERE date(k.KEY_REG_DateTime) BETWEEN '$datefrom' AND '$dateto'";

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
                                            }
                                        } else {
                                            echo '<tr><td colspan="1"> No results found </td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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


    <script>
        function FILTER_KEY_DATE() {
            if (confirm("Are you sure you want to initialize?")) {
                var str = document.getElementById('INPUT_FILTER_KEY_DATE').value;
                alert(str);
                const array = str.split(' to ');
                var datefrom = array[0];
                var dateto = array[1];

                // Redirect to the same page with date parameters
                window.location.href = 'Key_registry_Admin.php?datefrom=' + datefrom + '&dateto=' + dateto;
            } else {
                alert("Please select a date range.");
            }
        }


    </script>

    <script>

        $(document).ready(function () {

            new DataTable('#KeyTable', {
                layout: {
                    topStart: {
                        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                    }
                }
            });
        });


    </script>

</body>

</html>