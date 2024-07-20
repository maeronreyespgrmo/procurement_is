<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\AuditTrail;

class UserController extends Controller
{
    public function index()
    {
        $page = [
            'name'  =>  'Users',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Users' => '/users')
        ];
        // AuditTrail::create("index","The user has accessed the User Section");
        return view('users.index',compact('page'));
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="d-flex justify-content-center"><a href="/users/' . $row->id . '/edit" class="mr-2 edit btn btn-sm btn-info"><i class="i-Find-User">&nbsp; </i> Edit</a>
                    <a href="/users/'.$row->id .'/destroy" class="mr-2 btn btn-sm btn-danger"><i class="i-Pen-5"></i> Delete</a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(Request $request)
    {
        $page = [
            'name'  =>  'Users',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Users' => '/users')
        ];
        // AuditTrail::create("create","The user has accessed the User Section / Create");
        return view('users.create',compact('page'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'type' => 'required',
        ]);

            DB::beginTransaction();
            try {
                $user = new User();
                $user->username = $request->username;
                $user->password = $request->password;
                $user->type = $request->type;
                $user->created_at = Carbon::now();
                $user->save();
            DB::commit();
            AuditTrail::create("store","Create user name {$request->username}");
            return redirect("/users/create")->with('success', 'successfuly added');
        } catch (\Exception $th) {
            DB::rollBack();
            AuditTrail::create("error",$th->getMessage());
            return redirect("/users/create")->withErrors($th->getMessage());
        }


    }


    public function edit($id,Request $request)
    {
        $page = [
            'name'  =>  'Users',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Users' => '/users')
        ];

        $user = User::where('id', $id)->get();
        // AuditTrail::create("edit","The user has accessed the User Section / Edit");
        return view('users.edit',compact('page','user'));

    }

    public function update($id,Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'type' => 'required',
        ]);


        DB::beginTransaction();
        try {

            User::where('id', $id)->update([
                'username' => $request->username,
                'password' => $request->password,
                'type' => $request->type,
            ]);

        DB::commit();
        AuditTrail::create("update","Update on User ID: {$id}");
        return redirect("/users/$id/edit")->with('success', 'successfuly added');
    } catch (\Exception $th) {
        DB::rollBack();
        AuditTrail::create("error",$th->getMessage());
        return redirect("/users/$id/edit")->withErrors($th->getMessage());
    }


    }

    public function destroy($id)
    {
        // return$id;
        $user = User::find($id);
        $user->deleted_at = Carbon::now('Asia/Manila');
        $user->save();
        AuditTrail::create("destroy","Delete User ID: {$id}");
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
