<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\PaymentMethod;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id', 'status', 'total', 'user_id', 'payment_method_id'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('id', 'quanty', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
