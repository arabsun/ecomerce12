<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{

    public function index()
    {
        $categories = BlogCategory::paginate(15);
        return view('admin.blog_category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog_category.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:blog_categories,name|max:250',
        ]);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $blog_category = new BlogCategory();
        $blog_category->name = $request->name;
        $blog_category->slug = Str::slug($request->name);
        $blog_category->save();

        return redirect()->route('admin.blog.category.index')->with('success', 'Blog Category Created Successfully');
    }


    public function edit($id)
    {
        $blog_category = BlogCategory::find($id);
        return view('admin.blog_category.edit', compact('blog_category'));
    }



    public function update(Request $request, $id)
    {
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:250|unique:blog_categories,name,' . $id,
        ]);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $blog_category = BlogCategory::find($id);
        $blog_category->name = $request->name;
        $blog_category->slug =  Str::slug($request->name);
        $blog_category->save();

        return redirect()->route('admin.blog.category.index')->with('success', __('Blog Category Updated Successfully'));
    }


    public function delete($id)
    {
        $blog_category = BlogCategory::find($id);
        if ($blog_category->blogs->count() > 0) {
            foreach ($blog_category->blogs as $blog) {
                $blog->delete();
            }
        }
        $blog_category->delete();
        return redirect()->route('admin.blog_category.index');
    }
}
