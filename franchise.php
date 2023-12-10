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

    if (isset($curl_response['status']) && $curl_response['status'] == "success") {
        echo "<script>alert('Application Submitted')</script>";
    } else {
        echo "<script>alert('Something went wrong')</script>";
    }

    header('Location: https://maharashtraudyog.com?franchise.php?franchise_id=' . $_GET["franchise_id"]);
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
$curl_request = curl_exec($ch);

curl_close($ch);
$curl_response = json_decode($curl_request, true);
$franchise = array();

if (isset($curl_response['status']) && $curl_response['status'] == "success") {
    $franchise = $curl_response['franchise'];
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
                                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
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
        <section class="wrapper bg-light">
            <div class="container py-10 py-md-10">
                <div class="row gx-lg-8 gx-xl-12">
                    <div class="col-lg-8">
                        <div class="blog single">
                            <div class="card">
                                <figure class="card-img-top text-center"><img class="img-fluid w-auto"
                                        src="https://cdn.maharashtraudyog.com/public/uploads/franchise/logos/<?= $franchise[0]['logo'] ?>"
                                        alt="" /></figure>
                                <div class="card-body">
                                    <div class="classic-view">
                                        <article class="post">
                                            <div class="post-content mb-5">
                                                <h2 class="h1 mb-4"><?= $franchise[0]['name'] ?></h2>
                                                <h2 class="h4 mb-4">Franchise Details</h2>
                                                <p><?= $franchise[0]['franchise_details'] ?></p>
                                                <hr class="my-5" />
                                                <div class="row g-6 mt-3 mb-10">
                                                    <?php
                                                    foreach ($franchise[0]['media'] as $key => $value) {
                                                        if ($value['type'] == "image") {
                                                            echo '<div class="col-md-6">
                                                                    <figure class="hover-scale rounded cursor-dark">
                                                                    <img src="https://cdn.maharashtraudyog.com/public/uploads/franchise/images/' . $value['hash_name'] . '"alt="" />
                                                                    </figure>
                                                                </div>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <hr class="my-5" />
                                                <h2 class="h4 mb-4">Operating Manual</h2>
                                                <p><?= $franchise[0]['operating_manual'] ?></p>
                                                <hr class="my-5" />
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class="col-lg-4 sidebar mt-11 mt-lg-6">
                        <div class="widget">
                            <h4 class="widget-title mb-3"><?= $franchise[0]['name'] ?></h4>
                            <p><?= $franchise[0]['franchise_details'] ?></p>
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
                    <div class="col-12 mt-15">
                        <section class="wrapper bg-soft-primary">
                            <div class="container pt-15 pb-10">
                                <div class="row">
                                    <div class="col-xl-10 mx-auto">
                                        <div class="row gy-10 gx-lg-8 gx-xl-12">
                                            <div class="col-lg-12">
                                                <form class="" method="post"
                                                    action="https://maharashtraudyog.com/franchise.php?franchise_id=<?= $_GET['franchise_id'] ?>">
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
                                                                <input id="" type="text" name="job_desc"
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
                                                                <label for="">व्यवसाय करत असाल तर तुमच्या
                                                                    प्रॉडक्ट आणि कंपनीचे नाव</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-select-wrapper mb-4">
                                                                <select class="form-select" id="form-select"
                                                                    name="district" required>
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
                                                                <label for="">मी दिलेली माहिती खरी असून मला उद्योग कर
                                                                    उद्योग या कार्यक्रमात उपस्थित राहायचे आहे.
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