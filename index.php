<?php session_start();
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

  <style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: 600;
    }

    body {
      margin: 0px;
    }

    #page {
      margin: 0px 145px;
      position: relative;
      bottom: 55px;
    }

    #page2 {

      position: absolute;
      right: 710px;
      bottom: -170px;

      width: 230px;
      border: none;
      padding: 0px;
      margin-right: 60px;
      margin-bottom: -80px;
    }


    nav {
      height: 50px;
      background-color: rgb(56, 167, 252);
      color: white;
    }

    #logo {
      position: absolute;
      left: 30px;
      margin-top: 5px;
      height: 40px;
    }

    #medpro {
      position: absolute;
      top: 10px;
      left: 95px;
      font-size: larger;
      font-weight: 600;
    }

    #nav-text {
      position: absolute;
      right: 40px;
      top: 10px;
    }

    a {
      text-decoration: none;
      margin: 15px;
      color: white;
      font-size: larger;
      font-weight: 600;
    }

    #title-sec {
      background-color: rgb(225, 239, 255);
      padding: 68px 105px 0px;
      margin: 0px;
    }

    #title {
      margin-bottom: 100px;
      padding: 0 50px 65px 58px;
      width: 558px;
    }

    #title h1 {
      margin-bottom: 20px;
    }

    .btn {
      margin: 20px 0px;
      background: rgb(56, 167, 252);
      border: none;
    }

    #title-img {
      position: absolute;
      top: 113px;
      right: 175px;
      height: 380px;
      width: 460px;
    }

    h2 {
      color: rgb(56, 167, 252);
    }

    .table-img {
      text-align: center;
    }

    .table-data {
      padding: 0 55px;
      font-weight: normal;
    }


    #Real-Time {
      position: absolute;
      right: 380px;
      bottom: -280px;
      background-color: rgb(225, 239, 255);
      width: 250px;
      border: none;
      padding-top: 40px;
      padding-bottom: 20px;
      padding-left: 20px;
      padding-right: 20px margin: 10px;
      box-shadow: 3px 5px;

    }

    #Patient-safety {
      position: absolute;
      right: 40px;
      bottom: -435px;
      background-color: rgb(225, 239, 255);
      width: 250px;
      border: none;
      padding-top: 40px;
      padding-bottom: 20px;
      padding-left: 20px;
      padding-right: 20px;
      margin: 10px;
      box-shadow: 3px 5px;
    }

    #Prevent-counterfeiting {
      position: absolute;
      right: 40px;
      bottom: -120px;
      background-color: rgb(225, 239, 255);
      width: 250px;
      padding-top: 40px;
      padding-bottom: 20px;
      padding-left: 20px;
      padding-right: 20px;
      border: none;

      margin: 10px;
      box-shadow: 3px 5px;
    }

    #design {
      position: absolute;
      left: 310px;
      ;
    }

    #contact-box {
      background-color: blue;
      color: white;
      text-align: center;
      border-radius: 20px;
      margin: 40px 225px;
      padding-bottom: 23px;
    }

    #contact-box span {
      margin-right: -15px;
      display: inline-block;
      padding-top: 25px;
    }

    #contact-box .btn {
      margin-top: 10px;
      font-weight: 600;
    }

    .complaint button {
      background: white;
    }

    /* footer */
    footer {
      text-align: center;
      height: 45px;
      background-color: rgb(56, 167, 252);
      color: white;
      padding-top: 10px;
      padding-bottom: 5px;
    }

    p {
      font-weight: normal;
    }

    #qrcode{
      margin-left: 100px;
    }

    label{
      font-weight: 500;
    }
    .lr{
        color: white;
    }

  </style>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
</head>

<body>
  <?php
  if( !isset($_SESSION['role']) ){
  ?>
  <nav>
    <!-- <img id="logo" src="/images/fibble.png" alt="MP"> -->
    <span id="medpro">MedPro</span>
    <span id="nav-text">
      <a class="lr" href="loginRes.php">Login/Signup</a>
    </span>
  </nav>

  <div id="title-sec">
    <Section id="title">
      <h1>YOUR DESTINATION FOR ENSURING SAFE AND SECURE MEDICATION</h1>
      <p style="width: 350px;">Our system is able to detect substandard and anomaly drugs from manufacturer company to
        patient's hand. Also
        can verify the defective and expired drugs in the market using smartphones by scanning QR (Quick Response)
        code.</p>
      <br>
      <button type="button" class="btn btn-primary"><a class ="lr "href="checkproduct.php">Scan QR code</a></button>
      <img id="title-img" src="images/title-img--.png" alt="img">
    </Section>
  </div>

  <div id="page">
    <section>
      <table>
        <tr>
          <td class="table-img">
            <img src="images/pwc.jpg">
          </td>
          <td class="table-data">
            <h2>Purchase with Confidence</h2>
            <p class="content">Source masks,gowns,gloves and other PPE immediately. We curate high
              technology PPE
              for your company
              to purchase in a few simple clicks. Place multi-party orders to access bulk pricing.</p>
          </td>
        </tr>
        <tr>
          <td class="table-data">
            <h2>Sell Effortlessly</h2>
            <p class="content">Discover a frictionless sales process. We connect you with buyers looking to
              purchase PPE in large quantities. Eliminate the hassle of verifying and coordinating with
              your customers. Get paid quicker than ever.
            </p>
          </td>
          <td class="table-img">
            <img src="images/se.jpg">
          </td>
        </tr>
      </table>
    </section>

    <section>
      <br><br><br><br><br><br><br><br><br>
      <div id="page2">

        <h2>Be sure about what you're Consuming</h2>
        <p class="content-new">Approaching the medical supply chain crisis with a new lens.
        </p>

      </div>
      <div id="Real-Time">
        <h5> Real Time Tracking</h5>
        <p> Blockchain technology can provide real-time tracking of medical products, enabling better inventory
          management and reducing the risk of stockouts.</p>
      </div>
      <div id="Patient-safety">
        <h5> Increased Patient Safety</h5>
        <p>By ensuring the authenticity and safety of medical products, blockchain can help protect patients and improve
          overall patient safety.</p>
      </div>
      <div id="Prevent-counterfeiting">
        <h5>Prevent Counterfeiting</h5>
        <p>Blockchain technology can help prevent counterfeiting and fraud by creating a transparent, immutable record
          of every transaction, providing assurance that products are authentic.</p>
      </div>



    </section>

  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div id="design">
    <img src="images/project-design.jpg" width="671px;" ,height="400">
  </div>

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div id="contact-box">
    <span id="fake">
      <h3>Found a Fake Product?</h3>
    </span>
    <div class="complaint">
      <form action="complaint.php" method="post" id="form-fake">
        <label for="ProductId">Product ID:</label><br>
        <input type="text" id="productid" name="productid" value=""><br><br>
        <label for="qrimage">Add QR Code image:</label><br>
        <input type="file" id="qrcode" name="qrcode"><br><br>
        <label for="description">Description:</label><br>
        <input type="text" rows="5" cols="20" id="description" name="description" value=""><br><br>

        <input type="submit" value="Submit">
      </form>
    </div>
  </div>

      <footer>
        © 2023 MedPro. All rights reserved.
      </footer>

      <?php
    }else{
      include 'redirection.php';
      redirect('checkproduct.php');
    }
    ?>
    </body>

</html>