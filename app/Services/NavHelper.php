<?php


namespace App\Services;

use App\Category;

class NavHelper
{
    public function categories()
    {
        return Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();
    }
}
