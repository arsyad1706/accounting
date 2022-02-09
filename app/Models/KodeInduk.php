<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class KodeInduk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'kode_induk';
    protected $fillable = [
        'kode_induk',
        'nama',
        'tipe',
        'deleted_at',
        'deleted_by',
    ];
    protected $dates = ['deleted_at'];
}