<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\BackEnd\Category;
use App\Models\BackEnd\SubCategory;
use App\Models\BackEnd\header;

class MenuComposer
{
    
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::all();
        $view->with('categories', $categories);
        $subcategories = SubCategory::all();
        $view->with('subcategories',$categories);
        $headers = header::all();
        $view->with('header', $headers);
    }
}