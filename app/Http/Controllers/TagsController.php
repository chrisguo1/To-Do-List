<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Carbon\Carbon;
use App\Http\Controllers\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\User;
use App\Http\Requests\TagRequest;

class TagsController extends Controller {
   
    public function index() { 
        $tags = Tag::all();
        
        return view('tags.index', compact('tags'));
    }
    
    public function create() {
        return view('tags.create');
    }
    
    public function store(TagRequest $request) {
        //$this->createTags($request);
        $tag = new Tag;
        $tag->name = $request->input('name');
        $tag->save();


        \Session::flash('flash_message', 'Tag has been added!');
        
        return redirect('tags');
    }
    
   // private function createTags(TagRequest $request) {

        //$tag = \Auth::user()->items()->tags()->create($request->all());
    //    return $tag;
   // }
    
}
