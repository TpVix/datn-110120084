<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 May 2024 19:04:53 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Porto - Bootstrap eCommerce Template</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">
    <script src="https://kit.fontawesome.com/f2ab765498.js" crossorigin="anonymous"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css?hash=132456789blahblahblah"
        rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/frontend/assets/images/icons/favicon.png') }}">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800',
                    'Oswald:300,400,500,600,700,800'
                ]
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = "{{ asset('public/frontend/assets/js/webfont.js') }}";
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('public/frontend/assets/css/style.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/frontend/assets/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/frontend/assets/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/demo4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/frontend/assets/vendor/fontawesome-free/css/all.min.css') }}">
</head>

<body>
    <div class="page-wrapper">
        <!-- End .top-notice -->

        <header class="header">
            <div class="header-top">
                <div class="container">

                    <!-- End .header-left -->

                    <div class="header-right header-dropdowns ml-0 ml-sm-auto w-sm-100">
                        <div class="header-dropdown dropdown-expanded d-none d-lg-block">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>
                                    <?php 
									$customer_id = Session::get('customer_id');
									if($customer_id == null){
								?>

                                    <li><a href="{{ URL::to('/login-register') }}"><i class="fa fa-sign-in"
                                                aria-hidden="true"></i> Đăng nhập</a></li>
                                    <?php
								}else {
								?>
                                    <li><a href="{{ URL::to('/logout') }}"><i class="fa fa-sign-in"
                                                aria-hidden="true"></i> Đăng xuất</a></li>
                                    <?php
								}
								?>

                                </ul>
                            </div>
                            <!-- End .header-menu -->
                        </div>
                        <!-- End .header-dropown -->


                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                            <a href="#" class="social-icon social-gplus icon-gplus" target="_blank"><i
                                    class="fab fa-google-plus-g"></i></a>

                        </div>
                        <!-- End .social-icons -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-top -->

            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler text-primary mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="{{ URL::to('/') }}" class="logo">
                            <img src="{{ asset('public/frontend/assets/images/logo.png') }}" width="111"
                                height="44" alt="Porto Logo">
                        </a>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right w-lg-max">
                        <div
                            class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <form id="searchForm"  autocomplete="off" method="get">
                             {{ csrf_field() }}
                                <div style="position: relative;margin-right:2.2rem;" class="header-search-wrapper">
                                    <input type="text" class="form-control" name="searched"  id="searched" placeholder="Nhập từ khoá cần tìm" >
                                    <button class="btn icon-magnifier p-0" title="Tìm kiếm" onclick="submitSearchForm()" type="button"></button>
                                    <div id="search_ajax" style="position: absolute; width:100%;margin-top:40px;"></div>
                                </div>
                            </form>
                        </div>
                        <!-- End .header-search -->




                        <?php 
							$customer_id = Session::get('customer_id');
							$customer_name = Session::get('customer_name');
						
							if($customer_id == null){
						?>
                        <a href="#" class="header-icon"><i class="icon-user-2"></i>Unknown</a>

                        <?php
						}else {
						?>
                        <a href="{{ URL::to('/my-account/' . $customer_id) }}" class="header-icon"><i
                                class="icon-user-2"></i>{{ $customer_name }}</a>
                        <?php
								}
								?>

                        <a href="{{ URL::to('/show-wishlist') }}" class="header-icon"><i
                                class="icon-wishlist-2"></i></a>

                        <div class="dropdown cart-dropdown">
                            <a href="#"class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                data-display="static">
                                <i class="minicart-icon"></i>
                                {{-- <span class="cart-count badge-circle">3</span> --}}
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>
                                <?php 
								$customer_id = Session::get('customer_id');
								if($customer_id == null){
								?>
                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Giỏ hàng</div>
                                    <!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products">
                                        <div class="product">

                                            <h4>Vui lòng đăng nhập để xem giỏ hàng</h4>


                                        </div>
                                        <!-- End .product -->


                                    </div>
                                    <!-- End .cart-product -->


                                    <!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{ URL::to('/login-register') }}"
                                            class="btn btn-gray btn-block view-cart">Đăng nhập</a>

                                    </div>
                                    <!-- End .dropdown-cart-total -->
                                </div>
                                <?php
									}else {
									?>

                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Giỏ hàng</div>
                                    <!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products">
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cart_detail as $key => $cart)
                                            @php

                                                $product = DB::table('tbl_product')
                                                    ->where('tbl_product.product_id', $cart->product_id)
                                                    ->get();
                                                foreach ($product as $slug => $pro_slug) {
                                                    Session::put('product_slug', $pro_slug->product_slug);

                                                    $product_slug = Session::get('product_slug');
                                                }
                                                $subtotal = $cart->product_price * $cart->product_quantity;
                                                $total += $subtotal;
                                            @endphp
                                            <div class="product">
                                                <div class="product-details">
                                                    <h4 class="product-title">
                                                        <a
                                                            href="{{ URL::to('/san-pham/' . $product_slug) }}">{{ $cart->product_name }}</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                        <span
                                                            class="cart-product-qty">{{ $cart->product_quantity }}</span>
                                                        × {{ number_format($cart->product_price, 0, ',', '.') }}đ
                                                    </span>
                                                </div>
                                                <!-- End .product-details -->

                                                <figure class="product-image-container">
                                                    <a href="{{ URL::to('/san-pham/' . $product_slug) }}"
                                                        class="product-image">
                                                        <img src="{{ asset('public/upload/' . $cart->product_image) }}"
                                                            alt="product" width="80" height="80">
                                                    </a>

                                                    <a href="{{ URL::to('/delete-cart/' . $cart->product_id) }}"
                                                        class="btn-remove" title="Remove Product"><span>×</span></a>
                                                </figure>
                                            </div>
                                        @endforeach
                                        <!-- End .product -->


                                    </div>
                                    <!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>Tổng:</span>

                                        <span
                                            class="cart-total-price float-right">{{ number_format($total, 0, ',', '.') }}đ</span>
                                    </div>
                                    <!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{ URL::to('/show-cart') }}"
                                            class="btn btn-gray btn-block view-cart">Xem giỏ hàng</a>

                                    </div>
                                    <!-- End .dropdown-cart-total -->
                                </div>

                                <?php
									}
									?>

                                <!-- End .dropdownmenu-wrapper -->
                            </div>
                            <!-- End .dropdown-menu -->
                        </div>
                        <!-- End .dropdown -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->

            <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
                <div class="container">
                    <nav class="main-nav w-100">
                        <ul class="menu">
                            <li class="">
                                <a href="{{ URL::to('/') }}">Trang chủ</a>
                            </li>
                            <li>
                                <a href="#">Danh mục</a>
                                <ul>
									@foreach ($category as $key => $category1)
                            
									<li>
                                      
                                            <a href="{{URL::to('/danh-muc/'.$category1-> category_slug)}}">{{($category1 -> category_name)}}</a> 
                                       
                                        
                                        
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="#">Thương hiệu</a>
                                <ul>
                                    @foreach ($brand as $key => $brand)
                                        <li><a
                                                href="{{ URL::to('/thuong-hieu/' . $brand->brand_slug) }}">{{ $brand->brand_name }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-bottom -->
        </header>
        <!-- End .header -->
        <main class="main">
            <div class="page-header">
                <div class="container d-flex flex-column align-items-center">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <div class="container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Trang chủ</a></li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    Thông tin tài khoản
                                </li>
                            </ol>
                        </div>
                    </nav>

                    <h1>Thông tin tài khoản</h1>
                </div>
            </div>

            <div class="container account-container custom-account-container">
                <div class="row">
                    <div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
                        <h2 class="text-uppercase">Thông tin tài khoản</h2>
                        <ul class="nav nav-tabs list flex-column mb-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="dashboard-tab"
                                    href="{{ URL::to('/my-account/' . $customer_id) }}" role="tab"
                                    aria-controls="dashboard" aria-selected="true">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="order-tab" href="{{ URL::to('/history-order') }}"
                                    role="tab" aria-controls="order" aria-selected="true">Đơn hàng</a>
                            </li>



                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" href="{{ URL::to('/dia-chi') }}"
                                    role="tab" aria-selected="true" aria-controls="address">Địa chỉ</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="edit-tab"
                                    href="{{ URL::to('/account-detail/' . $customer_id) }}" role="tab"
                                    aria-controls="edit" aria-selected="false">Thông tin tài khoản</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" id="shop-address-tab" href="{{ URL::to('/add-address') }}"
                                    role="tab" aria-controls="edit" aria-selected="false">Thêm địa chỉ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL::to('/show-wishlist') }}">Yêu thích</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL::to('/logout') }}">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 order-lg-last order-1 tab-content">
                        @yield('content')

                    </div><!-- End .tab-content -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->
        <footer class="footer bg-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="contact-info">
                                    <li>
                                        <span class="contact-info-label">Address:</span>123 Street Name, City, England
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Phone:</span><a href="tel:">(123)
                                            456-7890</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a
                                            href="https://portotheme.com/cdn-cgi/l/email-protection#6d000c04012d08150c001d0108430e0200"><span
                                                class="__cf_email__"
                                                data-cfemail="6c010d05002c09140d011c0009420f0301">[email&#160;protected]</span></a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Working Days/Hours:</span> Mon - Sun / 9:00 AM
                                        - 8:00 PM
                                    </li>
                                </ul>
                                <div class="social-icons">
                                    <a href="#" class="social-icon social-facebook icon-facebook"
                                        target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                        title="Twitter"></a>
                                    <a href="#" class="social-icon social-instagram icon-instagram"
                                        target="_blank" title="Instagram"></a>
                                </div>
                                <!-- End .social-icons -->
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>

                                <ul class="links">
                                    <li><a href="#">Help & FAQs</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Shipping & Delivery</a></li>
                                    <li><a href="#">Orders History</a></li>
                                    <li><a href="#">Advanced Search</a></li>
                                    <li><a href="dashboard.html">My Account</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="#">Corporate Sales</a></li>
                                    <li><a href="#">Privacy</a></li>
                                </ul>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Popular Tags</h4>

                                <div class="tagcloud">
                                    <a href="#">Bag</a>
                                    <a href="#">Black</a>
                                    <a href="#">Blue</a>
                                    <a href="#">Clothes</a>
                                    <a href="#">Fashion</a>
                                    <a href="#">Hub</a>
                                    <a href="#">Shirt</a>
                                    <a href="#">Shoes</a>
                                    <a href="#">Skirt</a>
                                    <a href="#">Sports</a>
                                    <a href="#">Sweater</a>
                                </div>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget widget-newsletter">
                                <h4 class="widget-title">Subscribe newsletter</h4>
                                <p>Get all the latest information on events, sales and offers. Sign up for newsletter:
                                </p>
                                <form action="#" class="mb-0">
                                    <input type="email" class="form-control m-b-3" placeholder="Email address"
                                        required>

                                    <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                                </form>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom">
                    <div class="container d-sm-flex align-items-center">
                        <div class="footer-left">
                            <span class="footer-copyright">© Porto eCommerce. 2021. All Rights Reserved</span>
                        </div>

                        <div class="footer-right ml-auto mt-1 mt-sm-0">
                            <div class="payment-icons">
                                <span class="payment-icon visa"
                                    style="background-image: url({{ asset('public/frontend/assets/images/payments/payment-visa.svg') }})"></span>
                                <span class="payment-icon paypal"
                                    style="background-image: url({{ asset('public/frontend/assets/images/payments/payment-paypal.svg') }})"></span>
                                <span class="payment-icon stripe"
                                    style="background-image: url({{ asset('public/frontend/assets/images/payments/payment-stripe.png') }})"></span>
                                <span class="payment-icon verisign"
                                    style="background-image:  url({{ asset('public/frontend/assets/images/payments/payment-verisign.svg') }})"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .footer-bottom -->
            </div>
            <!-- End .container -->
        </footer>
        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="demo4.html">Home</a></li>
                    <li>
                        <a href="#">Danh mục</a>
                        <ul>
                            <li><a href="category.html">Full Width Banner</a></li>
                            <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                            <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                            <li><a href="https://www.portotheme.com/html/porto_ecommerce/category-sidebar-left.html">Left
                                    Sidebar</a></li>
                            <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                            <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                            <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                            <li><a href="#">List Types</a></li>
                            <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span
                                        class="tip tip-new">New</span></a></li>
                            <li><a href="category.html">3 Columns Products</a></li>
                            <li><a href="category-4col.html">4 Columns Products</a></li>
                            <li><a href="category-5col.html">5 Columns Products</a></li>
                            <li><a href="category-6col.html">6 Columns Products</a></li>
                            <li><a href="category-7col.html">7 Columns Products</a></li>
                            <li><a href="category-8col.html">8 Columns Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="product.html">Products</a>
                        <ul>
                            <li>
                                <a href="#" class="nolink">PRODUCT PAGES</a>
                                <ul>
                                    <li><a href="product.html">SIMPLE PRODUCT</a></li>
                                    <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                                    <li><a href="product.html">SALE PRODUCT</a></li>
                                    <li><a href="product.html">FEATURED & ON SALE</a></li>
                                    <li><a href="product-sticky-info.html">WIDTH CUSTOM TAB</a></li>
                                    <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                    <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                    <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                <ul>
                                    <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                                    <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                                    <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                                    <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                                    <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                                    <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a></li>
                                    <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                                    <li><a href="#">BUILD YOUR OWN</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                        <ul>
                            <li>
                                <a href="wishlist.html">Wishlist</a>
                            </li>
                            <li>
                                <a href="cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="forgot-password.html">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="#">Elements</a>
                        <ul class="custom-scrollbar">
                            <li><a href="element-accordions.html">Accordion</a></li>
                            <li><a href="element-alerts.html">Alerts</a></li>
                            <li><a href="element-animations.html">Animations</a></li>
                            <li><a href="element-banners.html">Banners</a></li>
                            <li><a href="element-buttons.html">Buttons</a></li>
                            <li><a href="element-call-to-action.html">Call to Action</a></li>
                            <li><a href="element-countdown.html">Count Down</a></li>
                            <li><a href="element-counters.html">Counters</a></li>
                            <li><a href="element-headings.html">Headings</a></li>
                            <li><a href="element-icons.html">Icons</a></li>
                            <li><a href="element-info-box.html">Info box</a></li>
                            <li><a href="element-posts.html">Posts</a></li>
                            <li><a href="element-products.html">Products</a></li>
                            <li><a href="element-product-categories.html">Product Categories</a></li>
                            <li><a href="element-tabs.html">Tabs</a></li>
                            <li><a href="element-testimonial.html">Testimonials</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="mobile-menu mt-2 mb-2">
                    <li class="border-0">
                        <a href="#">
                            Special Offer!
                        </a>
                    </li>
                    <li class="border-0">
                        <a href="#" target="_blank">
                            Buy Porto!
                            <span class="tip tip-hot">Hot</span>
                        </a>
                    </li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="wishlist.html">My Wishlist</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="login.html" class="login-link">Đăng nhập</a></li>
                </ul>
            </nav>
            <!-- End .mobile-nav -->

            <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div>
        <!-- End .mobile-menu-wrapper -->
    </div>
    <!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="demo4.html">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="category.html" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div>
    </div>

    <!-- <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url({{ asset('public/frontend/assets/images/newsletter_popup_bg.jpg') }})">
<div class="newsletter-popup-content">
 <img src="public/backend/assets/images/logo.png" width="111" height="44" alt="Logo" class="logo-newsletter">
 <h2>Subscribe to newsletter</h2>

 <p>
  Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.
 </p>

 <form action="#">
  <div class="input-group">
   <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
   <input type="submit" class="btn btn-primary" value="Submit" />
  </div>
 </form>
 <div class="newsletter-subscribe">
  <div class="custom-control custom-checkbox">
   <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
   <label for="show-again" class="custom-control-label">
    Don't show this popup again
   </label>
  </div>
 </div>
</div>


<button title="Close (Esc)" type="button" class="mfp-close">
 ×
</button>
</div> -->
    <!-- End .newsletter-popup -->
   
    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script data-cfasync="false"
        src="{{ asset('public/frontend/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/optional/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/sweetalert.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('public/frontend/assets/js/main.min.js') }}"></script>
    <!-- This site is converting visitors into subscribers and customers with https://respond.io -->
    <script>
        window.embeddedChatbotConfig = {
        chatbotId: "pUMWodtrWZENwkpa8EmBt",
        domain: "www.chatbase.co"
        }
        </script>
        <script
        src="https://www.chatbase.co/embed.min.js"
        chatbotId="pUMWodtrWZENwkpa8EmBt"
        domain="www.chatbase.co"
        defer>
        </script>
    <script>
        function submitSearchForm() {
            var searched = document.getElementById('searched').value;
            
            var url = '{{ url("/tim-kiem") }}/' + encodeURIComponent(searched);

            document.getElementById('searchForm').action = url;
            document.getElementById('searchForm').submit();
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#searched').keyup(function(){
                var query = $(this).val();
                if(query!=''){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{url('/autocomplete-search')}}",
                        method:"POST",
                        data:{query:query,_token:_token},
                        success:function(data){
                            $('#search_ajax').fadeIn();
                            $('#search_ajax').html(data);
                        }
    
                    });
                }else{
                    $('#search_ajax').fadeOut();
                }
            });
            
        });
    </script>
    <script type="text/javascript">
	var address_id = '{{ Session::get("address_id") }}'
        $('.update_address').click(function(){
            var city = $('.city').val();
            var district = $('.district').val();
            var ward = $('.ward').val();
            var address_name = $('.address_name').val();
            var address_phone = $('.address_phone').val();
            var _token = $('input[name="_token"]').val();
			

            $.ajax({
                url: '{{ url("/update-address") }}/' + address_id,
                method: 'POST',
                data: {
                    city: city,
                    district: district,
                    ward: ward,
                    address_name: address_name,
                    address_phone: address_phone,
                    _token: _token
                },
                success: function(data) {

                    alert('Sửa địa chỉ vận chuyển thành công');
                    window.location.href = '{{ URL::to('/dia-chi') }}';


                },
				error: function(xhr, status, error) {
                    console.error('Lỗi:', error);
                    console.error('Trạng thái:', status);
                    console.error('Phản hồi:', xhr.responseText);
                }
            })
        });
        $('.add_address').click(function() {
            var city = $('.city').val();
            var district = $('.district').val();
            var ward = $('.ward').val();
            var address_name = $('.address_name').val();
            var address_phone = $('.address_phone').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{ url('/save-address') }}',
                method: 'POST',
                data: {
                    city: city,
                    district: district,
                    ward: ward,
                    address_name: address_name,
                    address_phone: address_phone,
                    _token: _token
                },
                success: function(data) {

                    alert('Thêm địa chỉ vận chuyển thành công');
                    window.location.href = '{{ URL::to('/dia-chi') }}';


                }
            })

        });
        $('.chose').on('change', (function() {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if (action == 'city') {
                result = 'district';

            } else {
                result = 'ward';

            }
            $.ajax({
                url: '{{ url('/select-delivery') }}',
                method: 'POST',
                data: {
                    action: action,
                    ma_id: ma_id,
                    _token: _token
                },
                success: function(data) {

                    $('#' + result).html(data);

                }
            })
        }));
    </script>
</body>


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 May 2024 19:04:58 GMT -->

</html>
