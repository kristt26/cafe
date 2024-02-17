angular.module('adminctrl', [])
    // Admin
    .controller('dashboardController', dashboardController)
    .controller('cafeController', cafeController)
    .controller('kriteriaController', kriteriaController)
    .controller('penilaianController', penilaianController)
    .controller('hasilController', hasilController)
    ;

function dashboardController($scope, dashboardServices) {
    $scope.$emit("SendUp", "Dashboard");
    $scope.datas = {};
    $scope.title = "Dashboard";
    // dashboardServices.get().then(res=>{
    //     $scope.datas = res;
    // })
}

function cafeController($scope, cafeServices, pesan, helperServices, $http) {
    $scope.setTitle = "Cafe";
    $scope.$emit("SendUp", $scope.setTitle);
    $scope.datas = [];
    $scope.model = {};
    $scope.map = false;
    let marker, geocoder, geolocate, direction;
    var directions = [];
    let map1 = [];
    $.LoadingOverlay('show');
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
    map.on("load", function () {
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
    setTimeout(() => {
        cafeServices.get().then((res) => {
            $scope.datas = res;
            $scope.datas.forEach(element => {
                var Url = "https://api.mapbox.com/directions-matrix/v1/mapbox/walking/" + $scope.long + "," + $scope.lat + ";" + element.long + "," + element.lat + "?sources=1&annotations=distance,duration&access_token=pk.eyJ1Ijoia3Jpc3R0MjYiLCJhIjoiY2txcWt6dHgyMTcxMzMwc3RydGFzYnM1cyJ9.FJYE8uVi-eVl_mH_DLLEmw";
                $http({
                    method: 'get',
                    url: Url
                }).then(res => {
                    element.jarak = (res.data.distances[0][0]);
                    console.log(element);
                    $.LoadingOverlay('hide');
                }, err => {

                });
            });
            // for (let index = 0; index < $scope.datas.length; index++) {
            //     var set = new mapboxgl.Map({
            //         container: 'map1',
            //         style: 'mapbox://styles/mapbox/streets-v12',
            //         center: [140.7051989, -2.5570135],
            //         zoom: 12
            //     });
            //     direction = new MapboxDirections({
            //         accessToken: mapboxgl.accessToken,
            //         controls: {
            //             inputs: false,
            //             instructions: false,
            //             profileSwitcher: false
            //         }
            //     });
            //     set.addControl(direction, 'top-left');
            //     var desLong = $scope.datas[index].long;
            //     var desLat = $scope.datas[index].lat;
            //     direction.setOrigin([$scope.long, $scope.lat]);
            //     direction.setDestination([desLong, desLat]);
            //     direction.on("route", e => {
            //         let routes = e.route
            //         console.log(routes);
            //         console.log("Route lengths", routes.map(r => r.distance))
            //     })
            //     // map.removeControl(direction)
            //     map1.push(set)
            // }
            // console.log(map1);
        })
    }, 1500);

    // $scope.datas.forEach(element => {
    //     var Url = "https://api.mapbox.com/directions-matrix/v1/mapbox/walking/" + $scope.long + "," + $scope.lat + ";" + element.long + "," + element.lat + "?sources=1&annotations=distance,duration&access_token=pk.eyJ1Ijoia3Jpc3R0MjYiLCJhIjoiY2txcWt6dHgyMTcxMzMwc3RydGFzYnM1cyJ9.FJYE8uVi-eVl_mH_DLLEmw";
    //     $http({
    //         method: 'get',
    //         url: Url
    //     }).then(res=>{
    //         console.log(res.data);

    //         element.jarak = res.data.distances[0][0];
    //         console.log(element);
    //     }, err=>{

    //     });
    // });

    $scope.tampiljarak = (long, lat) => {

    }

    $scope.showTambah = ()=>{
        $scope.tambah = true;
    }
    
    $scope.back= ()=>{
        $scope.tambah = false;
        $scope.model = {};
    }
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            if ($scope.model.id) {
                cafeServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                    $scope.tambah = false;
                })
            } else {
                cafeServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                    $scope.tambah = false;
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.tambah = true;
        document.getElementById("periode").focus();
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            klasifikasiServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }

    $scope.subKlasifikasi = (param) => {
        document.location.href = helperServices.url + "admin/sub_klasifikasi/data/" + param.id;
    }
}

