<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addblog(){
        return view('dashboard.admin.addblog');
    }

public function createblog(Request $request)
{
    // dd($request->all());
    // return 'mercysassy';
    $request->validate([
        'title'=> ['required','string'],
        'author'=> ['required','string'],
        'body'=> ['required','string'],
        'category'=> ['required','string'],
        'images' => 'nullable|mimes:jpg,png,jpeg'

        // 'images'=> ['required,'string'],
    ]);

    if  ($request->hasfile('images')){
        $file = $request['images'];
        $filename = 'mercysassy-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('images')->storeAs('productimages',$filename);
    }else{
        $path = 'noimage.jpg';
    }

    $add_blog = Blog::create([
        'images' => $path,
        'title' => $request->title,
        'author' => $request->author,
        'body' => $request->body,
        'category' => $request->category,
        'ref_no' => mt_rand(1000000000,9999999999),
        'slug' => SlugService::createSlug(Blog::class, 'slug', $request->title),
    ]);

    if ($add_blog){
        return back()->with('success','you added blog successfully');
    }else{
        return back()->with('fail','you have not added successfully');
    }
}

    public function viewblog(){
        $viewblogs = Blog::all();
        return view('dashboard.admin.viewblog', compact('viewblogs'));
    }
    public function viewsingleblog($slug){
        $viewsingle_blog = Blog::where('slug', $slug)->first();
        return view('dashboard.admin.viewsingleblog',compact('viewsingle_blog'));
    }
}
