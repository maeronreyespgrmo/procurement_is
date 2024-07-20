<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procurement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\AuditTrail;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $page = [
            'name'  =>  'Procurement Categories',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Category Procurement' => '/category')
        ];

        $procurement = Procurement::where(['alterproc'=> 0,'type'=> 1])
        ->get();

        // AuditTrail::create("index","The user has accessed the Categories Procurement Section");
        return view('category.procurement.index',compact('page','procurement'));
    }

    public function alt_index()
    {
        $page = [
            'name'  =>  'Alternative Categories',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Category Alternative Mode' => '/category')
        ];

        $procurement = Procurement::where(['alterproc'=> 1,'type'=> 1])
        ->get();

        // AuditTrail::create("index","The user has accessed the Categories Alternative Mode Section");
        return view('category.alternative.index',compact('page','procurement'));
    }

    public function create(Request $request)
    {
        $page = [
            'name'  =>  'Category',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Category' => '/users')
        ];

        $category = Procurement::where([
            'alterproc'=> 0,
            'type'=> 1,
            'publish'=> 1,
            ])->get();

        // AuditTrail::create("create","The user has accessed the Category Procurement Section / Create");
        return view('category.procurement.create',compact('page','category'));

    }

    public function alt_create(Request $request)
    {
        $page = [
            'name'  =>  'Category',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Category' => '/users')
        ];

        $category = Procurement::where([
            'alterproc'=> 1,
            'type'=> 1,
            'publish'=> 1,
            ])->get();

        // AuditTrail::create("create","The user has accessed the Category Alternative Mode Section / Create");
        return view('category.alternative.create',compact('page','category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'parent' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);

        $type = $request->type == "" ? 1 : 2;

            DB::beginTransaction();
            try {
                $category = new Procurement();
                $category->parent = $request->parent;
                $category->name = $request->name;
                $category->position = $request->position;
                $category->publish = $request->status;
                $category->alterproc = $request->alterproc;
                $category->type = $type;
                $category->author = Auth::user()->id;
                $category->created_at = Carbon::now();
                $category->save();
            DB::commit();
            AuditTrail::create("store","Create procurement name {$request->name} with category of {$request->parent} and group of {$request->name}");
            return back()->with('success', 'Successfuly added');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect("/categories/procurements/create")->withErrors($th->getMessage());
        }


    }

    public function edit($id,Request $request)
    {
        $page = [
            'name'  =>  'Category',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Category' => '/category')
        ];



            $procurement = Procurement::find($id);

            $category = Procurement::where([
                'alterproc'=> 0,
                'type'=> 1,
                'publish'=> 1,
                ])->get();

            if ($procurement) {
                // AuditTrail::create("edit","The user has access the Procurement Section / Edit");
                return view('category.procurement.edit',compact('page','category','procurement'));
            } else {
                // AuditTrail::create("edit","The user has access the Procurement Section / Edit");
                return back()->withErrors("Record doesn't exist!");
            }


    }

    public function alt_edit($id,Request $request)
    {
        $page = [
            'name'  =>  'Category',
            'title' =>  'BAC Procurement System',
            'crumb' =>  array('Category' => '/category')
        ];

        $category = Procurement::where([
            'alterproc'=> 1,
            'type'=> 1,
            'publish'=> 1,
            ])->get();

            $procurement = Procurement::find($id);
            // return$procurement;

            if ($procurement) {
                // AuditTrail::create("edit","The user has accessed the Category Alternative Mode Section / Edit");
                return view('category.alternative.edit',compact('page','category','procurement'));
            } else {
                // AuditTrail::create("error","Record doesn't exist!");
                return back()->withErrors("Record doesn't exist!");
            }


    }

    public function update($id,Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);
        $type = $request->type == "" ? 1 : 2;
        DB::beginTransaction();
        try {

            Procurement::where('id', $id)->update([
                'name' => $request->name,
                'parent' => $request->parent,
                'position' => $request->position,
                'type' => $type,
                'publish' => $request->status,
            ]);

        DB::commit();
        AuditTrail::create("update","Update on Category Procurement ID: {$id} with name:{$request->name}");
        return back()->with('success', 'Successfuly updated');
    } catch (\Exception $th) {
        DB::rollBack();
        AuditTrail::create("error",$th->getMessage());
        return redirect("/categories/procurements/$id/edit")->withErrors($th->getMessage());
    }
    }

    public function destroy($id)
    {
        $user = Procurement::find($id)->delete();
        AuditTrail::create("destroy","Delete Category Procurement ID: {$id}");
        return redirect()->back()->with('success', 'Deleted Successful');
    }
}
