<!DOCTYPE html>
<html lang="en">
<head>
    <title>OGSMSPOOL</title>
    <!-- [Meta] -->
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta
        name="description"
        content="OGSMSPOOL"
    />
    <meta
        name="keywords"
        content="OGSMSPOOL"
    />
    <meta name="author" content="OGSMSPOOL"/>
    <!-- [Favicon] icon -->
    <link rel="icon" href="{{url('')}}/public/assets/images/favicon.svg" type="image/x-icon"/>
    <!-- [Page specific CSS] start -->
    <link
        href="{{url('')}}/public/assets/css/plugins/animate.min.css"
        rel="stylesheet"
        type="text/css"
    />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/{{url('')}}/public/assets/owl.carousel.min.css"
        rel="stylesheet"
    />
    <!-- [Page specific CSS] end -->
    <!-- [Font] Family -->
    <link
        rel="stylesheet"
        href="{{url('')}}/public/assets/fonts/inter/inter.css"
        id="main-font-link"
    />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/tabler-icons.min.css"/>
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/feather.css"/>
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/fontawesome.css"/>
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/material.css"/>
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/css/style.css" id="main-style-link"/>
    <link rel="stylesheet" href="{{url('')}}/public/assets/css/style-preset.css"/>
    <script src="{{url('')}}/public/assets/js/tech-stack.js"></script>
    <link rel="stylesheet" href="{{url('')}}/public/assets/css/landing.css"/>
</head>
<body
    data-pc-preset="preset-1"
    data-pc-sidebar-caption="true"
    data-pc-direction="ltr"
    data-pc-theme_contrast=""
    data-pc-theme="light"
    class="landing-page"
>
<!-- [ Pre-loader ] start -->
<div class="page-loader">
    <div class="bar"></div>
</div>
<!-- [ Pre-loader ] End --><!-- [ Header ] start -->
<header
    id="home"
    style="background-image: url({{url('')}}/public/assets/images/landing/img-headerbg.jpg)"
>

    <nav class="navbar navbar-expand-md navbar-light default">
        <div class="container">
            <a class="navbar-brand" href="/"
            ><img src="{{url('')}}/public/assets/images/logo-dark.svg" alt="logo"/> </a
            >
            <button
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
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

                    <li class="nav-item px-1">
                        <a class="nav-link" href="login">Login</a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="btn btn btn-success"
                            href="/register"
                        >Register <i class="ti ti-external-link"></i
                            ></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Nav ] start --><!-- [ Nav ] start -->
    <div class="container">
        <div class="row justify-content-center mt-5">
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-10 text-center">
                <h1 class="mb-4 wow fadeInUp" data-wow-delay="0.2s">
                    Cheapest and Fastest<br/>
                    <span class="hero-text-gradient mt-5">Online SMS verification</span>

                </h1>
                <div
                    class="row justify-content-center wow fadeInUp"
                    data-wow-delay="0.3s"
                >
                    <div class="col-md-8">
                        <p class="text-muted f-16 mb-0">
                            Don't feel comfortable giving out your phone number? Protect your online identity by using
                            our one-time-use non-VoIP phone numbers.
                        </p>
                    </div>
                </div>
                <div class="my-4 my-sm-5 wow fadeInUp mb-5" data-wow-delay="0.4s">
                    @auth

                        <a
                            href="/login"
                            class="btn btn-outline-secondary me-2"
                        >Dashboard</a
                        >
                    @else

                        <div class="row justify-content-center mt-5">
                        </div>
                        <a
                            href="/login"
                            class="btn btn-outline-secondary me-2"
                        >Login</a
                        >

                        <a href="/register" class="btn btn-primary"
                        >Register</a
                        >
                    @endauth




                </div>

            </div>
        </div>
    </div>


    <div class="technology-block">

        <div class="row justify-content-center mt-5">
        </div>

        <ul class="list-inline mb-0">
            <li
                class="list-inline-item"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Click to Preview Bootstrap 5"
            >
                <a href="#"
                ><img
                        src="{{url('')}}/public/assets/images/landing/tech-bootstrap.svg"
                        alt="img"
                        class="img-fluid"
                    /></a>
            </li>
            <li
                class="list-inline-item"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Click to Preview React MUI"
            >
                <a href="#l" target="_blank"
                ><img
                        src="{{url('')}}/public/assets/images/landing/tech-react.svg"
                        alt="img"
                        class="img-fluid"
                    /></a>
            </li>
            <li
                class="list-inline-item"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Click to Preview Angular Material UI"
            >
                <a href="#"
                ><img
                        src="{{url('')}}/public/assets/images/landing/tech-angular.svg"
                        alt="img"
                        class="img-fluid"
                    /></a>
            </li>
            <li
                class="list-inline-item"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Click to Preview CodeIgniter"
            >
                <a href="#"
                ><img
                        src="{{url('')}}/public/assets/images/landing/tech-codeigniter.svg"
                        alt="img"
                        class="img-fluid"
                    /></a>
            </li>
            <li
                class="list-inline-item"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Click to Preview ASP.net"
            >
                <a href="#"
                ><img
                        src="{{url('')}}/public/assets/images/landing/tech-net.svg"
                        alt="img"
                        class="img-fluid"
                    /></a>
            </li>
            <li
                class="list-inline-item"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Figma Design System"
            >
                <a
                    href="#"
                ><img
                        src="{{url('')}}/public/assets/images/landing/tech-figma.svg"
                        alt="img"
                        class="img-fluid"
                    /></a>
            </li>
            <li
                class="list-inline-item"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Click to Preview Next js"
            >
                <a href="#"
                ><img
                        src="{{url('')}}/public/assets/images/landing/tech-nextjs.svg"
                        alt="img"
                        class="img-fluid"
                    /></a>
            </li>
            <li
                class="list-inline-item"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Click to Preview Vue"
            >
                <a href="#"
                ><img
                        src="{{url('')}}/public/assets/images/landing/tech-vuetify.svg"
                        alt="img"
                        class="img-fluid"
                    /></a>
            </li>
        </ul>
    </div>
