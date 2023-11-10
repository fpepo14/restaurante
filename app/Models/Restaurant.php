<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;
use App\Models\Product;
use App\Models\Spending;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function spendings()
    {
        return $this->hasMany(Spending::class);
    }
}
