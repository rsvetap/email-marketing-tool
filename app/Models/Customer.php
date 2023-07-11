<?php

namespace App\Models;

use App\Enums\CustomerSexEnum;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'sex',
        'birth_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sex' => CustomerSexEnum::class,
        'birth_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->belongsToMany(CustomerGroup::class, 'customer_to_group');
    }
}
