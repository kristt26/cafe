<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Cafe extends BaseController
{
    use ResponseTrait;
    protected $cafe;
    public function __construct() {
        $this->cafe = new \App\Models\CafeModel();
    }
    public function index()
    {
        return view('cafe');
    }
    public function read()
    {
        try {
            return $this->respond($this->cafe->findAll());
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function post()
    {
        try {
            if($this->cafe->insert($this->request->getJSON())){
                return $this->respondCreated($this->cafe->getInsertID());
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
            if($this->cafe->update($data->id, $data)){
                return $this->respondUpdated(true);
            }
            throw new \Exception("Gagal mengubah", 1);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function deleted()
    {
        //
    }
}
