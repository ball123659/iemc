<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>POMS Backend</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="<?=base_url();?>dist/assets/css/pages/login/classic/login-5.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?=base_url();?>dist/assets/plugins/global/plugins.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<link href="<?=base_url();?>dist/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<link href="<?=base_url();?>dist/assets/css/style.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="<?=base_url();?>dist/image/poms.png" />

		<style>
		  body {
			font-family: Kanit !important;
		  }

		  button {
			  font-family: Kanit !important;
		  }

		  input {
			  font-family: Kanit !important;
		  }

		  select {
			  font-family: Kanit !important;
		  }
		  
		  .title{
			   height: 20px;
			}
		
		.background {
			position: relative;
		}
		
		.layer {
			background-color: rgba(0, 178, 124, 0.7);
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" style="background-image: url(<?=base_url();?>dist/assets/media/bg/bg-10.jpg)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(<?=base_url();?>dist/assets/media/bg/bg-2.jpg);">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="<?=base_url();?>dist/image/poms.png" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3 class="opacity-40 font-weight-normal">Sign In To POMS Backend</h3>
								<p class="opacity-40">Enter your details to login to your account:</p>
							</div>
							<div class="form-group">
								<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" id="email" autocomplete="off" />
							</div>
							<div class="form-group">
								<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" id="password" />
							</div>
							<div class="form-group text-center mt-10">
								<button id="loginBtn" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
							</div>
						</div>
						<!--end::Login Sign in form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="<?=base_url();?>dist/assets/plugins/global/plugins.bundle.js?v=7.0.5"></script>
		<script src="<?=base_url();?>dist/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5"></script>
		<script src="<?=base_url();?>dist/assets/js/scripts.bundle.js?v=7.0.5"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?=base_url();?>dist/assets/js/pages/custom/login/login-general.js?v=7.0.5"></script>
		<script src="<?=base_url();?>dist/assets/js/pages/features/miscellaneous/sweetalert2.js?v=7.0.5"></script>
		<!--end::Page Scripts-->

<script type="text/javascript">
	var base_url = '<?php echo base_url(); ?>';
		$("#loginBtn").click(function(){
			$.ajax({
				type:"post",
				url: base_url+"Ajaxs/function_process",
				data:{
					process:'login',
					email:$("#email").val(),
					password:$("#password").val()
				},
				dataType: "JSON",
				success:function(response)
				{
					console.log(response);
					if(response['process_status'] == 1)
					{
						window.location = base_url+"backend/dashboard";
					}
					else if(response['process_status'] == 2)
					{
						Swal.fire("Something Wrong!", "บัญชีผู้ใช้งานนี้ถูกปิดการใช้งาน", "error");
					}
					else if(response['process_status'] == 0)
					{
						Swal.fire("Something Wrong!", "E-mail/Password ไม่ถูกต้อง", "error");
					}
				}
			});
		});
</script>
	</body>
	<!--end::Body-->
</html>