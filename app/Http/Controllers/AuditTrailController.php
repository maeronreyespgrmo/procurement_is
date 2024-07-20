<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\DB;

class AuditTrailController extends Controller
{
    //
    public function index()
    {
        $page = [
            'name'  =>  'Audit Trail',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Audit Trail' => '/audit_trails')
        ];

        return view('audittrail.index',compact('page'));
    }

    public function table(Request $request)
    {
        $accounts =  DB::table(DB::raw("(SELECT * FROM audit_trails) as tb1"))
        ->select(DB::raw('(SELECT username FROM users WHERE id = tb1.user_id) AS user_id'),'action','description');

        $total = $accounts->count();
        $result = $accounts->whereRaw("CONCAT(`user_id`,`action`, `description`) LIKE ?", ["%" . $request->search['value'] . "%"]);
        $result = $accounts->orderBy('id', 'ASC')
        ->skip($request->start)
        ->take($request->length)
        ->get();

        $filtered = (is_null($request->search['value']) ? $total : $result->count());

        return array(
            "draw" => $request->draw,
            "recordsTotal" => $total,
            "recordsFiltered" => $filtered,
            "data" => $result,
            "request" => $request->all()
        );
    }
}
