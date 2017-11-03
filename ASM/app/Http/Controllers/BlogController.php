<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function admincheck(Request $request)
    {
        if($request->adminname == 'ASMadmin' && $request->password == 'password')
        {
            return view('blogform');    
        }
        else
        {
            return view('admin');
        }
        
            
    }
    public function blogsubmit(Request $request)
    {
        $model = new Blog;
        $model->blog_title = $request->blog_title;
        $model->blog_author = $request->blog_author;
        $model->blog_content = $request->blog_content;
        $filename = str_random(20) . "." . $request->blog_image->extension();
        $request->blog_image->storeAs('uploads', $filename);
        $model->stored_file_name = $filename;
        $model->save();
        return view('blogform');

    }
    public function view_blogs()
    {
        $request_data = Blog::select('blog_title','blog_author','blog_content','stored_file_name')->get();

        return view('blog')->with('request_data', $request_data);
    }
}