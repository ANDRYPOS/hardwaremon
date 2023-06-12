<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'status_id',
        'image',
        'created_by',
        'verified_by',
        'verified_at'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function usersVerified()
    {
        return $this->belongsTo(User::class, 'verified_by', 'id');
    }

    // relation to categories
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    // status
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
