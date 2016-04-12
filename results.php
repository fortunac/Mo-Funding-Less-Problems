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

        <?php
        $password = "INSERT PASSWORD HERE";
        $conn=pg_connect("host=localhost port=5432 dbname=crowdFunding user=postgres password='$password'") or die('Could not connect: ' . pg_last_error());
        ?>

        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
          <div class = "navbar-login">
            <ul class = "login nav navbar-nav"> 

              <?php 
              session_start();
              if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
                echo '<li><a data-toggle="modal" data-target="#log-in-modal">Log In</a></li>';
                echo '<li><a data-toggle="modal" data-target="#sign-up-modal">Sign Up</a></li>';
              } else {
                echo '<li><a href="logout.php">Log Out</a></li>';
              }
              ?>

            </ul>
          </div>

          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand page-scroll right-align" href="index.php">
                <text class = "logo">Mo' Funding</text>
                <br>
                <text class = "underlogo">Less Problems</text>
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <form action="results.php" method="get">
                <ul class="nav navbar-nav navbar-links style-4 clearfix">
                  <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                  <li class="hidden">
                    <a href="#page-top"></a>
                  </li>
                  <li>
                    <a class="page-scroll navbar-links" data-toggle="modal" data-target="#about-us-modal">About</a>
                  </li>
                  <li>
                    <a class="page-scroll navbar-links" data-toggle="modal" data-target=
                    <?php 
                    session_start();
                    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
                      echo "#fail-log-in-modal";
                    } else {
                      echo "#create-project-modal";
                    }
                    ?>
                    >Start a Project</a>
                  </li>
                  <li>  
                   <?php 
                   session_start();
                   if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
                     echo '<a class="page-scroll navbar-links" data-toggle="modal" data-target="#fail-projects-modal">Your Projects</a>';
                   } else {
                    echo '<a class="page-scroll navbar-links" href="your-projects.php">Your Projects</a>'; }?>                  
                  </li>
                  <li>
                    <a class = "page-scroll navbar-links" href="advanced-search.php">Advanced Search</a>
                  </li>
                  <li>
                    <input type="text" name="searchparameter" class = "searchbar" placeholder=" Basic Search">
                    <button type="submit" class = "own-project-button"><i class="fa fa-search"></i></button>
                  </li>
                </ul>
              </form>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
        </nav>

        <?php
        $searchparameter = $_GET['searchparameter'];
        if(isset($searchparameter)) {
          ?>

          <!-- Intro Header -->
          <header class="intro">
            <div class = "row">
              <div class = "col-md-8 search-parameter-holder">
                <?php echo "Results for: $searchparameter";?>
              </div>
              <div class = "col-md-3 start-own-project">
                <button type = "button" class = "own-project-button" data-toggle="modal" data-target=
                <?php 
                session_start();
                if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
                  echo "#fail-log-in-modal";
                } else {
                  echo "#create-project-modal";
                }
                ?>>Add your own project!</button>
              </div>
            </div>
            <hr>
            
            <div class = "row search-results-labels">
              <b>
                <div class = "col-md-2">Project Image</div>
                <div class = "col-md-2">Project Title
                </div>
                <div class = "col-md-2">Time Left
                </div>
                <div class = "col-md-2">Money Raised
                </div>
                <div class = "col-md-2">Money Still Needed
                </div>
              </b>
            </div>
            <div class = "row search-results-separator">
            </div>
            
            <?php
            $query= "SELECT p.image, p.title, p.duration, p.currentAmount, p.goalAmount - p.currentAmount, p.id
            FROM project p
            WHERE LOWER(p.title) LIKE LOWER('%$searchparameter%')
            ORDER BY duration";

            $result = pg_query($query) or die('Query failed: ' . pg_last_error());
            $number = pg_num_rows($result);
            $i = 1;
            while ($row = pg_fetch_array($result)) {
              ?>

              <div class = "row search-results-labels">
                <div class = "col-md-2">
                  <img src = <?php if($row[0] == 'img/' || empty($row[0])) {echo 'img/intro-bg.jpg';} else {echo $row[0];} ?> class = "search-results-thumbnail">
                </div>
                <div class = "col-md-2">
                  <?php echo $row[1];?>
                </div>
                <div class = "col-md-2"><?php if(!empty($row[2])) {echo $row[2] . ' days remaining';} else {echo '--';} ?>
                </div>
                <div class = "col-md-2"><?php echo '$' . number_format($row[3]);?>
                </div>
                <div class = "col-md-2"><?php echo '$' . number_format($row[4]);?>
                </div>
                <div class = "col-md-1">
                  <button type = "submit" class = "own-project-button" onclick=<?php echo '"location.href=\'detail.php?projectid=' . strval($row[5]) . '\'"';?>>Details</button>
                </div>
              </div>

              <?php 
              if ($i < $number) {
                echo '<div class = "row search-results-separator-2"></div>';
              }
              $i++;
            }
            pg_free_result($result); }
            ?>
            
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
                  <form action="login.php" method="post">
                    <text class = "data-entry">Username:</text>
                    <br>
                    <input type="text" name="username2" class = "searchbar to-black" id="username2">
                    <br>
                    <br>
                    <text class = "data-entry">Password:</text>
                    <br>
                    <input type="text" name="password2" class = "searchbar to-black" id = "password2">
                    <br>
                    <br>
                    <input type ="hidden" name = "url" value =<?php echo '"results.php?searchparameter=' . $searchparameter . '"';?> id = "url">
                    <input type="submit" class="own-project-button">
                  </form>
                </div>
                <div class="modal-footer">
                  <!--ADD IN LOG IN PHP HERE-->
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
                  <h4 class="modal-title">Sign Up</h4>
                </div>

                <div class="modal-body">

                 <form action="signup.php" method="post">
                  <text class = "data-entry">Name:*</text>
                  <br>
                  <input type="text" name="name" class = "searchbar to-black" id="name">
                  <br>
                  <br>
                  <text class = "data-entry">Username:*</text>
                  <br>
                  <input type="text" name="username" class = "searchbar to-black" id="username">
                  <br>
                  <br>
                  <text class = "data-entry">Password:*</text>
                  <br>
                  <input type="text" name="password" class = "searchbar to-black" id = "password">
                  <br>
                  <br>
                  <text class = "data-entry">Re-enter password:*</text>
                  <br>
                  <input type="text" name="password-2" class = "searchbar to-black" id = "password-2">
                  <br>
                  <br>
                  <text class = "data-entry">Email address:*</text>
                  <br>
                  <input type="text" name="email" class = "searchbar to-black" id = "email">
                  <br>
                  <br>
                  <text class = "data-entry">Profile Picture:</text>
                  <br>
                  <br>
                  <input type="file" name="image" id = "image">
                  <br>
                  <br>
                  <input type ="hidden" name = "url" value =<?php echo '"results.php?searchparameter=' . $searchparameter . '"';?>  id = "url">
                  <input type="submit" class="own-project-button">
                </form>
              </div>
              <div class="modal-footer">
                <!--ADD IN SIGN UP PHP HERE-->
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
                  Mo' Funding was created by a group of National University of Singapore students for a CS2102 project. It helps simulate a crowdfunding website. 
                </text>  
              </div>
              <div class="modal-footer">
                <button type="button" class="own-project-button" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal: Fail log in -->
        <div id="fail-log-in-modal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content modal-custom">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error</h4>
              </div>
              <div class="modal-body">
                <text class = "data-entry">
                  You need to log in to create a project!
                </text>  
              </div>
              <div class="modal-footer">
                <button type="button" class="own-project-button" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>


        <!-- Modal: Fail log in -->
        <div id="fail-projects-modal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content modal-custom">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error</h4>
              </div>
              <div class="modal-body">
                <text class = "data-entry">
                  You need to log in to view your projects!
                </text>  
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
                <form action = "project.php" method = "get">
                  <text class = "data-entry">Project Title:</text>
                  <br>
                  <input type="text" name="project-title" class = "searchbar to-black" id = "project-title">
                  <br>
                  <br>
                  <text class = "data-entry">Category:</text>
                  <br>
                  <select name = "category" id = "category">
                    <?php

                    $query= "SELECT name FROM category";
                    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
                    while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
                     foreach ($line as $col_value) {
                      echo "<option value=\"".$col_value."\">".$col_value."</option>";
                    }
                  }
                  ?>
                </select>
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
                <input type="text" name="short-description" class = "searchbar to-black" id = "short-description">
                <br>
                <br>
                <text class = "data-entry">Project Image:</text>
                <br>
                <br>
                <input type="file" name="image" id = "image">
                <br>
                <input type = "submit" class = "own-project-button">
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