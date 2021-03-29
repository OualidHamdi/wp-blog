<?php
 include('../function/db.php');

   if(!isset($_SESSION['first_name'])&& !isset($_SESSION['last_name'])){
     header ('Location: ../index.php');
 }

    $query = "SELECT * FROM post ORDER BY ID DESC";
    $query_run = mysqli_query($connection,$query);
    
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
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- swiper -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="../css/swiper.css">


  <!-- Custom styles for this template -->
  <link href="../css/clean-blog.min.css" rel="stylesheet">

       <style>
    
            
            th,td {
                text-align: center;
                font-size: 10px
            }

            /*
  Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
  */
  @media
    only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr {
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    tr {
      margin: 0 0 1rem 0;
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
    td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
    }

    td:before {
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 0;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
      font-weight: bold;
    }    
    td:nth-of-type(1):before { content: "Title"; }
    td:nth-of-type(2):before { content: "Subtitle"; }
    td:nth-of-type(3):before { content: "Image"; }
    td:nth-of-type(4):before { content: "Description"; }
    td:nth-of-type(5):before { content: "Author"; }
    td:nth-of-type(6):before { content: "Published at"; }
    td:nth-of-type(7):before { content: "Categoty"; }
    td:nth-of-type(8):before { content: "action"; }
        
    

  }#table .trBg{
background: #e7e7e7;
color:#838383;
margin: 10px;}

th{
  padding: 8px 0;
}
.trLine,td{
  border:1px #bbbbbb solid;
}

.delete_btn{
  padding: 8px 15px;
}
.edit_Book{
  padding: 8px 12px;
  margin-bottom: 10px;
}

        </style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="../index.php">Dev Blog </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="posts.php"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'] ?></a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="../function/logout.php" title="LOGOUT"><img src="../img/logout.png"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../img/admin.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Panel ADMIN</h1>
            <span class="subheading">Admin dashboard & control panel.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

 <div class="container">
           
                <form class="form-inline mb-3" action="" method="POST">
                    <div class="ilinetext">
            <h5 class="title">Control panel</h5>
                    <button type="submit" class="bntStyle">Add Category</button>
                    <button type="submit" class="bntStyle">Add Post</button>

                    </div>
              </form>
                <div id="main" class="card card-body">

<table role="table" id="table">
  <thead role="rowgroup">
    <tr role="row" class="trBg">
      <th role="columnheader">Title</th>
      <th role="columnheader">Subtitle</th>
      <th role="columnheader">Image</th>
      <th role="columnheader" width="400">Description</th>
      <th role="columnheader" >Author</th>
      <th role="columnheader">Published at</th>
      <th role="columnheader">Categoty</th>
      <th role="columnheader">Action</th>
    </tr>
  </thead>

                        <?php
          include('../function/read.php');
          ?>
                    </table>
                </div>
                <!--books table end-->
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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script>

    <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="../js/swiper.js"></script>

</body>

</html>
