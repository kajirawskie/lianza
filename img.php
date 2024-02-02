<?php
  include('dbcon.php');

    $query = "SELECT * FROM auth  inner JOIN
    user  on auth.id=user.user_id where auth.`user`='".$_SESSION['user']."'";
    $query_run = mysqli_query($connection,$query);

    if(isset($_POST['submit']))
   {
        if(isset($_POST['submit'])){
            $file_name=$_FILES['image']['name'];
            $tempname=$_FILES['image']['tmp_name'];
            $folder='img/'.$file_name;
            $img_id=$_POST['img_id'];
            
            $query=mysqli_query($connection, "INSERT INTO images (file,img_id) values ('$file_name','$img_id')");
            
            if(move_uploaded_file($tempname, $folder)){
              header('Location:user.php');
            }else{
            
                echo"<h2>file not  uploaded successfully</h2>";
            }
        
        
        
        }
    }

    
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="img/" alt="" class="img-fluid rounded-circle" width="1px" height="1px">
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
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Upload Image</h1>
                                        
                                    </div>
                                    <?php

            if(mysqli_num_rows($query_run)>0)
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                ?>
              
              <form  method="POST" enctype="multipart/form-data">
              <div class="form-group">
              <input type="file" name="image" class="form-control "
              placeholder="Files">
              </div>
              <br>
              <div class="form-group">
              <input type="hidden" name="img_id" value="<?php echo $row['user_id']?>" class="form-control "
              placeholder="Files">
              </div>
              <button type="submit"  name="submit" class="btn btn-primary btn-user btn-block">
              Upload
              </button>  
              </form>
              
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
            </div>
        </div>
    </div>

    <div class="container">
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


                  