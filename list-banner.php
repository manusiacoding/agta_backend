<?php
include 'function/connection.php';

session_start();

if($_SESSION['status']!="login"){
    header("location:index.php?pesan=belum_login");
}
$data_transaksi = mysqli_query($koneksi,"SELECT * FROM transactions WHERE status='0'");

	$jumlah_transaksi = mysqli_num_rows($data_transaksi);
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Spruha -  Admin Panel HTML Dashboard Template">
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

		<!-- Internal DataTables css-->
		<link href="assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
		<link href="assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet" />

		<!-- Style css-->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/skins.css" rel="stylesheet">
		<link href="assets/css/dark-style.css" rel="stylesheet">
		<link href="assets/css/colors/default.css" rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/css/colors/color.css">

		<!-- Select2 css -->
		<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">

		<!-- Sidemenu css-->
		<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">

		<!-- Internal Sweet-Alert css-->
		<link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">

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
			<div class="main-content pt-2">
				<div class="container">
					<div class="inner-body">
                        <!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12">
								<div class="card custom-card overflow-hidden">
									<div class="card-body">
										<div>
											<h6 class="main-content-label mb-1">List Banner</h6>
										</div>
										<div class="table-responsive pt-2">
											<table class="table" id="example1">
												<thead class="thead">
													<tr>
														<th class="wd-20p">Banner ID</th>
														<th class="wd-20p">Title</th>
														<th class="wd-20p">Description</th>
														<th class="wd-20p">Images</th>
													</tr>
												</thead>
												<tbody>
													<!--  -->
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

						<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Edit Banner</h4>
									</div>
									<div class="modal-body">
										<form  method="POST" class="formproduk">
                                                <div class="form-group">
													<label for="nama">Title</label>
													<input type="hidden" name="idproduk" id="idbanner">
													<input type="hidden" name="idfoto" id="oldfoto">
													<input type="text" name="nama" class="form-control" id="judul" readonly>
												</div>
												<div class="form-group">
													<label for="harga">Description</label>
													<textarea name="isi" class="form-control" cols="10" rows="2" id="isi" readonly='readonly'></textarea>
												</div>
												<div class="form-group">
													<label for="warna">Images</label><br>
													<img src="#" alt="Foto tidak tersedia." id="foto" class="img-fluid mb-3" width="50%">
												</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" id="delete">Delete</button><br>
											</div>
										</form>
									</div>
								</div>
							
							</div>
						</div>
						<!-- End Modal -->
					</div>
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
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap js-->
		<!-- <script src="assets/plugins/bootstrap/js/popper.min.js"></script> -->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Select2 js-->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Internal Data Table js -->
		<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/jszip.min.js"></script>
		<!-- <script src="assets/plugins/datatable/fileexport/pdfmake.min.js"></script> -->
		<script src="assets/plugins/datatable/fileexport/vfs_fonts.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.print.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.colVis.min.js"></script>
		<script src="assets/js/table-data.js"></script>


		<!-- Perfect-scrollbar js -->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!-- Sidebar js -->
		<script src="assets/plugins/sidebar/sidebar.js"></script>

		<!-- Sticky js -->
		<script src="assets/js/sticky.js"></script>

		<!-- Sweet Alert Js -->
		<script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>
		<script src="assets/plugins/sweet-alert/jquery.sweet-alert.js"></script>

		<!-- Custom js -->
		<script src="assets/js/custom.js"></script>
		<script>
			$(document).ready(function(){
				var fileName;

				$('#example1').dataTable({
					"processing": true,
					// "stateSave": true,
					"ajax": "function/view-banner.php",
					"order": [[0, "desc"]],
					"columns": [
						{data: 'id_banner'},
						{data: 'judul'},
						{data: 'deskripsi'},
						{
							"render": function (data, type, JsonResultRow, meta) {
								return '<img src="banners/'+JsonResultRow.gambar+'" class="img-fluid">';
							}
                    	}
					],
					"bDestroy": true
				});

				$('#example1 tbody').on('click', 'tr', function () {
					var id = this.cells[0].innerHTML;
					var idmodel = this.cells[1].innerHTML;
					// alert(id);
					
					$("#idbanner").val(id).trigger("change");
					$("#myModal").modal("show");
				}); 
				
				$('#idbanner').bind('change', function(e){
					e.preventDefault();
					var idbanner = $(this).val();

					$.ajax({
						url: 'function/ajaxrespon-banner.php',
						type: 'GET',
						dataType: 'json',
						data: {
						'id_blog' : idbanner
						},
						success: function (data) {
							$("#oldfoto").val(data['gambar']);
							$("#judul").val(data['judul']);
							$("#isi").val(data['isi']);
							$("#foto").attr("src","banners/" + data['gambar']);
						}
					});

					$('#delete').off().on('click', function(e){
						$.ajax({
							url: 'function/delete-banner.php',
							method: "POST",
							data: {
								ids: idbanner,
							},
							success:function(data){
								swal(
									"Well Done!",
									"You've been deleted this banner",
									"success"
								);
								$('#myModal').modal('hide');
								$('#example1').DataTable().ajax.reload(null, false);
							}
						})
					});
				});
			});
		</script>
	</body>
</html>