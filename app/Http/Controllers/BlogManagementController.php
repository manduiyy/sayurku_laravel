<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Navigation;
use App\Models\BlogManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BlogManagementController extends Controller
{
    private $view_directory = 'pages.admin.blog.';
    private $url = 'blog-management';
    private $page_title = 'Blog Management';

    public function index()
    {
        return view($this->view_directory . 'index', [
            'navigations' => Navigation::where('category', 'admin')->where('status', 'show')->get(),
            'page_title' => $this->page_title,
            'current_page' => $this->url,
            'data' => BlogManagement::all(),
            'javascript_file' => '',
        ]);
    }

    public function create()
    {
        return view($this->view_directory . 'create', [
            'navigations' => Navigation::where('category', 'admin')->where('status', 'show')->get(),
            'page_title' => $this->page_title,
            'current_page' => $this->url,
            'data' => BlogManagement::all(),
            'javascript_file' => 'admin/blog/create.js',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'page_title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'blog_image' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        $folder_destination = 'uploads/blogs';
        $file = $request->file('blog_image');
        $file_name = time() . '-' . $file->getClientOriginalName();
        $file->move($folder_destination, $file_name);

        try {
            $data = [
                'page_title' => $request->page_title,
                'slug' => $request->slug,
                'content' => $request->content,
                'blog_image' => $folder_destination . '/' . $file_name,
            ];

            if (BlogManagement::create($data)) {
                return response()->json([
                    'status' => 201,
                    'message' => 'The blog post has been added.',
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Sorry, failed to add the blog post.',
                ]);
            }
        } catch (\Exception $error) {
            return response()->json([
                'status' => 422,
                'message' => 'Sorry, failed to add the blog post. ' . $error->getMessage(),
            ]);
        }
    }

    public function edit($id)
    {
        return view($this->view_directory . 'edit', [
            'navigations' => Navigation::where('category', 'admin')->where('status', 'show')->get(),
            'page_title' => $this->page_title,
            'current_page' => $this->url,
            'detail' => BlogManagement::find($id),
            'javascript_file' => 'admin/blog/edit.js',
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'page_title' => 'required',
            'content' => 'required',
            'blog_image' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        try {
            $data = BlogManagement::find($id);

            if ($data) {
                $data->page_title = $request->page_title;
                $data->content = $request->content;

                if ($request->file('blog_image')) {
                    $folder_destination = 'uploads/blogs';
                    $file = $request->file('blog_image');
                    $file_name = time() . '-' . $file->getClientOriginalName();
                    $file->move($folder_destination, $file_name);
                    $data->blog_image = $folder_destination . '/' . $file_name;
                }

                $data->save();

                return response()->json([
                    'status' => 201,
                    'message' => 'The blog post has been updated.',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Blog post not found.',
                ]);
            }
        } catch (\Exception $error) {
            return response()->json([
                'status' => 422,
                'message' => 'Failed to update data. ' . $error->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        $data = BlogManagement::find($id);
        if ($data) {
            $data->delete();
            Session::flash('message', 'The data has been deleted.');
        }

        return redirect('/blog-management');
    }
}
