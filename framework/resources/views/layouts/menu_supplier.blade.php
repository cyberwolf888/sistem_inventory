					<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
							<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
								<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
									<ul class="kt-menu__nav ">


										<!-- START MENU DASHBOARD -->
										<li class="kt-menu__item @if (Str::is('*.dashboard', Route::currentRouteName())) kt-menu__item--open @endif">
											<a href="{{ route('supplier.dashboard') }}" class="kt-menu__link"><span class="kt-menu__link-text">Dashboard</span></a>
										</li>

                                        <!-- START MENU RETUR -->
                                        <li class="kt-menu__item @if (Str::is('*.pemesanan.*', Route::currentRouteName())) kt-menu__item--open @endif">
                                            <a href="{{ route('supplier.pemesanan.manage') }}" class="kt-menu__link"><span class="kt-menu__link-text">Pemesanan</span></a>
                                        </li>
                                        <!-- END MENU RETUR -->

                                        <!-- START MENU RETUR -->
                                        <li class="kt-menu__item @if (Str::is('*.retur.*', Route::currentRouteName())) kt-menu__item--open @endif">
                                            <a href="{{ route('backend.retur.manage') }}" class="kt-menu__link"><span class="kt-menu__link-text">Retur</span></a>
                                        </li>
                                        <!-- END MENU RETUR -->


									</ul>
								</div>
							</div>
