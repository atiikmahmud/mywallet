<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    use HasFactory;

    protected $table = 'transections';

    protected $fillables = ['title', 'amount', 'status', 'loan_status', 'category_id', 'user_id'];

    public function users() 
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
