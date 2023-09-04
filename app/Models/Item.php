<?php
// app/Models/Item.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'quantity', 'price'];

    protected $guarded = [];

    // public function invoicedItems()
    // {
    //     return $this->hasOne(Invoiced::class);
    // }
}
