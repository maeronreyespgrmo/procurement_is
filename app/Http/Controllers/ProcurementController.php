<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Procurement;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use App\Models\User;
use App\Models\AuditTrail;

class ProcurementController extends Controller
{

    public function index()
    {
        $page = [
            'name'  =>  'Procurement Activities',
            'title' =>  'Procurement',
            'crumb' =>  array('Procurement' => '/procurement/activities/index')
        ];

        $category = Procurement::where([
            'parent'=> '',
            'alterproc'=> 0,
            'type'=> 1,
            'publish'=> 1,
            ])
            ->get();

        // AuditTrail::create("index","The user has accessed the Procurement Section");
        return view('procurement.index',compact('page','category'));
    }

    public function alt_index()
    {
        $page = [
            'name'  =>  'Alternative Procurement Activities',
            'title' =>  'Alternative Mode of Procurement',
            'crumb' =>  array('Alternative Mode Procurement' => '/procurement/activities/index')
        ];

        $category = Procurement::where([
            'alterproc'=> 1,
            'type'=> 2,
            'publish'=> 1,
            ])->get();

        // AuditTrail::create("alt_index","The user has accessed the Alternative mode section Section");
        return view('alternative.index',compact('page','category'));
    }


    public function table(Request $request)
    {

        $accounts =  DB::table(DB::raw("(SELECT * FROM procurements) as tb1"))
        ->select('id','name', 'publish','file', DB::raw('(SELECT NAME FROM procurements WHERE id = tb1.parent) AS parent'))
        ->where('type', '=', 0)
        ->where('alterproc', '=', $request->alterproc)
        ->whereNull('deleted_at');

        $total = $accounts->where(['alterproc'=> $request->alterproc,'type'=> 0])->whereNull('deleted_at')->count();
        $result = $accounts->whereRaw("CONCAT(`id`, `parent`, `name`, `alterproc`, `file`) LIKE ?", ["%" . $request->search['value'] . "%"]);
        $result = $accounts->orderBy('id', 'ASC')
        ->skip($request->start)
        ->take($request->length)
        ->get();


        $filtered = (is_null($request->search['value']) ? $total : $result->where(['alterproc'=> $request->alterproc,'type'=> 0])->whereNull('deleted_at')->count());

        return array(
            "draw" => $request->draw,
            "recordsTotal" => $total,
            "recordsFiltered" => $filtered,
            "data" => $result,
            "request" => $request->all()
        );

    }

    public function create()
    {
        $page = [
            'name'  =>  'Procurement',
            'title' =>  'Create Procurement',
            'crumb' =>  array('Procurement' => '/procurement/activities/index')
        ];

        $category = Procurement::where([
        'alterproc'=> 0,
        'type'=> 1,
        'publish'=> 1,
        ])->orderBy('name', 'ASC')->get();

        // AuditTrail::create("create","The user has accessed the Procurement Section / Create");

        return view('procurement.create',compact('page','category'));
    }

    public function alt_create()
    {
        $page = [
            'name'  =>  'Procurement',
            'title' =>  'Create Procurement',
            'crumb' =>  array('Procurement' => '/procurement/activities/index')
        ];

        $category = Procurement::where([
        'alterproc'=> 1,
        'type'=> 1,
        'publish'=> 1,
        ])->orderBy('name', 'ASC')->get();

        // AuditTrail::create("alt_create","The user has accessed the Alternative Mode Section / Create");

        return view('alternative.create',compact('page','category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'parent' => 'required',
            'name' => 'required',
            'date_issued' => 'required',
            'file' => 'required',
        ]);

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
        } else {
            AuditTrail::create("error","Error in upload on Procurement file:{$fileName}");
            return redirect()->back()->withErrors(['error' => 'No file was uploaded.']);
        }

