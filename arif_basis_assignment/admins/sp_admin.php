<?php 
	require_once('includes/header.php');
	require_once('../lib/common_functions.php');
	require_once('../lib/admin_functions.php');
	$result = select_data_all("admin_user");
	$permission = retrive_admin_permission($_SESSION['admin_info']['permission']);
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
									<h4 class="panel-title"><a href="../index.php">home</a></h4>
								</div>
							</div>
							<?php if(is_logged) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="sp_admin.php">Dashboard</a></h4>
								</div>
							</div>
							<?php if($permission[0] == 1) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											View Student
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">View Student (Database) </a></li>
											<li><a href="">View Student (Session) </a></li>
											<li><a href="">View Student (CSV) </a></li>
											<li><a href="">View Student (XML) </a></li>
											<li><a href="">View Student (PDF) </a></li>
										</ul>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php if($permission[1] == 1) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Add Student
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Add Student (Database) </a></li>
											<li><a href="">Add Student (Session) </a></li>
											<li><a href="">Add Student (CSV) </a></li>
											<li><a href="">Add Student (XML) </a></li>
											<li><a href="">Add Student (PDF) </a></li>
										</ul>
									</div>
								</div>
							</div>	
							<?php } ?>
							<?php if($permission[2] == 1) { ?>						
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Edit Student
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Edit Student (Database) </a></li>
											<li><a href="">Edit Student (Session) </a></li>
											<li><a href="">Edit Student (CSV) </a></li>
											<li><a href="">Edit Student (XML) </a></li>
											<li><a href="">Edit Student (PDF) </a></li>
										</ul>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">All File Link</a></h4>
								</div>
							</div>
							<?php if($permission[3] == 1) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">Delete File</a></h4>
								</div>
							</div>
							<?php } ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">Write Specipic Students Info</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">Write Specipic Students Field</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">Fill Specipic Students Form</a></h4>
								</div>
							</div>
							<?php if($_SESSION['admin_info']['is_super'] == 1) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">Import SQL Database</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">Export SQL Database</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">Import Data From CSV</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">Export Data From CSV</a></h4>
								</div>
							</div>
							<?php } ?>
							<?php } ?>
						</div><!--/category-products-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo $_SESSION['admin_info']['name']; ?><a href="../lib/logout.php?logout=logout"> Logout</a></h2>
						<?php foreach ($result as $value) {  ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo IMG_PATH; ?>images/home/product1.jpg" alt="" />
											<h2><?php echo $value['name']; ?></h2>
											<p><?php echo $value['email']; ?><br/>+<?php echo $value['mobile']; ?></p>
											<a href="edit_admin.php?id=<?php echo $value['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Edit Admin</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo $value['name']; ?></h2>
												<?php $permission = retrive_admin_permission($value['permission']); ?>
												<p>
													View: <?php echo get_permission_value($permission[0]); ?><br/>
													Create: <?php echo get_permission_value($permission[1]); ?><br/>
													Edit: <?php echo get_permission_value($permission[2]); ?><br/>
													Delete: <?php echo get_permission_value($permission[3]); ?><br/>
												</p>
												<a href="edit_admin.php?id=<?php echo $value['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Edit Admin</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="block_admin.php?id=<?php echo $value['id']; ?>"><i class="fa fa-plus-square"></i>Block Admin</a></li>
										<li><a href="delete_admin.php?id=<?php echo $value['id']; ?>"><i class="fa fa-plus-square"></i>Delete Admin</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php } ?>						
					</div>
				</div>
			</div>
		</section><!--/form-->
<?php require_once('../includes/footer.php'); ?>