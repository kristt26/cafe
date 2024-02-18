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
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js"></script>
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
                        <form ng-submit="hitung()" ng-show="!hasil">
                            <div class="form-group" ng-repeat="item in datas">
                                <label style="color: #222222;font-weight: 600;">{{item.nama}}</label>
                                <select class="form-control" ng-model="item.value">
                                    <option ng-repeat="sub in item.range" value="{{sub.bobot}}">{{sub.range}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                            </div>
                        </form>
                        <div ng-show="hasil">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Urutan</th>
                                        <th>Cafe</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in hasil.alternatif">
                                        <td>{{$index+1}}</td>
                                        <td>{{item.nama}}</td>
                                        <td>{{item.preferensi.toFixed(2)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <button type="button" ng-click="ulang()" class="btn btn-secondary btn-sm">Ulangi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End menu Area -->

    <!-- Start gallery Area -->
    <!-- <section class="gallery-area section-gap" id="gallery">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">Persebaran lokasi cafe</h1>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
    </section> -->
    <div id="map"></div>
    <pre id="info"></pre>
    <!-- End gallery Area -->


    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
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
            $scope.map = false;
            let marker, geocoder, geolocate, direction;
            var directions = [];
            let map1 = [];
            $scope.init = () => {
                $http({
                    method: 'get',
                    url: helperServices.url + 'kriteria/read'
                }).then(res => {
                    $scope.datas = res.data;
                    console.log($scope.datas);
                })
            }
            mapboxgl.accessToken = 'pk.eyJ1Ijoia3Jpc3R0MjYiLCJhIjoiY2xyYnU5bDZjMG9uMjJtcDF0aTlhdjJwYSJ9.XQTFFfF91zWgPM02hDMHGQ';
            const map = new mapboxgl.Map({
                container: 'map', // container id
                // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                style: 'mapbox://styles/mapbox/streets-v12',
                center: [140.7051989, -2.5570135], // starting position
                zoom: 12 // starting zoom
            });
            marker = new mapboxgl.Marker().setLngLat([140.703739, -2.538754]).addTo(map);

            geocoder = new MapboxGeocoder({
                // Initialize the geocoder
                accessToken: mapboxgl.accessToken, // Set the access token
                mapboxgl: mapboxgl, // Set the mapbox-gl instance
                marker: false, // Do not use the default marker style
                placeholder: 'Search for places in Jayapura',
                bbox: [139.422743, -3.753267, 141.0163745, -2.2925515],
                proximity: {
                    longitude: 140.704829,
                    latitude: -2.540538
                }
            });
            map.addControl(geocoder);
            map.on('load', () => {
                map.addSource('single-point', {
                    type: 'geojson',
                    data: {
                        type: 'FeatureCollection',
                        features: []
                    }
                });

                map.addLayer({
                    id: 'point',
                    source: 'single-point',
                    type: 'circle',
                    paint: {
                        'circle-radius': 10,
                        'circle-color': '#448ee4'
                    }
                });

                // Listen for the `result` event from the Geocoder
                // `result` event is triggered when a user makes a selection
                //  Add a marker at the result's coordinates
                geocoder.on('result', (event) => {
                    map.getSource('single-point').setData(event.result.geometry);
                });
            });
            geolocate = new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true,
                showUserHeading: true
            })
            map.addControl(geolocate);
            map.on("load", function() {
                geolocate.trigger();
            });

            geolocate.on("geolocate", locateUser);

            function locateUser(e) {
                $scope.long = e.coords.longitude;
                $scope.lat = e.coords.latitude;
            }

            map.on('click', (e) => {
                document.getElementById('info').innerHTML =
                    // `e.point` is the x, y coordinates of the `mousemove` event
                    // relative to the top-left corner of the map.
                    JSON.stringify(e.point) +
                    '<br />' +
                    // `e.lngLat` is the longitude, latitude geographical position of the event.
                    JSON.stringify(e.lngLat.wrap());
                $scope.$applyAsync(x => {
                    $scope.map = false;
                    $scope.model.lat = e.lngLat.lat;
                    $scope.model.long = e.lngLat.lng;
                    var setUrl = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + $scope.model.long + ',' + $scope.model.lat + '.json?access_token=' + mapboxgl.accessToken;
                    console.log(setUrl);
                    $http({
                        method: 'get',
                        url: setUrl,
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }).then(res => {
                        $scope.model.alamat = res.data.features[0].place_name;
                    }, err => {

                    });
                })
            });
            $scope.tampilMap = () => {
                $scope.map = true;
            };
            var url = "https://api.mapbox.com/directions-matrix/v1/mapbox/walking/140.7052584,-2.5565861;140.70497828984,-2.5369845726705?sources=1&annotations=distance,duration&access_token=pk.eyJ1Ijoia3Jpc3R0MjYiLCJhIjoiY2txcWt6dHgyMTcxMzMwc3RydGFzYnM1cyJ9.FJYE8uVi-eVl_mH_DLLEmw"
            // setTimeout(() => {
            //     cafeServices.get().then((res) => {
            //         $scope.datas = res;
            //         $scope.datas.forEach(element => {
            //             var Url = "https://api.mapbox.com/directions-matrix/v1/mapbox/walking/" + $scope.long + "," + $scope.lat + ";" + element.long + "," + element.lat + "?sources=1&annotations=distance,duration&access_token=pk.eyJ1Ijoia3Jpc3R0MjYiLCJhIjoiY2txcWt6dHgyMTcxMzMwc3RydGFzYnM1cyJ9.FJYE8uVi-eVl_mH_DLLEmw";
            //             $http({
            //                 method: 'get',
            //                 url: Url
            //             }).then(res => {
            //                 element.jarak = (res.data.distances[0][0]);
            //                 console.log(element);
            //             }, err => {

            //             });
            //         });
            //     })
            // }, 1500);

            $scope.hitung = () => {
                $http({
                    method: 'post',
                    url: helperServices.url + 'hasil/ambil',
                    data: $scope.datas
                }).then(res => {
                    $scope.cafe = res.data;
                    $scope.itemJarak = $scope.datas.find(x => x.nama == 'Jarak');
                    console.log(res.data);
                    $scope.cafe.forEach((element, ind) => {
                        var Url = "https://api.mapbox.com/directions-matrix/v1/mapbox/walking/" + $scope.long + "," + $scope.lat + ";" + element.long + "," + element.lat + "?sources=1&annotations=distance,duration&access_token=pk.eyJ1Ijoia3Jpc3R0MjYiLCJhIjoiY2txcWt6dHgyMTcxMzMwc3RydGFzYnM1cyJ9.FJYE8uVi-eVl_mH_DLLEmw";
                        $http({
                            method: 'get',
                            url: Url
                        }).then(res => {
                            element.jarak = (res.data.distances[0][0]);
                            console.log(element);
                            element.in = true;
                            var setJarak = $scope.itemJarak.range.find(x => x.bobot == $scope.itemJarak.value);
                            if (setJarak.bobot == "1") {
                                if ((element.jarak / 1000) >= 10) {
                                    $scope.itemJarak.value = setJarak.bobot;
                                    element.kriteria.push($scope.itemJarak);
                                }
                            } else {
                                $scope.itemJarak.range.forEach(jarak => {
                                    var item = setJarak.range.split("-")
                                    if ((element.jarak / 1000) >= parseFloat(item[0]) && (element.jarak / 1000) <= parseFloat(item[1])) {
                                        $scope.itemJarak.value = jarak.bobot;
                                        element.kriteria.push($scope.itemJarak);
                                    }
                                });
                            }
                            if (ind === ($scope.cafe.length - 1)) {
                                $http({
                                    method: "post",
                                    url: helperServices.url + 'hasil/hitung',
                                    data: $scope.cafe
                                }).then(res => {
                                    $scope.hasil = res.data
                                    console.log(res.data);
                                })
                            }

                        }, err => {});
                    });
                })
            }

            $scope.ulang = () => {
                $scope.hasil = null;
            }
        }
    </script>
    <script src="home/js/main.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css" type="text/css">
</body>

</html>