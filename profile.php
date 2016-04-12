<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Grayscale - Start Bootstrap Theme</title>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/grayscale.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
          <div class = "navbar-login">
            <ul class = "login nav navbar-nav"> 
              <li>
                <a data-toggle="modal" data-target="#log-in-modal">Log In</a>
              </li>
              <li>
                <a data-toggle="modal" data-target="#sign-up-modal">Sign Up</a>
              </li>
            </ul>
          </div>
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand page-scroll right-align" href="#page-top">
                <text class = "logo">Mo' Funding</text>
                <br>
                <text class = "underlogo">Less Problems</text>
              </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav navbar-links style-4 clearfix">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                  <a href="#page-top"></a>
                </li>
                <li>
                  <a class="page-scroll navbar-links" href="index.html">Home</a>
                </li>
                <li>
                  <a class="page-scroll navbar-links" data-toggle="modal" data-target="#about-us-modal">About Us</a>
                </li>
                <li>
                  <a class="page-scroll navbar-links" data-toggle="modal" data-target="#create-project-modal">Start a Project</a>
                </li>
                <li>
                  <a class = "page-scroll navbar-links" href="#contact">Search</a>
                </li>
                <li>
                  <!-- SEE NOTES BELOW ON PHP FORMS-->
                  <form action = "results.php" method = "post">
                    <input type = "search" name="searchparameter" class = "searchbar" id = "searchparameter">
                    <input type = "submit" class = "own-project-button" value = "Go">
                  </form>
                </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
        </nav>
        <!-- Intro Header -->
        <header class="intro">
          <div class = "row detail-header">
            <div class = "col-md-3">
              <img src ="img/intro-bg.jpg" class = "thumbnail-med">
            </div>
            <div class = "col-md-6 text-left pull-up">
              <text class = "detail-header-title">Hello, Name!</text>
            </div>
            <div class = "col-md-2 text-right">
              <br>
              <text class = "project-side-details">
                <form action submit="user-details.php" method="get">
                  <input type = "hidden" value = >
                  <input type="submit" class = "own-project-button" value = "Update Details">
                </form>
                <br>
                Username
                <br>
                Email
              </text>
            </div>
          </div>
          <hr>
          <h1 class="brand-heading to-black">Your Projects</h1>
          <div class = "row">
            <div class="project-images">
              <div class = "col-md-3">
                <div class="view view-first">  
                  <img src="img/intro-bg.jpg" class="thumbnail">
                  <div class="mask">  
                   <h2>Image Title</h2>  
                   <p>Description... cut off</p>  
                   <a href="#" class="info">Read More</a>  
                 </div>  
               </div>
             </div>
             <div class = "col-md-3">
              <div class="view view-first">  
                <img src="img/intro-bg.jpg" class="thumbnail">
                <div class="mask">  
                 <h2>Image Title</h2>  
                 <p>Description... cut off</p>  
                 <a href="#" class="info">Read More</a>  
               </div>  
             </div>
           </div>
           <div class = "col-md-3">
            <div class="view view-first">  
              <img src="img/intro-bg.jpg" class="thumbnail">
              <div class="mask">  
               <h2>Image Title</h2>  
               <p>Description... cut off</p>  
               <a href="#" class="info">Read More</a>  
             </div>  
           </div>
         </div>
         <div class = "col-md-3">
          <div class="view view-first">  
            <img src="img/intro-bg.jpg" class="thumbnail">
            <div class="mask">  
             <h2>Image Title</h2>  
             <p>Description... cut off</p>  
             <a href="#" class="info">Read More</a>  
           </div>  
         </div>
       </div>
       <br>

     </div>
     <div class="project-images">

      <div class = "col-md-3">
        <div class="view view-first">  
          <img src="img/intro-bg.jpg" class="thumbnail">
          <div class="mask">  
           <h2>Image Title</h2>  
           <p>Description... cut off</p>  
           <a href="#" class="info">Read More</a>  
         </div>  
       </div>
     </div>
     <div class = "col-md-3">
      <div class="view view-first">  
        <img src="img/intro-bg.jpg" class="thumbnail">
        <div class="mask">  
         <h2>Image Title</h2>  
         <p>Description... cut off</p>  
         <a href="#" class="info">Read More</a>  
       </div>  
     </div>
   </div>
   <div class = "col-md-3">
    <div class="view view-first">  
      <img src="img/intro-bg.jpg" class="thumbnail">
      <div class="mask">  
       <h2>Image Title</h2>  
       <p>Description... cut off</p>  
       <a href="#" class="info">Read More</a>  
     </div>  
   </div>
 </div>
 <div class = "col-md-3">
  <div class="view view-first">  
    <img src="img/intro-bg.jpg" class="thumbnail">
    <div class="mask">  
     <h2>Image Title</h2>  
     <p>Description... cut off</p>  
     <a href="#" class="info">Read More</a>  
   </div>  
 </div>
