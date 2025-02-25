<?php

namespace App\Http\Controllers;
use App\Models\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class NavigationController extends Controller
{
    private $view_directory ='pages.admin.navigation.';
    private $url ='navigation-management';
    private $page_title ='Navigation Management';

    public function index(){
        return view($this->view_directory.'index',
      [
                'page_title' => $this->page_title,
                'navigations' => Navigation::where('category', operator: 'admin')->where('status', 'show')->get(),
                'current_page' => $this->url,
                'data' => Navigation::all(),
                'javascript_file' => '',
            ] 
        );
    }

    public function create(){
        return view($this->view_directory.'create',
      [
                'page_title' => $this->page_title,
                'navigations' => Navigation::where('category', operator: 'admin')->where('status', 'show')->get(),
                'current_page' => $this->url,
                'data' => Navigation::all(),
                'javascript_file' => 'admin/navigation/create.js',
            ]  
        );  
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'status' =>'required',
        ]);


        try{
            $data['name'] = $request->name;
            $data['slug'] = Str::slug($request->name);
            $data['category'] = $request->category;
            $data['status'] = $request->status;

            if(Navigation::create($data)){
                return response()->json([
                    'status' => 201,
                    'message' =>'The navigation has been added.'
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'message' =>'Sorry, failed to add the navigation.'
                ]);
            }
        }catch(\Exception $error){
            return response()->json([
                'status' => 422,
                'message' =>'Sorry, failed to add the navigation.' .$error->getMessage()
            ]);
        }
    }

    public function edit($id){
        return view($this->view_directory.'edit',
      [
                'page_title' => $this->page_title,
                'navigations' => Navigation::where('category', operator: 'admin')->where('status', 'show')->get(),
                'current_page' => $this->url,
                'detail' => Navigation::find($id),
                'javascript_file' => 'admin/navigation/edit.js',
            ]  
        );  
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'status' =>'required',
        ]);

        try{
            $data = Navigation::find($request->id);

            if($data){
                $data->name = $request->name;
                $data['slug'] = Str::slug($request->name);
                $data->category = $request->category;
                $data->status = $request->status;

              

                $data->save();
            }

            return response()->json([
                'status' => 201,
                'message' => 'The navigation has been updated',
            ]);

        }catch(\Exception $error){
            return response()->json([
                'status' => 422,
                'message' => 'Failed to update data' .$error->getMessage(),
            ]);
        }
    }

    public function destroy($id){
        $data = Navigation::find($id);
        if($data){
            $data->delete();
            session::flash('message', 'The data has been deleted');
            return redirect('/navigation-management');
        }
    }
}
