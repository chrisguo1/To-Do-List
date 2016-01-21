<?php
//timestamp?????????????????????????????????????????
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'user_id',
        'body',
        
    ];

    protected $dates = ['deleted_at'];

    
    
    //an item belongs to a user
    public function user() {
		return $this->belongsTo('App\User');
	}
    
    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    
    public function getTagListAttribute() {
        return $this->tags->lists('id')->all();
    }
	

}
