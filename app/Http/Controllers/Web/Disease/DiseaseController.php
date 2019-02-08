<?php

namespace App\Http\Controllers\Web\Disease;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiseaseController extends Controller
{
    public function index()
    {
        return view('pages.disease.index');
    }
}
