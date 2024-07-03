<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; 
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class Task extends Model
{
     use SoftDeletes;    
     use HasFactory;    

    public $fillable = [
        'id',
        'title',
        'description',
        'created_by',
        'assigned_to',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
    ];

    public static array $rules = [
        'title' => 'required',
        'description' => 'required|string|max:2048', // Limit description to 2 KB (2048 bytes)
        'created_by' => 'required',
        'assigned_to' => 'required',
    ];

    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by', 'id');
    }

    public function assigned(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'assigned_to', 'id');
    }
}
