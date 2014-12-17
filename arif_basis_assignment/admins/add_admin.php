<?php 
	require_once('includes/header.php');
	require_once('../lib/file_upload_functions.php');
	require_once('../lib/common_functions.php');
	require_once('../lib/admin_functions.php');
	$result = select_data_all("admin_user");
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
									<h4 class="panel-title"><a href="dashboard.php">Dashboard</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="add_admin.php">Create Admin</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">Edit Admin</a></h4>
								</div>
							</div>
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
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">All File Link</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="edit_addmin.php">Delete File</a></h4>
								</div>
							</div>
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
						</div><!--/category-products-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo $_SESSION['admin_info']['name']; ?><a href="../lib/logout.php?logout=logout"> Logout</a></h2>
						<div class="container">
							<div class="row">
								<div class="col-sm-5 col-sm-offset-1">
									<div class="login-form"><!--login form-->
										<h2 class="title text-center">Create another admin</h2>
										<form method="post" enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
											<input type="text" name="name" placeholder="Name" required="required" />
											<input type="email" name="email" placeholder="Email Address" required="required" />
											<input type="text" name="user_name" placeholder="Username" required="required" />
											<input id="password" type="password" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required="required" />
											<label id="show_pass"></label>
											<input id="generator" type="button" value="Generate Random Password" />
											<input type="text" name="mobile" onkeypress='validate(event)' placeholder="Mobile" required="required" />
											<input type="file" accept="image/*" name="picture" onchange="showMyImage(this)" required="required" />
											<label>Permission</label>
											<div class="permission">
												<span><label class="labeling">View</label><input class="checked" type="checkbox" name="permission[]" value="1" /></span><br/>
												<span><label class="labeling">Create</label><input class="checked" type="checkbox" name="permission[]" value="1" /></span><br/>
												<span><label class="labeling">Update</label><input class="checked" type="checkbox" name="permission[]" value="1" /></span><br/>
												<span><label class="labeling">Delete</label><input class="checked" type="checkbox" name="permission[]" value="1" /></span><br/>
											</div>
											<script type="text/javascript">
												function validate(evt) {
													var theEvent = evt || window.event;
												    var key = theEvent.keyCode || theEvent.which;

												    // 0-9, backspace, left and right arrows
												    var allowedKeyCodes = [48,49,50,51,52,53,54,55,56,57,8,37,39]; 

												    if(allowedKeyCodes.indexOf(key) === -1) {
												        theEvent.returnValue = false;
												        if(theEvent.preventDefault) theEvent.preventDefault();
												    }
												}
												function showMyImage(fileInput) {
											        var files = fileInput.files;
											        for (var i = 0; i < files.length; i++) {           
											            var file = files[i];
											            var imageType = /image.*/;     
											            if (!file.type.match(imageType)) {
											                continue;
											            }           
											            var img=document.getElementById("thumbnil");            
											            img.file = file;    
											            var reader = new FileReader();
											            reader.onload = (function(aImg) { 
											                return function(e) { 
											                    aImg.src = e.target.result; 
											                }; 
											            })(img);
											            reader.readAsDataURL(file);
											        }    
											    }
											</script>

											<input type="hidden" name="add_admin" value="c_admin" />
											<button name="add_user" type="submit" class="btn btn-default">Create Admin</button>
										</form>
									</div><!--/login form-->
								</div>
								<div class="col-sm-3 col-sm-offset-1">
									<img id="thumbnil" style="width:50%; margin-top:20px;"  src="" alt=""/>
								</div>
							</div>
						</div>					
					</div>
				</div>
		</section><!--/form-->
<?php require_once('includes/footer.php'); ?>