<?php
if (isset($_POST['name'])) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://backend.maharashtraudyog.com/modules/submit_application");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
    ));
    $curl_request = curl_exec($ch);

    curl_close($ch);
    $application_curl = json_decode($curl_request, true);
    $franchise = array();
}

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

$gallery_images = [
    "19e4e368-a73f-4198-9da8-54d6e9b5974c.jfif",
    "35a53388-06a9-4110-b88e-42686b261005.jfif",
    "38a57d0d-196e-419f-b573-81c7b7f195fa.jfif",
    "66983f95-3a91-4008-b3a1-350eb67ed011.jfif",
    "67b26f81-1c04-403b-a084-2b7da80f0d2d.jfif",
    "691c73d4-988a-4351-b39f-a709b9549c32.jfif",
    "7bfae601-a301-434e-9582-040958059b80.jfif",
    "879b163b-cd39-4931-bf1b-2286ca55f1df.jfif",
    "9a035d68-ceb5-474f-bfcc-d20be96250ec.jfif",
    "aa4b0556-cc5c-469a-9437-b7606fe39a10.jfif",
    "c7ef2df2-661f-463c-8bed-795a2ae41312.jfif",
    "d4c03a60-5bcd-4c19-aa8d-348afcb95243.jfif",
    "d85c660b-7933-4fb9-8fb5-19c725d2ad69.jfif",
    "e08a0be4-7c47-4844-ab42-348a448e10b8.jfif",
    "e1b9a667-5430-4176-b27d-542ce0830c71.jfif",
    "fb307552-7d1e-46f6-8d6a-c25a7b9a86c2.jfif",
    "123232.jpeg",
    "1234432.jpeg",
    "12344523.jpeg",
    "123524.jpeg",
    "1235324.jpeg",
    "12354312.jpeg",
    "1435342.jpeg",
    "21345.jpeg",
    "23423.jpeg",
    "234234.jpeg",
    "2342343.jpeg",
    "23424.jpeg",
    "2343412.jpeg",
    "234432.jpeg",
    "2345123.jpeg",
    "234531.jpeg",
    "234532.jpeg",
    "234534.jpeg",
    "2345423.jpeg",
    "2353543.jpeg",
    "23543421.jpeg",
    "243124.jpeg",
    "243324.jpeg",
    "3242342.jpeg",
    "3245341.jpeg",
    "34534.jpeg",
    "345453.jpeg",
    "4213424.jpeg",
    "4312345.jpeg",
    "432312.jpeg",
    "4352342.jpeg",
    "5345232.jpeg",
    "5345t341.jpeg",
    "5433452.jpeg",
    "gallery_1.jpg",
    "gallery_2.jpg",
    "gallery_3.jpg",
    "gallery_4.jpg",
    "gallery_5.jpg",
    "gallery_6.jpg",
    "gallery_7.jpg",
    "gallery_8.jpg",
    "gallery_9.jpg",
];

$gallery_videos = array(
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
    <?php

echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

?>
</head>

<body>
    <?php
    if (isset($_POST['name'])) {

        if (isset($application_curl['status']) && $application_curl['status'] == "success") {
            echo "<script>Swal.fire({
            title: 'Thank you!!!',
            text: 'Our team will review your application and get back you soon.',
            icon: 'success'
            });</script>";
        } else {
            echo "<script>Swal.fire({
            title: 'Failed',
            text: 'Something went wrong',
            icon: 'error'
            });</script>";
        }
    }
