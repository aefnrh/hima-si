<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'position',
        'image',
        'kabinet_id',
        'division_id',
    ];

    /**
     * Get the kabinet that owns the member.
     */
    public function kabinet()
    {
        return $this->belongsTo(Kabinet::class);
    }

    /**
     * Get the division that owns the member.
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}