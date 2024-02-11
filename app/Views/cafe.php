<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<link href="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js"></script>
<div ng-controller="cafeController">
    <h1 class="h3 mb-4 text-gray-800">{{setTitle}}</h1>
    <div class="row">
        <div class="col-md-12" ng-if="tambah">
            <div class="card">
                <div class="card-header">
                    <h3>Input Data Cafe</h3>
                </div>
                <form ng-submit="save()">
                    <div class="card-body">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Nama Cafe</label>
                            <input type="text" class="form-control" id="nama" ng-model="model.nama" required>
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label class="control-label">Alamat</label>
                            <textarea rows="3" class="form-control" id="alamat" ng-model="model.alamat" required></textarea>
                            <!-- <input type="text" class="form-control" id="alamat" ng-model="model.alamat" required> -->
                        </div>
                        <div class="form-group pmd-textfield">
                            <label class="control-label">Latitude</label>
                            <input type="text" ng-click="tampilMap()" class="form-control" id="lat" ng-model="model.lat" readonly required>
                        </div>
                        <div class="form-group pmd-textfield">
                            <label class="control-label">Longitude</label>
                            <input type="text" ng-click="tampilMap()" class="form-control" id="long" ng-model="model.long" required>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-secondary pmd-ripple-effect btn-sm" ng-click="back()">Batal</button>
                        <button type="submit" class="btn btn-primary pmd-ripple-effect btn-sm">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-md-12"  ng-if="!tambah">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Daftar Cafe</h3>
                    <button class="btn btn-primary btn-sm" ng-click="showTambah()"><i class="fas fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table pmd-table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="20%">Nama Cafe</th>
                                    <th width="25%">Alamat</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Jarak</th>
                                    <th><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.nama}}</td>
                                    <td>{{item.alamat}}</td>
                                    <td>{{item.lat}}</td>
                                    <td>{{item.long}}</td>
                                    <td>{{(item.jarak/1000).toFixed(2)}} Km</td>
                                    <td>
                                        <button type="submit" class="btn btn-warning pmd-ripple-effect btn-sm" ng-click="edit(item)"><i class="fas fa-edit fa-sm fa-fw"></i></button>
                                        <button type="submit" class="btn btn-danger pmd-ripple-effect btn-sm"><i class="fas fa-trash-alt fa-sm fa-fw"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div ng-show="map==true">
        <div id="map"></div>
        <pre id="info"></pre>
    </div>
    <div ng-show="map=='test'">
        <div id="map1"></div>
    </div>
</div>
<style type="text/css">
    #map {
        position: absolute;
        top: 150px;
        bottom: 50px;
        left: 250px;
        width: 86%;
    }

    #info {
        display: table;
        position: relative;
        margin: 0px auto;
        word-wrap: anywhere;
        white-space: pre-wrap;
        padding: 10px;
        border: none;
        border-radius: 3px;
        font-size: 12px;
        text-align: center;
        color: #222;
        background: #fff;
    }
</style>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css" type="text/css">
<?= $this->endSection() ?>