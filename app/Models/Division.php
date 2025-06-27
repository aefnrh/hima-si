<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'work_programs',
        'image',
        'kabinet_id',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'work_programs' => 'array',
    ];

    /**
     * Get the members for the division.
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }
    
    /**
     * Get the events for the division.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    
    /**
     * Get the kabinet that owns the division.
     */
    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class);
    }
}