<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    protected $guarded = ['id'];

    public function user(){
        //id primary_key tbl invoice, user_id foreign_key tbl user
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
