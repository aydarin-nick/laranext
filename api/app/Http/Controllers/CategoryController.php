<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    private const CAT_VALIDATOR = [
        'name' => 'required|max:50',
        'categories_id' => 'required|numeric'
    ];

    public function index()
    {
        /*$categories = Categories::whereNull('categories_id')
            ->with('childrenCategories')
            ->where('delete',0)
            ->get();*/
        $categories_list = Categories::get();
        $categories = Categories::whereNull('categories_id')->get();
        return response()->json(array($categories));
        //return view('categories', compact('categories'), compact('categories_list'));
    }

    public function create(Request $request) {
        $validated = $request->validate(self::CAT_VALIDATOR);
        $categories = new Categories;
        $categories->name = $validated['name'];
        $categories->categories_id = $validated['categories_id'];
        $categories->save();
        return redirect()->route('index');
    }

    public function edit($id) {
        $categories_list = Categories::get();
        $categories = Categories::find($id);
        return view('category-edit', ['categories' => $categories],
            ['categories_list' => $categories_list]);
    }

    public function update(Request $request) {
        $categories = Categories::find($request->input('id'));
        $categories->name = $request->input('name');
        $categories->categories_id = $request->input('categories_id');
        $categories->save();
        return redirect()->route('index');
    }

    public function destroy(Request $request) {
        $categories = Categories::find($request->input('id'));
        if(Categories::where('categories_id', '=', $categories->id)->doesntExist()) { //Если нет дочерних категорий, то можно удалять
            $categories->delete = 1;
            $categories->save();
            return response()->json(array('result' => true));
        } else {
            return response()->json(array('result' => 'Есть дочерние категории, удалить нельзя'));
        }
    }

}