</header>

<section>
    <div class="container title">
        <div
            class="row justify-content-center text-center wow fadeInUp"
            data-wow-delay="0.2s"
        >
            <div class="col-md-8 col-xl-6">
                <h4 class="mb-3">Verify with a Text, Protect with Confidence.</h4>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body mt-2">
                        <h5 class="mb-3">Receive SMS hassle-free</h5>
                        <p class="text-muted">
                            We currently support a large variety of services including, but not limited to Steam, Tinder, Google, Uber, Discord, and even Twitter. To buy an online phone number has never been this easy!
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body mt-2">
                        <h5 class="mb-3">High quality SMS verifications</h5>
                        <p class="text-muted">
                            At SMSPool, we pride ourselves on providing the highest quality SMS verifications for your SMS verification needs. We make sure to only provide non-VoIP phone numbers in order to work with any service.
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body mt-2">
                        <h5 class="mb-3">No Price Fluctuation</h5>
                        <p class="text-muted">
                            Our numbers start at 1,000 Naira each, and our prices never fluctuate, even during high demand! solutions and navigate through our helper guide with
                            ease.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ Top Features ] End --><!-- [ working apps ] start -->

<!-- [ working apps ] End --><!-- [ Applications apps ] start -->
<section class="bg-white">
    <div class="container title mb-0">
        <div class="row align-items-center wow fadeInUp" data-wow-delay="0.2s">
            <div class="col-md-8">
                <h2 class="mb-3">
                    <span class="text-primary">Get</span> Started
                </h2>
                <p class="text-muted mb-md-0">
                    Need an SMS verification on the go? We offer you the best solution to use our service anywhere, anytime
                </p>
            </div>
            <div class="col-md-4 text-md-end">
                <a
                    class="btn btn-lg btn-outline-secondary bg-gray-100 m-1"
                    href="/register"
                    target="_blank"
                >Get Started</a
                >
                <a
                    class="btn btn-lg btn-primary m-1"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    href="/login"
                    target="_blank"
                    title="Login to your account"
                ><i class="ti ti-user"></i> Login</a
                >
            </div>
        </div>
    </div>
</section>

<footer class="footer">


    <div class="container">
        <div class="row align-items-center">
            <div class="col my-1 wow fadeInUp" data-wow-delay="0.4s">
                <p class="mb-0">
                    © Handcrafted by Team
                    <a
                        href="https://themeforest.net/user/phoenixcoded"
                        target="_blank"
                    >Phoenixcoded</a
                    >
                </p>
            </div>
            <div class="col-auto my-1">
                <ul class="list-inline footer-sos-link mb-0">
                    <li class="list-inline-item wow fadeInUp" data-wow-delay="0.4s">
                        <a href="https://fb.com/phoenixcoded"
                        >
                            <svg class="pc-icon">
                                <use xlink:href="#custom-facebook"></use>
                            </svg
                            >
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- [ footer apps ] End --><!-- [ Main Content ] end -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<!-- Required Js -->
<script src="{{url('')}}/public/assets/js/plugins/popper.min.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/simplebar.min.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{url('')}}/public/assets/js/fonts/custom-font.js"></script>
<script src="{{url('')}}/public/assets/js/pcoded.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/feather.min.js"></script>
<script>
    layout_change("light");
</script>
<script>
    layout_theme_contrast_change("false");
</script>
<script>
    change_box_container("false");
</script>
<script>
    layout_caption_change("true");
</script>
<script>
    layout_rtl_change("false");
</script>
<script>
    preset_change("preset-1");
