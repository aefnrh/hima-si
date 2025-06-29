<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabinet extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kabinet';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'year',
        'vision',
        'mission',
        'image',
    ];

    /**
     * Get the members for the kabinet.
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }
    
    /**
     * Get the divisions for the kabinet.
     */
    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
}