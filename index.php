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
    <style>
      body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-color:#F1F5F8 ;
        }

        /* Apply flex to the container */
        .r-cont {
            display: flex;
            justify-content: space-around; /* Adjust spacing between items */
            align-items: center;
            max-width: 1200px; /* Adjust as needed */
            margin: 20px auto; /* Center the container and add some space */
            padding: 20px; /* Add some padding */
            background-color:#F1F5F8; /* Add a white background */
            border-radius: 10px; /* Add some border-radius for a softer look */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        }

        /* Style the form */
        .r-form {
            display: flex;
            flex-direction: column;
            width: 50%; /* Adjust width as needed */
        }

        .r-form label {
            margin-bottom: 10px; /* Add some spacing between labels */
            font-size: 18px; /* Reduce font size slightly */
            margin-top: 20px;
        }

        .r-form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc; /* Add a light border */
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease; /* Add a smooth transition for better user experience */
        }

        .r-form input:focus {
            outline: none;
            border-color: #007bff; /* Change border color on focus */
        }

        /* Style the image */
        .rimg img {
            max-width: 100%; /* Ensure the image is responsive */
            width: 100%; /* Adjust width as needed */
        }
        h1{
            font-size: 35px;
            font-weight: bold;
            word-spacing: 1px;
            letter-spacing: 1px;
            margin-top: 20px;
        }
        .r-cont button{
            background-color: #15AB9A;
            margin-top: 20px;
            padding: 6px 8px;
            font-size: 20px;
            border-radius: 8px;
            border: none;
            padding: 10px;
        }
        .r-cont button:hover{
            background-color: #221437;
            color: white;
            transition: 0.4s;
        }
    </style>
  </head>
  <body>
    <?php
    include ("header.php");?>
    <!-- header -->
    <header style="background-color: #fff;" class="hero">
      <div class="section-center hero-center">
        <article class="hero-info">
          <div class="underline"></div>
          <h1>Upskill Your Tech Knowledge</h1>
          <h4>Bag Top Certifications</h4>
          <?php
          if(isset($_SESSION['name'])) {
              echo "<a href='startquiz.php' class='btn hero-btn' style='background-color: #15AB9A; color: white;'>StartTest</a>";
              // echo "<li style='color: #FFD500; font-size:large; text-shadow: 0 0 5  PX GREEN; font-weight: bold;font-family:Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;'>Welcome " . $_SESSION['name'] . "</li>";

          } else {
            echo "<a href='signin.php' class='btn hero-btn' style='background-color: #15AB9A; color: white;'>Sign-In</a>";

              // echo "<li><a href='signup.php'>Sign-Up</a></li>";
          }
          ?>
          <!-- <a href="signin.php" class="btn hero-btn" style="background-color: #15AB9A; color: white;">Sign-In</a> -->
          
        </article>
        <article class="hero-img">
          <img src="./images/c1.jpeg" class="hero-photo" alt="john doe" />
        </article>
      </div>
    </header>
    <!-- end of header -->
    <!-- about -->
    <section class="section about">
      <div class="section-center about-center">
        <!-- about img -->
        <article class="about-img">
          <img
            src="./images/ab1.jpeg"
            class="hero-photo"
            alt="about img"
          />
        </article>
        <!-- about info -->
        <article class="about-info">
          <!-- section title -->
          <div class="section-title about-title">
            <h2>about</h2>
            <div class="underline"></div>
          </div>
          <!--end of section title -->
          <p>
          SmartTest Quiz App is an innovative online platform designed to transform the way educational assessments are conducted. It provides a seamless and user-friendly experience for students, enabling them to take multiple-choice question (MCQ) based quizzes and exams across various subjects. With its interactive interface and adaptive design.
          </p>
          <p>
          For administrators, SmartTest offers comprehensive control over the entire assessment process. The intuitive admin dashboard allows for effortless management of tests, subjects, and questions, making it simple to keep content current and relevant.
          </p>
          <a href="about.php" class="btn" style="background-color: #15AB9A;color: white;" >about us</a>
        </article>
      </div>
    </section>
    <!-- end of about -->
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
              <h4>C Programming Language</h4>
              <p>
              The C Programming Test assesses foundational and advanced knowledge of C language concepts, syntax, and problem-solving skills.
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
              <h4>Object Oriented Programming Language</h4>
              <p>
              The C++ Programming Test evaluates proficiency in C++ language fundamentals, object-oriented programming principles, and advanced problem-solving abilities.
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
              <h4>Python</h4>
              <p>
              The Python Test measures your understanding of Python syntax, core concepts, and problem-solving capabilities in various real-world scenarios.
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
              <h4>Java Script</h4>
              <p>
              The JavaScript Test evaluates your expertise in JavaScript fundamentals, DOM manipulation, and advanced programming techniques for dynamic web development.
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
              <h4>PHP</h4>
              <p>
              The PHP Test assesses proficiency in PHP scripting language, covering topics such as syntax, web development, database interactions, and server-side programming.  
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
              <h4>JAVA</h4>
              <p>
              The Java Test measures proficiency in Java programming, covering core concepts and application development across various platforms.
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
      <center><a href="projects.php"><button class="btn" style=" align-items: center;background-color: #15AB9A;color: white;">See All Tests</button></a></center>
    </section>

    <!--end of  blog -->

    <section class="section projects">
      <!-- certificate   -->
      <img style="height: 450px; width: 700px;margin: 20px auto;;" src="./images/certificate.jpg" alt="">
      <div class="section-title">
        <h2>Certification</h2>
        <div class="underline"></div>
        <p class="projects-text">
          For instance, ISO 9001 certification underscores a company's dedication to quality management systems, ensuring consistent delivery of products or services that meet customer requirements and regulatory obligations. ISO 14001 certification highlights the company's environmental responsibility by implementing effective environmental management systems to minimize its ecological footprint.
        </p>
      </div>
    </section>
      <!--end of certificate title -->
      <!-- Registration form -->