        DB::beginTransaction();
        try {
            $procurement = new Procurement();
            $procurement->parent = $request->parent;
            $procurement->name = $request->name;
            $procurement->issued = $request->date_issued;
            $procurement->file = $fileName;
            $procurement->publish = $request->status;
            $procurement->alterproc = $request->alterproc;
            $procurement->type = 0;
            $procurement->author = Auth::user()->id;
            $procurement->save();
            $file->move(public_path('storage/files'), $fileName);
            // $file->storeAS('public/files', $fileName);
            //AUDIT TRAIL - ACTION,DESCRIPTION
            AuditTrail::create("store","Create procurement name {$request->name} with category of {$request->parent} and group of {$request->name}");
            DB::commit();
            return back()->with('success', 'Successfuly added');

        } catch (\Exception $th) {
            AuditTrail::create("errorlog","Error: {$th->getMessage()}");
            DB::rollBack();
            return redirect("/procurements/create")->withErrors($th->getMessage());

        }

    }

    public function edit($id)
    {
        try {
            $page = [
                'name'  =>  'Procurement',
                'title' =>  'Edit Procurement',
                'crumb' =>  array('Procurement' => '/procurement/activities/edit')
            ];

            $procurement = Procurement::findOrFail($id);

            $category = Procurement::where([
                'alterproc'=> 0,
                'type'=> 1,
                'publish'=> 1,
            ])->orderBy('name', 'ASC')->get();

            // AuditTrail::create("edit","The user has access the Procurement Section / Edit");
            return view('procurement.edit',compact('page','procurement','category'));
        } catch(ModelNotFoundException $e) {
            AuditTrail::create("error","Procurement record doesn't exist!");
            return back()->withErrors("Procurement record doesn't exist!");
        }
    }

    public function alt_edit($id)
    {
        try {
            $page = [
                'name'  =>  'Procurement',
                'title' =>  'Edit Procurement',
                'crumb' =>  array('Alternative Procurement' => '/procurement/activities/edit')
            ];

            $procurement = Procurement::findOrFail($id);

            $category = Procurement::where([
                'alterproc'=> 1,
                'type'=> 1,
                'publish'=> 1,
                ])->orderBy('name', 'ASC')->get();

        //  AuditTrail::create("edit","Alternative Procurement record doesn't exist!");
         return view('alternative.edit',compact('page','procurement','category'));
        } catch(ModelNotFoundException $e) {
            AuditTrail::create("error","Procurement record doesn't exist!");
            return back()->withErrors("Procurement record doesn't exist!");
        }

    }

    public function update($id,Request $request)
    {
        $this->validate($request, [
            'parent' => 'required',
            'name' => 'required',
            'date_issued' => 'required',
        ]);

        $fileName = $request->file_hidden ?: '';


        if ($request->file_hidden == '' && $request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            // $file->storeAs('public/files', $fileName);
            $file->move(public_path('storage/files'), $fileName);
        } elseif ($request->file_hidden === '') {
            AuditTrail::create("error","No file was uploaded");
            return redirect()->back()->withErrors(['error' => 'No file was uploaded.']);
        }

        DB::beginTransaction();
        try {

            Procurement::where('id', $id)->update([
                'parent' => $request->parent,
                'name' => $request->name,
                'issued' => $request->date_issued,
                'file' => $fileName,
                'publish' => $request->status,
                'alterproc' => $request->alterproc,
                'author' => Auth::user()->id,
                'type' => 0
                ]);
        AuditTrail::create("update","Update on Procurement ID: {$id} with name:{$request->name}");
        DB::commit();
        return redirect("/procurements/$id/edit")->with('success', 'successfuly added');
        } catch (\Exception $th) {
        DB::rollBack();
        AuditTrail::create("error",$th->getMessage());
        return redirect("/procurements/$id/edit")->withErrors($th->getMessage());
        }

    }

    public function upload_destroy($id)
    {
        Procurement::where('id', $id)->update([
            'file' => '',
        ]);
        AuditTrail::create("delete_image","Delete image on Procurement ID: {$id}");
        return redirect("/procurements/$id/edit")->with('success', 'successfuly added');

    }

    public function destroy($id)
    {
        $record = Procurement::find($id);
        $record->deleted_at = Carbon::now('Asia/Manila');
        $record->delete();
        AuditTrail::create("destroy","Delete Procurement ID: {$id}");
        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
