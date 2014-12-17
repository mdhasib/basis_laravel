<?php 
	require_once('../lib/common_functions.php');
	require_once('includes/header.php');
?>
	<section>
		<div class="container" id="browsing">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Menu</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="../index.php">Home</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Project Credits</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Learn From Project
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Shafiq </a></li>
											<li><a href="">Sadat </a></li>
											<li><a href="">Hasib </a></li>
											<li><a href="">Arif </a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!--/category-products-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo $_SESSION['student_info']['first_name']; ?><a href="../lib/logout.php?logout=logout"> Logout</a></h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo IMG_PATH; ?>images/home/product1.jpg" alt="" />
										<h2><?php echo $_SESSION['student_info']['first_name']." ".$_SESSION['student_info']['last_name']; ?></h2>
										<p><?php echo $_SESSION['student_info']['email']; ?><br/>+<?php echo $_SESSION['student_info']['mobile']; ?></p>
										<a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Edit Profile</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo $_SESSION['student_info']['first_name']." ".$_SESSION['student_info']['last_name']; ?></h2>
											<p>
												View:
											</p>
											<a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Edit Profile</a>
										</div>
									</div>
								</div>
							</div>
						</div>					
					</div>
				</div>
				</section><!--/form-->	
			</div>
		</div>
	</section>
<?php require_once('../includes/footer.php'); ?>