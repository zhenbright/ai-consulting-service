<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Botble\Portfolio\Models\Service;

class GenerateController extends Controller
{
    //

    public function index($view='') {
        $services  = Service::all();
        return view('service.generate', ['view' => $view, 'services' => $services]);
    }

    public function generate() {

        echo '23423';
    }
}
