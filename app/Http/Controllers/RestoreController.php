<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use Carbon\Carbon;
use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Auth;
use App\Tag;

class RestoreController extends Controller
{
    public function index(){


        $items = Item::onlyTrashed()->where('user_id', \Auth::user()->id)->get();
        //$items = Item::onlyTrashed()->get();

        return view('restore.index', compact('items'));
    }

    public function show($id) {

        //temporarily restore the item
        Item::withTrashed()->where('id', $id)->restore();
        $item = Item::find($id);

        if ($item->user_id == \Auth::user()->id) {

            \Session::flash('flash_message', 'The item has been recovered.');
        }
        else
        {
            //delete it again if not authorized
            $item->delete();
            \Session::flash('flash_message', "You aren't authorized to recover this item.");
        }
        return redirect ('items');
    }

    public function destroy($id) {

        Item::withTrashed()->where('id', $id)->forceDelete();

        \Session::flash('flash_message', "Item has been permanently deleted");
        return redirect('items');
    }

    public function destroyAll() {
        Item::withTrashed()->where('user_id', \Auth::user()->id)->forceDelete();
        \Session::flash('flash_message', "All items have been permanently deleted");
        return redirect('items');
    }

}