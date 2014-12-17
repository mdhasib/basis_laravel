<?php require_once('includes/header.php'); ?>
	<section>
		<div class="container" id="browsing">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Menu</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="admins/index.php">Admin Area</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="students/index.php">Students Area</a></h4>
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
				<div class="col-sm-4">
					<div class="blog-post-area">
						<h2 class="title text-center">Our project user story</h2>
						<div class="single-blog-post">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</p> <br>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</p> <br>
						</div>
					</div><!--/blog-post-area-->
				</div>
				<div class="container">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-1">
								<div class="signup-form"><!--sign up form-->
									<h2 class="title text-center">New User Signup!</h2>
									<form action="#">
										<input type="text" placeholder="Name"/>
										<input type="email" placeholder="Email Address"/>
										<input type="password" placeholder="Password"/>
										<input type="text" id= "datepicker"placeholder="y/m/d"/>

										<button type="submit" class="btn btn-default">Signup</button>
									</form>
								</div><!--/sign up form-->
							</div>
						</div>
					</div>
				</section><!--/form-->	
			</div>
		</div>
	</section>
<div class="container">
	<div class="row">
		<div class='col-sm-6'>
			<div class="form-group">
				<div class='input-group date' id='datetimepicker5'>
					<input type='text' class="form-control" data-date-format="YYYY/MM/DD"/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(function () {
				$('#datetimepicker5').datetimepicker({
					pickTime: false
				});
			});
		</script>
	</div>
</div>
<?php require_once('../includes/footer.php'); ?>