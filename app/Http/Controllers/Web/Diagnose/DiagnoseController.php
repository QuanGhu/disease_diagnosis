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

    public function regis()
    {
        return view('pages.diagnose.regis');
    }

    public function new()
    {
        return view('pages.diagnose.new')
        ->with('causes', Cause::all());
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

    public function process(Request $request)
    {
        try {
            
            $arrChoosen = [];

            foreach($request->causes_id as $cause)
            {
                $checkProperty = Rule::where('cause_id', $cause)->first();
                
                array_push($arrChoosen, $checkProperty ? $checkProperty->disease->name : null);
            }

            foreach($arrChoosen as $key => $value)
            {
                if(empty($value) || $value === "")
                unset($arrChoosen[$key]);
            }
            

            if($arrChoosen)
            {
                $result = array_count_values($arrChoosen);
                arsort($result);

                foreach($result as $an => $result)
                {
                    $modusValue = $an; 
                    break;
                }

                return $this->save($request, $modusValue);
            } else {

                return redirect()->back()->with('danger','Maaf kami tidak bisa menentukan hasil nya, silakan coba lagi')->withInput();
            }


        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }

    public function save(Request $request, $result)
    {
        try {
            
            $data = $request->all();
            $data['result'] = $result;
            $saveAnalyze = Crud::save($this->diagnose, $data);

            foreach($request->causes_id as $cause)
            {
                if($cause) {
                    $findCriteria = Cause::where('id', $cause)->first();
                    $addSubAnalyze = new SubDiagnose;
                    $addSubAnalyze->cause = $findCriteria->name;
                    $addSubAnalyze->diagnose_id = $saveAnalyze->id;
                    $addSubAnalyze->save();
                }
            }

            return $addSubAnalyze 
                ? redirect()->route('diagnose.result', $saveAnalyze->id)->with('success','Hasil Berhasil Ditentukan')
                : redirect()->back()->with('danger','Data Cannot Saved')->withInput();
        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }

    public function showResult($id)
    {
        $analyze = Diagnose::where('id', $id)->first();
        $property = Disease::where('name', $analyze->result)->first();
        
        return view('pages.diagnose.result')
            ->with('anaylze' , $analyze)
            ->with('disease', $property);
    }
}
