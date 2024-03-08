<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'Order';
    protected $fillable = [
        'legalization_date',
        'address',
        'city',
        'observation_id',
        'causal_id'];

        public function Causal()
        {
            return $this->belongsTo(Causal::class);

        }

        public function observation()
        {
            return $this->belongsTo(Observation::class);
        }

        public function activities()

        {
            return $this->belongsToMany(Activity::class, 'order_activity',
                                            'order_id', 'activity_id');
        }

}