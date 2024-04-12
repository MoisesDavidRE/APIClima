<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Clima extends BaseController
{
    public function index()
    {
        return view('documentacion');
    }

    public function getUbicaciones(){
        $data['ubicaciones'] = model('ClimaModel')->getUbicaciones();
        return view('datos',$data);
    }

    public function getClimaByCP(){
        $data['datos'] = model('ClimaModel')->getClimaByCP();
        return view('climaByCP',$data);
    }
    public function getClimaByFechas(){
        $data['datos'] = model('ClimaModel')->getClimaByFechas();
        return view('climaByFechas',$data);
    }

}
