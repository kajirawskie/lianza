<?php
    $connection = mysqli_connect("localhost","root","","class");
    session_start();
    $query = "SELECT * FROM auth  inner JOIN
    user  on auth.id=user.user_id where auth.`user`='".$_SESSION['user']."'";
    $query_run = mysqli_query($connection,$query);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>USER</title>
  <meta content="" name="description">
  <meta content="" name="keywords"> 
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
      <?php
       $res="SELECT `file` FROM auth  inner JOIN
       images  on auth.id=images.img_id where auth.`user`='".$_SESSION['user']."'";

       $res_query=mysqli_query($connection,$res);
       if(mysqli_num_rows($res_query)>0){
       while($row = mysqli_fetch_assoc($res_query)){
       ?>  
       <?php echo '<img src="img/'.$row['file'].'" class="img-fluid rounded-circle" width="100px" height="100px" >'?>
       <?php   
       }    
       }
       else{
       echo "no";
       }
       ?>
       
        <h1 class="text-light"><a href="index.html"></a> <?php echo $_SESSION['user'];?></h1>
        
                        
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="img.php" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>
          <?php
            
            echo $_SESSION['user'];
          ?>
          </span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="login.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>LOG_OUT</span></a></li>
        </ul>
      </nav>
    </div>
  </header>
  
  <main id="main">
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
       
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="img/c.gif" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>INFOMATION</h3>

            <div class="row">
              <div class="col-lg-6">
              <?php

            if(mysqli_num_rows($query_run)>0)
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                ?>
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Firstname:</strong> <span><?php echo $row['fname']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Lastname:</strong> <span><?php echo $row['lname']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Middlename:</strong> <span><?php echo $row['mname']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Status:</strong> <span><?php echo $row['status']?></span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?php echo $row['age']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo $row['birthday']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Course:</strong> <span><?php echo $row['course']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Year Level:</strong><span><?php echo $row['year']?></span></li>
                </ul>
                <?php
                            }

                        }   
                        else

                        {
                            echo "No Record Found";
                        }

                        ?>
                        
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>


                  