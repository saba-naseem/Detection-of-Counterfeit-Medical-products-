<?php 
session_start(); 
$color="navbar-dark cyan darken-3";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="SHORTCUT ICON" href="images/fibble.png" type="image/x-icon" />
  <link rel="ICON" href="images/fibble.png" type="image/ico" />

  <title>MedPro</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      background-color: white;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
    }

  </style>

</head>
<?php
    if( $_SESSION['role']==4){
  ?>

<body class="violetgradient">

  <?php include 'navbar.php'; ?>
  <center>
    <div class="customalert">
      <div class="alertcontent">
        <div id="alertText"> &nbsp </div>
        <img id="qrious">
        <div id="bottomText" style="margin-top: 10px; margin-bottom: 15px;"> &nbsp </div>
        <button id="closebutton" class="formbtn"> Done </button>
      </div>
    </div>
  </center>

  <div class="bgroles">
    <center>
      <div class="mycardstyle">
        <div class="greyarea">
            <div class="container">

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Product ID</th>
                    <th>QR Code</th>
                    <th>Description</th>


                  </tr>
                </thead>
                <tbody>
                  <?php 
                                    $con = mysqli_connect("localhost","root","","supplychain");

                                    
                                        $query = "SELECT * FROM complaintbox WHERE CONCAT(productid,qrcode,description) ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                  <tr>
                    <td><?= $items['productid']; ?></td>
                    <td><?= $items['qrcode']; ?></td>
                    <td><?= $items['description']; ?></td>

                  </tr>
                  <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                  <tr>
                    <td colspan="4">No Record Found</td>
                  </tr>
                  <?php
                                        }
                                    
                                ?>
                </tbody>
              </table>
            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

        </div>
    </center>
    <?php
    }else{
        include 'redirection.php';
        redirect('loginRes.php');
    }
    ?>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Material Design Bootstrap-->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <script src="app.js"></script>

    <script>
      function showAlert(message) {
        $("#alertText").html(message);
        $("#qrious").hide();
        $("#bottomText").hide();
        $(".customalert").show("fast", "linear");
      }

      $("#aboutbtn").on("click", function () {
        showAlert(
          "A Decentralised End to End Logistics Application that stores the whereabouts of product at every freight hub to the Blockchain. At consumer end, customers can easily scan product's QR CODE and get complete information about the provenance of that product hence empowering	consumers to only purchase authentic and quality products."
        );
      });

    </script>
</body>

</html>
