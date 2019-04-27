<?php


namespace App\Services;

use App\Category;

class NavHelper
{
    public function categories()
    {
        return Category::orderBy('name')->get();
    }
}
