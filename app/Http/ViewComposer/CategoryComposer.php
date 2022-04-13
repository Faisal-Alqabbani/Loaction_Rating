<?php 
namespace App\Http\ViewComposer;
use Illuminate\View\View;
use App\Models\Category;


class CategoryComposer{
    public function compose(View $view){
        return $view->with('categories', Category::all());
    }
}