?>
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
                                <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal"
                                        data-bs-target="#business-loan">Business Loan</a></li>
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
                                    <br> 7977335626, 8454984360
                                    <br> 9820030971, 9987238461
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
                data-image-src="../assets/img/extras/new-banner-mobile.jpeg" style="background-size: contain; min-height:10px" ;>
                <div class=" container pt-lg-18 pb-lg-19 text-center pt-10">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 col-xl-7 col-xxl-6 mx-auto pb-5" data-cues="zoomIn"
                            data-group="page-title" data-interval="-200" data-delay="500">
                            <h2 class="h6 fs-25 text-uppercase ls-xl text-white mb-5 fw-bold">मी करेन उद्योग, मी होईन
                                उद्योजक
                                !!!
                            </h2>
                            <h3 class="display-1 fs-35 text-white mb-5 fw-normal">Maharashtra Udyog facilitates the
                                expansion of businesses by connecting franchisors and potential franchises.
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
                data-image-src="../assets/img/extras/new-banner.jpeg">
                <div class="container pt-15 pt-lg-18 pb-17 pb-lg-19 text-center">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 col-xl-7 col-xxl-6 mx-auto" data-cues="zoomIn"
                            data-group="page-title" data-interval="-200" data-delay="500">
                            <h2 class="h6 fs-30 text-uppercase ls-xl text-white mb-5">मी करेन उद्योग, मी होईन उद्योजक
                                !!!
                            </h2>
                            <h3 class="display-1 fs-40 text-white mb-7">Maharashtra Udyog facilitates the
                                expansion of businesses by connecting franchisors and potential franchises.
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
                                                        <a href="https://maharashtraudyog.com/en/franchise.php?franchise_id=' . $value['franchise_id'] . '">
                                                            <img class="img-fluid" src="https://cdn.maharashtraudyog.com/public/uploads/franchise/logos/' . $value['logo'] . '" alt="" /></a>
                                                        <figcaption>
                                                            <h5 class="from-top mb-0">Read More</h5>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="card-body px-5 p-md-8">
                                                        <div class="post-header">
                                                            <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="https://maharashtraudyog.com/en/franchise.php?franchise_id=' . $value['franchise_id'] . '">' . $value['name'] . '</a>
                                                            </h2>
                                                        </div>
                                                        <div class="post-content">
                                                            <p style="min-height:150px; max-height:150px; overflow: auto;">' . $value['franchise_details'] . '</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="https://maharashtraudyog.com/en/franchise.php?franchise_id=' . $value['franchise_id'] . '" class="btn btn-sm btn-outline-gradient gradient-6 rounded-pill">
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
                        data-items-xl="3" data-items-md="2" data-items-xs="1" data-speed="1000" data-autoplay="true"
                        data-autoplaytime="2000" data-loop="true" data-drag="true" data-updateresize="true">
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
                                                        <a href="https://maharashtraudyog.com/en/franchise.php?franchise_id=' . $value['franchise_id'] . '">
                                                            <img class="img-fluid" src="https://cdn.maharashtraudyog.com/public/uploads/franchise/logos/' . $value['logo'] . '" alt="" /></a>
                                                        <figcaption>
                                                            <h5 class="from-top mb-0">Read More</h5>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="card-body px-5 p-md-8">
                                                        <div class="post-header">
                                                            <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="https://maharashtraudyog.com/en/franchise.php?franchise_id=' . $value['franchise_id'] . '">' . $value['name'] . '</a>
                                                            </h2>
                                                        </div>
                                                        <div class="post-content">
                                                            <p style="min-height:150px; max-height:150px; overflow: auto;">' . $value['franchise_details'] . '</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="https://maharashtraudyog.com/en/franchise.php?franchise_id=' . $value['franchise_id'] . '" class="btn btn-sm btn-outline-gradient gradient-6 rounded-pill">
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
                <div class="text-center pt-10">
                    <a href="https://maharashtraudyog.com/en/franchise_listing.php"
                        class="btn btn-sm btn-outline-primary rounded-pill">
                        <span>List all Franchise</span>
                    </a>
                </div>
            </div>
        </section>
        <section class="wrapper bg-light" id="gallery">
            <div class="container py-10">
                <div class="row">
                    <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center mb-3">
                        <h2 class="fs-18 text-uppercase text-primary text-center">MaharashtraUdyog Events</h2>
                        <h3 class="display-4">Maharashtra Udyog events unfold in our mesmerizing photo gallery.
                        </h3>
                    </div>
                </div>
            </div>
            <?php if (isset($gallery_images) && is_array($gallery_images)) { ?>
            <div class="container-fluid px-md-6">
                <div class="swiper-container blog grid-view mb-15" data-margin="30" data-nav="true" data-dots="true"
                    data-items-xxl="3" data-items-md="2" data-items-xs="1" data-speed="800" data-autoplay="true"
                    data-autoplaytime="2500" data-loop="true" data-drag="true" data-updateresize="true">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php for ($i = 0; $i < count($gallery_images); $i++) {  ?>
                            <div class="swiper-slide">
                                <figure class="rounded">
                                    <img src="../assets/img/extras/<?= $gallery_images[$i] ?>" alt="" />
                                </figure>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if (isset($gallery_videos) && is_array($gallery_videos)) { ?>
            <div class="container-fluid px-md-6">
                <div class="swiper-container blog grid-view mb-15" data-margin="30" data-nav="true" data-dots="true"
                    data-items-xxl="3" data-items-md="2" data-items-xs="1" data-speed="800" data-autoplay="true"
                    data-autoplaytime="2500" data-loop="true" data-drag="true" data-updateresize="true">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php for ($i = 0; $i < count($gallery_videos); $i++) {  ?>
                            <div class="swiper-slide">
                                <div class="position-relative" data-cue="slideInDown" data-show="true"
                                    style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                                    <a href="https://www.youtube.com/watch?v=<?= $gallery_videos[$i] ?>"
                                        class="btn btn-circle btn-primary btn-play ripple mx-auto mb-6 position-absolute"
                                        style="top:50%; left: 50%; transform: translate(-50%,-50%); z-index:3;"
                                        data-glightbox="">
                                        <i class="icn-caret-right"></i>
                                    </a>
                                    <figure class="rounded shadow-lg">
                                        <img src="https://i.ytimg.com/vi/<?= $gallery_videos[$i] ?>/hqdefault.jpg"
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
    <div class="modal fade" id="business-loan" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content text-center">
                <div class="modal-body pb-5">
                    <div class="row">
                        <form class="" method="post" action="https://maharashtraudyog.com/en/index.php">
                            <div class="row gx-4">
                                <div class="col-md-8">
                                    <div class="form-floating mb-4">
                                        <input id="form_name" type="text" name="name" class="form-control"
                                            placeholder="Name of Customer" required>
                                        <label for="form_name">Name of Customer</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input id="form_lasstname" type="date" name="dob" class="form-control"
                                            placeholder="Date Of Birth" required>
                                        <label for="form_lastname">Date of Birth
                                            *</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input id="" type="text" name="contact" class="form-control"
                                            placeholder="Contact Number" required>
                                        <label for="">Contact Number
                                            *</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input id="" type="text" name="whatsapp" class="form-control"
                                            placeholder="WhatsApp Number" required>
                                        <label for="">WhatsApp Number
                                            *</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-select-wrapper mb-4">
                                        <select class="form-select" id="form-select" name="cast" required>
                                            <option selected disabled value="">Select cast
                                            </option>
                                            <option value="Maratha">Maratha</option>
                                            <option value="OBC">OBC</option>
                                            <option value="VJNT">VJNT</option>
                                            <option value="SC/ST">SC/ST</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-select-wrapper mb-4">
                                        <select class="form-select" id="form-select" name="maritial" required>
                                            <option selected disabled value="">Marital Status
                                            </option>
                                            <option value="Married">Married</option>
                                            <option value="Unmarried">Unmarried</option>
                                            <option value="Widow">Widow</option>
                                            <option value="Divorsee">Divorsee</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-select-wrapper mb-4">
                                        <select class="form-select" id="form-select" name="district" required>
                                            <option selected disabled value="">महाराष्ट्रातील 35
                                                जिल्हे
                                            </option>
                                            <option value="अहमदनगर">अहमदनगर</option>
                                            <option value="अकोला">अकोला</option>
                                            <option value="अमरावती">अमरावती</option>
                                            <option value="संभाजीनगर">संभाजीनगर</option>
                                            <option value="बीड">बीड</option>
                                            <option value="भंडारा">भंडारा</option>
                                            <option value="बुलढाणा">बुलढाणा</option>
                                            <option value="चंद्रपुर">चंद्रपुर</option>
                                            <option value="धुळे">धुळे</option>
                                            <option value="गडचिरोली">गडचिरोली</option>
                                            <option value="गोंदिया">गोंदिया</option>
                                            <option value="हिंगोली">हिंगोली</option>
                                            <option value="जळगांव">जळगांव</option>
                                            <option value="जालना">जालना</option>
                                            <option value="कोल्हापूर">कोल्हापूर</option>
                                            <option value="लातूर">लातूर</option>
                                            <option value="मुंबई">मुंबई</option>
                                            <option value="नागपूर">नागपूर</option>
                                            <option value="नांदेड">नांदेड</option>
                                            <option value="नंदुरबार">नंदुरबार</option>
                                            <option value="नाशिक">नाशिक</option>
                                            <option value="उस्मानाबाद">उस्मानाबाद</option>
                                            <option value="पालघर">पालघर</option>
                                            <option value="परभणी">परभणी</option>
                                            <option value="पुणे">पुणे</option>
                                            <option value="रायगड">रायगड</option>
                                            <option value="रत्नागिरी">रत्नागिरी</option>
                                            <option value="सातारा">सातारा</option>
                                            <option value="सांगली">सांगली</option>
                                            <option value="सिंधुदुर्ग">सिंधुदुर्ग</option>
                                            <option value="सोलापूर">सोलापूर</option>
                                            <option value="ठाणे">ठाणे</option>
                                            <option value="वर्धा">वर्धा</option>
                                            <option value="वाशिम">वाशिम</option>
                                            <option value="यवतमाळ">यवतमाळ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-select-wrapper mb-4">
                                        <select class="form-select" id="form-select" name="job">
                                            <option selected disabled value="">तुम्ही नोकरीं
                                                करता कि व्यवसाय ?
                                            </option>
                                            <option value="नोकरी">नोकरी</option>
                                            <option value="व्यवसाय">व्यवसाय</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="" type="text" name="comp_name" class="form-control"
                                            placeholder="नोकरीं करत असाल तर कंपनीचे नाव">
                                        <label for="">नोकरीं करत असाल तर कंपनीचे
                                            नाव</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="" type="text" name="job_desc" class="form-control"
                                            placeholder="व्यवसाय करत असाल तर तुमच्या प्रॉडक्ट आणि कंपनीचे नाव">
                                        <label for="" class="text-truncate w-100">व्यवसाय करत
                                            असाल तर तुमच्या
                                            प्रॉडक्ट आणि कंपनीचे नाव</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-select-wrapper mb-4">
                                        <select class="form-select" id="form-select" name="intrest" required>
                                            <option selected disabled value="">तुम्ही सध्या कुठला व्यवसाय करता?</option>
                                            <option value="AUTOMOBILE">AUTOMOBILE</option>
                                            <option value="ICE-CREAM">ICE-CREAM</option>
                                            <option value="AMRUTULYA CHAHA">AMRUTULYA CHAHA
                                            </option>
                                            <option value="FMCG">FMCG</option>
                                            <option value="FOOD ON WHEEL (FOOD VAN)">FOOD ON
                                                WHEEL (FOOD VAN)</option>
                                            <option value="BAKERY">BAKERY</option>
                                            <option value="FISH FARMING">FISH FARMING</option>
                                            <option value="ORGANIC FOOD">ORGANIC FOOD</option>
                                            <option value="KOKAN PRODUCTS">KOKAN PRODUCTS
                                            </option>
                                            <option value="SNACKS & NAMKIN">SNACKS & NAMKIN
                                            </option>
                                            <option value="MISAL FRANCHISE">MISAL FRANCHISE
                                            </option>
                                            <option value="SPICES">SPICES</option>
                                            <option value="READY TO MIX">READY TO MIX</option>
                                            <option value="HEALTHCARE">HEALTHCARE</option>
                                            <option value="DAIRY PRODUCTS">DAIRY PRODUCTS
                                            </option>
                                            <option value="PACKAGED DRINKING WATER">PACKAGED
                                                DRINKING WATER</option>
                                            <option value="OTHER PLEASE SPECIFY">OTHER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-4">
                                        <textarea id="form_message" name="address" class="form-control"
                                            placeholder="Your address" style="height: 150px" required></textarea>
                                        <label for="form_message">Address
                                            *</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" value="" name="acknowledgement"
                                            id="flexCheckChecked" required>
                                        <label class="form-check-label fs-15 float-start" for="flexCheckChecked">मीं
                                            दिलेली
                                            माहिती खरी असून मला सदर फ्रँचायसी व्यवसाय करण्यास
                                            मिळावी ही विनंती.
                                            *
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3"
                                        value="Apply Now">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-inverse">
        <div class="container py-10 pb-10">
            <div class="row gy-6 gy-lg-0">
                <div class="col-md-4 col-lg-4">
                    <div class="widget text-center">
                        <img class="img-fluid mb-2" width="100px" src="../assets/img/logo.png"
                            srcset="../assets/img/logo.png 2x" alt="" />
                        <p class="mb-2">MaharashtraUdyog
                        </p>
                        <nav class="nav social social-white d-flex justify-content-center gap-6">
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
                        <h4 class="widget-title text-white mb-3">Get in Touch [InPerson]</h4>
                        <address class="pe-xl-15 pe-xxl-17">1206/1209,Navjivan Commercial Co-Op Society, Gate no.2, Building No. 3, Lamington Road, Mumbai Central, Mumbai 400008
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Get in Touch [Virtual]</h4>
                        <a href="mailto:#">support@maharashtraudyog.com</a>
                        <br> 7977335626, 8454984360
                        <br> 9820030971, 9987238461
                    </div>
                </div>
                <hr class="my-5">
                <div class="fs-12">
                    The information provided on this site is not intended as an offer to sell, or the solicitation of an
                    offer to buy, a franchise. It is for informational purposes only. Any franchise offer made is by a
                    Franchise Disclosure Document (FDD) registered in the applicable state. The FDD will include
                    detailed information regarding the franchisor and the franchise opportunity. This website and the
                    information contained herein do not constitute the offering of a franchise in any state or
                    jurisdiction where such an offer or solicitation would be prohibited by law or regulation. The offer
                    of a franchise can only be made through the delivery of a FDD in compliance with applicable laws and
                    regulations. Furthermore, the franchise opportunities described on this website are only available
                    in certain states and countries. Maharashtra Udyog will not offer or sell franchises in states or
                    countries where registration or other requirements have not been fulfilled. Prospective franchisees
                    are advised to carefully review the FDD and consult with legal and financial advisors before making
                    any decision to invest in a franchise opportunity. The decision to purchase a franchise should be
                    made after careful consideration of all information and factors involved. Maharashtra Udyog does not
                    guarantee the success of any franchisee or the profitability of any franchise. Individual success
                    will depend on a variety of factors, including the franchisee’s skill, effort, and dedication to
                    operating the franchise business.
                </div>
                <hr class="my-5" />
                <div class="d-md-flex align-items-center justify-content-center">
                    <p class="mb-lg-0">© 2023 MaharashtraUdyog. All rights reserved.</p>
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