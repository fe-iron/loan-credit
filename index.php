<?php

    include 'admin/connection.php';
    
    $conn = OpenCon();

    $sql = "SELECT * FROM carousal ORDER BY date limit 3";
    $carousal = $conn->query($sql);

    if ($carousal->num_rows > 0) {
        // output data of each row
        $text = '';
        $i = 1;
        while($row = $carousal->fetch_assoc()) {
            if($i == 1){
                $text = $text . '<div class="carousel-item active">
                    <img class="d-block w-100" src="admin/upload/'.$row['image_url'].'" style="max-width: fit-content;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="carousal-h5">'.$row['heading'].'</h5>
                        <p class="carousal-p">'.$row['sub_heading'].'</p>
                    </div>
                </div>';
            }else{
                $text = $text . '<div class="carousel-item">
                    <img class="d-block w-100" src="admin/upload/'.$row['image_url'].'" style="max-width: fit-content;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="carousal-h5">'.$row['heading'].'</h5>
                        <p class="carousal-p">'.$row['sub_heading'].'</p>
                    </div>
                </div>';
            }
            $i += 1;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Eazy Credit Solution - All Type Loan Provide</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Include All CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/payloan-icon.css"/>
        <link rel="stylesheet" type="text/css" href="css/icofont.css"/>
        <link rel="stylesheet" type="text/css" href="css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="css/settings.css"/>
        <link rel="stylesheet" type="text/css" href="css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="css/owl.theme.css"/>
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css"/>
        <link rel="stylesheet" type="text/css" href="css/preset.css"/>
        <link rel="stylesheet" type="text/css" href="css/theme.css"/>
        <link rel="stylesheet" type="text/css" href="css/responsive.css"/>
        <!-- Favicon Icon -->
        <link rel="icon"  type="image/png" href="images/fav.png">
    </head>
    <body>
        <!-- Preloading -->
        <div class="preloader text-center">
            <div class="la-ball-circus la-2x">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- Preloading -->
        <!-- Header section -->
        <header class="header_1" id="header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="index.php"><img src="images/loan_logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <nav class="mainmenu MenuInRight text-right">
                            <a href="javascript:void(0);" class="mobilemenu d-md-none d-lg-none d-xl-none">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <ul>
                                <li class="menu-item-has-children">
                                    <a href="index.php">home</a>
                                    
                                </li>
                                
                                <li class="menu-item-has-children">
                                    <a href="about.html">About</a>
                                </li>

                                <li><a href="contact.html">Contact</a></li>

                                <li class="menu-item-has-children">
                                    <a href="user/login.php">Login</a>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-2 hidden-xs">
                        <div class="navigator_btn btn_bg text-right">
                            <a class="common_btn" href="user/signup.php">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        

        <section>
                        <div id="carouselExampleIndicators" class="carousel " data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
                            </ol>
                            <div class="carousel-inner">
                            <?php echo $text; ?>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="images/slider/11.jpg" alt="First slide" style="max-width: fit-content;">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="carousal-h5 text-bold">Personal Loans</h5>
                                    <p class="carousal-p">At Eazy Credit Solution, we want to help you achieve your personal dreams.</p>
                                  </div>
                              </div>

                              
                              <div class="carousel-item">
                                <img class="d-block w-100" src="images/slider/12.jpg" alt="Second slide" style="max-width: fit-content;">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="carousal-h5">Interest</h5>
                                    <p class="carousal-p">Enjoy pocket-friendly
                                        interest rates</p>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="images/slider/13.jpg" alt="Third slide" style="max-width: fit-content;">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="carousal-h5">INSTANT APPROVAL</h5>
                                    <p class="carousal-p">Fill in your details and get instant approval on the loan amount</p>
                                  </div>
                              </div>
                            </div>
                          </div>
                   
        </section>

        <section class="commonSection homeService">
            <div class="container">
                <h2 class="text-center text-bold" style="font-weight: 700">The Different Types of Loans Available in India - Eazy Credit Solution</h2>
                <h5 class="text-center"></h5>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mt176">
                        <div class="singleService_2">
                            <div class="flipper">
                                <div class="front">
                                    <i class="flaticon-mortgage-loan"></i>
                                    <h1>10.50% - 14%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Business Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                                <div class="back">
                                    <i class="flaticon-mortgage-loan"></i>
                                    <h1>10.50% - 14%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Business Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="singleService_2">
                            <div class="flipper">
                                <div class="front">
                                    <i class="flaticon-money"></i>
                                    <h1>10.50% - 14%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Personal Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                                <div class="back">    
                                    <i class="flaticon-money"></i>
                                    <h1>10.50% - 14%</h1>
                                
                                    <div class="clearfix"></div>
                                    <h4>Personal Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                            </div>
                        </div>
                        <div class="singleService_2">
                            <div class="flipper">
                                <div class="front">
                                    <i class="flaticon-loan-1"></i>
                                    <h1>28.6%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Education Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                                <div class="back">
                                    <i class="flaticon-loan-1"></i>
                                    <h1>28.6%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Education Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-lg-4 col-md-6 mt176">
                        <div class="singleService_2">
                            <div class="flipper">
                                <div class="front">
                                    <i class="flaticon-mortgage-loan"></i>
                                    <h1>6.95% - 13%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Cash Credit & Over Draft Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                                <div class="back">
                                    <i class="flaticon-mortgage-loan"></i>
                                    <h1>6.95% - 13%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Cash Credit & Over Draft Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="singleService_2">
                            <div class="flipper">
                                <div class="front">
                                    <i class="flaticon-money"></i>
                                    <h1>11% - 24%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Mortgage Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                                <div class="back">
                                    <i class="flaticon-money"></i>
                                    <h1>11% - 24%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Mortgage Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                            </div>
                        </div>
                        <div class="singleService_2">
                            <div class="flipper">
                                <div class="front">
                                    <i class="flaticon-loan-1"></i>
                                    <h1>6.50% - 11%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Home Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                                <div class="back">
                                    <i class="flaticon-loan-1"></i>
                                    <h1>6.95% - 13%</h1>
                                    <div class="clearfix"></div>
                                    <h4>Home Loan</h4>
                                    <p>Stay turned into the world of finance & business.</p>
                                    <h5>20 months installment</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Common section -->

        <!-- Common section -->
        <section class="commonSection homeContact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="contactArea">
                            <h3>Our manager will contact you to clear the details.</h3>
                            <p>We are here to help you when you need your financial support, then we are help you.</p>
                            <p>Call / WhatsApp us from below button for any query you have.</p>
                            <a href="tel:894-401-4303" class="common_btn">Call Us Now</a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="contactThumb">
                            <img src="images/home/1.png" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Common section -->




        
        <!-- Page Banner -->
        <section class="pagebanner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bannerTitle text-left">
                            <h2>Get an Instant Loan</h2>
                            <ul>
                                <li style="list-style: circle;">Quick Disbursal up to ₹5 Lakh</li>
                                <li style="list-style: circle;">Low Monthly Interest Starting from 6.0%</li>
                                <li style="list-style: circle;">Get an Instant Loan</li>
                            </ul>
                            <p> <br>
 <br>                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Banner -->   

        <!-- Common Section -->
        <section class="commonSection calculationPage">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-12">
                        <div class="tw-stretch-element-inside-column">
                            <div class="calculationThumb">
                                <img src="images/calculation.png" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-12">
                        <div class="caclculationFrom">
                            <form action="#" method="post" class="row" name="loan">
                                <span class="back">
                                    <h4 style="font-weight: 700">Approved Instantly!*</h4>
                                    <h5></h5>
                                    
                                    <p>What is your Desired Loan Amount?</p>
                                </span>
                                <div class="col-md-12">
                                    <div id="price_range"></div>
                                    <div class="amount_range">
                                        <label for="amount"></label>
                                        <input type="text" id="amount" value="₹25,000">
                                    </div>
                                    <a href="user/signup.php" class="common_btn" style="border-radius: 3px;">Apply Now</a>
                                </div>
                                

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Common Section -->  





        <!-- Common section -->
        <section class="commonSection applicatioProces">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="sec_title">Fast and Very Easy<br> Application Process Here</h2>
                        <p class="sec_desc">We are here to help you when you need your financial<br> support, then we are help you.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="singleProcess_2 mr_40">
                            <div class="flipper">
                                <div class="front">
                                    <div class="bg_number">
                                        <h1>01</h1>
                                    </div>
                                    <h4>Apply Bank Loan</h4>
                                    <p>We are provide best services and finaancial solution for you.</p>
                                </div>
                                <div class="back">
                                    <div class="bg_number">
                                        <h1>01</h1>
                                    </div>
                                    <h4>Apply Bank Loan</h4>
                                    <p>We are provide best services and finaancial solution for you.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="singleProcess_2 mlr_40">
                            <div class="flipper">
                                <div class="front">
                                    <div class="bg_number">
                                        <h1>02</h1>
                                    </div>
                                    <h4>Approved Bank Loan</h4>
                                    <p>We usually takes 24 hours to Approve Loans.</p>
                                </div>
                                <div class="back">
                                    <div class="bg_number">
                                        <h1>02</h1>
                                    </div>
                                    <h4>Approved Bank Loan</h4>
                                    <p>We usually takes 24 hours to Approve Loans.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="singleProcess_2 ml_40">
                            <div class="flipper">
                                <div class="front">
                                    <div class="bg_number">
                                        <h1>03</h1>
                                    </div>
                                    <h4>Review Your Loan</h4>
                                    <p>Verify your Documents and call you where necessary.</p>
                                </div>
                                <div class="back">
                                    <div class="bg_number">
                                        <h1>03</h1>
                                    </div>
                                    <h4>Review Your Loan</h4>
                                    <p>Verify your Documents and call you where necessary.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Common section -->

        <!-- Common section -->
        <section class="commonSection applyAmoutSec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="sec_title">Get your Loans Query<br> Resolved</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="applyamountFrom">
                            <form action="#" method="post">
                                <input type="number" step="any" style="margin: 10px 0;" name="fname" placeholder="Full Name">
                                <input type="number" step="any" tyle="margin: 10px 0;" name="phone" placeholder="Mobile Number">
                                <input type="number" step="any" name="phone" tyle="margin: 10px 0;" placeholder="Email">
                                <input type="number" step="any" name="amount" tyle="margin: 10px 0;" placeholder="Amount">
                                <input type="number" step="any" name="amount" tyle="margin: 10px 0;" placeholder="Long of months?">
                                <input type="number" step="any" name="amount" tyle="margin: 10px 0;" placeholder="Installment amount.">
                                <button class="common_btn" type="submit">Subscribe Now</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7">
                    </div>
                </div>
            </div>
        </section>
        <!-- Common section -->

        <!-- Common section -->
        <section class="commonSection">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="sec_title">Expert team members</h2>
                        <p class="sec_desc">We are here to help you when you need your financial<br> support, then we are help you.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="singleTeam text-center">
                            <img src="images/team/1.png" alt="">
                            <h4>Avijit pal</h4>
                            <p>Managing Director <br/>Branch: Onda Bankura</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="singleTeam text-center">
                            <img src="images/team/2.png" alt="">
                            <h4>Aparajita Tah</h4>
                            <p>Commercial Manager <br/>Branch: Seharabajar-Burdwan</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="singleTeam text-center">
                            <img src="images/team/gm.jpg" alt="">
                            <h4>Arijit Pal</h4>
                            <p>General Manager <br>Branch: Bankura</p>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="singleTeam text-center">
                            <img src="images/team/hm.jpg" alt="">
                            <h4>Sekh Bappa</h4>
                            <p>Head of Marketing <br>Branch: Indus bankura</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Common section -->

        <!-- Common section -->
        <section class="commonSection custome_sec_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="sec_title">How to say our most<br> honorable customer</h2>
                        <p class="sec_desc">We are here to help you when you need your financial<br> support, then we are help you.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="customer_area">
                            <div class="singleCustomer">
                                <img src="images/about/5.png" alt=""/>
                                <div class="quote_img"><img src="images/quote.png" alt=""/></div>
                                <p>
                                    From time time we need generate
                                    sample names to populate a test
                                    database usually just requiring first
                                    and last names address.
                                </p>
                                <h5>Austin Matthews</h5>
                                <div class="cus_signature">
                                    <img src="images/signature.png" alt=""/>
                                </div>
                            </div>
                            <div class="singleCustomer">
                                <img src="images/about/5.png" alt=""/>
                                <div class="quote_img"><img src="images/quote.png" alt=""/></div>
                                <p>
                                    From time time we need generate
                                    sample names to populate a test
                                    database usually just requiring first
                                    and last names address.
                                </p>
                                <h5>Evelyn Goodman</h5>
                                <div class="cus_signature">
                                    <img src="images/signature.png" alt=""/>
                                </div>
                            </div>
                            <div class="singleCustomer">
                                <img src="images/about/5.png" alt=""/>
                                <div class="quote_img"><img src="images/quote.png" alt=""/></div>
                                <p>
                                    From time time we need generate
                                    sample names to populate a test
                                    database usually just requiring first
                                    and last names address.
                                </p>
                                <h5>Calvin Cannon</h5>
                                <div class="cus_signature">
                                    <img src="images/signature.png" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="customer_thumb">
                            <img src="images/about/3.png" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Common section -->


        <!-- footer section -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <aside class="widget about_widgets">
                            <img src="images/loan_logo.png" alt=""/>
                            <h4>Contact Us</h4>
                            <p><span style="color: black;">Mob:</span>+91 89 440 14303</p>
                            <p></p><a href="mailto:support.eazycreditsolution.com">support.eazycreditsolution.com</a></p>
                        </aside>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <aside class="widget recent_posts">
                            <div class="singleLPost">
                                <h4><a href="#">What should you need do to get personal loan very easay.</a></h4>
                                <span>Recent Update</span>
                                <p>
                                    Many modern alternatives often eumen incorpo
                                    other content actually detracts from...
                                </p>
                            </div>
                            <div class="singleLPost">
                                <h4><a href="#">What should you need do to get personal loan very easay.</a></h4>
                                <span>Recent Update</span>
                                <p>
                                    Many modern alternatives often eumen incorpo
                                    other content actually detracts from...
                                </p>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="singleLPost">
                            <h4><a>Our Address</a></h4>
                            
                            <p>
                                UTTARAN LALBAJAR, BESIDES BANK OF INDIA
                            </p>
                            <p>BANKURA, PIN 722101</p>
                        </div>
                    
                        
                        
                        <div class="singleLPost"></div>
                            <h3 class="text-bold"> </h3>
                            <h4>
                                <a href="#"></a>
                            </h4>
                            <h4></h4>
                            
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer section -->

        <!-- Copyright section -->
        <section class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Copyright <a href="http://eazycreditsolution.com/">Eazy Credit Solution</a> - All Type Loan Provide</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="#" id="backTo"><i class="flaticon-chevron"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Copyright section -->

        <!-- Include All JS -->
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/jquery.themepunch.revolution.min.js"></script>
        <script src="js/jquery.themepunch.tools.min.js"></script>
        
        <script src="js/jquery-ui.js"></script>
        <script src="js/shuffle.js"></script>
        <script src="js/slick.js"></script>
        <script src="js/gmaps.js"></script>
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyCysDHE3s4Qw3nTh9o58-2mJcqvR6HV8Kk"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/theme.js"></script>
    </body>

</html>