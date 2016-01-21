<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use Carbon\Carbon;
use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Auth;
use App\Tag;

class ItemsController extends Controller {
    /**
     * Create a new instance of ItemsController
     * Add middleware so non-registed users can't create or view items
     */
    public function __construct() {
        
        $this->middleware('auth');
    }

    /**
     * Get all items from the database and display it. 
     * Go to: list.app/items
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $items = array();
        foreach(Item::all() as $item) {
            if (\Auth::user()->id == $item->user_id) {
                array_push($items, $item);
            }
        }

        return view('items.index', compact('items'));
    }

    /**
     * Show the forms for creating a new item.
     * Go to: list.app/items/create
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        $tags = Tag::lists('name','id');
        
        return view('items.create', compact('tags'));
    }

    /**
     * Store a newly created item in the DB.
     * Go to: list.app/items
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request) {
        
        $this->createItem($request);
        
        \Session::flash('flash_message', 'Item has been added!');
        
        return redirect('items');
    }

    /**
     * Display the specified item.
     * Go to list.app/items/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item) {
        if (\Auth::user()->id == $item->user_id) {
            return view('items.show',compact('item'));
        }
        else {
            \Session::flash('flash_message', "You aren't authorized to view this item.");
            return redirect('items');
        }
    }

    /**
     *
     *
     * the forms for editing the specified item.
     * Go to list.app/items/{id}/edit
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item) {

        if ($item->user_id == \Auth::user()->id) {

            $tags = Tag::lists('name','id');
        
            return view('items.edit', compact('item', 'tags'));
        }
        else {

            \Session::flash('flash_message', "You aren't authorized to edit this item.");
        }

        return redirect ('items');

    }

    /**
     * Update the specified item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item) {
        
        $item->update($request->all());

        $this->syncTags($item, $request->input('tag_list'));
        
        \Session::flash('flash_message', 'The item has been updated!');
        
        return redirect('items');
    }

    /**
     * Removes an item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item) {

        if ($item->user_id == \Auth::user()->id){

            $item->delete();

            \Session::flash('flash_message', 'The item has been deleted!');
        }
        else {

            \Session::flash('flash_message', "You aren't authorized to delete this item.");
        }
        
        return redirect ('items');
    }

    /**
     * Add new tags and detach old tags (sync tags)
     *
     */
    private function syncTags(Item $item, array $tags) {

        $item->tags()->sync($tags);
    }
    
    /**
     * Create a new item.
     * Sync Tags
     */
    private function createItem(ItemRequest $request) {
       
        $item = \Auth::user()->items()->create($request->all());
        if (!empty($request->input('tag_list'))) {

            $this->syncTags($item, $request->input('tag_list'));
        }
        return $item;
    }
}
