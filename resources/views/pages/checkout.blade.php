<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="cart for checkout">
    <title>Checkout | E-Shopper</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->


<body>

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> AhmedNabil@yahoo.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{route('home')}}"><img src="{{asset('frontend/images/home/logo.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="{{route('checkoutForm')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{route('showCart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if(Auth::check())
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-lock"></i>  Logout
                                    </a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{route('home')}}">Products</a></li>
                                    <li><a href="{{route('checkoutForm')}}">Checkout</a></li>
                                    <li><a href="{{route('showCart')}}" class="active">Cart</a></li>
                                    @if(Auth::check())
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="fa fa-lock"></i>  Logout
                                            </a></li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Login</a></li>
                                    @endif
                                </ul>
                            </li>
                            <li class="dropdown"><a href="{{route('blog')}}">Community<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li><a href="{{route('showForm')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Shipping Details</p>
                            <form method="post" action="{{route('shippingAndPayment')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-5 form-one">
                                        <label style="margin: 5px; margin-bottom: 10px; opacity: 0.7"> * (Indicates required)</label>
                                        <input class="form-one" type="text" name="company" placeholder="Company Name">
                                        <input type="email" name="email" placeholder="Email *" required>
                                        <input type="text" name="fname" placeholder="First Name *" required>
                                        <input type="text"  name="lname" placeholder="Last Name *" required>
                                        <input type="text"  name="address1" placeholder="Address 1 * ( In Details )" required>
                                        <input type="text"  name="address2" placeholder="Address 2 ( In Details )">
                                        <input type="text"  name="mobile_number" placeholder="Mobile Number * (Country code / number)" required>
                                        <select name="payment_method" required>
                                            <option selected> Select Payment Method</option>
                                            <option value="Master card"> Master Card</option>
                                            <option value="Visa"> Visa</option>
                                            <option value="Paypal"> Paypal</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-7 form-two form-one order-message">
                                        <p>Shipping Notes</p>
                                        <textarea name="notes"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                                        <input type="submit" value="Continue" class="btn btn-outline-primary">
                                    </div>
                                </div>
                            </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <tr>
                            <td class="cart_product">
                                <a href="{{route('viewProduct',['id'=>$product->product_id,'name'=>$product->name])}}"><img src="{{'storage/'.$product->image}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{route('viewProduct',['id'=>$product->product_id,'name'=>$product->name])}}">{{ucfirst($product->name)}}</a></h4>
                                <p>Web ID: {{$product->product_id}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{$product->price}} {{$product->currency}}</p>
                            </td>
                            <td class="cart_quantity">
                                <h4>{{$product->requestQuantity}}</h4>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$product->cost}} {{$product->currency}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{route('deleteProductFromCart',$product->id)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif

                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2">
                        <table class="table table-condensed total-result">
                            <tr>
                                <td>Cart Sub Total</td>
                                <td>{{$total}}</td>
                            </tr>
                            <tr>
                                <td>Exo Tax</td>
                                <td>1$</td>
                            </tr>
                            <tr class="shipping-cost">
                                <td>Shipping Cost</td>
                                <td>3$</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><span>{{$total + 1 + 3}}</span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <p>
                            <div class="iframe-img">
                                <img src="{{asset('frontend/images/home/iframe1.png')}}" alt="" />
                            </div>
                            <div class="overlay-icon">
                                <i class="fa fa-play-circle-o"></i>
                            </div>
                            </p>
                            <p>Circle of Hands</p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <p>
                            <div class="iframe-img">
                                <img src="{{asset('frontend/images/home/iframe2.png')}}" alt="" />
                            </div>
                            <div class="overlay-icon">
                                <i class="fa fa-play-circle-o"></i>
                            </div>
                            </p>
                            <p>Powering Search</p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <p>
                            <div class="iframe-img">
                                <img src="{{asset('frontend/images/home/iframe3.png')}}" alt="" />
                            </div>
                            <div class="overlay-icon">
                                <i class="fa fa-play-circle-o"></i>
                            </div>
                            </p>
                            <p>Ultimate Place</p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <p>
                            <div class="iframe-img">
                                <img src="{{asset('frontend/images/home/iframe4.png')}} " alt="" />
                            </div>
                            <div class="overlay-icon">
                                <i class="fa fa-play-circle-o"></i>
                            </div>
                            </p>
                            <p>Control Needs</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="{{asset('frontend/images/home/map.png')}}" alt="" />
                        <p>5005, Egypt | Cairo branch</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Online Help</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Terms of Use</a></li>
                            <li><a href="">Billing System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Company Information</a></li>
                            <li><a href="">Store Location</a></li>
                            <li><a href="">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2019 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Developed by <span><a target="_blank" href="#">Ahmed Nabil</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>