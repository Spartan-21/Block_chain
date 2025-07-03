<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'batch_id',
        'distributor_id',
        'destination',
        'expected_delivery_date',
        'transport_method',
        'tracking_number',
    ];

    /**
     * Relationship: Distribution belongs to a Batch.
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    /**
     * (Optional) Relationship: Distribution belongs to a Distributor (if you have User model as distributor).
     */
    public function distributor()
    {
        return $this->belongsTo(User::class, 'distributor_id');
    }
}
