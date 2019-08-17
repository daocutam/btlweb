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
<?php
include('../../btlweb/admin/configDb.php');
//Select các tin tức event
$query = "SELECT * FROM news,image WHERE news.id=image.new_id && news.active = 1 && news.type = 1 && news.branch_id = 0 limit 0,3";
$lst_event = $conn->query($query);
$query = "SELECT * FROM news,image WHERE news.id=image.new_id && news.active = 1 && news.type = 1 && news.branch_id = -1 limit 0,4";
$lst_news_active = $conn->query($query);
?>

<body>
	<!-- Header top -->
	<?php include('top_header.php'); ?>
	<!-- Header_Menu -->
	<?php include('menu_header.php'); ?>
	<!-- Carousel -->
	<?php include('slider.php'); ?>
	<!-- MAIN -->
	<section class="container">
		<section class="row">
			<div class="col-md-12 col-xs-12 top_main">
				<h3>TIN HOẠT ĐỘNG</h3>
			</div>
		</section>
	</section>
	<section class="container">
		<section class="row">
			<?php
			if ($lst_news_active->num_rows > 0) {
				foreach ($lst_news_active as $row) {
					echo '<div class="col-md-3 col-xs-12 aos-init aos-animate main_row1" data-aos="fade-right">
						<a href=""><img src="../../btlweb/admin/Images/' . $row['path'] . '" alt=""></a>
						<a href="">' . $row['title'] . '</a>
						<i>' . $row['created'] . '</i>
					</div>';
				}
			}
			?>
		</section>
		<section class="row">
			<div class="col-md-12 col-xs-12 main_row2">
				<h3>SỰ KIỆN</h3>
			</div>
		</section>
		<section class="row">
			<div class="col-md-8 col-xs-6 main_row3">
				<?php
				if ($lst_event->num_rows > 0) {
					foreach ($lst_event as $row) {
						echo '<div class="main_row3_1" data-aos="fade-down" data-aos-duration="4500">
								<img src="../../btlweb/admin/Images/' . $row['path'] . '" alt="">
								<div class="main_row3_right">
								<a href=""><b>' . $row['title'] . '</b></a>
								<a href=""><i>Xem Thêm...</i></a>
								</div>
							</div>';
					}
				}
				?>
			</div>
			<div class="col-md-4 col-xs-6 main_row3">
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcse.tlu.edu.vn%2F&tabs&width=292&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="292" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
			</div>
		</section>
	</section>
	<!-- End Main  -->

	<!-- Footer -->
	<?php include('footer.php'); ?>
	<!-- End Footer -->

	<script>
		AOS.init();
	</script>
</body>

</html>