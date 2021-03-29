<?php
    include('function/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dev Blog - All new in informational development</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- swiper -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="css/swiper.css">


  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

  <style type="text/css">
    

.post-preview > form > a > button > .post-subtitle {
  font-weight: 300;
  margin: 0 0 10px;
}
.post-title:hover{
  color:#0085a1;
}

  </style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Dev Blog </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <?php if(!isset($_SESSION['first_name'])&&!isset($_SESSION['last_name'])):?>
          <li class="nav-item">        
            <a class="nav-link" href="Admin/login.php">Login / Admin </a>
          </li>  
           <?php else : ?>
          <li class="nav-item">
          <a class="nav-link" href="Admin/posts.php"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'] ?></a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="function/logout.php" title="LOGOUT"><img src="img/logout.png"></a>
          </li>
            <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>< / ></h1>
            <span class="subheading">All new in informational development.</span>
          </div>
        </div>
      </div>
    </div>
  </header>
<hr>
    <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
            <?php
         $query = "SELECT * FROM category ORDER BY ID DESC";
    $query_run = mysqli_query($connection,$query);

       if(mysqli_num_rows($query_run)>0)
      {
        while($row = mysqli_fetch_assoc($query_run))
        {
    
          ?>
       
    
      <div class="swiper-slide" > 
   <form action="index.php" method="GET">
        <button style="background: none;padding: 20px" value="<?php echo $row['name']; ?>" type="submit" name="Category"><?php echo $row['name']; ?>
        <input type="hidden" name="idCat" value="<?php echo $row['ID']; ?>">
    </button>
       </form>
    </div>

       <?php
        }
      }else {
        header ('Location: 404.php');
      }
    ?>

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
<hr><br>
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <?php
       if(isset($_GET['Category'])){
            $IDCat=$_GET['idCat'];
            $query = "SELECT * FROM post  WHERE categoryID = '$IDCat'  ORDER BY ID DESC";
        }else{
          $query = "SELECT * FROM post ORDER BY ID DESC";
        }

         
      $query_run = mysqli_query($connection,$query);

       if(mysqli_num_rows($query_run)>0) {
        while($row = mysqli_fetch_assoc($query_run)){
    
          ?>
        <div class="post-preview">

        <form action="post.php" method="GET">
         <a href="#">
          <button type="submit" name="Post" style="text-align: start;border: none; outline: none;">
             <h2 class="post-title">
              <?php echo $row['title']; ?>
             </h2>
            <h3 class="post-subtitle">
             <?php echo $row['subtitle']; ?>
            </h3>      
             <input type="hidden" name="idPost" value="<?php echo $row['ID']; ?>">
          </button>
          </a>
     
         </form>
          <p class="post-meta">Posted by
            <a href="#">

              <?php 
              $IDAdmin = $row['auteurID'];
              $querryAdmin = "SELECT first_name,last_name from admin WHERE ID = '$IDAdmin' ";
              $query_runAdmin = mysqli_query($connection,$querryAdmin);
                 $Admin = mysqli_fetch_array($query_runAdmin);
              echo $Admin['first_name'].' '.$Admin['last_name']; ?>
              

            </a>
            on <?php echo $row['publishedat']; ?></p>
        </div>
        <hr>
 <?php
        }
      }else {
           header ('Location: 404.php');
      }
    ?>
  
        
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; DevBlog 2021</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

    <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="js/swiper.js"></script>

</body>

</html>
