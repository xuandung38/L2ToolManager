<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountList extends Model
{
    protected $table = 'account_lists';

    protected $guarded = [];

    public function key()
    {
        return $this->belongsTo(ToolKeyList::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
