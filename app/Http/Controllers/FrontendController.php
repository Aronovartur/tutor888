<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    public function index(){

        //return categories according to the following logic: 1) has courses with content 2) has video preview
        $featuredCategories = Category::has('courses')
            ->has('courses.sections')
            ->has('courses.sections.lessons')
            ->has('courses.sections.lessons.content')
            ->with(['courses' => function($q){
                $q->where('featured', true)
                    ->whereHas('sections', function($q){
                        $q->whereHas('lessons', function($q){
                            $q->where('preview', true)
                                ->whereHas('content', function($q){
                                    $q->where('content_type', '=', 'video');
                                });
                        });
                    });
            }])->orderByRaw("RAND()")->paginate(3);
        return "index";
    }

    public function macros(){
        return 'macros';

    }


}
