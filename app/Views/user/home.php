<!DOCTYPE html>
<html lang="zxx" class="no-js" ng-app="apps" ng-controller="homeController" ng-init="init()">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Coffee</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="home/css/linearicons.css">
    <link rel="stylesheet" href="home/css/font-awesome.min.css">
    <link rel="stylesheet" href="home/css/bootstrap.css">
    <link rel="stylesheet" href="home/css/magnific-popup.css">
    <link rel="stylesheet" href="home/css/nice-select.css">
    <link rel="stylesheet" href="home/css/animate.min.css">
    <link rel="stylesheet" href="home/css/owl.carousel.css">
    <link rel="stylesheet" href="home/css/main.css">
</head>

<body>

    <header id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.html"><img src="home/img/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="#home">Home</a></li>
                        <li><a href="#about">Temukan Cafe</a></li>
                        <li><a href="#coffee">Login Admin</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->


    <!-- start banner Area -->
    <section class="banner-area" id="home">
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-start">
                <div class="banner-content col-lg-7">
                    <h1>
                        Mulailah hari anda <br>
                        dengan segelas kopi
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Start menu Area -->
    <section class="menu-area section-gap" id="about">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">Temukan cafe favorit anda</h1>
                        <p>Sesuaikan kriteria cafe yang anda inginkan</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-menu">
                        <form ng-submit="hitung()">
                            <div class="form-group" ng-repeat="item in datas">
                                <label style="color: #222222;font-weight: 600;">{{item.nama}}</label>
                                <select class="form-control" ng-model="item.value">
                                    <option ng-repeat="sub in item.range" value="{{sub.bobot}}">{{sub.range}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Hitung</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End menu Area -->

    <!-- Start gallery Area -->
    <section class="gallery-area section-gap" id="gallery">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">What kind of Coffee we serve for you</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <a href="img/g1.jpg" class="img-pop-home">
                        <img class="img-fluid" src="home/img/g1.jpg" alt="">
                    </a>
                    <a href="img/g2.jpg" class="img-pop-home">
                        <img class="img-fluid" src="home/img/g2.jpg" alt="">
                    </a>
                </div>
                <div class="col-lg-8">
                    <a href="img/g3.jpg" class="img-pop-home">
                        <img class="img-fluid" src="home/img/g3.jpg" alt="">
                    </a>
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="img/g4.jpg" class="img-pop-home">
                                <img class="img-fluid" src="home/img/g4.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a href="img/g5.jpg" class="img-pop-home">
                                <img class="img-fluid" src="home/img/g5.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End gallery Area -->


    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
                        </p>
                        <p class="footer-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <div class="col-lg-5  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">
                            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                </div>

                                <div class="info pt-20"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="home/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="<?= base_url() ?>/libs/angular/angular.min.js"></script>
    <script src="<?= base_url() ?>/js/services/helper.services.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="home/js/vendor/bootstrap.min.js"></script>
    <script src="home/js/easing.min.js"></script>
    <script src="home/js/hoverIntent.js"></script>
    <script src="home/js/superfish.min.js"></script>
    <script src="home/js/jquery.ajaxchimp.min.js"></script>
    <script src="home/js/jquery.magnific-popup.min.js"></script>
    <script src="home/js/owl.carousel.min.js"></script>
    <script src="home/js/jquery.sticky.js"></script>
    <script src="home/js/jquery.nice-select.min.js"></script>
    <script src="home/js/parallax.min.js"></script>
    <script src="home/js/waypoints.min.js"></script>
    <script src="home/js/jquery.counterup.min.js"></script>
    <script src="home/js/mail-script.js"></script>


    <script>
        angular.module('apps', ['helper.service'])
            .controller('homeController', homeController);

        function homeController($scope, $http, helperServices) {
            $scope.init = () => {
                $http({
                    method: 'get',
                    url: helperServices.url + 'kriteria/read'
                }).then(res => {
                    $scope.datas = res.data;
                    console.log($scope.datas);
                })
            }

            $scope.hitung = ()=>{
                $http({
                    method: 'post',
                    url: helperServices.url + 'hasil/ambil',
                    data: $scope.datas
                }).then(res => {
                    $scope.datas = res.data;
                    console.log($scope.datas);
                })
            }
        }
    </script>
    <script src="home/js/main.js"></script>
</body>

</html>