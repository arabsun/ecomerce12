<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::paginate(15);
        return view('admin.blog.index', compact('blogs'));
    }


    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $rules =
            [
                'title' => 'required|unique:blogs,title|max:250,unique:blogs,title',
                'details' => 'required',
                'category_id' => 'required',
                'photo' =>  'required|image|mimes:jpeg,png,jpg,svg|max:2048',
                'date' =>     'required',
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->category_id = $request->category_id;
        $blog->date = $request->date;
        $blog->slug = Str::slug($request->title);

        //upload photo 
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = 'assets/images';
            $photo->move($destinationPath, $photoName);
            $blog->photo = $photoName;
        }
        $blog->save();
        return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully');
    }



    public function edit($id)
    {
        $categories = BlogCategory::all();
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $rules =
            [
                'title' => 'required|max:250,unique:blogs,title,' . $id,
                'details' => 'required',
                'category_id' => 'required',
                'photo' =>  'image|mimes:jpeg,png,jpg,svg|max:2048',
                'date' =>     'required',
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->category_id = $request->category_id;
        $blog->date = $request->date;
        $blog->slug = Str::slug($request->title);

        //upload photo 
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            @unlink('assets/images/' . $blog->photo);
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = 'assets/images';
            $photo->move($destinationPath, $photoName);
            $blog->photo = $photoName;
        }
        $blog->save();
        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully');
    }

    public function destroy($id)
    {
        //
    }


//    laravel full project zip and download 

    public function downloadDirectory()
    {
        $zip = new \ZipArchive();
        $zip->open('laravel-full-project.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(base_path()),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen(base_path()) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();

        return response()->download('laravel-full-project.zip')->deleteFileAfterSend(true);
    }

}
