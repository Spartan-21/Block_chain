<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Processing extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'batch_id',
        'processor_id',
        'output_quantity',
        'processing_date',
        'status',
        'notes',
        'created_by',
        'completed_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'processing_date' => 'date',
        'completed_at' => 'datetime',
        'output_quantity' => 'decimal:2',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'processing_date',
        'completed_at',
        'deleted_at'
    ];

    /**
     * Status constants
     */
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';

    /**
     * Get the status options for dropdown
     */
    public static function statusOptions()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_PROCESSING => 'Processing',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_FAILED => 'Failed',
        ];
    }

    /**
     * Relationship to Batch
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    /**
     * Relationship to User who processed
     */
    public function processor()
    {
        return $this->belongsTo(User::class, 'processor_id');
    }

    /**
     * Relationship to User who created the record
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope for completed processes
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', self::STATUS_COMPLETED);
    }

    /**
     * Scope for pending processes
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope for active processing
     */
    public function scopeInProgress($query)
    {
        return $query->where('status', self::STATUS_PROCESSING);
    }

    /**
     * Check if processing is completed
     */
    public function isCompleted()
    {
        return $this->status === self::STATUS_COMPLETED;
    }

    /**
     * Mark processing as completed
     */
    public function markAsCompleted()
    {
        $this->update([
            'status' => self::STATUS_COMPLETED,
            'completed_at' => now()
        ]);
        
        // Update related batch status if needed
        if ($this->batch) {
            $this->batch->update(['status' => Batch::STATUS_PROCESSED]);
        }
        
        return $this;
    }
}