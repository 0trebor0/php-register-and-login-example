<?php
if(!isset($title)){
	die("GET OUT OF HERE");
}
?>
<html>
	<!--HEAD------>
	<?php include "head.php";?>
	
	<!--HEAD-END-->
	<!--BODY------>
	<body>
		<div class="wrapper">
			<!---NAV------>
			<?php include "nav.php";?>
			
			<div class="content">
				<div class="content-post">
					<h1><?php echo $title;?></h1>
					<?php echo $content;?>
				</div>
			</div>
			
			<!---NAV-END----->
			<!----FOOTER----->
			<?php include "footer.php";?>
			
			<!----FOOTER-END-->
		</div>
		<script>
			function checkRegisterForm(){
				let username = document.forms['register']['username'].value;
				let email = document.forms['register']['email'].value;
				let password = document.forms['register']['password'].value;
				if(username == null || username ==''){
					document.getElementById('error').innerHTML = "<p style='color:red;'>Username Empty</p>";
					return false;
				}else if(email == null || email == ''){
					document.getElementById('error').innerHTML = "<p style='color:red;'>Email Empty</p>";
					return false;
				}else if(password == '' || password == null){
					document.getElementById('error').innerHTML = "<p style='color:red;'>Password Empty</p>";
					return false;
				}
			}
			function checkLoginForm(){
				let username = document.forms['login']['username'].value;
				let password = document.forms['login']['password'].value;
				if(username == null || username ==''){
					document.getElementById('error').innerHTML = "<p style='color:red;'>Username Empty</p>";
					return false;
				}else if(password == '' || password == null){
					document.getElementById('error').innerHTML = "<p style='color:red;'>Password Empty</p>";
					return false;
				}
			}
		</script>
	</body>
	<!--BODY-END-->
</html>