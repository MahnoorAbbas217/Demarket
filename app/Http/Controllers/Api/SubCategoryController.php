<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    function index() {
        $subCategories = SubCategory::select('id', 'category_id', 'sub_category_name')->where('publication_status', 'active')->with(['category' => function($query){
          $query->select('id', 'category_name');
        }]);

        if(isset($_GET['sub_category_name']) && $_GET['sub_category_name'] != ''){
            $subCategories->where('sub_category_name', 'like' , '%'.$_GET['sub_category_name'].'%');
        }

        $subCategories = $subCategories->get();

        return response()->json([
            'success' => true,
            'data'    => $subCategories,
            'message' => 'All Active Categories',
        ], 200);
    }
}
