<?php
    include 'function/connection.php';

    session_start();

    if($_SESSION['status']!="login"){
        header("location:index.php?pesan=belum_login");
    }

    $data_users = mysqli_query($koneksi,"SELECT * FROM users WHERE id_role='2'");
    $data_produk = mysqli_query($koneksi,"SELECT * FROM products");
	$data_revenue = mysqli_query($koneksi, "SELECT SUM(total_harga) AS jumlah FROM transactions");
	// $data = mysql_fetch_array($qry);
 
    $jumlah_users = mysqli_num_rows($data_users);
    $jumlah_produk = mysqli_num_rows($data_produk);
	$jumlah_revenue = mysqli_fetch_array($data_revenue);
	
	$data_transaksi = mysqli_query($koneksi,"SELECT * FROM transactions WHERE status='0'");

	$jumlah_transaksi = mysqli_num_rows($data_transaksi);

	function rupiah($angka){
	
		$hasil_rupiah = number_format($angka,2,',','.');
		return $hasil_rupiah;
	 
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin,dashboard,panel,bootstrap admin template,bootstrap dashboard,dashboard,themeforest admin dashboard,themeforest admin,themeforest dashboard,themeforest admin panel,themeforest admin template,themeforest admin dashboard,cool admin,it dashboard,admin design,dash templates,saas dashboard,dmin ui design">

		<!-- Favicon -->
		<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>

		<!-- Title -->
		<title>AGTA | Dashboard</title>

		<!-- Bootstrap css-->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
		<link href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>

		<!-- Style css-->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/skins.css" rel="stylesheet">
		<link href="assets/css/dark-style.css" rel="stylesheet">
		<link href="assets/css/colors/default.css" rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/css/colors/color.css">

		<!---Select2 css-->
		<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">

		<!-- Mutipleselect css-->
		<link rel="stylesheet" href="assets/plugins/multipleselect/multiple-select.css">

	</head>

	<body class="horizontalmenu dark-theme">

		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page">
            <!-- Header -->
            <!-- Main Header-->
			<div class="main-header side-header">
				<div class="container">
					<div class="main-header-left">
						<a class="main-header-menu-icon d-lg-none" href="" id="mainNavShow"><span></span></a>
						<a class="main-logo" href="dashboard.php">
							<img src="assets/img/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
							<img src="assets/img/brand/logo-light.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
						</a>
					</div>
					<div class="main-header-center">
						<div class="responsive-logo">
							<a href="dashboard.php"><img src="assets/img/brand/logo.png" class="mobile-logo" alt="logo"></a>
							<a href="dashboard.php"><img src="assets/img/brand/logo-light.png" class="mobile-logo-dark" alt="logo"></a>
						</div>
					</div>
					<div class="main-header-right">
						<div class="dropdown main-header-notification">
							<a class="nav-link icon" href="">
								<i class="fe fe-bell header-icons"></i>
								<span class="badge badge-danger nav-link-badge"><?php echo $jumlah_transaksi; ?></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<?php
										if($jumlah_transaksi > 0){
									?>
									<p class="main-notification-text">You have <?php echo $jumlah_transaksi; ?> unread notification</p>
									<?php
										}else{
									?>
									<p class="main-notification-text">You don't have unread notification</p>
									<?php
										}
									?>
								</div>
								<div class="main-notification-list">
									<?php
										$sql = mysqli_query($koneksi, 'SELECT * FROM transactions ORDER BY id_transaksi DESC LIMIT 5');

										while($row = mysqli_fetch_array($sql)){
									?>
									<div class="media new">
										<div class="main-img-user online"><img src="https://www.freeiconspng.com/uploads/clock-event-history-schedule-time-undo-icon--7.png" alt="avatar" /></div>
										<div class="media-body">
											<a href="./list-approval.php"><p>You've transaction has not been validated</p><span><?php echo $row['created_at'] ?></span></a>
										</div>
									</div>
									<?php
										}
									?>
								</div>
							</div>
						</div>
						<div class="dropdown d-md-flex">
							<a class="nav-link icon full-screen-link" href="">
								<i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
								<i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
							</a>
						</div>
						<div class="dropdown main-profile-menu">
							<a class="d-flex" href="">
								<span class="main-img-user" ><img alt="avatar" src="assets/img/users/1.png"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title"><?php echo $_SESSION['name']; ?></h6>
									<p class="main-notification-text">Administrator</p>
								</div>
								<a class="dropdown-item" href="./edit-profile.php">
									<i class="fe fe-edit"></i> Edit Profile
								</a>
								<a class="dropdown-item" href="function/logout-action.php">
									<i class="fe fe-power"></i> Log Out
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Main Header-->

			<!-- Mobile-header -->
			<div class="mobile-main-header">
				<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<div class="d-flex order-lg-2 ml-auto">
							<div class="dropdown header-search">
								<a class="nav-link icon header-search">
									<i class="fe fe-search"></i>
								</a>
								<div class="dropdown-menu">
									<div class="main-form-search p-2">
										<div class="input-group">
											<div class="input-group-btn search-panel">
												<select class="form-control select2-no-search">
													<option label="All categories">
													</option>
													<option value="IT Projects">
														IT Projects
													</option>
													<option value="Business Case">
														Business Case
													</option>
													<option value="Microsoft Project">
														Microsoft Project
													</option>
													<option value="Risk Management">
														Risk Management
													</option>
													<option value="Team Building">
														Team Building
													</option>
												</select>
											</div>
											<input type="search" class="form-control" placeholder="Search for anything...">
											<button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
										</div>
									</div>
								</div>
							</div>
							<div class="dropdown main-header-notification flag-dropdown">
							<a class="nav-link icon country-Flag">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#f0f0f0"/><g fill="#0052b4"><path d="M52.92 100.142c-20.109 26.163-35.272 56.318-44.101 89.077h133.178L52.92 100.142zM503.181 189.219c-8.829-32.758-23.993-62.913-44.101-89.076l-89.075 89.076h133.176zM8.819 322.784c8.83 32.758 23.993 62.913 44.101 89.075l89.074-89.075H8.819zM411.858 52.921c-26.163-20.109-56.317-35.272-89.076-44.102v133.177l89.076-89.075zM100.142 459.079c26.163 20.109 56.318 35.272 89.076 44.102V370.005l-89.076 89.074zM189.217 8.819c-32.758 8.83-62.913 23.993-89.075 44.101l89.075 89.075V8.819zM322.783 503.181c32.758-8.83 62.913-23.993 89.075-44.101l-89.075-89.075v133.176zM370.005 322.784l89.075 89.076c20.108-26.162 35.272-56.318 44.101-89.076H370.005z"/></g><g fill="#d80027"><path d="M509.833 222.609H289.392V2.167A258.556 258.556 0 00256 0c-11.319 0-22.461.744-33.391 2.167v220.441H2.167A258.556 258.556 0 000 256c0 11.319.744 22.461 2.167 33.391h220.441v220.442a258.35 258.35 0 0066.783 0V289.392h220.442A258.533 258.533 0 00512 256c0-11.317-.744-22.461-2.167-33.391z"/><path d="M322.783 322.784L437.019 437.02a256.636 256.636 0 0015.048-16.435l-97.802-97.802h-31.482v.001zM189.217 322.784h-.002L74.98 437.019a256.636 256.636 0 0016.435 15.048l97.802-97.804v-31.479zM189.217 189.219v-.002L74.981 74.98a256.636 256.636 0 00-15.048 16.435l97.803 97.803h31.481zM322.783 189.219L437.02 74.981a256.328 256.328 0 00-16.435-15.047l-97.802 97.803v31.482z"/></g></svg>
							</a>
							<div class="dropdown-menu">
								<a href="#" class="dropdown-item d-flex ">
									<span class="avatar  mr-3 align-self-center bg-transparent"><img src="assets/img/flags/french_flag.jpg" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">French</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar  mr-3 align-self-center bg-transparent"><img src="assets/img/flags/germany_flag.jpg" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">Germany</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar mr-3 align-self-center bg-transparent"><img src="assets/img/flags/italy_flag.jpg" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">Italy</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar mr-3 align-self-center bg-transparent"><img src="assets/img/flags/russia_flag.jpg" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">Russia</span>
									</div>
								</a>
								<a href="#" class="dropdown-item d-flex">
									<span class="avatar  mr-3 align-self-center bg-transparent"><img src="assets/img/flags/spain_flag.jpg" alt="img"></span>
									<div class="d-flex">
										<span class="mt-2">spain</span>
									</div>
								</a>
							</div>
						</div>
						<div class="dropdown ">
							<a class="nav-link icon full-screen-link">
								<i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
								<i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
							</a>
						</div>
						<div class="dropdown main-header-notification">
							<a class="nav-link icon" href="">
								<i class="fe fe-bell header-icons"></i>
								<span class="badge badge-danger nav-link-badge">4</span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<p class="main-notification-text">You have 1 unread notification<span class="badge badge-pill badge-primary ml-3">View all</span></p>
								</div>
								<div class="main-notification-list">
									<div class="media new">
										<div class="main-img-user online"><img alt="avatar" src="assets/img/users/5.jpg"></div>
										<div class="media-body">
											<p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
										</div>
									</div>
									<div class="media">
										<div class="main-img-user"><img alt="avatar" src="assets/img/users/2.jpg"></div>
										<div class="media-body">
											<p><strong>Joshua Gray</strong> New Message Received</p><span>Oct 13 02:56am</span>
										</div>
									</div>
									<div class="media">
										<div class="main-img-user online"><img alt="avatar" src="assets/img/users/3.jpg"></div>
										<div class="media-body">
											<p><strong>Elizabeth Lewis</strong> added new schedule realease</p><span>Oct 12 10:40pm</span>
										</div>
									</div>
								</div>
								<div class="dropdown-footer">
									<a href="#">View All Notifications</a>
								</div>
							</div>
						</div>
						<div class="main-header-notification mt-2">
							<a class="nav-link icon" href="chat.html">
								<i class="fe fe-message-square header-icons"></i>
								<span class="badge badge-success nav-link-badge">6</span>
							</a>
						</div>
						<div class="dropdown main-profile-menu">
							<a class="d-flex" href="#">
								<span class="main-img-user" ><img alt="avatar" src="assets/img/users/1.jpg"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title">Sonia Taylor</h6>
									<p class="main-notification-text">Web Designer</p>
								</div>
								<a class="dropdown-item border-top" href="profile.html">
									<i class="fe fe-user"></i> My Profile
								</a>
								<a class="dropdown-item" href="profile.html">
									<i class="fe fe-edit"></i> Edit Profile
								</a>
								<a class="dropdown-item" href="profile.html">
									<i class="fe fe-settings"></i> Account Settings
								</a>
								<a class="dropdown-item" href="profile.html">
									<i class="fe fe-settings"></i> Support
								</a>
								<a class="dropdown-item" href="profile.html">
									<i class="fe fe-compass"></i> Activity
								</a>
								<a class="dropdown-item" href="signin.html">
									<i class="fe fe-power"></i> Sign Out
								</a>
							</div>
						</div>
						<div class="dropdown  header-settings">
							<a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-right header-icons"><line x1="21" y1="10" x2="7" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="7" y2="18"></line></svg>
							</a>
						</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile-header -->
            <!-- End Header -->

            <!-- Navbar -->
            <?php include 'layouts/navbar.php'; ?>
            <!-- End Navbar -->

			<!-- Main Content-->
			<div class="main-content pt-0">
				<div class="container">

					<!-- Page Header -->
					<div class="page-header">
						<div>
							<h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">AGTA Dashboard</li>
							</ol>
						</div>
					</div>
					<!-- End Page Header -->

					<!--Row-->
					<div class="row row-sm">
						<div class="col-sm-12 col-lg-12 col-xl-8">

							<!--Row-->
							<div class="row row-sm  mt-lg-4">
								<div class="col-sm-12 col-lg-12 col-xl-12">
									<div class="card bg-primary custom-card card-box">
										<div class="card-body p-4">
											<div class="row align-items-center">
												<div class="offset-lg-4 offset-sm-6 col-lg-8 col-sm-6 col-12">
													<h4 class="d-flex  mb-3">
														<span class="font-weight-bold text-white "><?php echo $_SESSION['name']; ?></span>
													</h4>
													<p class="tx-white-7 mb-1">Welcome to AGTA dashboard. Have a nice day!😊</p>
												</div>
												<img src="assets/img/pngs/work3.png" alt="user-img">
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--Row -->

							<!--Row-->
							<div class="row row-sm">
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
									<div class="card custom-card">
										<div class="card-body">
											<div class="card-item">
												<div class="card-item-icon card-icon">
													<svg class="text-primary" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect height="14" opacity=".3" width="14" x="5" y="5"/><g><rect fill="none" height="24" width="24"/><g><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z"/><rect height="5" width="2" x="7" y="12"/><rect height="10" width="2" x="15" y="7"/><rect height="3" width="2" x="11" y="14"/><rect height="2" width="2" x="11" y="10"/></g></g></g></svg>
												</div>
												<div class="card-item-title mb-2">
													<label class="main-content-label tx-13 font-weight-bold mb-1">Total Revenue</label>
													<span class="d-block tx-12 mb-0 text-muted">Revenue from all transaction</span>
												</div>
												<div class="card-item-body">
													<div class="card-item-stat">
														<h4 class="font-weight-bold"><?php echo 'Rp '.rupiah($jumlah_revenue['jumlah']); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
									<div class="card custom-card">
										<div class="card-body">
											<div class="card-item">
												<div class="card-item-icon card-icon">
													<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.41 0-8 3.59-8 8 0 1.82.62 3.49 1.64 4.83 1.43-1.74 4.9-2.33 6.36-2.33s4.93.59 6.36 2.33C19.38 15.49 20 13.82 20 12c0-4.41-3.59-8-8-8zm0 9c-1.94 0-3.5-1.56-3.5-3.5S10.06 6 12 6s3.5 1.56 3.5 3.5S13.94 13 12 13z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/></svg>
												</div>
												<div class="card-item-title mb-2">
													<label class="main-content-label tx-13 font-weight-bold mb-1">Total Users</label>
													<span class="d-block tx-12 mb-0 text-muted">Users joined to this website</span>
												</div>
												<div class="card-item-body">
													<div class="card-item-stat">
														<h4 class="font-weight-bold"><?php echo $jumlah_users; ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
									<div class="card custom-card">
										<div class="card-body">
											<div class="card-item">
												<div class="card-item-icon card-icon">
													<svg class="text-primary" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm1.23 13.33V19H10.9v-1.69c-1.5-.31-2.77-1.28-2.86-2.97h1.71c.09.92.72 1.64 2.32 1.64 1.71 0 2.1-.86 2.1-1.39 0-.73-.39-1.41-2.34-1.87-2.17-.53-3.66-1.42-3.66-3.21 0-1.51 1.22-2.48 2.72-2.81V5h2.34v1.71c1.63.39 2.44 1.63 2.49 2.97h-1.71c-.04-.97-.56-1.64-1.94-1.64-1.31 0-2.1.59-2.1 1.43 0 .73.57 1.22 2.34 1.67 1.77.46 3.66 1.22 3.66 3.42-.01 1.6-1.21 2.48-2.74 2.77z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"/></svg>
												</div>
												<div class="card-item-title  mb-2">
													<label class="main-content-label tx-13 font-weight-bold mb-1">Total Product</label>
													<span class="d-block tx-12 mb-0 text-muted">All products have been uploaded</span>
												</div>
												<div class="card-item-body">
													<div class="card-item-stat">
														<h4 class="font-weight-bold"><?php echo $jumlah_produk; ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--End row-->

							<!--row-->
							<div class="row row-sm">
								<div class="col-sm-12 col-lg-12 col-xl-12 mb-5">
									<div class="card custom-card overflow-hidden">
										<div class="card-header border-bottom-0">
											<div>
												<label class="main-content-label mb-2">Income Graph Of All Transactions</label> <span class="d-block tx-12 mb-0 text-muted">The Income Graph is a tool used by Administrator to find out the annual revenue of AGTA</span>
											</div>
										</div>
										<div class="card-body pl-0">
											<div class>
												<div class="container">
													<canvas id="myChart"></canvas>
												</div>
											</div>
										</div>
									</div>
								</div><!-- col end -->
							</div><!-- Row end -->
						</div><!-- col end -->
                        
						<div class="col-sm-12 col-lg-12 col-xl-4 mt-xl-1">
							<div class="card custom-card card-dashboard-calendar pb-0">
								<label class="main-content-label mb-2 pt-1">Recent Transactions</label>
								<table class="table table-hover m-b-0 transcations mt-2">
									<tbody>
										<?php
											$query = "SELECT transaction_detail.id_produk, transactions.status, transaction_detail.gambar_produk, transaction_detail.nama_model, transaction_detail.total_harga, transaction_detail.created_at FROM transactions LEFT JOIN transaction_detail ON transactions.id_transaksi = transaction_detail.id_transaksi WHERE transactions.status = '2' ORDER BY transaction_detail.id_transaksi DESC LIMIT 5";
											$result = mysqli_query($koneksi,$query) or die(mysqli_error($conn));
											while($row = mysqli_fetch_array($result)){
												$id = $row['id_produk'];

												$sql = "SELECT nama_produk FROM products WHERE id_produk =".$id;
												$rslt = mysqli_query($koneksi, $sql);
												while($data = mysqli_fetch_array($rslt)){
										?>
										<tr>
											<td class="wd-5p">
												<div class="main-img-user avatar-md">
													<!-- <img alt="avatar" class="rounded-circle mr-3" src="images/"> -->
													<?php echo "<img alt='avatar' class='rounded-circle mr-3' src='images/$row[gambar_produk]'>"; ?>
												</div>
											</td>
											<td>
												<div class="d-flex align-middle ml-3">
													<div class="d-inline-block">
														<h6 class="mb-1"><?php echo $data['nama_produk'] ?></h6>
														<p class="mb-0 tx-13 text-muted"><?php echo $row['nama_model'] ?></p>
													</div>
												</div>
											</td>
											<td class="text-right">
												<div class="d-inline-block">
													<h6 class="mb-2 tx-15 font-weight-semibold">Rp <?php echo rupiah($row['total_harga']); ?><i class="fas fa-check ml-2 text-success m-l-10"></i></h6>
													<p class="mb-0 tx-11 text-muted"><?php echo $row['created_at'] ?></p>
												</div>
											</td>
										</tr>
										<?php
												}
											}
										?>
									</tbody>
								</table>
							</div>
						</div><!-- col end -->
					</div><!-- Row end -->

				</div>
			</div>
			<!-- End Main Content-->

			<!-- Main Footer-->
			<?php include 'layouts/footer.php'; ?>
			<!--End Footer-->

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

		<!-- Jquery js-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<!-- Bootstrap js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Chart js-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<!-- Jquery-Ui js-->
		<script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

		<!-- Perfect-scrollbar js-->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!-- Sticky js-->
		<script src="assets/js/sticky.js"></script>

		<!-- Dashboard js-->
		<!-- <script src="assets/js/index.js"></script> -->

		<!-- Custom js-->
		<script src="assets/js/custom.js"></script>

		<script>
			$(document).ready(function(){
				const labels = [
					'January',
					'February',
					'March',
					'April',
					'May',
					'June',
					'July',
					'August',
					'September',
					'October',
					'November',
					'December'
				];
				const data = {
					labels: labels,
					datasets: [{
					label: 'income of all transaction in 2022',
					backgroundColor: 'rgb(255, 99, 132)',
					borderColor: 'rgb(255, 99, 132)',
					data:[
						<?php 
							$januari = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-01%'");
							$data1 = mysqli_fetch_array($januari);

							if($data1['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data1['jumlah'];
							}
						?>,
						<?php 
							$februari = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-02%'");
							$data2=  mysqli_fetch_array($februari);

							if($data2['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data2['jumlah'];
							}
						?>,
						<?php 
							$maret = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-03%'");
							$data3=  mysqli_fetch_array($maret);

							if($data3['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data3['jumlah'];
							}
						?>,
						<?php 
							$april = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-04%'");
							$data4=  mysqli_fetch_array($april);

							if($data4['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data4['jumlah'];
							}
						?>,
						<?php 
							$mei = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-05%'");
							$data5=  mysqli_fetch_array($mei);

							if($data5['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data5['jumlah'];
							}
						?>,
						<?php 
							$juni = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-06%'");
							$data6=  mysqli_fetch_array($juni);

							if($data6['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data6['jumlah'];
							}
						?>,
						<?php 
							$juli = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-07%'");
							$data7=  mysqli_fetch_array($juli);

							if($data7['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data7['jumlah'];
							}
						?>,
						<?php 
							$agustus = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-08%'");
							$data8=  mysqli_fetch_array($agustus);

							if($data8['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data8['jumlah'];
							}
						?>,
						<?php 
							$september = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-09%'");
							$data9=  mysqli_fetch_array($september);

							if($data9['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data9['jumlah'];
							}
						?>,
						<?php 
							$oktober = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-10%'");
							$data10=  mysqli_fetch_array($oktober);

							if($data10['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data10['jumlah'];
							}
						?>,
						<?php 
							$november = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-11%'");
							$data11=  mysqli_fetch_array($november);

							if($data11['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data11['jumlah'];
							}
						?>,
						<?php 
							$desember = mysqli_query($koneksi,"SELECT SUM(total_harga) AS jumlah FROM transaction_detail WHERE created_at LIKE '%2022-12%'");
							$data12=  mysqli_fetch_array($desember);

							if($data12['jumlah'] == NULL){
								echo '0';
							}else{
								echo $data12['jumlah'];
							}
						?>,
						],
					}]
				};

				const config = {
					type: 'line',
					data: data,
					options: {}
				};

				const myChart = new Chart(
					document.getElementById('myChart'),
					config
				);
			});
		</script>

	</body>
</html>