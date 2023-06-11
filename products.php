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
          <table id="tableData">

          </table>
        </div>
    </center>
    <?php
    }else{
        include 'redirection.php';
        redirect('loginRes.php');
    }
    ?>

    <div class='box'>
      <div class='wave -one'></div>
      <div class='wave -two'></div>
      <div class='wave -three'></div>
    </div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Material Design Bootstrap-->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <!-- Web3.js -->
    <script src="web3.min.js"></script>

    <!-- QR Code Library-->
    <script src="./dist/qrious.js"></script>

    <!-- QR Code Reader -->
    <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>

    <script src="app.js"></script>
    <script>

    </script>

    <!-- Web3 Injection -->
    <script>
      // Initialize Web3
      if (typeof web3 !== 'undefined') {
        web3 = new Web3(web3.currentProvider);
        web3 = new Web3(new Web3.providers.HttpProvider('HTTP://127.0.0.1:7545'));
      } else {
        web3 = new Web3(new Web3.providers.HttpProvider('HTTP://127.0.0.1:7545'));
      }

      // Set the Contract
      var contract = new web3.eth.Contract(contractAbi, contractAddress);
      let item=10;
      console.log(item);
      // contract.methods.totalitems().call(function (err, items) {
      //   console.log(err, result);
      //   item=items;
      //   console.log(item);
      // });
      contract.methods.allProduct().call(function (err, result) {
        $("#tableData").html(result);
        console.log(result);
          for(let i=0;i<item;i++)
          {
            let verifyElement = document.getElementById(i);
            if (verifyElement) {
                verifyElement.onclick = function () {
                this.innerHTML = "Verified";
            
                var divElement = document.querySelector("div[data-value]");
                var value = divElement.dataset.value;
                console.log(value);
    
                web3.eth.getAccounts().then(async function(accounts) {
                var receipt = await contract.methods.verification(i).send({ from: accounts[0], gas: 1000000 }).then(receipt => {
          });
          console.log("Verification Success");
        });
          };
        } else {
          console.log(verifyElement);
        }
          }
        });



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
