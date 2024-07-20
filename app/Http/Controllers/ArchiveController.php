<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procurement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;
use App\Models\User;
use App\Models\AuditTrail;

class ArchiveController extends Controller
{
    public function index_procurement()
    {
        $page = [
            'name'  =>  'Archive Procurement',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Archive Procurement' => '/archives')
        ];
        // AuditTrail::create("index","The user has accessed the Archive Section");
        return view('archives.procurement.index',compact('page'));
    }

    public function index_alternative()
    {
        $page = [
            'name'  =>  'Archive Alternative',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Archive Alternative' => '/archives')
        ];
        // AuditTrail::create("index","The user has accessed the Archive Section");
        return view('archives.alternative.index',compact('page'));
    }

    public function table_procurement(Request $request)
    {

        $accounts =  DB::table(DB::raw("(SELECT * FROM procurements) as tb1"))
        ->select('id','name', 'publish','file','deleted_at', DB::raw('(SELECT NAME FROM procurements WHERE id = tb1.parent) AS parent'))
        ->where('type', '=', 0)
        ->where('alterproc', '=', 0)
        ->whereNotNull('deleted_at');

        $total = $accounts->where(['type'=> 0])->whereNotNull('deleted_at')->count();
        $result = $accounts->whereRaw("CONCAT(`id`, `parent`, `name`, `alterproc`, `deleted_at`, 'file') LIKE ?", ["%" . $request->search['value'] . "%"]);
        $result = $accounts->orderBy('id', 'ASC')
        ->skip($request->start)
        ->take($request->length)
        ->get();


        $filtered = (is_null($request->search['value']) ? $total : $result->where(['type'=> 0])->whereNotNull('deleted_at')->count());

        return array(
            "draw" => $request->draw,
            "recordsTotal" => $total,
            "recordsFiltered" => $filtered,
            "data" => $result,
            "request" => $request->all()
        );

    }

    public function table_alternative(Request $request)
    {

        $accounts =  DB::table(DB::raw("(SELECT * FROM procurements) as tb1"))
        ->select('id','name', 'publish','file','deleted_at', DB::raw('(SELECT NAME FROM procurements WHERE id = tb1.parent) AS parent'))
        ->where('type', '=', 0)
        ->where('alterproc', '=', 1)
        ->whereNotNull('deleted_at');

        $total = $accounts->where(['type'=> 0])->whereNotNull('deleted_at')->count();
        $result = $accounts->whereRaw("CONCAT(`id`, `parent`, `name`, `alterproc`, `deleted_at`, 'file') LIKE ?", ["%" . $request->search['value'] . "%"]);
        $result = $accounts->orderBy('id', 'ASC')
        ->skip($request->start)
        ->take($request->length)
        ->get();


        $filtered = (is_null($request->search['value']) ? $total : $result->where(['type'=> 0])->whereNotNull('deleted_at')->count());

        return array(
            "draw" => $request->draw,
            "recordsTotal" => $total,
            "recordsFiltered" => $filtered,
            "data" => $result,
            "request" => $request->all()
        );

    }

    public function show_procurement($id)
    {
        // $procurement = Procurement::onlyTrashed()->findOrFail($id);
        // return$procurement;
        try {
            $page = [
                'name'  =>  'View Archives',
                'title' =>  'View Archives',
                'crumb' =>  array('View Archives' => '/archives')
            ];

            // $procurement = Procurement::findOrFail($id);
            $procurement = Procurement::onlyTrashed()->findOrFail($id);

            $category = Procurement::where([
                'alterproc'=> 0,
                'type'=> 1,
                'publish'=> 1,
            ])->orderBy('name', 'ASC')->get();
            // AuditTrail::create("show","The user has accessed the Archive Section / Show");
            return view('archives.procurement.view',compact('page','category','procurement'));

        } catch(ModelNotFoundException $e) {
            return back()->withErrors("Procurement record doesn't exist!");
        }
    }

    public function show_alternative($id)
    {
        // $procurement = Procurement::onlyTrashed()->findOrFail($id);
        // return$procurement;
        try {
            $page = [
                'name'  =>  'View Archives',
                'title' =>  'View Archives',
                'crumb' =>  array('View Archives' => '/archives')
            ];

            // $procurement = Procurement::findOrFail($id);
            $procurement = Procurement::onlyTrashed()->findOrFail($id);

            $category = Procurement::where([
                'alterproc'=> 1,
                'type'=> 1,
                'publish'=> 1,
            ])->orderBy('name', 'ASC')->get();
            // AuditTrail::create("show","The user has accessed the Archive Section / Show");
            return view('archives.procurement.view',compact('page','category','procurement'));

        } catch(ModelNotFoundException $e) {
            return back()->withErrors("Procurement record doesn't exist!");
        }
    }

    public function restore_procurement($id)
    {
        Procurement::where('id', $id)->withTrashed()->restore();
        AuditTrail::create("restore","The user has restore the Procurement id {$id}");
        return redirect()->back()->with('success', 'Procurement Restored successfully.');
    }
    
    public function restore_alternative($id)
    {
        Procurement::where('id', $id)
                    ->where('alterproc', '1')
                    ->withTrashed()->restore();
        AuditTrail::create("restore","The user has restore the Procurement id {$id}");
        return redirect()->back()->with('success', 'Procurement Restored successfully.');
    }

}
