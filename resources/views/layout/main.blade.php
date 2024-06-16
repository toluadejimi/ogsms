<!doctype html>
<html lang="en"><!-- [Head] start -->
<head><title>OGSMSPOOL</title><!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="OGSMSPOOL NUMBER VERIFICATION">
    <meta name="keywords"
          content="OGSMSPOOL VERIFICATION">
    <meta name="author" content="Phoenixcoded"><!-- [Favicon] icon -->
    <link rel="icon" href="{{url('')}}/public/assets/images/favicon.svg" type="image/x-icon"><!-- [Font] Family -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/inter/inter.css" id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/tabler-icons.min.css">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/feather.css">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/fontawesome.css">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/material.css"><!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="{{url('')}}/public/assets/css/style-preset.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>


</head><!-- [Head] end --><!-- [Body] Start -->
<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
      data-pc-theme_contrast="" data-pc-theme="light"><!-- [ Pre-loader ] start -->
<div class="page-loader">
    <div class="bar"></div>
</div><!-- [ Pre-loader ] End --><!-- [ Sidebar Menu ] start -->

<header
    id="home"
    style="background-image: url({{url('')}}/public/assets/images/landing/img-headerbg.jpg)"
>
    <!-- [ Nav ] start --><!-- [ Nav ] start -->
    <nav class="navbar navbar-expand-md navbar-light default">
        <div class="container">
            <a class="navbar-brand" href="/"
            ><img src="{{url('')}}/public/assets/images/logo.svg" alt="logo"/> </a >

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="us">Home
                        </a>
                    </li>


                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="fund-wallet" >Fund Wallet</a >
                    </li>

                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="orders" >My Orders</a >
                    </li>

                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="https://api.whatsapp.com/send?phone=2349047123389" >Support</a >
                    </li>

                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="https://ogbetterboost.com/" > 🚀 Boost social account</a >
                    </li>

                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="https://myoglog.com/" > 🛍️ Buy Account</a >
                    </li>






                    <li class="nav-item px-1">
                        <a class="nav-link text-danger" href="log-out">Log Out</a>
                    </li>





                </ul>
            </div>




            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

                    <li class="nav-item">
                        <a
                            style="background: rgb(63,63,63); color: white"
                            class="btn btn btn-buy"
                            target="_blank"
                            href="fund-wallet"><i class="ti ti-wallet"></i
                            >NGN {{number_format(Auth::user()->wallet, 2)}} </a>
                    </li>
                </ul>
            </div>



            <button
                style="background: rgb(63,63,63); color: white"
                class="navbar-toggler rounded"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>


        </div>
    </nav>
    <!-- [ Nav ] start --><!-- [ Nav ] start -->

</header>


@yield('content')


<footer class="footer">
    <p class="d-flex justify-content-center">2024 OGSMSPOOL</p>
</footer>


