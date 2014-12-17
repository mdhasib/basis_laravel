	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2 style="margin-top: -40px !important;">group-<span>e</span></h2>
						</div>
					</div>
					<div class="col-sm-10">
						<div class="single-widget">
						<h2></h2>
							<form action="#" class="searchform" style="float:right;">
								<label>Subscribe Here...</label>
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2014 E-Group Inc. All rights reserved.</p>
					<p class="pull-right">Designed & Developed by <span><a target="_blank" href="index.php">E-Group</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	
    <script src="assets/js/jquery.js"></script>
    <script type="text/javascript">
    	$(function () {
		    $("#generator").click(function (e) {
		        // stop form submission first
		        e.preventDefault();
		        $.get("../lib/check.php?getPass=Getpass", function(data) {
		            $("#show_pass").css( 'display', 'inline-block', 'important' );
		            $("#show_pass" ).html(data+' <span id="copy">Copy Password</span>');
		            $("#password" ).val(data);
		            $("#copy_pass").addClass("copy_pass");
		        });
		    });
		});

		function errorHandler(jqXHR, exception) {
		    if (jqXHR.status === 0) {
		        alert('Not connect.\n Verify Network.');
		    } else if (jqXHR.status == 404) {
		        alert('Requested page not found. [404]');
		    } else if (jqXHR.status == 500) {
		        alert('Internal Server Error [500].');
		    } else if (exception === 'parsererror') {
		        alert('Requested JSON parse failed.');
		    } else if (exception === 'timeout') {
		        alert('Time out error.');
		    } else if (exception === 'abort') {
		        alert('Ajax request aborted.');
		    } else {
		        alert('Uncaught Error.\n' + jqXHR.responseText);
		    }
		}
    </script>
	<script src="assets/js/price-range.js"></script>
	<script src="assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>