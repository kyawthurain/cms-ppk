<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::latest()->paginate(5);
        return view('admin.categories.categories',['categories'=>$categories])->with('i',($request->input('page')-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::where('parent_id','=',null)->get();
        return view('admin.categories.create',['parents'=>$parents]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [

                "name"=>"required"

            ],
            [
                "name.required"=>"Enter Category Name"
            ]
            );
            Category::create($request->except('_token'));
           return redirect()->route('categories.index')->with('success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parents = Category::where('parent_id','=',null)->get();
        return view('admin.categories.edit',['category'=>$category,'parents'=>$parents]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [

                "name"=>"required"

            ],
            [
                "name.required"=>"Enter Category Name"
            ]
            );
            $category = Category::find($id);
            $category->name = $request->input('name');
            $category->parent_id = $request->input('parent_id');
            $category->save();

            return redirect()->route('categories.index')->with('success','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categroy = Category::find($id);
        try
        {
            $categroy->delete();
        }
        catch(QueryException $e)
        {
            return redirect()->route('categories.index')->with('success','Cannot Delete');
        }
        
        //return redirect()->route('categories.index')->with('success','Successfully Deleted');
        return response()->json(["success"=>"Successfully Deleted"]);
    }

    public function restore()
    {
        $trashed = Category::onlyTrashed()->get();
        foreach($trashed as $item)
        {
            $item->restore();
        }
    }
}
