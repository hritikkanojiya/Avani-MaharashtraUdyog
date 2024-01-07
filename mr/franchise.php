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
    $curl_response = json_decode($curl_request, true);
    $franchise = array();

    // header('Location: https://maharashtraudyog.com/mr/franchise.php?franchise_id=' . $_GET["franchise_id"]);
}
if (!isset($_GET['franchise_id'])) {
    header('Location: https://maharashtraudyog.com');
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://backend.maharashtraudyog.com/modules/get_franchise_by_id?franchise_id=" . $_GET['franchise_id']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json',
));
$curl_request_get_fr = curl_exec($ch);
curl_close($ch);
$curl_response_get_fr = json_decode($curl_request_get_fr, true);
$franchise = array();
if (isset($curl_response_get_fr['status']) && $curl_response_get_fr['status'] == "success") {
    $franchise = $curl_response_get_fr['franchise'];
} else {
    header('Location: https://maharashtraudyog.com');
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
<?php
    if (isset($_POST['name'])) {

        if (isset($curl_response['status']) && $curl_response['status'] == "success") {
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
            <div class="container py-10 py-md-10">
                <div class="row gx-lg-8 gx-xl-12">
                    <aside class="col-lg-4 sidebar mt-lg-0 d-md-none">
                        <h2 class="h1 mb-4 fw-bold text-center fs-45"><?= $franchise[0]['name'] ?></h2>
                        <div class="widget card mb-5">
                            <figure class="card-img-top text-center">
                                <img class="img-fluid p-5 py-0"
                                    src="https://cdn.maharashtraudyog.com/public/uploads/franchise/logos/<?= $franchise[0]['logo'] ?>"
                                    alt="" />
                            </figure>
                        </div>
                    </aside>
                    <div class="col-lg-8">
                        <div class="blog single">
                            <div class="card">
                                <div class="swiper-container m-5" data-margin="30" data-dots="true" data-items-xl="2"
                                    data-items-md="2" data-items-xs="1" data-speed="800" data-autoplay="true"
                                    data-autoplaytime="2500" data-loop="true" data-drag="true" data-updateresize="true">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <?php
                                            if (isset($franchise[0]['media']) && is_array($franchise[0]['media']) && count($franchise[0]['media']) > 0) {
                                                foreach ($franchise[0]['media'] as $key => $value) {
                                                    if ($value['type'] == "image") {
                                                        echo '<div class="swiper-slide"> 
                                                                    <figure class="hover-scale rounded cursor-dark">
                                                                    <img src="https://cdn.maharashtraudyog.com/public/uploads/franchise/images/' . $value['hash_name'] . '"alt="" />
                                                                    </figure>
                                                               </div>';
                                                    }
                                                }
                                            } else {
                                                for ($i = 0; $i < 5; $i++) {
                                                    echo '<div class="swiper-slide"> 
                                                <figure class="hover-scale rounded cursor-dark">
                                                <img class="img-fluid p-lg-5" src="../assets/img/picture_240040.png" alt="" /> </figure>
                                            </div>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-5 p-md-8">
                                    <div class="classic-view">
                                        <article class="post">
                                            <div class="post-content mb-5">
                                                <h2 class="h1 mb-4 d-none d-mb-block"><?= $franchise[0]['name'] ?></h2>
                                                <h2 class="h4 mb-4 mt-5">Franchise Details</h2>
                                                <p><?= $franchise[0]['franchise_details'] ?></p>
                                                <hr class="my-5" />
                                                <?php if (isset($franchise[0]['operating_manual']) && $franchise[0]['operating_manual'] != "NA") { ?>
                                                <h2 class="h4 mb-4">Operating Manual</h2>
                                                <p><?php echo $franchise[0]['operating_manual'] ?></p>
                                                <?php } ?>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class="col-lg-4 sidebar mt-lg-0 mt-5">
                        <div class="widget card d-none d-md-block">
                            <figure class="card-img-top text-center">
                                <img class="img-fluid w-75"
                                    src="https://cdn.maharashtraudyog.com/public/uploads/franchise/logos/<?= $franchise[0]['logo'] ?>"
                                    alt="" />
                            </figure>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title mb-3">Business Details</h4>
                            <p><?= $franchise[0]['business_details'] ?></p>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title mb-3">Investment Details</h4>
                            <p><?= $franchise[0]['investment_details'] ?></p>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title mb-3">Royalty Commision</h4>
                            <p><?= $franchise[0]['royalty_comm'] ?></p>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title mb-3">Return on Investment</h4>
                            <p><?= $franchise[0]['roi'] ?></p>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title mb-3">Payback</h4>
                            <p><?= $franchise[0]['payback'] ?></p>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title mb-3">Property</h4>
                            <p><?= $franchise[0]['property'] ?></p>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title mb-3">Floor Area</h4>
                            <p><?= $franchise[0]['floorarea'] ?></p>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title mb-3">Training Location</h4>
                            <p><?= $franchise[0]['training_loc'] ?></p>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title mb-3">Term Duration</h4>
                            <p><?= $franchise[0]['term_duration'] ?></p>
                        </div>
                        <?php
                        if ($franchise[0]['field_assistant']) {
                            echo '<div class="widget">
                                <h4 class="widget-title mb-3">Field Assistant</h4>
                                <p>' . $franchise[0]['field_assistant'] == true ? "Yes" : "" . '</p>
                                </div>';
                        }
                        ?>
                        <?php
                        if ($franchise[0]['agreement']) {
                            echo '<div class="widget">
                                <h4 class="widget-title mb-3">Agreement</h4>
                                <p>' . $franchise[0]['agreement'] == true ? "Yes" : "" . '</p>
                                </div>';
                        }
                        ?>
                        <?php
                        if ($franchise[0]['term_renew']) {
                            echo '<div class="widget">
                                <h4 class="widget-title mb-3">Term Renew</h4>
                                <p>' . $franchise[0]['term_renew'] == true ? "Yes" : "" . '</p>
                                </div>';
                        }
                        ?>
                    </aside>
                </div>
                <div class="row">
                    <div class="col-12 mt-10">
                        <section class="wrapper bg-soft-primary">
                            <div class="container pt-15 pb-10">
                                <div class="row">
                                    <div class="col-xl-10 mx-auto">
                                        <div class="row gy-10 gx-lg-8 gx-xl-12">
                                            <div class="col-lg-12">
                                                <form class="" method="post"
                                                    action="https://maharashtraudyog.com/mr/franchise.php?franchise_id=<?= $_GET['franchise_id'] ?>">
                                                    <input id="" type="hidden" name="franchise_id" class="form-control"
                                                        value="<?= $_GET['franchise_id'] ?>" required>
                                                    <div class="row gx-4">
                                                        <div class="col-md-8">
                                                            <div class="form-floating mb-4">
                                                                <input id="form_name" type="text" name="name"
                                                                    class="form-control" placeholder="Name of Customer"
                                                                    required>
                                                                <label for="form_name">Name of Customer</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-floating mb-4">
                                                                <input id="form_lasstname" type="date" name="dob"
                                                                    class="form-control" placeholder="Date Of Birth"
                                                                    required>
                                                                <label for="form_lastname">Date of Birth
                                                                    *</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-floating mb-4">
                                                                <input id="" type="text" name="contact"
                                                                    class="form-control" placeholder="Contact Number"
                                                                    required>
                                                                <label for="">Contact Number
                                                                    *</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-floating mb-4">
                                                                <input id="" type="text" name="whatsapp"
                                                                    class="form-control" placeholder="WhatsApp Number"
                                                                    required>
                                                                <label for="">WhatsApp Number
                                                                    *</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-select-wrapper mb-4">
                                                                <select class="form-select" id="form-select" name="cast"
                                                                    required>
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
                                                                <select class="form-select" id="form-select"
                                                                    name="maritial" required>
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
                                                                <select class="form-select" id="form-select"
                                                                    name="district" required>
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
                                                                <input id="" type="text" name="comp_name"
                                                                    class="form-control"
                                                                    placeholder="नोकरीं करत असाल तर कंपनीचे नाव">
                                                                <label for="">नोकरीं करत असाल तर कंपनीचे
                                                                    नाव</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-4">
                                                                <input id="" type="text" name="job_desc"
                                                                    class="form-control"
                                                                    placeholder="व्यवसाय करत असाल तर तुमच्या प्रॉडक्ट आणि कंपनीचे नाव">
                                                                <label for="" class="text-truncate w-100">व्यवसाय करत
                                                                    असाल तर तुमच्या
                                                                    प्रॉडक्ट आणि कंपनीचे नाव</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-select-wrapper mb-4">
                                                                <select class="form-select" id="form-select"
                                                                    name="intrest" required>
                                                                    <option selected disabled value="">तुम्ही कुठल्या
                                                                        क्षेत्रात व्यवसाय करू इच्छिता</option>
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
                                                                <textarea id="form_message" name="address"
                                                                    class="form-control" placeholder="Your address"
                                                                    style="height: 150px" required></textarea>
                                                                <label for="form_message">Address
                                                                    *</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-floating mb-4">
                                                                <input id="" type="text" name="acknowledgement"
                                                                    class="form-control"
                                                                    placeholder="मी दिलेली माहिती खरी असून मला उद्योग कर उद्योग या कार्यक्रमात उपस्थित राहायचे आहे."
                                                                    required>
                                                                <label for="" class="text-truncate w-100">मीं दिलेली
                                                                    माहिती खरी असून मला सदर फ्रँचायसी व्यवसाय करण्यास
                                                                    मिळावी ही विनंती.
                                                                    *</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-center mt-5">
                                                            <input type="submit"
                                                                class="btn btn-primary rounded-pill btn-send mb-3"
                                                                value="Apply Now">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
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
                        <address class="pe-xl-15 pe-xxl-17">1206, Navjivan Commercial Co-Op Society, Gate no.2, Building
                            No. 3, Lamington Road, Mumbai Central, Mumbai 400008
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
                    The information provided on this site is not intended as an offer to sell, or the solicitation of an offer to buy, a franchise. It is for informational purposes only. Any franchise offer made is by a Franchise Disclosure Document (FDD) registered in the applicable state. The FDD will include detailed information regarding the franchisor and the franchise opportunity. This website and the information contained herein do not constitute the offering of a franchise in any state or jurisdiction where such an offer or solicitation would be prohibited by law or regulation. The offer of a franchise can only be made through the delivery of a FDD in compliance with applicable laws and regulations. Furthermore, the franchise opportunities described on this website are only available in certain states and countries. Maharashtra Udyog will not offer or sell franchises in states or countries where registration or other requirements have not been fulfilled. Prospective franchisees are advised to carefully review the FDD and consult with legal and financial advisors before making any decision to invest in a franchise opportunity. The decision to purchase a franchise should be made after careful consideration of all information and factors involved. Maharashtra Udyog does not guarantee the success of any franchisee or the profitability of any franchise. Individual success will depend on a variety of factors, including the franchisee’s skill, effort, and dedication to operating the franchise business.
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
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>