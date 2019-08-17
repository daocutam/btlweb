<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Thư viện css -->
	<link rel="stylesheet" href="../admin/public/templates/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../admin/public/templates/css/style.css" />
	<link rel="stylesheet" href="../admin/public/templates/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../admin/public/templates/css/aos.css" />
	<!-- Thư viện js -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="../admin/public/templates/js/bootstrap.min.js"></script>
	<script src="../admin/public/templates/js/aos.js"></script>
	<title>Khoa công nghệ thông tin</title>
</head>

<body>
	<!-- Header top -->
	<?php include('top_header.php'); ?>
	<!-- End Header top -->

	<!-- Header_Menu -->
	<?php include('menu_header.php'); ?>
	<!-- End Header_Menu -->

	<!-- Carousel -->
	<?php include('slider.php'); ?>
	<!-- End Carousel -->
	
	<!-- MAIN -->
	<section class="container phong_thi_nghiem" >
		<section class="row">
			<h1>Danh sách các phòng thí nghiệm của Khoa</h1>  <br>
			<p>
				- Phòng thí nghiệm Khoa học dữ liệu: <b>TS. Đặng Thị Thu Hiền</b> - Trưởng Lab <br>
				- Phòng thí nghiệm Mô hình hóa và mô phỏng: <b>TS. Nguyễn Ngọc Doanh </b>- Trưởng Lab <br>
				- Phòng thí nghiệm Hệ thống mạng: <b>TS. Phạm Tuấn Minh</b> - Trưởng Lab
			</p>
		</section>
	</section>
	<!-- End Main  -->

	<!-- Footer -->
	<?php include('footer.php'); ?>
	<!-- End Footer -->

</body>

</html>