function kriteriaController($scope, kriteriaServices, pesan, helperServices, RangeServices) {
    $scope.setTitle = "Kriteria";
    $scope.$emit("SendUp", $scope.setTitle);
    $scope.datas = {};
    $scope.model = {};
    kriteriaServices.get().then((res) => {
        $scope.datas = res;
    })
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            if ($scope.model.id) {
                kriteriaServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                kriteriaServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                })
            }
        })
    }

    $scope.edit = (item) => {
        item.bobot = parseInt(item.bobot);
        $scope.model = angular.copy(item);
        // document.getElementById("nama").focus();
    }

    $scope.showRange = (param) => {
        $.LoadingOverlay("show");
        setTimeout(() => {
            $.LoadingOverlay("hide");
            $scope.$applyAsync(x => {
                $scope.kriteria = param;
                $scope.model.kriteria_id = $scope.kriteria.id;
                $scope.setTitle = "Range";
            })
        }, 200);
    }

    $scope.saveRange = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            if ($scope.model.id) {
                RangeServices.put($scope.model).then(res => {
                    var data = $scope.kriteria.range.find(x => x.id == $scope.model.id);
                    if (data) {
                        data.range = $scope.model.range;
                        data.bobot = $scope.model.bobot;
                    }
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                RangeServices.post($scope.model).then(res => {
                    $scope.model.id = res;
                    $scope.kriteria.range.push($scope.model);
                    $scope.model = {};
                    $scope.model.kriteria_id = $scope.kriteria.id;
                    pesan.Success("Berhasil menambah data");
                })
            }
        })
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            kriteriaServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
    $scope.deleteRange = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            RangeServices.deleted(param).then(res => {
                var index = $scope.kriteria.range.indexOf(param);
                $scope.kriteria.range.splice(index, 1);
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
    $scope.back = () => {
        $.LoadingOverlay("show");
        setTimeout(() => {
            $.LoadingOverlay("hide");
            $scope.$applyAsync(x => {
                $scope.kriteria = {};
                $scope.setTitle = "Kriteria";
            })
        }, 200);
    }
}


function penilaianController($scope, penilaianServices, cafeServices, pesan, helperServices) {
    $scope.setTitle = "Penilaian";
    $scope.$emit("SendUp", $scope.setTitle);
    $scope.datas = {};
    $scope.model = {};
    $scope.setShow = "client";
    penilaianServices.get().then((res) => {
        $scope.datas = res;
    })
    $scope.nilai = (param) => {
        $scope.peserta = angular.copy(param);
        penilaianServices.getNilai(param.id).then(res => {
            console.log(res);
            console.log($scope.peserta);
            $scope.model = {};
            $scope.model.kriteria = res;
            $scope.model.client = $scope.peserta;
            if ($scope.peserta.statusNilai) {
                $scope.model.kriteria.forEach(element => {
                    element.value = element.sub.find(x => x.bobot == element.nilai);
                });
            }
            $scope.setShow = "penilaian";
        })
    }
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            if ($scope.peserta.statusNilai) {
                penilaianServices.put($scope.model).then(res => {
                    $scope.model = {};
                    $scope.setShow = "client";
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                penilaianServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                    $scope.setShow = "client";
                    var item = $scope.datas.find(x => x.id == $scope.peserta.id);
                    item.statusNilai = "2";
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        document.getElementById("periode").focus();
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            penilaianServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
    $scope.back = () => {
        $scope.setShow = "client";
    }
}

function hasilController($scope, hasilServices, pesan, helperServices) {
    $scope.setTitle = "Penilaian";
    $scope.$emit("SendUp", $scope.setTitle);
    $scope.datas = {};
    $scope.model = {};
    $scope.setShow = "client";
    hasilServices.get().then((res) => {
        $scope.datas = res;
        console.log(res);
    })
}
