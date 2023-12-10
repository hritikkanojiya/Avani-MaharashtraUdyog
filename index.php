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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaharashtraUdyog</title>
    <link rel="shortcut icon" href="./assets/img/logo.png">
    <link rel="stylesheet" href="./assets/css/plugins.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/colors/grape.css">
    <link rel="preload" href="./assets/css/fonts/space.css" as="style" onload="this.rel='stylesheet'">
</head>

<body>
    <div class="content-wrapper">
        <header class="wrapper bg-gray">
            <nav class="navbar navbar-expand-lg center-logo transparent navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="index.php">
                            <img class="img-fluid" width="50px" src="assets/img/logo.png"
                                srcset="./assets/img/logo.png 2x" alt="" />
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <h3 class="text-white fs-30 mb-0">Sandbox</h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link scroll active" href="#home">Home</a></li>
                                <li class="nav-item"><a class="nav-link scroll" href="#concept">Concept</a></li>
                                <li class="nav-item"><a class="nav-link scroll" href="#gallery">Gallery</a></li>
                                <li class="nav-item"><a class="nav-link" href="service.php">Services</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="about.php">About</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                            </ul>
                            <div class="offcanvas-footer d-lg-none">
                                <div>
                                    <a href="" class="link-inverse"></a>
                                    <br /> 00 (123) 456 78 90 <br />
                                    <nav class="nav social social-white mt-4">
                                        <a href="#"><i class="uil uil-twitter"></i></a>
                                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                                        <a href="#"><i class="uil uil-dribbble"></i></a>
                                        <a href="#"><i class="uil uil-instagram"></i></a>
                                        <a href="#"><i class="uil uil-youtube"></i></a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-other w-100 d-flex ms-auto">
                    </div>
                </div>
            </nav>
        </header>
        <section class="section-frame br-fix overflow-hidden">
            <div class="wrapper image-wrapper bg-cover bg-image bg-overlay bg-overlay-500"
                data-image-src="./assets/img/photos/bg26.jpg">
                <div class="container pt-18 pt-lg-21 pb-17 pb-lg-19 text-center">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 col-xl-7 col-xxl-6 mx-auto" data-cues="zoomIn"
                            data-group="page-title" data-interval="-200" data-delay="500">
                            <h2 class="h6 text-uppercase ls-xl text-white mb-5">Hello! We are Sandbox</h2>
                            <h3 class="display-1 fs-54 text-white mb-7">Grow your business with our marketing solutions
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
            <div class="container py-14 py-md-16">
                <div class="row">
                    <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto">
                        <h2 class="fs-15 text-uppercase text-primary text-center">Our News</h2>
                        <h3 class="display-4 mb-6 text-center">Here are the latest company news from our blog that got
                            the most attention.</h3>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="shape bg-dot primary rellax w-17 h-20" data-rellax-speed="1"
                        style="top: 0; left: -1.7rem;"></div>
                    <div class="swiper-container dots-closer blog grid-view mb-6" data-margin="0" data-dots="true"
                        data-items-xl="3" data-items-md="2" data-items-xs="1" data-speed="500" data-autoplay="true"
                        data-autoplaytime="3000" data-loop="true" data-drag="true" data-updateresize="true">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                $swiper_dom = "";
                                foreach ($franchise as $key => $value) {
                                    $swiper_dom .= '<div class="swiper-slide">
                                        <div class="item-inner">
                                            <article>
                                                <div class="card">
                                                    <figure class="card-img-top overlay overlay-1 hover-scale">
                                                        <a href="https://maharashtraudyog.com/franchise.php?franchise_id=' . $value['franchise_id'] . '">
                                                            <img class="img-fluid" src="https://cdn.maharashtraudyog.com/public/uploads/franchise/logos/' . $value['logo'] . '" alt="" /></a>
                                                        <figcaption>
                                                            <h5 class="from-top mb-0">Read More</h5>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="card-body">
                                                        <div class="post-header">
                                                            <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="https://maharashtraudyog.com/franchise.php?franchise_id=' . $value['franchise_id'] . '">' . $value['name'] . '</a>
                                                            </h2>
                                                        </div>
                                                        <div class="post-content">
                                                            <p style="min-height:150px; max-height:150px; overflow: auto;">' . $value['franchise_details'] . '</p>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="https://maharashtraudyog.com/franchise.php?franchise_id=' . $value['franchise_id'] . '" class="btn btn-sm btn-outline-gradient gradient-6 rounded-pill">
                                                            <span>Apply Now</span>
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
    </div>
    <footer class="bg-dark text-inverse">
        <div class="container py-15 pb-5">
            <div class="row gy-6 gy-lg-0">
                <div class="col-md-4 col-lg-4">
                    <div class="widget">
                        <img class="mb-4" src="./assets/img/logo-light.png" srcset="./assets/img/logo-light@2x.png 2x"
                            alt="" />
                        <p class="mb-4">© 2023 Sandbox. <br class="d-none d-lg-block" />All rights reserved.</p>
                        <nav class="nav social social-white">
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-dribbble"></i></a>
                            <a href="#"><i class="uil uil-instagram"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </nav>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Get in Touch</h4>
                        <address class="pe-xl-15 pe-xxl-17">Moonshine St. 14/05 Light City, London, United Kingdom
                        </address>
                        <a href="mailto:#">info@email.com</a><br /> 00 (123) 456 78 90
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Learn More</h4>
                        <ul class="list-unstyled  mb-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Our Story</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-8" />
            <div class="row justify-content-center">
                <div class="col-10 fs-12">
                    <div class="pb-5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex saepe perspiciatis neque debitis
                        laborum
                        expedita. Aliquid labore recusandae voluptatibus, ad, aut eligendi qui non nostrum inventore
                        quidem
                        laborum, aspernatur dolor.
                        Dicta, expedita impedit! Corporis maxime velit saepe iste autem ipsam ratione similique,
                        pariatur
                        debitis explicabo perspiciatis dolor maiores a natus, officiis sunt aut optio aperiam, placeat
                        reprehenderit distinctio assumenda tenetur?
                        Illum sequi deserunt sapiente adipisci sunt assumenda, repellat minima sed, dolores magnam,
                        aliquam
                        praesentium. Neque, sed iusto nisi velit eius laborum modi quibusdam quos, dolorum
                        exercitationem
                        voluptas fuga omnis quia.
                    </div>
                    <div class="pb-5">
                        Aliquam et recusandae atque ab nulla perferendis repudiandae quae, id adipisci tenetur provident
                        placeat obcaecati soluta possimus nostrum laborum dignissimos dicta excepturi molestiae
                        veritatis
                        magni aliquid quas. Laudantium, nam adipisci!
                        Alias aliquam voluptatem laborum? Officiis ex aut nisi eveniet unde fugit, autem accusamus odio
                        minima ullam, provident aliquid velit labore dolor blanditiis magni in, voluptatibus iste sed
                        harum.
                        Excepturi, ipsam.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe similique natus provident odit
                        reprehenderit impedit cupiditate tempora fugit optio omnis, asperiores quas maiores earum vel
                        non veniam corporis dolores. Maiores.
                        Totam neque omnis perspiciatis sunt illo quaerat repellendus dolorum pariatur quasi, suscipit
                        nulla fugit aliquid dolore et magni dolor excepturi labore maxime at deserunt laborum nobis ad
                        possimus quod? Explicabo</div>
                    <div>
                        Ipsam, saepe incidunt! Nisi eos iusto sequi architecto aliquid voluptatibus, illo quod quam
                        laborum similique earum natus corrupti illum corporis expedita odit mollitia neque ipsa aliquam
                        tempore! Illum, corrupti nemo?
                        Porro vero aperiam, obcaecati ullam, earum cumque quisquam quae ut asperiores soluta dolores ad?
                        Aliquid tempora amet error quos accusamus voluptas facere earum quod, sed molestias est dolorum
                        sequi dolore?
                        Assumenda dignissimos ad ducimus inventore quisquam, aliquam consectetur perferendis iure
                        voluptatibus ipsam quis natus. Incidunt nihil harum omnis, odit aut molestiae? At, soluta magni.
                        Omnis quaerat incidunt placeat natus unde.
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/theme.js"></script>
</body>

</html>