<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test</title>
    <link
      rel="stylesheet"
      href="./fontawesome-free-5.12.1-web/css/all.min.css"
    />
    <!-- css -->
    <link rel="stylesheet" href="./css/styles.css" />
  </head>

  <body>
    <?php include("header.php");?>
  
   
    <!-- ############## -->
    <!-- ############## -->
    <!-- ############## -->
    <!-- ############## -->
    <!-- blog -->
    <section class="section blog">
      <!-- section title -->
      <div class="section-title">
        <h2>Quiz</h2>
        <div class="underline"></div>
      </div>
      <!--end of section title -->
      <div class="section-center blog-center">
        <!-- single article -->
        <div class="card">
          <!-- front of the card -->
          <div class="card-side card-front">
            <img style="box-sizing: border-box; object-fit: contain;" src="./images/cp.png" alt="" />
            <div class="card-info">
              <h4>article title</h4>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et
                nisi ut a est eum tempora dolorum temporibus voluptatibus!
                Natus, provident.
              </p>
              <div class="card-footer">
                <!-- <img src="./images/hero-img-small.jpeg" alt="author image" />
                <p>7 min read</p> -->
              </div>
            </div>
          </div>
          <!-- card back  -->
          <div class="card-side card-back">
          <?php
          if(isset($_SESSION['name'])) {
            echo ' <a href="startquiz.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';


          } else {
            echo ' <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';
          }
          ?>
            <!-- <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Quiz</button></a> -->
          </div>
        </div>
        <!-- end of single article -->
        <!-- single article -->
        <div class="card">
          <!-- front of the card -->
          <div class="card-side card-front">
            <img style="box-sizing: border-box; object-fit: contain;" src="./images/cquiz.png" alt="" />
            <div class="card-info">
              <h4>article title</h4>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et
                nisi ut a est eum tempora dolorum temporibus voluptatibus!
                Natus, provident.
              </p>
              <div class="card-footer">
                <!-- <img src="./images/hero-img-small.jpeg" alt="author image" />
                <p>7 min read</p> -->
              </div>
            </div>
          </div>
          <!-- card back  -->
          <div class="card-side card-back">
          <?php
          if(isset($_SESSION['name'])) {
            echo ' <a href="startquiz.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';


          } else {
            echo ' <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';
          }
          ?>
            <!-- <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Quiz</button></a> -->
          </div>
        </div>
        <!-- end of single article -->
        <!-- single article -->
        <div class="card">
          <!-- front of the card -->
          <div class="card-side card-front">
            <img style="box-sizing: border-box; object-fit: contain;" src="./images/python.png" alt="" />
            <div class="card-info">
              <h4>article title</h4>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et
                nisi ut a est eum tempora dolorum temporibus voluptatibus!
                Natus, provident.
              </p>
              <div class="card-footer">
                <!-- <img src="./images/hero-img-small.jpeg" alt="author image" />
                <p>7 min read</p> -->
              </div>
            </div>
          </div>
          <!-- card back  -->
          <div class="card-side card-back">
          <?php
          if(isset($_SESSION['name'])) {
            echo ' <a href="startquiz.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';


          } else {
            echo ' <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';
          }
          ?>
            <!-- <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Quiz</button></a> -->
          </div>
        </div>
        <!-- end of single article -->
        <!-- single article -->
        <div class="card">
          <!-- front of the card -->
          <div class="card-side card-front">
            <img style="box-sizing: border-box; object-fit: contain;" src="./images/js.png" alt="" />
            <div class="card-info">
              <h4>article title</h4>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et
                nisi ut a est eum tempora dolorum temporibus voluptatibus!
                Natus, provident.
              </p>
              <div class="card-footer">
                <!-- <img src="./images/hero-img-small.jpeg" alt="author image" />
                <p>7 min read</p> -->
              </div>
            </div>
          </div>
          <!-- card back  -->
          <div class="card-side card-back">
          <?php
          if(isset($_SESSION['name'])) {
            echo ' <a href="startquiz.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';


          } else {
            echo ' <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';
          }
          ?>
            <!-- <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Quiz</button></a> -->
          </div>
        </div>
        <!-- end of single article -->
        <!-- single article -->
        <div class="card">
          <!-- front of the card -->
          <div class="card-side card-front">
            <img style="box-sizing: border-box; object-fit: contain;" src="./images/php.png" alt="" />
            <div class="card-info">
              <h4>article title</h4>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et
                nisi ut a est eum tempora dolorum temporibus voluptatibus!
                Natus, provident.
              </p>
              <div class="card-footer">
                <!-- <img src="./images/hero-img-small.jpeg" alt="author image" />
                <p>7 min read</p> -->
              </div>
            </div>
          </div>
          <!-- card back  -->
          <div class="card-side card-back">
          <?php
          if(isset($_SESSION['name'])) {
            echo ' <a href="startquiz.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';


          } else {
            echo ' <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';
          }
          ?>
            <!-- <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Quiz</button></a> -->
          </div>
        </div>
        <!-- single article -->
        <div class="card">
          <!-- front of the card -->
          <div class="card-side card-front">
            <img style="box-sizing: border-box; object-fit: contain;" src="./images/java.png" alt="" />
            <div class="card-info">
              <h4>article title</h4>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et
                nisi ut a est eum tempora dolorum temporibus voluptatibus!
                Natus, provident.
              </p>
              <div class="card-footer">
                <!-- <img src="./images/hero-img-small.jpeg" alt="author image" />
                <p>7 min read</p> -->
              </div>
            </div>
          </div>
          <!-- card back  -->
          <div class="card-side card-back">
          <?php
          if(isset($_SESSION['name'])) {
            echo ' <a href="startquiz.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';


          } else {
            echo ' <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Test</button></a>';
          }
          ?>
            <!-- <a href="signin.php"><button class="btn" style="background-color: #15AB9A; color: white;">Start Quiz</button></a> -->
          </div>
        </div>
      </div>
    </section>
    <!--end of  blog -->
<?php include("footer.php");?>
       <script src="./js/app.js"></script>
  </body>
</html>