</div>
<br>

</div>
</div>
</header>


<!-- Modal: Login -->
<div id="log-in-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content modal-custom">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Log In</h4>
      </div>
      <div class="modal-body">
        <text class = "data-entry">Username:</text>
        <br>
        <input type="text" name="username" class = "searchbar to-black" id="username">
        <br>
        <br>
        <text class = "data-entry">Password:</text>
        <br>
        <input type="text" name="password" class = "searchbar to-black" id = "password">
        <br>
      </div>
      <div class="modal-footer">
        <!--ADD IN LOG IN PHP HERE-->
        <button type="button" class = "own-project-button" data-dismiss="modal">Log In</button>
        <button type="button" class="own-project-button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>  
<!-- Modal: SignUp -->
<div id="sign-up-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content modal-custom">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Log In</h4>
      </div>
      <div class="modal-body">
        <text class = "data-entry">Username:</text>
        <br>
        <input type="text" name="username" class = "searchbar to-black" id="username">
        <br>
        <br>
        <text class = "data-entry">Password:</text>
        <br>
        <input type="text" name="password" class = "searchbar to-black" id = "password">
        <br>
        <br>
        <text class = "data-entry">Re-enter password:</text>
        <br>
        <input type="text" name="password-2" class = "searchbar to-black" id = "password-2">
        <br>
        <br>
        <text class = "data-entry">Email address:</text>
        <br>
        c
        <br>
      </div>
      <div class="modal-footer">
        <!--ADD IN SIGN UP PHP HERE-->
        <button type="button" class = "own-project-button" data-dismiss="modal">Sign Up</button>
        <button type="button" class="own-project-button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal: About Us -->
<div id="about-us-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content modal-custom">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">About Us</h4>
      </div>
      <div class="modal-body">
        <text class = "data-entry">
          Mo' Funding was created by a group of National University of Singapore students for a CS2102 project. it helps simulate a crowdfunding website. 
        </text>  
      </div>
      <div class="modal-footer">
        <button type="button" class="own-project-button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal donate-->
<div id="about-us-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content modal-custom">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Donate</h4>
      </div>
      <div class="modal-body">
        <form action = "donation.php" method = "get">
          <text class = "data-entry">Please enter the amount you wish to donate:</text>  
          <input type="text" name="donation" class = "searchbar to-black" id = "donation">
          <input type = "submit" value = "Donate Now!">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="own-project-button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Create a Project -->
<div id="create-project-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content modal-custom">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Start a Project</h4>
      </div>
      <div class="modal-body">

<form action = "project.php" method = "post">
  <text class = "data-entry">Project Title:</text>
  <br>
  <input type="text" name="project-title" class = "searchbar to-black" id = "project-title">
  <br>
  <br>
  <text class = "data-entry">End Date:</text>
  <br>
  <input type="datetime" name="end-date" class = "searchbar to-black" id = "end-date">
  <br>
  <br>
  <text class = "data-entry">Amount of Money Needed:</text>
  <br>
  <input type="text" name="money-needed" class = "searchbar to-black" id = "money-needed">
  <br>
  <br>
  <text class = "data-entry">Short Description:</text>
  <br>
  <input type="text" name="money-needed" class = "searchbar to-black" id = "money-needed">
  <br>
  <br>
  <text class = "data-entry">Project Image:</text>
  <br>
  <br>
  <input type="file" name="image" id = "image">
  <br>
  <input type="submit" class = "own-project-button" data-dismiss="modal">
</form>

</div>
<div class="modal-footer">
  <button type="button" class="own-project-button" data-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>

<!-- Footer -->
<footer class = "footer-color">
  <div class="container text-center">
    <p>Copyright &copy; Mo' Funding 2016</p>
  </div>
</footer>
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>
<!-- Custom Theme JavaScript -->
<script src="js/grayscale.js"></script>
</body>
</html>