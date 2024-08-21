<?php
error_reporting(0);
?>

<?php
include('connect.php');
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
  <title>Patroll points &amp; Patroll Registry</title>


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
      <script>
        var isFluid = JSON.parse(localStorage.getItem('isFluid'));
        if (isFluid) {
          var container = document.querySelector('[data-layout]');
          container.classList.remove('container');
          container.classList.add('container-fluid');
        }
      </script>

      <div class="content">

        <div class="card mb-3">
          <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
          </div>
          <!--/.bg-holder-->

          <div class="card-body position-relative">
            <div class="row">
              <div class="col-lg-8">
                <h3>Tables</h3>
              </div>

              <form id="dateRangeForm" method="post" action="GET_FILTER_DATE.php">
                <div class="row mt-2">

                  <div class="d-flex justify-content-between align-items-end">

                    <div class="col-6 ">

                      <label class="form-label" for="timepicker2">Select Date Range</label>
                      <input class="form-control datetimepicker" id="INPUT_FILTER_DATE" type="text"
                        placeholder="Y-m-d to Y-m-d"
                        data-options='{"mode":"range","dateFormat":"Y-m-d","disableMobile":true}' />
                    </div>
                    <div class="col-auto">

                      <button class="btn btn-primary" onclick="FILTER_DATE()" type="button"
                        value="searchbutton">Search</button>

                    </div>

              </form>
              <div>

                <label for="ipInputmask">Text</label>
                <input class="form-control" id="ipInputmask" data-input-mask='{"mask":"999.99.99.99"}'
                  placeholder="Input the Text" type="text" />
              </div>


            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="card" id="DIV_POINTDESC_TABLE">
      <div class="card-header border-bottom">
        <div class="row flex-between-end">
          <div class="col-auto align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Point Desc Table</h5>
          </div>
          <div class="col-auto ms-auto">

          </div>
        </div>
      </div>

      <div class="card-body pt-0" id="DIV_FILTER_DATE">

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
    function initTable() {
      new DataTable('#mytable', {
        layout: {
          topStart: {

            buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
          }

        }
      });
    }


    function FILTER_DATE() {

      if (confirm("Are you sure you want to initialize?") == true) {
        var str = document.getElementById('INPUT_FILTER_DATE').value;
        alert(str);
        const array = str.split(' to ');
        var datefrom = array[0];
        var dateto = array[1];

        // Redirect to a new page 
        window.location.href = "TableDisplayData.php?datefrom=" + datefrom + "&dateto=" + dateto;
        $.post("TableDisplayData.php",

          {
            datefrom: datefrom,
            dateto: dateto,
          },

          // function (result, status, xhr) {

          //   document.getElementById("DIV_FILTER_DATE").innerHTML = result;
          //   initTable();

          // }

        )

      }
      else {
        alert("Please select a date range.");
      }
    }


  </script>

</body>

</html>