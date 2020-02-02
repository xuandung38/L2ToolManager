<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolKeyList extends Model
{
    protected $table = 'tool_key_lists';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accounts()
    {
        return $this->hasMany(AccountList::class,'key_id');
    }
}
