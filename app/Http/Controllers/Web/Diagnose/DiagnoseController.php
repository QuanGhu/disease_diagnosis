<?php

namespace App\Http\Controllers\Web\Diagnose;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cause;
use App\Models\Disease;
use App\Models\Rule;
use App\Models\Diagnose;
use App\Models\SubDiagnose;
use Crud;
use DataTables;
use Auth;

class DiagnoseController extends Controller
{
    public function __construct(Diagnose $diagnose, SubDiagnose $subdiagnose)
    {
        $this->diagnose = $diagnose;
        $this->subdiagnose = $subdiagnose;
    }

    public function index()
    {
        return view('pages.diagnose.index');
    }

    public function list()
    {
        if(Auth::user()->user_level_id == 1)
        {
            $data = Crud::getAll($this->diagnose, 'created_at','desc');
        } else {
            $data = Crud::getWhere($this->diagnose, 'user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        }
        return DataTables::of($data)
        ->addColumn('action', function ($model) {
            return 
                '<div class="btn-group" role="group" aria-label="Basic example">
                    <a href="'.route('diagnose.result', $model->id).'" class="btn btn-primary pd-x-25">Lihat Hasil</a>
                </div>';
        })->addIndexColumn()->make(true);
    }
}
