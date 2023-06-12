<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousels extends Model
{
    use HasFactory;

    protected $table = 'carousels';
    protected $fillable = [
        'name',
        'banner',
        'is_active',
        'verified_at',
        'verified_by',
        'created_by'
    ];
    public function usersCreated()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    // realtion to user - veriviedby
    public function usersVerified()
    {
        return $this->belongsTo(User::class, 'verified_by', 'id');
    }

    // status
    public function status()
    {
        return $this->belongsTo(status::class, 'is_active', 'id');
    }
}
