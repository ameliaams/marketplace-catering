<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'merchant';
    protected $guarded = [
        'company_name',
        'contact',
        'description',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
