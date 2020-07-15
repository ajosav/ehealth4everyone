<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-health4everyone</title>
        <link rel="icon" type="image/x-icon" href="{{asset('front/assets/img/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('front/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{asset('front/assets/img/ehealth_teal_green_70px.png')}}" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        @if (session('status'))
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/dashboard')}}">Dashboard</a></li>
                            {{ session('status') }}
                        
                        @endif
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('login')}}">Login</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('register')}}">Signup</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome We are eHealth4everyone</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Who We Are</h2>
                    <h3 class="section-subheading text-muted"><hr></h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fab fa-accessible-icon fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Our Mission</h4>
                        <p class="text-muted">Advance the frontiers of digital health, through invention, innovation and implementation.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-fire-alt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Our Passion</h4>
                        <p class="text-muted">We are passionate about the advancement of our society and the healthcare of everyone. This gives us the daily enthusiasm and drive to make positive change. We are not satisfied with the status quo. We never give up!</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-binoculars fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Our Vision</h4>
                        <p class="text-muted">Better health for everyone, through innovative digital technologies.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">What We do</h2>
                    <h3 class="section-subheading text-muted">The dashboards we make are interactive, near real-time and work both offline and in areas with poor network quality (2G and 3G).</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('front/assets/img/portfo/analytic_dashboard.png')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">MSDAT</div>
                                <div class="portfolio-caption-subheading text-muted">Multi-source Dashboard Analytics & Triangulation Platform</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('front/assets/img/portfo/central_analytic_dashboard.png')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">NHMIS</div>
                                <div class="portfolio-caption-subheading text-muted">Analysis on Key Health Indicators</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('front/assets/img/portfo/nmhis_reporting_rate.png')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">NMHIS</div>
                                <div class="portfolio-caption-subheading text-muted">Reporting Rates Dashboard - Power Bi</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('front/assets/img/portfo/nhmis_analysis.png')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">CAD</div>
                                <div class="portfolio-caption-subheading text-muted">Central Analytic Dashbard - Power Bi</div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Training</h2>
                    <h3 class="section-subheading text-muted">Achieve Your Personal and Professional Goals, Build your data management skills</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('front/assets/img/about/1.jpg')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>eHealth Training</h4>
                                <h4 class="subheading">Introduction</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">

                                    Introduction to Digital Health
                                    Foundations of mHealth (Mobile Health)
                                    Essentials of Health Data Management
                                    Introduction to Public Health Information System & DHIS2
                                    Electronic medical Records
                                    eHealth Governance for Managers
                                    Understanding the Nigeria eHealth Strategic Framework (2015 – 2020)
                                    eHealth Privacy, Security & Confidentiality
                                    Health Information Technology Standards & Interoperability
                                    Use of Mobile Behaviour Change Communication for Healthcare
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('front/assets/img/about/2.jpg')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>DHIS2 Training</h4>
                                <h4 class="subheading">Beginners and Advance</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Introduction to the DHIS2 System, Understanding the Nigerian DHIS2 Instance, Data Entry & Analysis. <br>Sharing Analysis, Setting up DHIS2, User Management, Reporting functionalities, Appearance settings, Configuration and maintenance , Program Data Entry/Tracker capture & Program Data Analysis.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('front/assets/img/about/3.jpg')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Data Analytics Training</h4>
                                <h4 class="subheading">Complete Training</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    Introduction to data analytics
                                    Use of SPSS
                                    Use of STATA
                                    Use of Power BI
                                    Use of Epi Info
                                    Data Analysis using DHIS2 (Pivot table and Visualizer)
                                    Data Analysis using Excel
                                    Use of SAS
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('front/assets/img/about/4.jpg')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>July 2014</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of The
                                <br />
                                Training!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Other Services</h2>
                    <h3 class="section-subheading text-muted">We can help with your dashboard needs</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('front/assets/img/team/1.jpg')}}" alt="" />
                            <h4>Health Dashboard Development</h4>
                            <p class="text-muted">We are experts in dashboard engineering and have made lot of dashboard fro governments and non governmental organizations</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('front/assets/img/team/2.jpg')}}" alt="" />
                            <h4>Electronic Medical Record System</h4>
                            <p class="text-muted">Our developed Madical Record System (EMR) is not only state of the art and innovative but it is the first step of transforming the healthcare system of the nation</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('front/assets/img/team/3.jpg')}}" alt="" />
                            <h4>Mobile data collection</h4>
                            <p class="text-muted">By Digitally recording information at the source of it's origin, you don't have to waste time typing data into a spreadsheet or to worry about not being able to read illegible values from data capture tools</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">One of our developed EMRs is Smartacare which we developed and deployed at the University of Uyo Nephrology and Dialysis Unit and is accessible at smartacare.com/smartacare/login.htm</p></div>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Joshua Adebayo 2020</div>
                    
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('front/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">MSDAT</h2>
                                    <p class="item-intro text-muted">Multi-source Dashboard Analytics & Triangulation Platform </p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('front/assets/img/portfo/analytic_dashboard.png')}}" alt="" />
                                    <p>This multi-source data analytic resource developed by the Federal Ministry of Health (FMoH) Nigeria provides a single transparent view of key health indicators from multiple data sources.</p>
                                    
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('front/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">NHMIS</h2>
                                    <p class="item-intro text-muted">Analysis on Key Health Indicators</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('front/assets/img/portfo/central_analytic_dashboard.png')}}" alt="" />
                                    <p>This contains the summary of the analysis of key NHMIS indicators with interpretations. It touches different program areas including Reproductive, Maternal, Nutrition, Child health, Immunization, Malaria etc. </p>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('front/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">NMHIS</h2>
                                    <p class="item-intro text-muted">Reporting Rates Dashboard - Power Bi</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('front/assets/img/portfo/nmhis_reporting_rate.png')}}" alt="" />
                                    <p>This dashboard tracks the reporting rate (in days) of the Monitoring and Evaluation (M&E) officers responsible for reporting aggregate health data monthly using the NHMIS platform.</p>
                                   
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('front/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">CAD</h2>
                                    <p class="item-intro text-muted">Central Analytic Dashbard - Power Bi</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('front/assets/img/portfo/nhmis_analysis.png')}}" alt="" />
                                    <p>This dashboard displays analysis of all key health indicators in the country obtained from a central analytic repository. It will retrieve its data from different data sources including but not limited to DHIS2, NDHS, NBS, data sources portal and other relevant data sources. </p>
                                    
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
       
        <!-- Core theme JS-->
        <script src="{{asset('front/js/scripts.js')}}"></script>
    </body>
</html>

