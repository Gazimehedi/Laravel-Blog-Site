<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_name',
        'description',
        'email',
        'mobile',
        'logo',
        'fb_url',
        'tw_url',
        'ig_url',
        'rh_url',
        'footer_info'
    ];
}
