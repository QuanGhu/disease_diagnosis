<?php

namespace App\Http\Controllers\Web\Rule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuleController extends Controller
{
    public function index()
    {
        return view('pages.rule.index');
    }
}
