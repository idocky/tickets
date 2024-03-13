<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return CategoriesResource::collection(Category::all());
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return $category;
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return $category;
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully'
        ], 200);
    }

    public function show($id)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully',
            'data' => Category::findOrFail($id)

        ], 200);
    }
}
