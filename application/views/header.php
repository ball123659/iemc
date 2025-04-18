<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<meta charset="utf-8" />
		<title>POMS Backend</title>
		<meta name="description" content="Static table examples" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<!--end::Fonts-->
        <!--begin::Page Vendors Styles(used by this page)-->
		<link href="<?=base_url();?>dist/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?=base_url();?>dist/assets/plugins/global/plugins.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<link href="<?=base_url();?>dist/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<link href="<?=base_url();?>dist/assets/css/style.bundle.css?v=7.0.5" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="<?=base_url();?>dist/image/poms.png" />

    <script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?=base_url();?>dist/assets/plugins/global/plugins.bundle.js?v=7.0.5"></script>
    <script src="<?=base_url();?>dist/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5"></script>
    <script src="<?=base_url();?>dist/assets/js/scripts.bundle.js?v=7.0.5"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
	<script src="<?=base_url();?>dist/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5"></script>
	<script src="<?=base_url();?>dist/assets/js/pages/features/miscellaneous/sweetalert2.js?v=7.0.5"></script>
	<script src="<?=base_url();?>dist/assets/js/pages/crud/datatables/extensions/responsive.js?v=7.0.5"></script>
	<!--end::Page Vendors-->

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
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile">
			<!--begin::Logo-->
			<a href="<?php echo base_url('home');?>">
				<img alt="Logo" src="<?=base_url();?>dist/assets/media/logos/logo-letter-1.png" class="logo-default max-h-30px" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:<?=base_url();?>dist/assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container d-flex align-items-stretch justify-content-between">
                            <!--begin::Left-->
                            <div class="d-flex align-items-stretch mr-3">
								<!--begin::Header Logo-->
								<div class="header-logo">
									<a href="<?php echo base_url('backend/dashboard');?>">
										<img alt="Logo" src="<?=base_url();?>dist/image/poms.png" class="logo-default max-h-40px" />
										<img alt="Logo" src="<?=base_url();?>dist/image/poms.png" class="logo-sticky max-h-40px" />
									</a>
								</div>
								<!--end::Header Logo-->
								<!--begin::Header Menu Wrapper-->
								<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
									<!--begin::Header Menu-->
									<div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
										<!--begin::Header Nav-->
										<ul class="menu-nav">
											<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
												<a href="<?php echo base_url('backend/dashboard');?>" class="menu-link">
													<span class="menu-text">Dashboard</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">Report</span>
													<span class="menu-desc"></span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">
                                                        <li class="menu-item" aria-haspopup="true">
															<a href="<?php echo base_url('backend/report');?>" class="menu-link">
																<i class="menu-bullet menu-bullet-line">
																	<span></span>
																</i>
																<span class="menu-text">Historical Report</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
                                        <?php if($_SESSION['role'] == 0){ ?>
											<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">Station</span>
													<span class="menu-desc"></span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">
                                                        <li class="menu-item" aria-haspopup="true">
															<a href="<?php echo base_url('backend/mngStation');?>" class="menu-link">
																<i class="menu-bullet menu-bullet-line">
																	<span></span>
																</i>
																<span class="menu-text">Manage Station</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">User</span>
													<span class="menu-desc"></span>
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">
                                                        <li class="menu-item" aria-haspopup="true">
															<a href="<?php echo base_url('backend/mngUser');?>" class="menu-link">
																<i class="menu-bullet menu-bullet-line">
																	<span></span>
																</i>
																<span class="menu-text">Manage User</span>
															</a>
														</li>
													</ul>
												</div>
											</li>
                                        <?php } ?>
										</ul>
										<!--end::Header Nav-->
									</div>
									<!--end::Header Menu-->
								</div>
								<!--end::Header Menu Wrapper-->
							</div>
							<!--end::Left-->
                            <!--begin::Topbar-->
							<div class="topbar">
								<!--begin::User-->
								<div class="dropdown">
									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
										<div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">
											<span class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1"><?=$_SESSION['email'];?></span>
											<span class="symbol symbol-35">
												<span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30"><?php echo strtoupper(substr($_SESSION['email'],0,1)); ?></span>
											</span>
                                            &nbsp;
                                            <button class="btn btn-light-danger font-weight-bold" id="logoutBtn">Sign Out</a>
                                        </div>
									</div>
									<!--end::Toggle-->
								</div>
								<!--end::User-->
							</div>
							<!--end::Topbar-->
                        </div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    $("#logoutBtn").click(function(){
        $.ajax({
			type:"post",
			url: base_url+"Ajaxs/function_process",
			data:{
				process:'logout'
			},
			dataType: "JSON",
			success:function(response)
			{
				if(response['process_status'] == 1)
				{
					window.location = base_url+"backend/login";
				}
			}
		});
    });
</script>
