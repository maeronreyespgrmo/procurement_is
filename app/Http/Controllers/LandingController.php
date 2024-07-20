<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AuditTrail;

class LandingController extends Controller
{
    public function index()
    {
        return view('welcome');
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
}
