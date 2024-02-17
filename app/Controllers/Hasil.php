<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use ocs\spklib\Moora as moora;

class Hasil extends BaseController
{
    use ResponseTrait;
    protected $kriteria;
    protected $cafe;
    protected $preferensi;
    protected $sub;
    public function __construct()
    {
        $this->kriteria = new \App\Models\KriteriaModel();
        $this->sub = new \App\Models\RangeModel();
        $this->cafe = new \App\Models\CafeModel();
        $this->preferensi = new \App\Models\PreferensiModel();
    }
    public function index()
    {
        return view('hasil');
    }

    public function read()
    {
        $kriteria = $this->kriteria->findAll();
        $sub = $this->sub->findAll();
        foreach ($kriteria as $key => $value) {
            $kriteria[$key]['range'] = [];
            foreach ($sub as $key1 => $value1) {
                if ($value['id'] == $value1['kriteria_id']) $kriteria[$key]['range'][] = $value1;
            }
        }
        return $this->respond($kriteria);
    }

    function ambil()
    {
        $param = $this->request->getJSON();
        $setData = [];
        $data = $this->preferensi->select('kriteria.*, preferensi.value, preferensi.cafe_id,')->join('kriteria', 'kriteria.id=preferensi.kriteria_id')->findAll();
        $cafe = $this->cafe->findAll();
        foreach ($cafe as $key => $value) {
            $cafe[$key]['kriteria']=[];
            $check = true;
            foreach ($data as $key1 => $value1) {
                if($value['id']==$value1['cafe_id']){
                    foreach ($param as $key2 => $value2) {
                        if($value1['id']==$value2->id && $value1['value']<=$value2->value){
                            $cafe[$key]['kriteria'][]=$value1;
                            
                        }else{
                            $check = false;
                        }
                    }
                }
            }
            if($check){
                $setData[] = $cafe[$key];
            }
        }
        return $this->respond($setData);
    }

    public function hitung()
    {
        try {
            $data = $this->request->getJSON();
            foreach ($data as $key => $value) {
                # code...
            }
            // $kriterias = $this->kriteria->findAll();
            // $alternatifs = $this->client->select("alternatif.*")->join("periode", "periode.id=alternatif.periode_id")->where("periode.status", "1")->findAll();
            // $result = array();
            // foreach ($alternatifs as $key => $alternatif) {
            //     $alternatif['nilai'] = array();
            //     foreach ($kriterias as $key => $kriteria) {
            //         $kriterias[$key]['bobot'] = (int) $kriterias[$key]['bobot'];
            //         $item = $this->preferensi->where('alternatif_id', $alternatif['id'])->where('kriteria_id', $kriteria['id'])->first();
            //         $item['kode']=$kriteria['kode'];
            //         $item['bobot'] = (int) $item['value'];
            //         $alternatif['nilai'][] = $item;
            //     }
            //     $result[]=$alternatif;
            // }
            // $htg = new moora($kriterias,$result,7);
            // return $this->respond($htg);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
}
