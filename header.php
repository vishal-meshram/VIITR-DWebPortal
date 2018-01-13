<?php
//session starts here
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>R&D|WebTool</title>

		<meta name="description" content="and Validation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/select2.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default  ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>
			<!-- Logo and College Name starts here -->
				<div class="navbar-header pull-left">
					<a class="navbar-brand" href="http://www.viit.ac.in"><img src="viitlogo.png" width="50px" height="50px"></a>
					<a class="navbar-brand" href="http://www.viit.ac.in"><h2><strong>Vishwakarma Institute Of Information Technology</strong></h2></a>
				</div>
			<!-- Logo and College Name Ends here -->
			<!-- Admin Photo and menu starts here -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION['session_empFirstName'];?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="includes/logout_inc.php" name="logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
								<!-- Admin Photo and menu ends here -->
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>


				<ul class="nav nav-list">
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa fa-file-pdf-o"></i>
							<span class="menu-text"> Publications </span>
							<b class="arrow fa fa-angle-down"></b>						
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="journal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Journal								
								</a>
								<b class="arrow"></b>							
							</li>

							<li class="">
								<a href="conference.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Conference 
								</a>
								<b class="arrow"></b>							
							</li>

							<li class="">
								<a href="book.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Book 
								</a>
								<b class="arrow"></b>							
							</li>
						</ul> <!-- Submenu ul tag ends here -->
					</li> <!-- Publication li tag ends here -->

					<li class="">
						<a href="workshopattended.php">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text"> Workshop Attended </span>
						</a>
					</li>

					<li class="">
						<a href="researchProjects.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">Research Projects</span>
						</a>
					</li>

					<li class="">
						<a href="consultancy.php">
							<i class="menu-icon fa fa-inr"></i>
							<span class="menu-text"> Consultancy </span>
						</a>
					</li>
					
					<li class="">
						<a href="mou.php">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text">  MOU </span>
						</a>
					</li>

					<li class="">
						<a href="ipr.php">
							<i class="menu-icon fa 	fa-bookmark"></i>
							<span class="menu-text">  IPR </span>
						</a>
					</li>

					<li class="">
						<a href="patents.php">
							<i class="menu-icon fa  fa-bell"></i>
							<span class="menu-text">  Patents </span>
						</a>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bar-chart"></i>
							<span class="menu-text"> Reports </span>
							<b class="arrow fa fa-angle-down"></b>						
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="publicationReport.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Publications								
								</a>
								<b class="arrow"></b>							
							</li>

							<li class="researchProjectReport.php">
								<a href="form-elements-2.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Workshop 
								</a>
								<b class="arrow"></b>							
							</li>

							<li class="researchProjectReport.php">
								<a href="form-elements-2.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Research Projects 
								</a>
								<b class="arrow"></b>							
							</li>

							<li class="consultancyReport.php">
								<a href="form-wizard.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Consultancy
								</a>
								<b class="arrow"></b>							
							</li>

							<li class="">
								<a href="labDevelopementReport.php">
									<i class="menu-icon fa fa-caret-right"></i>
									MOU
								</a>
								<b class="arrow"></b>							
							</li>

							<li class="">
								<a href="rdActivitiesReport.php">
									<i class="menu-icon fa fa-caret-right"></i>
									IPR
								</a>
								<b class="arrow"></b>							
							</li>

							<li class="">
								<a href="labDevelopementReport.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Patents
								</a>
								<b class="arrow"></b>							
							</li>
						</ul> <!-- Subment ul tag ends here -->
					</li> <!-- Reports li tag ends here -->
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
		

