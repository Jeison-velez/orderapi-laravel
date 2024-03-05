<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Activity extends Model
{
    use HasFactory;
    protected $table = 'order Activity';
    protected $fillable = [
        'order-id',
        'activity_id',
        ''];

    public function order()
    {
        return $this->belongsTo(Order::class);

    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
        
    }
}
