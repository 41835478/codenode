<?php

namespace App\Http\Api\Controllers;

use App\Transformers\CategoryTransformer;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return $this->response()->collection($data, new CategoryTransformer());
    }
}
