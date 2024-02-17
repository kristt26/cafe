<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Penilaian extends BaseController
{
    use ResponseTrait;
    protected $cafe;
    protected $kriteria;
    protected $sub;
    protected $preferensi;
    public function __construct() {
        $this->cafe = new \App\Models\CafeModel();
        $this->kriteria = new \App\Models\KriteriaModel();
        $this->sub = new \App\Models\RangeModel();
        $this->preferensi = new \App\Models\PreferensiModel();
    }
    public function index()
    {
        return view('penilaian');
    }
    public function read()
    {
        try {
            return $this->respond($this->cafe->select("cafe.*, (select preferensi.value from preferensi where cafe.id=preferensi.cafe_id limit 1) as statusNilai")->findAll());
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function getNilai($param = null) : object {
        
        $data = $this->kriteria->asObject()->where('nama!=', 'Jarak')->findAll();
        $sub = $this->sub->asObject()->findAll();
        try {
            foreach ($data as $keyKriteria => $kriteria) {
                $kriteria->sub = [];
                foreach ($sub as $keySubKriteria => $subKriteria) {
                    if($kriteria->id == $subKriteria->kriteria_id){
                        $kriteria->sub[] = $subKriteria;
                    }
                    $nilai = $this->preferensi->where("kriteria_id", $kriteria->id)->where("cafe_id", $param)->first();
                    if($nilai){
                        $kriteria->nilai = $nilai['value'];
                        $kriteria->preferensi_id = $nilai['id'];
                    }
                }
            }
            return $this->respond($data);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function post()
    {
        try {
            $data = $this->request->getJSON();
            $setData = [];
            foreach ($data->kriteria as $key => $value) {
                $item = [
                    "kriteria_id" => $value->id,
                    "cafe_id" => $data->client->id,
                    "value" => $value->value->bobot,
                    "bobot" => $value->bobot,
                ];
                $setData[] = $item;
            }
            if($this->preferensi->insertBatch($setData)){
                return $this->respondCreated(true);
            }
            throw new \Exception("Gagal menyimpan", 1);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function put()
    {
        try {
            $data = $this->request->getJSON();
            foreach ($data->kriteria as $key => $value) {
               $this->preferensi->update($value->preferensi_id, ['value'=>$value->value->bobot]); 
            }
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function deleted($id = null)
    {
        if($this->cafe->delete($id)) return $this->respondDeleted(true);
        return $this->fail("Gagal hapus");
    }
}
