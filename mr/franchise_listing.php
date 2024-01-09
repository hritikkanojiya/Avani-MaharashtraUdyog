<?php

$ch = curl_init();

$search = "";

if(isset($_POST['search-franchise']) && $_POST['search-franchise'] != ""){
    $search = $_POST['search-franchise'];
    curl_setopt($ch, CURLOPT_URL, "https://backend.maharashtraudyog.com/modules/get_all_franchise?search=" . $search);
}else{
    curl_setopt($ch, CURLOPT_URL, "https://backend.maharashtraudyog.com/modules/get_all_franchise");
}

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
    <link rel="shortcut icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="../assets/css/plugins.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/colors/grape.css">
    <link rel="preload" href="../assets/css/fonts/space.css" as="style" onload="this.rel='stylesheet'">
    <style>
    input:placeholder-shown {
        text-overflow: ellipsis;
    }
    </style>
    <?php

    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

    ?>
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
                                <li class="nav-item"><a class="nav-link active" href="index.php#home">Home</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="index.php#gallery">Gallery</a>
                                </li>
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
        <section class="wrapper bg-light">
            <div class="container py-5">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-10">
                            <div class="form-floating">
                                <input id="" type="text" class="form-control" placeholder="Text Input"
                                    name="search-franchise" value="<?= $search ?>">
                                <label for="">Search Franchise</label>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="form-floating">
                                <button class="btn btn-primary btn-sm" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container pb-10 pb-md-10">
                <div class="row">
                    <?php
                    $franchise_dom = "";
                    foreach ($franchise as $key => $value) {
                        $franchise_dom .= '
                            <div class="col-md-4 col-sm-12 item-inner">
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
                        </div>';
                    }
                    echo $franchise_dom;
                    ?>
                </div>
            </div>
        </section>
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
    <script>

    </script>
</body>

</html>