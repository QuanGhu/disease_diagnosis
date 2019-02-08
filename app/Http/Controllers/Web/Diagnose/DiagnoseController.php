<?php

namespace App\Http\Controllers\Web\Diagnose;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiagnoseController extends Controller
{
    public function index()
    {
        return view('pages.diagnose.index');
    }
}
