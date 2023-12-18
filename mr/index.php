<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://backend.maharashtraudyog.com/modules/get_all_franchise");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json',
));
$curl_request = curl_exec($ch);

curl_close($ch);
$curl_response = json_decode($curl_request, true);
$franchise = array();

if (isset($curl_response['status']) && $curl_response['status'] == "success") {
    $franchise = $curl_response['franchise'];
    function split_array_in_half($array)
    {
        return array_chunk($array, ceil(count($array) / 2));
    }

    list($first_half_odd, $second_half_odd) = split_array_in_half($franchise);
}

$gallery_video = array(
    "mNDJTq8iCBA",
    "YL24Df9mV8Q",
    "Zct_oxedA6w",
    "WMWx3-M1jUs",
    "mtT5CbMQhAk",
    "RNBS_3kOkiQ",
    "1TA4kAP1BK4",
    "TXd943R0vd0",
    "awDXBCVsmG0",
    "_MoeeM3It34",
    "A_IGdKRrPTs",
    "dYnaSKkqjU4",
    "8lBOZZWsIQI",
    "sk5irZaemck",
    "Lo75qysGqEk",
    "PcbLmnURINw",
    "ahUuaQqa_6E",
    "nXh_aeqMKNg",
    "I57bFhH4vmA",
    "sTLED8sBVeI",
    "DKjtG5rzvyo",
    "8tbBI_mPyog",
    "QuzU8Wi3nHU"
);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaharashtraUdyog</title>
    <link rel="shortcut icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/plugins.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/colors/grape.css">
    <link rel="preload" href="../assets/css/fonts/space.css" as="style" onload="this.rel='stylesheet'">
    <style>
    ::-webkit-scrollbar {
        display: none;
    }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <header class="wrapper bg-gray">
            <nav class="navbar navbar-expand-lg center-logo transparent navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand py-3 py-md-0">
                        <a href="index.php">
                            <img class="img-fluid my-lg-3" width="85px" src="../assets/img/logo.png"
                                srcset="../assets/img/logo.png 2x" alt="" />
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-body m-lg-auto d-flex flex-column h-100 py-10 py-md-0">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link scroll active" href="#home">Home</a></li>
                                <li class="nav-item"><a class="nav-link scroll" href="#gallery">Gallery</a></li>
                                <li class="nav-item"><a class="nav-link" href="service.php">Services</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="about.php">About</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                            </ul>
                            <div class="offcanvas-footer d-lg-none">
                                <div>
                                    <h4 class="widget-title text-white mb-3">Get in Touch</h4>
                                    <address class="pe-xl-15 pe-xxl-17 mb-0">1206, Navjivan Commercial Co-Op Society,
                                        Gate
                                        no.2, Building
                                        No. 3, Lamington Road, Mumbai Central, Mumbai 400008
                                    </address>
                                    <a href="#" class="link-inverse"></a>
                                    <br />9987238461<br />
                                    <nav class="nav social social-white d-flex gap-2">
                                        <a href="https://www.facebook.com/themaharashtraudyog?mibextid=nwBsNb"><i
                                                class="uil uil-facebook-f"></i></a>
                                        <a href="https://instagram.com/avnivan_mumbai?igshid=NzZlODBkYWE4Ng=="><i
                                                class="uil uil-instagram"></i></a>
                                        <a href="https://youtube.com/@themaharashtraudyog9615?si=CzGqU4Kvf3u6hA-N"><i
                                                class="uil uil-youtube"></i></a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-other ms-lg-4">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item dropdown language-select text-uppercase d-sm-block d-md-none">
                                <a class="nav-link dropdown-item dropdown-toggle fs-18" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="dropdown-item" href="../en/">English</a></li>
                                    <li class="nav-item"><a class="dropdown-item" href="../mr/">मराठी</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown language-select text-uppercase d-none d-md-block">
                                <a class="nav-link dropdown-item dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="dropdown-item" href="../en/">English</a></li>
                                    <li class="nav-item"><a class="dropdown-item" href="../mr/">मराठी</a></li>
                                </ul>
                            </li>
                            <li class="nav-item d-lg-none">
                                <button class="hamburger offcanvas-nav-btn"><span></span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <section class="section-frame br-fix overflow-hidden">
            <div class="wrapper image-wrapper bg-cover bg-image bg-overlay bg-overlay-500 d-block d-md-none"
                data-image-src="../assets/img/extras/home_page.jpg" style="background-size: contain; min-height:10px" ;>
                <div class=" container pt-lg-18 pb-lg-19 text-center pt-10">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 col-xl-7 col-xxl-6 mx-auto pb-5" data-cues="zoomIn"
                            data-group="page-title" data-interval="-200" data-delay="500">
                            <h2 class="h6 fs-25 text-uppercase ls-xl text-white mb-5 fw-bold">मी करेन उद्योग, मी होईन
                                उद्योजक
                                !!!
                            </h2>
                            <h3 class="display-1 fs-35 text-white mb-5 fw-normal">करू नका दुसऱ्याची चाकरी, स्वकष्टाने
                                कमवा हक्काची
                                भाकरी....
                            </h3>
                            <a href="https://www.youtube.com/watch?v=yOigqgubXx8"
                                class="btn btn-circle btn-white btn-play ripple mx-auto" data-glightbox><i
                                    class="icn-caret-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden d-none">
                    <div class="divider text-white mx-n2">
                        <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 1440 60">
                            <path fill="currentColor" d="M0,0V60H1440V0A5771,5771,0,0,1,0,0Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="wrapper image-wrapper bg-cover bg-image bg-overlay bg-overlay-500 d-none d-md-block"
                data-image-src="../assets/img/extras/home_page.jpg">
                <div class="container pt-15 pt-lg-18 pb-17 pb-lg-19 text-center">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 col-xl-7 col-xxl-6 mx-auto" data-cues="zoomIn"
                            data-group="page-title" data-interval="-200" data-delay="500">
                            <h2 class="h6 fs-30 text-uppercase ls-xl text-white mb-5">मी करेन उद्योग, मी होईन उद्योजक
                                !!!
                            </h2>
                            <h3 class="display-1 fs-40 text-white mb-7">करू नका दुसऱ्याची चाकरी, स्वकष्टाने कमवा हक्काची
                                भाकरी....
                            </h3>
                            <a href="https://www.youtube.com/watch?v=yOigqgubXx8"
                                class="btn btn-circle btn-white btn-play ripple mx-auto" data-glightbox><i
                                    class="icn-caret-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <div class="divider text-white mx-n2">
                        <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 1440 60">
                            <path fill="currentColor" d="M0,0V60H1440V0A5771,5771,0,0,1,0,0Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>
        <section class="wrapper bg-light">
            <div class="container py-14 pb-10">
                <div class="row">
                    <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto">
                        <h2 class="fs-18 text-uppercase text-primary text-center mb-3">Franchisors Available</h2>
                        <h3 class="display-4 mb-6 text-center d-sm-block d-md-none fs-20 fw-bold">Maharashtra Udyog
                            facilitates fruitful
                            partnerships with
                            franchisors for businesses</h3>
                        <h3 class="display-4 mb-6 text-center d-none d-md-block">Maharashtra Udyog facilitates fruitful
                            partnerships with
                            franchisors for businesses</h3>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="shape bg-dot primary rellax w-17 h-20" data-rellax-speed="1"
                        style="top: 0; left: -1.7rem;">
                    </div>
                    <div class="swiper-container dots-closer blog grid-view mb-6" data-margin="0" data-dots="true"
                        data-items-xl="3" data-items-md="2" data-items-xs="1" data-speed="800" data-autoplay="true"
                        data-autoplaytime="2500" data-loop="true" data-drag="true" data-updateresize="true">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                $swiper_dom = "";
                                foreach ($first_half_odd as $key => $value) {
                                    $swiper_dom .= '<div class="swiper-slide">
                                        <div class="item-inner">
                                            <article>
                                                <div class="card">
                                                    <figure class="card-img-top overlay overlay-1 hover-scale">
                                                        <a href="https://maharashtraudyog.com/mr/franchise.php?franchise_id=' . $value['franchise_id'] . '">
                                                            <img class="img-fluid" src="https://cdn.maharashtraudyog.com/public/uploads/franchise/logos/' . $value['logo'] . '" alt="" /></a>
                                                        <figcaption>
                                                            <h5 class="from-top mb-0">Read More</h5>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="card-body px-5 p-md-8">
                                                        <div class="post-header">
                                                            <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="https://maharashtraudyog.com/mr/franchise.php?franchise_id=' . $value['franchise_id'] . '">' . $value['name'] . '</a>
                                                            </h2>
                                                        </div>
                                                        <div class="post-content">
                                                            <p style="min-height:150px; max-height:150px; overflow: auto;">' . $value['franchise_details'] . '</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="https://maharashtraudyog.com/mr/franchise.php?franchise_id=' . $value['franchise_id'] . '" class="btn btn-sm btn-outline-gradient gradient-6 rounded-pill">
                                                            <span>Know More</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>';
                                }
                                echo $swiper_dom;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-relative pt-10">
                    <div class="shape bg-dot primary rellax w-17 h-20" data-rellax-speed="1"
                        style="top: 0; left: -1.7rem;">
                    </div>
                    <div class="swiper-container dots-closer blog grid-view mb-6" data-margin="0" data-dots="true"
                        data-items-xl="3" data-items-md="2" data-items-xs="1" data-speed="800" data-autoplay="true"
                        data-autoplaytime="2500" data-loop="true" data-drag="true" data-updateresize="true">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                $swiper_dom = "";
                                foreach ($second_half_odd as $key => $value) {
                                    $swiper_dom .= '<div class="swiper-slide">
                                        <div class="item-inner">
                                            <article>
                                                <div class="card">
                                                    <figure class="card-img-top overlay overlay-1 hover-scale">
                                                        <a href="https://maharashtraudyog.com/mr/franchise.php?franchise_id=' . $value['franchise_id'] . '">
                                                            <img class="img-fluid" src="https://cdn.maharashtraudyog.com/public/uploads/franchise/logos/' . $value['logo'] . '" alt="" /></a>
                                                        <figcaption>
                                                            <h5 class="from-top mb-0">Read More</h5>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="card-body px-5 p-md-8">
                                                        <div class="post-header">
                                                            <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="https://maharashtraudyog.com/mr/franchise.php?franchise_id=' . $value['franchise_id'] . '">' . $value['name'] . '</a>
                                                            </h2>
                                                        </div>
                                                        <div class="post-content">
                                                            <p style="min-height:150px; max-height:150px; overflow: auto;">' . $value['franchise_details'] . '</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="https://maharashtraudyog.com/mr/franchise.php?franchise_id=' . $value['franchise_id'] . '" class="btn btn-sm btn-outline-gradient gradient-6 rounded-pill">
                                                            <span>Know More</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>';
                                }
                                echo $swiper_dom;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wrapper bg-light" id="gallery">
            <div class="container py-10">
                <div class="row">
                    <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center mb-3">
                        <h2 class="fs-18 text-uppercase text-primary text-center">MaharashtraUdyog Events</h2>
                        <h3 class="display-4">विविध ठिकाणी उद्योग मेळाव्याची काही क्षणचित्रे
                        </h3>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-md-6">
                <div class="swiper-container blog grid-view mb-15" data-margin="30" data-nav="true" data-dots="true"
                    data-items-xxl="3" data-items-md="2" data-items-xs="1" data-speed="800" data-autoplay="true"
                    data-autoplaytime="2500" data-loop="true" data-drag="true" data-updateresize="true">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/123232.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/1234432.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/12344523.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/123524.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/1235324.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/12354312.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/1435342.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/21345.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/23423.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/234234.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/2342343.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/23424.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/2343324.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/2343412.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/234432.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/2345123.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/234531.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/234532.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/234534.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/2345423.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/2353543.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/23543421.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/243124.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/243324.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/3242342.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/3245341.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/3412354.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/34534.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/345453.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/4213424.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/4312345.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/432312.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/4352342.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/5345232.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/5345t341.jpeg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/5433452.jpeg" alt="" /></figure>
                            </div>

                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/gallery_1.jpg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/gallery_2.jpg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/gallery_3.jpg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/gallery_4.jpg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/gallery_5.jpg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/gallery_6.jpg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/gallery_7.jpg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/gallery_8.jpg" alt="" /></figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="rounded"><img src="../assets/img/extras/gallery_9.jpg" alt="" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($gallery_video) && is_array($gallery_video)) { ?>
            <div class="container-fluid px-md-6">
                <div class="swiper-container blog grid-view mb-15" data-margin="30" data-nav="true" data-dots="true"
                    data-items-xxl="3" data-items-md="2" data-items-xs="1" data-speed="800" data-autoplay="true"
                    data-autoplaytime="2500" data-loop="true" data-drag="true" data-updateresize="true">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php for ($i = 0; $i < count($gallery_video); $i++) {  ?>
                            <div class="swiper-slide">
                                <div class="position-relative" data-cue="slideInDown" data-show="true"
                                    style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                                    <a href="https://www.youtube.com/watch?v=<?= $gallery_video[$i] ?>"
                                        class="btn btn-circle btn-primary btn-play ripple mx-auto mb-6 position-absolute"
                                        style="top:50%; left: 50%; transform: translate(-50%,-50%); z-index:3;"
                                        data-glightbox="">
                                        <i class="icn-caret-right"></i>
                                    </a>
                                    <figure class="rounded shadow-lg">
                                        <img src="https://i.ytimg.com/vi/<?= $gallery_video[$i] ?>/hqdefault.jpg"
                                            alt="">
                                    </figure>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </section>
    </div>
    <footer class="bg-dark text-inverse">
        <div class="container py-10 pb-10">
            <div class="row gy-6 gy-lg-0">
                <div class="col-md-4 col-lg-4">
                    <div class="widget">
                        <img class="img-fluid mb-3" width="120px" src="../assets/img/logo.png"
                            srcset="../assets/img/logo.png 2x" alt="" />
                        <p class="mb-4">MaharashtraUdyog
                        </p>
                        <nav class="nav social social-white d-flex gap-2">
                            <a href="https://www.facebook.com/themaharashtraudyog?mibextid=nwBsNb"><i
                                    class="uil uil-facebook-f"></i></a>
                            <a href="https://instagram.com/avnivan_mumbai?igshid=NzZlODBkYWE4Ng=="><i
                                    class="uil uil-instagram"></i></a>
                            <a href="https://youtube.com/@themaharashtraudyog9615?si=CzGqU4Kvf3u6hA-N"><i
                                    class="uil uil-youtube"></i></a>
                        </nav>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Get in Touch</h4>
                        <address class="pe-xl-15 pe-xxl-17">1206, Navjivan Commercial Co-Op Society, Gate no.2, Building
                            No. 3, Lamington Road, Mumbai Central, Mumbai 400008
                        </address>
                        <a href="mailto:#">support@maharashtraudyog.com</a><br /> 7977335626 <br> 8454984360 <br>
                        9820030971 <br>
                        9987238461
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Learn More</h4>
                        <ul class="list-unstyled mb-0">
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <hr class="my-5" />
                <div class="d-md-flex align-items-center justify-content-center">
                    <p class="mb-2 mb-lg-0">© 2023 MaharashtraUdyog. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>