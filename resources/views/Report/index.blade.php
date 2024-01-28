<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy">
<title>{{env('APP_NAME')}}</title>
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logos/DE-GROSIR.PNG')}}" >
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/logos/DE-GROSIR.PNG')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/logos/DE-GROSIR.PNG')}}">
<!-- jQuery -->
<!-- Bootstrap4 files-->
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/ui.css" rel="stylesheet" type="text/css"/>
<link href="assets/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
<link href="assets/css/OverlayScrollbars.css" type="text/css" rel="stylesheet"/>
<!-- Font awesome 5 -->
<style>
	.avatar {
  vertical-align: middle;
  width: 35px;
  height: 35px;
  border-radius: 50%;
}
.bg-default, .btn-default{
	background-color: #f2f3f8;
}
.btn-error{
	color: #ef5f5f;
}
</style>
<!-- custom style -->
</head>
<body>
<section class="header-main">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-3">
	<div class="brand-wrap">
		<img class="logo" src="assets/images/logos/DE-GROSIR.PNG">
		<h2 class="logo-text">{{env('APP_NAME')}}</h2>
	</div> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-6 col-sm-5">

	</div> <!-- col.// -->
	<div class="col-lg-3 col-sm-7">
		<div class="widgets-wrap d-flex justify-content-end">
			<div class="widget-header">
				<a href="#" class="icontext">
					<a href="/" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only">
															<i class="fa fa-home"></i>
														</a>
                                                        <a href="/report" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only">
															<i class="fa fa-book"></i>
														</a>
                                                        <a href="/admin" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only">
															<i class="fa fa-bars"></i>
														</a>
				</a>
			</div> <!-- widget .// -->
			<div class="widget-header dropdown">
				<a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10">
					<img src="assets/images/avatars/bshbsh.png" class="avatar" alt="">
				</a>
				<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#"><i class="fa fa-sign-out-alt"></i> Logout</a>
				</div> <!--  dropdown-menu .// -->
			</div> <!-- widget  dropdown.// -->
		</div>	<!-- widgets-wrap.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y-sm bg-default ">
<div class="container-fluid">
<div class="row">
	<div class="col-md-12 card padding-y-sm card ">

    <h1>Laporan</h1>
    <h6>klik untuk download Laporan</h6>

    <table border=1>
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Laporan</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
               <tr>
               <td>1</td>
                <td>Hasil Penjualan Perbulan</td>
                <td><a href="#">Download</a></td>
               </tr>

               <tr>
               <td>2</td>
                <td>Laporan Barang Terlaris</td>
                <td><a href="#">Download</a></td>
               </tr>

               <tr>
               <td>3</td>
                <td>Laporan Barang Dengan stok tipis (dibawah 20)</td>
                <td><a href="#">Download</a></td>
               </tr>

        </tbody>
    </table>
	</div>

</div>
</div><!-- container //  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<script src="assets/js/jquery-2.0.0.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/OverlayScrollbars.js" type="text/javascript"></script>
<script>
	$(function() {
	//The passed argument has to be at least a empty object or a object with your desired options
	//$("body").overlayScrollbars({ });
	$("#items").height(552);
	$("#items").overlayScrollbars({overflowBehavior : {
		x : "hidden",
		y : "scroll"
	} });
	$("#cart").height(445);
	$("#cart").overlayScrollbars({ });
});
</script>
</body>
</html>
