<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {


        $data = [
            'trains' => Train::all()
        ];

        if(!empty($_GET['trains']) && $_GET['trains'] === 'all')$data['get'] = 'all';
        return view('home', $data);
    }
}
