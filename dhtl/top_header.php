<!-- Top_Header -->
<div class="container-fluid topHeader">
	<div class="container">
		<div class="row header_top">
			<div class="label">
				<a href="http://www.tlu.edu.vn/">Trường Đại học Thủy Lợi - TLU</a>
			</div>
			<div class="list-top">
				<ul>
					<?php
					if (isset($_SESSION['user'])) {
						echo '<li><a href="logout.php" title="Logout">(+) Logout</a></li>';
					} else {
						echo '<li><a href="login.php" title="Login">(+) Login</a></li>';
					}
					?>
					<li class="ngonNgu">
						Ngôn ngữ :
						<a href="#"><img src="http://cse.tlu.edu.vn/cse/assets/images/icons/icon-lang-vi.png" alt=""></a>
						<a href="#" style="padding-left: 5px;"><img src="http://cse.tlu.edu.vn/cse/assets/images/icons/icon-lang-en.png" alt="" style="padding-left: 0;"></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Top_Header -->