<!-- 
      <center><h1>Register Your Self For Getting One Step Ahead</h1></center>
      <div class="r-cont">
          <form action="" class="r-form">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" placeholder="Enter Your Name">
  
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" placeholder="Enter Your Email">
  
              <label for="mobile">Mobile:</label>
              <input type="tel" id="mobile" name="mobile" placeholder="Enter Your Mobile No.">
  
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" placeholder="Enter Your Password">
              <button>Sign-Up</button>
          </form>
          <div class="rimg"><img src="./images/rform.jpg" alt="Registration Form Image"></div>
      </div>
   -->
<!-- registration form end -->

        <!-- services -->
        <section class="section bg-grey">
          <!-- section title -->
          <div class="section-title">
            <h2>Benefits of Quize's</h2>
            <div class="underline"></div>
          </div>
          <!--end of section title -->
          <div class="services-center section-center">
            <!-- single service -->
            <article class="service"  onMouseOver="this.style.backgroundColor='#15AB9A'"
            onMouseOut="this.style.backgroundColor='white'">
              <svg xmlns="http://www.w3.org/2000/svg" 
               width="40" height="40" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
              </svg>
              <h4 style="font-size: 20px;margin-top: 20px;">Work like  Professionals</h4>
              <div class="underline"></div>
              <p>
                Learn Full Stack Development, Backend Development, QA Automation through an immersive project-based curriculum focused on practical developer skills and real-world scenarios.
              </p>
            </article>
            <!-- end of single service -->
            <!-- single service -->
            <article class="service"   onMouseOver="this.style.backgroundColor='#15AB9A'"
            onMouseOut="this.style.backgroundColor='white'">
              <!-- <i class="fab fa-sketch service-icon"></i> -->
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"/>
              </svg>
              <h4 style="font-size: 20px;margin-top: 20px;">Stand Out In interviews</h4>
              <div class="underline"></div>
              <p>
                Validate your learnings and let your skills shine with a work experience certificate that makes you stand out at interviews.
              </p>
            </article>
            <!-- end of single service -->
            <!-- single service -->
            <article class="service"   onMouseOver="this.style.backgroundColor='#15AB9A'"
            onMouseOut="this.style.backgroundColor='white'">
              <!-- <i class="fab fa-android service-icon"></i> -->
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-android2" viewBox="0 0 16 16">
                <path d="m10.213 1.471.691-1.26q.069-.124-.048-.192-.128-.057-.195.058l-.7 1.27A4.8 4.8 0 0 0 8.005.941q-1.032 0-1.956.404l-.7-1.27Q5.281-.037 5.154.02q-.117.069-.049.193l.691 1.259a4.25 4.25 0 0 0-1.673 1.476A3.7 3.7 0 0 0 3.5 5.02h9q0-1.125-.623-2.072a4.27 4.27 0 0 0-1.664-1.476ZM6.22 3.303a.37.37 0 0 1-.267.11.35.35 0 0 1-.263-.11.37.37 0 0 1-.107-.264.37.37 0 0 1 .107-.265.35.35 0 0 1 .263-.11q.155 0 .267.11a.36.36 0 0 1 .112.265.36.36 0 0 1-.112.264m4.101 0a.35.35 0 0 1-.262.11.37.37 0 0 1-.268-.11.36.36 0 0 1-.112-.264q0-.154.112-.265a.37.37 0 0 1 .268-.11q.155 0 .262.11a.37.37 0 0 1 .107.265q0 .153-.107.264M3.5 11.77q0 .441.311.75.311.306.76.307h.758l.01 2.182q0 .414.292.703a.96.96 0 0 0 .7.288.97.97 0 0 0 .71-.288.95.95 0 0 0 .292-.703v-2.182h1.343v2.182q0 .414.292.703a.97.97 0 0 0 .71.288.97.97 0 0 0 .71-.288.95.95 0 0 0 .292-.703v-2.182h.76q.436 0 .749-.308.31-.307.311-.75V5.365h-9zm10.495-6.587a.98.98 0 0 0-.702.278.9.9 0 0 0-.293.685v4.063q0 .406.293.69a.97.97 0 0 0 .702.284q.42 0 .712-.284a.92.92 0 0 0 .293-.69V6.146a.9.9 0 0 0-.293-.685 1 1 0 0 0-.712-.278m-12.702.283a1 1 0 0 1 .712-.283q.41 0 .702.283a.9.9 0 0 1 .293.68v4.063a.93.93 0 0 1-.288.69.97.97 0 0 1-.707.284 1 1 0 0 1-.712-.284.92.92 0 0 1-.293-.69V6.146q0-.396.293-.68"/>
              </svg>
              <h4 style="font-size: 20px;margin-top: 20px;">Get Career Support</h4>
              <div class="underline"></div>
              <p>
                Be prepared for every interview and land exciting development jobs with structured planning and personalised guidance & support from Crio career coaches.
              </p>
            </article>
            <!-- end of single service -->
          </div>
        </section>
        <!-- end of services -->
        
<?php include("footer.php");?>
    <script src="./js/app.js"></script>
  </body>
</html>
