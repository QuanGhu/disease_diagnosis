<?php

namespace App\Http\Controllers\Web\Rule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cause;
use App\Models\Disease;
use App\Models\Rule;
use DataTables;
use Crud;
use Validator;

class RuleController extends Controller
{

    public function __construct(Disease $disease)
    {
        $this->table = $disease;
    }

    public function index()
    {
        return view('pages.rule.index');
    }

    public function new()
    {
        return view('pages.rule.new')
            ->with('diseases', Disease::orderBy('code','asc')->pluck('name','id'))
            ->with('causes', Cause::orderBy('code','asc')->get());
    }

    public function view($id)
    {
        return view('pages.rule.view')
            ->with('data', crud::getWhere($this->table, 'id', $id)->first());
    }

    public function edit($id)
    {
        $arrRule = [];
        $rules = Rule::where('disease_id',$id)->get();
        foreach($rules as $rule )
        {
            array_push($arrRule, $rule->cause_id);
        }
        return view('pages.rule.edit')
            ->with('disease', crud::getWhere($this->table, 'id', $id)->first())
            ->with('causes', Cause::orderBy('code','asc')->get())
            ->with('causesChecked', $arrRule);
    }

    public function list()
    {
        return DataTables::of(Crud::base($this->table)->has('rules')->get())
        ->addColumn('rule', function($model) {
            $arr = [];
            foreach($model->rules as $rule)
            {
                array_push($arr, ' '.$rule->cause->name);
            };
            return $arr;
        })
        ->addColumn('action', function ($model) {
            return 
                '<div class="btn-group" role="group" aria-label="Basic example">
                    <a href="'.route('rule.view', $model->id).'" class="btn btn-primary pd-x-25">Lihat</a>
                    <a href="'.route('rule.edit', $model->id).'" class="btn btn-warning pd-x-25">Edit</a>
                    <button type="button" class="btn btn-danger pd-x-25 delete">Hapus</button>
                </div>';
        })->addIndexColumn()->make(true);
    }

    public function save(Request $request)
    {
        try {

            foreach($request->causes_id as $cause)
            {
                $addRule = new Rule;
                $addRule->disease_id = $request->disease_id;
                $addRule->cause_id = $cause;
                $addRule->save();
            }

            return $addRule 
                ? redirect()->route('rule.index')->with('success','Ketentuan Baru Berhasil Disimpan')
                : redirect()->back()->with('danger','Data Cannot Saved')->withInput();
        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
    }

    public function update(Request $request)
    {
        try {
            $deleteRule = Rule::where('disease_id',$request->disease_id)->delete();
            foreach($request->causes_id as $cause)
            {
                $editRule = new Rule;
                $editRule->disease_id = $request->disease_id;
                $editRule->cause_id = $cause;
                $editRule->save();
            }

            return $editRule 
                ? redirect()->route('rule.index')->with('success','Ketentuan Berhasil Diperbaruhi')
                : redirect()->back()->with('danger','Data Cannot Saved')->withInput();
        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger',$e->getMessage())->withInput();
        }
        
    }

    public function delete(Request $request)
    {
        try {

            $delete = Rule::where('disease_id',$request->id)->delete();
            
            return $delete ? response()->json(['message' => 'Data Berhasil Dihapus'], 200)
                          : response()->json(['message' => 'Data Gagal Untuk Dihapus'], 400);
        }
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
