<?php

namespace App\Http\Controllers\Web\Cause;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CauseController extends Controller
{
    public function index()
    {
        return view('pages.cause.index');
    }
}
