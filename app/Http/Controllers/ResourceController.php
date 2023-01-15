<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResourceController extends Controller
{
    
    public function index () {
        
        $pages = Resource::select('id', 'title', 'created_at', 'updated_at')->orderBy('position', 'asc')->paginate(15);

        $data['pages'] = $pages;
        $data['user_role'] = Auth::user()->role();
        return view('backend.resources.index', $data);
    }


    public function create () {
        
        return view('backend.resources.add');
    }

    public function store (Request $request) {
        
      $validator = Validator::make($request->all(), [
        'title' => 'required|unique:resources|max:255',
        'position' => 'integer',
        'content' => 'required',
       ]);

      if ($validator->fails()) { 
        return redirect()->back()->withErrors($validator)->withInput();
      }


       $resource = Resource::create([
            'title' => $request->title,
            'position' => $request->position,
            'content' => $request->content,
        ]);

        return redirect()->back()->withSuccess('Resource Created Successfully!');
    }

     public function show (Resource $resource) {

        $data['page'] = $resource; 
        
        return view('backend.resources.show', $data);
    }

    public function edit (Resource $resource) {

        $data['page'] = $resource; 
        
        return view('backend.resources.edit', $data);
    }

    public function update (Request $request, Resource $resource) {
        
      $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'position' => 'integer',
        'content' => 'required',
       ]);

      if ($validator->fails()) { 
        return redirect()->back()->withErrors($validator)->withInput();
      }


       $resource->update($request->only(['title', 'content', 'position']));

        return redirect()->back()->withSuccess('Resource Updated Successfully!');
    }

    public function destroy (Resource $resource) {
        
        $resource->delete();

        return redirect()->back()->with('success', 'The resource has been deleted successfully.');
    }
}