<!-- Required Js -->
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/popper.min.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/simplebar.min.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{url('')}}/public/assets/js/fonts/custom-font.js"></script>
<script src="{{url('')}}/public/assets/js/pcoded.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/feather.min.js"></script>
<script>layout_change('false');</script>
<script>layout_theme_contrast_change('false');</script>
<script>change_box_container('false');</script>
<script>layout_caption_change('true');</script>
<script>layout_rtl_change('false');</script>
<script>preset_change('preset-4');</script>
<script>main_layout_change('vertical');</script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<style>
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color:#25d366;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        font-size:30px;
        box-shadow: 2px 2px 3px #999;
        z-index:100;
    }

    .my-float{
        margin-top:16px;
    }


    .twitter {
        font: normal normal 10px Arial;
        text-align: center;
        color: #998578;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    .twitter {
        color: #000000;
        text-decoration: none;
        display: block;
        padding: 14px;
        -webkit-transition: all .25s ease;
        -moz-transition: all .25s ease;
        -ms-transition: all .25s ease;
        -o-transition: all .25s ease;
        transition: all .25s ease;
    }

    .twitter :hover {
        color: #FF7D6D;
        text-decoration: none;
    }

    /* Floating Social Media Bar Style Starts Here */

    .fl-fl {
        background: #000000;
        text-transform: uppercase;
        letter-spacing: 3px;
        padding: 4px;
        width: 190px;
        position: fixed;
        right: -145px;
        z-index: 1000;
        font: normal normal 10px Arial;
        -webkit-transition: all .25s ease;
        -moz-transition: all .25s ease;
        -ms-transition: all .25s ease;
        -o-transition: all .25s ease;
        transition: all .25s ease;
    }

    .s-fab {
        font-size: 20px;
        color: #fff;
        padding: 10px 0;
        width: 40px;
        margin-left: 10px;
    }

    .fl-fl:hover {
        right: 0;
    }

    .fl-fl a {
        color: #fff !important;
        text-decoration: none;
        text-align: center;
        line-height: 43px!important;
        vertical-align: top!important;
    }

    .float-fb {
        top: 160px;
    }

    .float-tw {
        top: 215px;
    }

    .float-gp {
        top: 270px;
    }

    .float-rs {
        top: 325px;
    }

    .float-ig {
        top: 380px;
    }

    .float-pn {
        top: 435px;
    }
    /* Floating Social Media Bar Style Ends Here */


    /* Follow us DropDown Starts */

    .btn-clr {
        /*   background: linear-gradient(90deg, rgba(2,0,36,0) 0%, rgba(10,221,8,0.9307073171065301) 0%, rgba(8,220,50,0.9251050762101716) 39%, rgba(6,218,99,0.9251050762101716) 73%, rgba(4,216,156,0.9335084375547094) 100%, rgba(0,212,255,0) 100%); */
        color : #ffffff;
        font : 900 16px/20px 'Lato' sans serif;
    }

    .btn-clr>button:hover{
        background-color: #000000;
        color : #0add08 ;
    }

    .dropdown-menu>li>a:hover,
    .dropdown-menu>li>a:focus{
        background-color: none!important;
    }
    .tb, .tb2, .tb3, .tb4{
        display:flex;
    }

    .tb, .tb2,.tb3{
        border-bottom: 3px solid white;
    }

    .sb {
        padding:10px 0;
        color:white
    }

    .sb-fb{
        padding-right : 3px;
    }
    .tb-sb-fb{
        background-color: #3b5998;
        border-right: 3px solid white;
    }
    .sb-tw {
        padding-right : 3px;
    }
    .tb-sb-tw{
        background-color: #1da1f2;
        border-right: 3px solid white;
    }
    .tb4-sb-rss{
        background-color: #ee802f;
        border-right: 3px solid white;
    }
    .sb-tg{
        padding-right :2px;
    }
    .tb2-sb-tg{
        background-color: #0088cc;
    }

    .sb-in{
        padding-right :1.5px;
    }
    .tb-sb-in{
        background-color: #0a66c2;
    }
    .tb2-sb-ig{
        background: #f09433;
        background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
        background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );
        border-right: 3px solid white;
    }
    .sb-tk{
        padding-right : 0.5px;
    }
    .tb3-sb-tk{
        background-color: #000;
        border-right: 3px solid white;
    }
    .tb2-sb-yt{
        background-color: #ff0000;
        border-right: 3px solid white;
    }

    .tb3-sb-med{
        background-color: #02b875;
    }
    .sb-whapp{
        padding-right : 3.5px;
    }
    .tb3-sb-whapp{
        background-color: #25d366;
        border-right: 3px solid white;
    }
    /* DropDown Ends */

    /* Tiktok Logo */
    .tiktok{
        position: relative;
        width: 200px;
        margin: 100px auto;
    }

    .logo {
        position: absolute;
        top: 0;
        left: 0;
        width: 47px;
        height: 218px;
        z-index: 1;
        background: #24f6f0;
    }

      .logo::after {
          font-family:'FontAwesome';
          content: "e07b";
          position: absolute;
          width: 140px;
          height: 140px;
          border: 40px solid #24f6f0;
          border-right: 40px solid transparent;
          border-top: 40px solid transparent;
          border-left: 40px solid transparent;
          top: -110px;
          right: -183px;
          border-radius: 100%;
          transform: rotate(45deg);
          z-index: -10;
      }

      .logo::before {
          content: "e07b";
          position: absolute;
          width: 100px;
          height: 100px;
          border: 47px solid #24f6f0;
          border-top: 47px solid transparent;
          border-radius: 50%;
          top: 121px;
          left: -147px;
          transform: rotate(45deg);
      }

    .logo:last-child {
        left: 10px;
        top: 10px;
        background: #fe2d52;
        z-index: 100;
    }

      .logo:last-child::before {
          border: 47px solid #fe2d52;
          border-top: 47px solid transparent;
      }
    .logo:last-child::after {
        border: 40px solid #fe2d52;
        border-right: 40px solid transparent;
        border-top: 40px solid transparent;
        border-left: 40px solid transparent;
    }


    .logo:last-child {
        mix-blend-mode: lighten;
    }
</style>


<div class="float-sm">
    <div class="fl-fl float-fb">
        <i class="fa fa-whatsapp my-float"></i>
        <a href="https://api.whatsapp.com/send?phone=2349047123389" target="_blank">Whatsapp</a>
    </div>
    <div class="fl-fl float-tw">
        <i class="fab fa-telegram-plane"></i>
        <a href="https://t.me/ogsmspool" target="_blank">Telegram</a>
    </div>
{{--    <div class="fl-fl float-gp">--}}
{{--        <i class="fab fa-google-plus-g s-fab"></i>--}}
{{--        <a href="" target="_blank">Recommend us!</a>--}}
{{--    </div>--}}
{{--    <div class="fl-fl float-rs">--}}
{{--        <i class="fas fa-rss s-fab"></i>--}}
{{--        <a href="" target="_blank">Follow via RSS</a>--}}
{{--    </div>--}}
{{--    <div class="fl-fl float-ig">--}}
{{--        <i class="fab fa-instagram s-fab"></i>--}}
{{--        <a href="" target="_blank">Follow us!</a>--}}
{{--    </div>--}}
{{--    <div class="fl-fl float-pn">--}}
{{--        <i class="fab fa-pinterest-p s-fab"></i>--}}
{{--        <a href="" target="_blank">Follow us!</a>--}}
{{--    </div>--}}
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=2349047123389" class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>




</body>
<!-- [Body] end -->
</html>
