<?php 
	session_start();
	include('/functions/funcs.php');
	include('/functions/f_login.php');
	
	if(isset($_GET['logout'])) {
		session_destroy();
		
		header("Location: ?");
die();
		
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Fulbright Science School</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="clear"> 
    <!-- ################################################################################################ -->
    <nav>
      <ul>
		<?php
		if(!isset($_SESSION["account_id"])) {
		?>
        <li><a href="<?php unanchor_home(); ?>">Home</a></li>
		<li><a href="?">Contact Us</a></li>
        <li><a href="?page=login">Login</a></li>
		<?php
		} else {
		?>
        <li><a href="?logout">Logout</a></li>
		<?php
		}
		?>
      </ul>
    </nav>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="<?php unanchor_home(); ?>">Fulbright Science School</a></h1>

    </div>
    <div class="fl_right"><!--
      <form class="clear" method="post" action="#">
        <fieldset>
          <legend>Search:</legend>
          <input type="text" value="" placeholder="Search Here">
          <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
        </fieldset>
      </form>-->
    </div>
    <!-- ################################################################################################ --> 
  </header>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->

<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
	<?php
	if(!isset($_SESSION["account_id"])) {
	?>
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li <?php echo !isset($_GET['page']) ? 'class="active"' : '' ?>><a href="?">Home</a></li>
        <li><a class="drop" href="#">Gallery</a>
          <ul>
            <li><a href="?page=school_faciities">School Facilities</a></li>
            <li><a href="?page=school_staff">School Staff</a></li>
          </ul>
        </li>
        <li <?php echo isset($_GET['page']) && $_GET['page']=='information' ? 'class="active"' : '' ?>><a href="?page=information">Enrollment Process and Information</a></li>
        <li <?php echo isset($_GET['page']) && $_GET['page']=='grade_viewer' ? 'class="active"' : '' ?>><a href="?page=grade_viewer">Online Grade Viewer</a></li>
      </ul>
	<?php
	} elseif($_SESSION["account_type"]==4) {
	?>
	<ul class="clear">
        <li <?php echo !isset($_GET['view']) || (isset($_GET['view']) && $_GET['view']=='class') ? 'class="active"' : '' ?>><a href="?page=dashboard&view=class">Manage Class</a></li>
        <li <?php echo isset($_GET['view']) && $_GET['view']=='student' ? 'class="active"' : '' ?>><a href="?page=dashboard&view=student">Manage Students</a></li>
        <li <?php echo isset($_GET['view']) && $_GET['view']=='teacher' ? 'class="active"' : '' ?>><a href="?page=dashboard&view=teacher">Manage Teachers</a></li>
        <li <?php echo isset($_GET['view']) && $_GET['view']=='section' ? 'class="active"' : '' ?>><a href="?page=dashboard&view=section">Manage Sections</a></li>
        <li <?php echo isset($_GET['view']) && $_GET['view']=='subject' ? 'class="active"' : '' ?>><a href="?page=dashboard&view=subject">Manage Subjects</a></li>
      </ul>
	<?php
	} elseif($_SESSION["account_type"]==3) {
	?>
	<ul class="clear">
        <li><a href="?page=dashboard&view=class">Manage Grades</a></li>
      </ul>
	<?php
	}
	?>
      <!-- ################################################################################################ --> 
    </nav>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->



<?php
if(!isset($_GET['page'])) {
?>
<div class="wrapper">
  <div id="slider">
    <div id="slide-wrapper" class="rounded clear"> 
      <!-- ################################################################################################ -->
      <figure id="slide-1"><a class="view" href="#"><img src="images/demo/slider/Fulbright1.jpg" alt=""></a>
        <figcaption>
          <h2>Fulbright Science Highschool</h2>
          <p>A school that believes in high-level education for the next generation.</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-2"><a class="view" href="#"><img src="images/demo/slider/Fulbright2.jpg" alt=""></a>
        <figcaption>
          <h2>Mission</h2>
          <p>FSS is committed to giving quality education and values formation. It shall become an ideal learning institution for young boys and girls in making them active learners through exploration and discovery. The students are encouraged to use their reasoning skills, practice listening, explore their environment and express, understand and handle their feelings intellectually. Each school activity shall offer the students the opportunity to establish confidence, responsibility and independence.</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-3"><a class="view" href="#"><img src="images/demo/slider/Fulbright3.jpg" alt=""></a>
        <figcaption>
          <h2>Vision</h2>
          <p>Responding to the growing demand for quality education and the need of the present time to make youth empowered learners, FULBRIGHT SCIENCE SCHOOL envisions learners equipped with adequate knowledge and skills and have maintained intellectual social curiosity to become effective agents of social transformations.</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-4"><a class="view" href="#"><img src="images/bagito.jpg" alt=""></a>
        <figcaption>
          <h2>Aliquatjusto quisque nam</h2>
          <p>Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis.</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-5"><a class="view" href="#"><img src="images/demo/slider/5.png" alt=""></a>
        <figcaption>
          <h2>Welcome new applicants!</h2>
          <p>We are now entertaining new applicants. Enroll now!</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <!-- ################################################################################################ -->
      <ul id="slide-tabs">
        <li><a href="#slide-1">All About The University</a></li>
        <li><a href="#slide-2">Why You Should Study With Us</a></li>
        <li><a href="#slide-3">Our Vision For Learners</a></li>
        <li><a href="#slide-4">Alumni And Its Donors</a></li>
        <li><a href="#slide-5">Latest University News &amp; Events</a></li> 
      </ul>
      <!-- ################################################################################################ --> 
    </div>
  </div>
</div>
<?php
}
?>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">

	<?php
		if(isset($_GET['page'])) {
			if($_GET['page']=='school_faciities') {
				include("/pages/gallery.php");
			} elseif ($_GET['page']=='login') {
				include("/pages/login.php");
			} elseif ($_GET['page']=='dashboard') {
				include("/pages/dashboard.php");
			} elseif ($_GET['page']=='grade_viewer') {
				include("/pages/login_student.php");
			}
		}
	?>

  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <div class="rounded">
    <footer id="footer" class="clear"> 
      <!-- ################################################################################################ -->
	  
	  Footer
	  
      <!-- ################################################################################################ --> 
    </footer>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
</body>
</html>