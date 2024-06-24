<?php
include("connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz</title>
    <!-- font-awesome -->
    <link
      rel="stylesheet"
      href="./fontawesome-free-5.12.1-web/css/all.min.css"
    />
    <!-- css -->
    <link rel="stylesheet" href="./css/styles.css" />
    <script src="./js/app.js"></script> 
  </head>
  <body>
    <!-- navbar -->
    <nav style="background-color: #15AB9A; height: 100px;" class="nav" id="nav">
      <div class="nav-center">
        <!-- nav header -->
        <div class="nav-header">
         <a href="index.php"> <img src="./images/logo.png" class="nav-logo" alt="nav logo" /></a>
          <button class="nav-btn" id="nav-btn">
            <i class="fas fa-bars"></i>
          </button>
        </div>
        <!-- nav-links -->
        <ul class="nav-links">
          <li>
            <a href="index.php">home</a>
          </li>
          <li>
            <a href="about.php">about</a>
          </li>
          <li>
            <a href="projects.php">Test's</a>
          </li>
          <?php
          if(isset($_SESSION['name'])) {
              echo "<li><a href='logout.php'>Logout</a></li>";
              echo "<li><a href='confirmation_page.php'>Results</a></li>";
              echo "<li style='color: #FFD500; font-size:large; text-shadow: 0 0 5PX GREEN; font-weight: bold;font-family:Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;'>Welcome " . $_SESSION['name'] . "</li>";

          } else {
              echo "<li><a href='signin.php'>Sign-In</a></li>";
              echo "<li><a href='signup.php'>Sign-Up</a></li>";
          }
          ?>
          

        </ul>
      </div>
    </nav>
    <!-- end of navbar -->
    <!-- sidebar -->
    <aside class="sidebar" id="sidebar">
      <div>
        <button class="close-btn" id="close-btn">
          <i class="fas fa-times"></i>
        </button>
        <!-- nav-links -->
        <ul class="sidebar-links">
          <li>
            <a href="index.html">home</a>
          </li>
          <li>
            <a href="about.php">about</a>
          </li>
          <li>
            <a href="projects.html">Quiz</a>
          </li>
          <li>
            <a href="contact.html">contact</a>
          </li>
          <?php
          // if(isset($_SESSION['name'])){
          //   echo "<li> <a href='logout.php'>Logout</a>
          //   </li>";
          // }
          // else{
          //   echo "<li><li>";
          // }
          


?>
        </ul>
        <!-- social icons -->
        <ul class="social-icons">
          <li>
            <a href="https://www.twitter.com" class="social-icon">
              <i class="fab fa-facebook"></i>
            </a>
          </li>
          <li>
            <a href="https://www.twitter.com" class="social-icon">
              <i class="fab fa-linkedin"></i>
            </a>
          </li>
          <li>
            <a href="https://www.twitter.com" class="social-icon">
              <i class="fab fa-squarespace"></i>
            </a>
          </li>
          <li>
            <a href="https://www.twitter.com" class="social-icon">
              <i class="fab fa-behance"></i>
            </a>
          </li>
          <li>
            <a href="https://www.twitter.com" class="social-icon">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </aside>
    <!-- end of sidebar -->
    <!-- <?php
         if(isset($_SESSION['name'])) {
          echo "Welcome " . $_SESSION['name'];
      }       
          


?> -->
  </body>
</html>