<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CustomerGroup
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Customer> $customers
 * @property-read int|null $customers_count
 * @method static \Database\Factories\CustomerGroupFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomerGroup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title'
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_to_group');
    }
}
