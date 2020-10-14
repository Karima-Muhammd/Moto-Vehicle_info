
<?php
session_start();?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">

    <!-- main CSs -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Hello, world!</title>
</head>
<body style="background-image:url('assets/images/5.jpg');
    height: 100%;
  background-repeat: no-repeat;
  background-size: cover;
 ">

<?php
    if (isset($_SESSION['email'])) {?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a  style="font-family: 'Piedra', cursive" class="navbar-brand" href="home.php">Moto-Vehicle Store</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

              <li class="nav-item">
                  <a class="nav-link" href="Who's_Mange.php">Who's Manger ?</a>
              </li>

          </ul>
          <ul class=" navbar-nav my-2 my-lg-0">
              <li class="nav-item">
                  <a class="nav-link" href="customers.php">Customers</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="product.php">Products</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="orders.php">Orders</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="bestSales.php">Best Sale</a>
              </li>
              <li class="nav-item">
                  <a  style="font-family: 'Piedra', cursive" class="nav-link" href="logout.php">Log Out ? </a>
              </li>

          </ul>
      </div>
  </nav>

        <h2 style="font-family: 'Piedra', cursive; text-align: center; margin-top: 10%">Hello ,<?php echo $_SESSION['name']?><br> Welcome To Our Moto- Vehicle Store <br><span style="font-size: 15px">Landing Page</span></h2>

  <?php
  }

  else
  {
      ?>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a  style="font-family: 'Piedra', cursive" class="navbar-brand" href="home.php">Moto-Vehicle Store</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">


              </ul>
              <ul class=" navbar-nav my-2 my-lg-0">

                  <li class="nav-item">
                      <a  style="font-family: 'Piedra', cursive" class="nav-link" href="login.php">Log in ? </a>
                  </li>

              </ul>
          </div>
      </nav>
      <h4 style="font-family: 'Piedra', cursive; text-align: center; margin-top: 16%">Hello , There <br> This Dash | Board For Admins<br> to Know Some of info About Thier Store <br>
          <span style="font-size: 15px">" Landing Page "</span></h4>
      <?php
  }


  ?>


  </body>
        </html>