</script>
<!-- [Page Specific JS] start -->
<script src="{{url('')}}/public/assets/js/plugins/wow.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.marquee/1.4.0/jquery.marquee.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/Jarallax.js"></script>
<script>
    // Start [ Menu hide/show on scroll ]
    let ost = 0;
    document.addEventListener("scroll", function () {
        let cOst = document.documentElement.scrollTop;
        if (cOst == 0) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
        } else if (cOst > ost) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
            document.querySelector(".navbar").classList.remove("default");
        } else {
            document.querySelector(".navbar").classList.add("default");
            document
                .querySelector(".navbar")
                .classList.remove("top-nav-collapse");
        }
        ost = cOst;
    });
    // End [ Menu hide/show on scroll ]
    var wow = new WOW({
        animateClass: "animated",
    });
    wow.init();

    // slider start
    $(".screen-slide").owlCarousel({
        loop: true,
        margin: 30,
        center: true,
        nav: false,
        dotsContainer: ".app_dotsContainer",
        URLhashListener: true,
        items: 1,
    });
    $(".workspace-slider").owlCarousel({
        loop: true,
        margin: 30,
        center: true,
        nav: false,
        dotsContainer: ".workspace-card-block",
        URLhashListener: true,
        items: 1.5,
    });
    // slider end
    // marquee start
    $(".marquee").marquee({
        duration: 500000,
        pauseOnHover: true,
        startVisible: true,
        duplicated: true,
    });
    $(".marquee-1").marquee({
        duration: 500000,
        pauseOnHover: true,
        startVisible: true,
        duplicated: true,
        direction: "right",
    });
    // marquee end
</script>
<!-- [Page Specific JS] end -->
<div class="pct-c-btn">
    <a
        href="index.html#"
        data-bs-toggle="offcanvas"
        data-bs-target="#offcanvas_pc_layout"
    ><i class="ph-duotone ph-gear-six"></i
        ></a>
</div>
<div
    class="offcanvas border-0 pct-offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvas_pc_layout"
