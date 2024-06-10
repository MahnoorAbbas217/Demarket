<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index() {
        $categories = Category::select('id', 'category_name', 'thumbnail')->where('publication_status', 'active');

        if(isset($_GET['category_name']) && $_GET['category_name'] != ''){
            $categories->where('category_name', 'like' , '%'.$_GET['category_name'].'%');
        }

        $categories = $categories->get();

        return response()->json([
            'success' => true,
            'data'    => $categories,
            'message' => 'All Active Categories',
        ], 200);
    }

    function show($id) {
        $category = Category::select('id', 'category_name', 'thumbnail')
        ->where('id', $id)
        ->where('publication_status', 'active')
        ->with(['subCategory' => function($query) {
            $query->select('id', 'category_id' ,'sub_category_name')
                ->where('publication_status', 'active');
        }])
        ->first();

        return response()->json([
            'success' => true,
            'data'    => $category,
            'message' => 'All Active Categories',
        ], 200);
    }
}
