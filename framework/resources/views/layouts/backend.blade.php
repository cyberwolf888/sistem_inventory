<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name') }}</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

		<!--end::Fonts -->

		<!--begin::Page Vendors Styles(used by this page) -->
		@stack('vendor_css')
		<!--end::Page Vendors Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ asset('/') }}plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}css/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		@stack('page_css')
		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{ asset('/') }}media/logos/favicon.ico" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body style="background-image: url({{ asset('/') }}media/demos/demo4/header.jpg); background-position: center top; background-size: 100% 350px;" class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

		<!-- begin::Page loader -->

		<!-- end::Page Loader -->

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index&demo=demo4.html">
					<img alt="Logo" src="{{ asset('/') }}media/logos/logo-4-sm.png" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
						<div class="kt-container ">

							<!-- begin:: Brand -->
							<div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
								<a class="kt-header__brand-logo" href="?page=index&demo=demo4">
									<img alt="Logo" src="{{ asset('/') }}media/logos/logo-4.png" class="kt-header__brand-logo-default" />
									<img alt="Logo" src="{{ asset('/') }}media/logos/logo-4-sm.png" class="kt-header__brand-logo-sticky" />
								</a>
							</div>

							<!-- end:: Brand -->

							<!-- begin: Header Menu -->
							@include('layouts.menu')
							<!-- end: Header Menu -->

							<!-- begin:: Header Topbar -->
							<div class="kt-header__topbar kt-grid__item">
								<!--begin: User bar -->
								<div class="kt-header__topbar-item kt-header__topbar-item--user">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-welcome">Hi,</span>
										<span class="kt-header__topbar-username">{{ Auth::user()->name }}</span>
										<span class="kt-header__topbar-icon"><b>{{ substr(Auth::user()->name,0,1) }}</b></span>
										<img alt="Pic" src="{{ asset('/') }}media/users/300_21.jpg" class="kt-hidden" />
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

										<!--begin: Head -->
										<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ asset('/') }}media/misc/bg-1.jpg)">
											<div class="kt-user-card__avatar">
												<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{ substr(Auth::user()->name,0,1) }}</span>
											</div>
											<div class="kt-user-card__name">
												{{ Auth::user()->name }}
											</div>
										</div>

										<!--end: Head -->

										<!--begin: Navigation -->
										<div class="kt-notification">
											<a href="#" class="kt-notification__item">
												<div class="kt-notification__item-icon">
													<i class="flaticon2-calendar-3 kt-font-success"></i>
												</div>
												<div class="kt-notification__item-details">
													<div class="kt-notification__item-title kt-font-bold">
														My Profile
													</div>
													<div class="kt-notification__item-time">
														Account settings and more
													</div>
												</div>
											</a>
											
											<div class="kt-notification__custom kt-space-between">
												<a href="{{ route('logout') }}" class="btn btn-label btn-label-brand btn-sm btn-bold" onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">Sign Out</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
												</form>
											</div>
										</div>

										<!--end: Navigation -->
									</div>
								</div>

								<!--end: User bar -->
							</div>

							<!-- end:: Header Topbar -->
						</div>
					</div>

					<!-- end:: Header -->
					<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
						<div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

							@yield('content')

						</div>
					</div>

					<!-- begin:: Footer -->
					<div class="kt-footer  kt-footer--extended  kt-grid__item" id="kt_footer" style="background-image: url('{{ asset('/') }}media/bg/bg-2.jpg');">
						<div class="kt-footer__bottom">
							<div class="kt-container ">
								<div class="kt-footer__wrapper">
									<div class="kt-footer__logo">
										<a class="kt-header__brand-logo" href="#">
											<img alt="Logo" src="{{ asset('/') }}media/logos/logo-4-sm.png" class="kt-header__brand-logo-sticky">
										</a>
										<div class="kt-footer__copyright">
											{{ date('Y') }}&nbsp;&copy;&nbsp;
											<a href="#" target="_blank">Kontoloyo</a>
										</div>
									</div>
									<div class="kt-footer__menu">
										<a href="#" target="_blank">Team</a>
										<a href="#" target="_blank">Contact</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#366cf3",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="{{ asset('/') }}plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="{{ asset('/') }}js/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
		@stack('vendor_script')
		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		@stack('page_script')
		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>