>
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Settings</h5>
        <button
            type="button"
            class="btn btn-icon btn-link-danger"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
        >
            <i class="ti ti-x"></i>
        </button>
    </div>
    <div class="pct-body customizer-body">
        <div class="offcanvas-body py-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="pc-dark">
                        <h6 class="mb-1">Theme Mode</h6>
                        <p class="text-muted text-sm">
                            Choose light or dark mode or Auto
                        </p>
                        <div class="row theme-color theme-layout">
                            <div class="col-4">
                                <div class="d-grid">
                                    <button
                                        class="preset-btn btn active"
                                        data-value="true"
                                        onclick="layout_change('light');"
                                        data-bs-toggle="tooltip"
                                        title="Light"
                                    >
                                        <svg class="pc-icon text-warning">
                                            <use xlink:href="#custom-sun-1"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-grid">
                                    <button
                                        class="preset-btn btn"
                                        data-value="false"
                                        onclick="layout_change('dark');"
                                        data-bs-toggle="tooltip"
                                        title="Dark"
                                    >
                                        <svg class="pc-icon">
                                            <use xlink:href="#custom-moon"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-grid">
                                    <button
                                        class="preset-btn btn"
                                        data-value="default"
                                        onclick="layout_change_default();"
                                        data-bs-toggle="tooltip"
                                        title="Automatically sets the theme based on user's operating system's color scheme."
                                    >
                        <span
                            class="pc-lay-icon d-flex align-items-center justify-content-center"
                        ><i class="ph-duotone ph-cpu"></i
                            ></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <h6 class="mb-1">Theme Contrast</h6>
                    <p class="text-muted text-sm">Choose theme contrast</p>
                    <div class="row theme-contrast">
                        <div class="col-6">
                            <div class="d-grid">
                                <button
                                    class="preset-btn btn"
                                    data-value="true"
                                    onclick="layout_theme_contrast_change('true');"
                                    data-bs-toggle="tooltip"
                                    title="True"
                                >
                                    <svg class="pc-icon">
                                        <use xlink:href="#custom-mask"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid">
                                <button
                                    class="preset-btn btn active"
                                    data-value="false"
                                    onclick="layout_theme_contrast_change('false');"
                                    data-bs-toggle="tooltip"
                                    title="False"
                                >
                                    <svg class="pc-icon">
                                        <use xlink:href="#custom-mask-1-outline"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <h6 class="mb-1">Custom Theme</h6>
                    <p class="text-muted text-sm">Choose your primary theme color</p>
                    <div class="theme-color preset-color">
                        <a
                            href="index.html#!"
                            data-bs-toggle="tooltip"
                            title="Blue"
                            class="active"
                            data-value="preset-1"
                        ><i class="ti ti-checks"></i
                            ></a>
                        <a
                            href="index.html#!"
                            data-bs-toggle="tooltip"
                            title="Indigo"
                            data-value="preset-2"
                        ><i class="ti ti-checks"></i
                            ></a>
                        <a
                            href="index.html#!"
                            data-bs-toggle="tooltip"
                            title="Purple"
                            data-value="preset-3"
                        ><i class="ti ti-checks"></i
                            ></a>
                        <a
                            href="index.html#!"
                            data-bs-toggle="tooltip"
                            title="Pink"
                            data-value="preset-4"
                        ><i class="ti ti-checks"></i
                            ></a>
                        <a
                            href="index.html#!"
                            data-bs-toggle="tooltip"
                            title="Red"
                            data-value="preset-5"
                        ><i class="ti ti-checks"></i
                            ></a>
                        <a
                            href="index.html#!"
                            data-bs-toggle="tooltip"
                            title="Orange"
                            data-value="preset-6"
                        ><i class="ti ti-checks"></i
                            ></a>
                        <a
                            href="index.html#!"
                            data-bs-toggle="tooltip"
                            title="Yellow"
                            data-value="preset-7"
                        ><i class="ti ti-checks"></i
                            ></a>
                        <a
                            href="index.html#!"
                            data-bs-toggle="tooltip"
                            title="Green"
                            data-value="preset-8"
                        ><i class="ti ti-checks"></i
                            ></a>
                        <a
                            href="index.html#!"
                            data-bs-toggle="tooltip"
                            title="Teal"
                            data-value="preset-9"
                        ><i class="ti ti-checks"></i
                            ></a>
                        <a
                            href="index.html#!"
                            data-bs-toggle="tooltip"
                            title="Cyan"
                            data-value="preset-10"
                        ><i class="ti ti-checks"></i
                            ></a>
                    </div>
                </li>
                <li class="list-group-item">
                    <h6 class="mb-1">Sidebar Caption</h6>
                    <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
                    <div class="row theme-color theme-nav-caption">
                        <div class="col-6">
                            <div class="d-grid">
                                <button
                                    class="preset-btn btn-img btn active"
                                    data-value="true"
                                    onclick="layout_caption_change('true');"
                                    data-bs-toggle="tooltip"
                                    title="Caption Show"
                                >
                                    <img
                                        src="{{url('')}}/public/assets/images/customizer/caption-on.svg"
                                        alt="img"
                                        class="img-fluid"
                                    />
                                </button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid">
                                <button
                                    class="preset-btn btn-img btn"
                                    data-value="false"
                                    onclick="layout_caption_change('false');"
                                    data-bs-toggle="tooltip"
                                    title="Caption Hide"
                                >
                                    <img
                                        src="{{url('')}}/public/assets/images/customizer/caption-off.svg"
                                        alt="img"
                                        class="img-fluid"
                                    />
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="pc-rtl">
                        <h6 class="mb-1">Theme Layout</h6>
                        <p class="text-muted text-sm">LTR/RTL</p>
                        <div class="row theme-color theme-direction">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button
                                        class="preset-btn btn-img btn active"
                                        data-value="false"
                                        onclick="layout_rtl_change('false');"
                                        data-bs-toggle="tooltip"
                                        title="LTR"
                                    >
                                        <img
                                            src="{{url('')}}/public/assets/images/customizer/ltr.svg"
                                            alt="img"
                                            class="img-fluid"
                                        />
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button
                                        class="preset-btn btn-img btn"
                                        data-value="true"
                                        onclick="layout_rtl_change('true');"
                                        data-bs-toggle="tooltip"
                                        title="RTL"
                                    >
                                        <img
                                            src="{{url('')}}/public/assets/images/customizer/rtl.svg"
                                            alt="img"
                                            class="img-fluid"
                                        />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item pc-box-width">
                    <div class="pc-container-width">
                        <h6 class="mb-1">Layout Width</h6>
                        <p class="text-muted text-sm">
                            Choose Full or Container Layout
                        </p>
                        <div class="row theme-color theme-container">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button
                                        class="preset-btn btn-img btn active"
                                        data-value="false"
                                        onclick="change_box_container('false')"
                                        data-bs-toggle="tooltip"
                                        title="Full Width"
                                    >
                                        <img
                                            src="{{url('')}}/public/assets/images/customizer/full.svg"
                                            alt="img"
                                            class="img-fluid"
                                        />
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button
                                        class="preset-btn btn-img btn"
                                        data-value="true"
                                        onclick="change_box_container('true')"
                                        data-bs-toggle="tooltip"
                                        title="Fixed Width"
                                    >
                                        <img
                                            src="{{url('')}}/public/assets/images/customizer/fixed.svg"
                                            alt="img"
                                            class="img-fluid"
                                        />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-grid">
                        <button class="btn btn-light-danger" id="layoutreset">
                            Reset Layout
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
