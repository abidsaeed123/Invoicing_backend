<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'status', 'billing_address', 'due_date', 'shipping_address', 'user_id'];
    protected $with = ['user', 'invoiced'];
    // Additional methods as needed.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoiced()
    {
        return $this->hasMany(Invoiced::class);
    }

    public function scopeWithUserAndTotalPrice($query)
    {
        return $query->with('user', 'invoiced')
            ->select('invoices.*', DB::raw('users.name as customer'), DB::raw('SUM(invoiced.price) as total_price')) // Calculate total_price
            ->Join('users', 'users.id', '=', 'invoices.user_id')
            ->leftJoin('invoiced', 'invoices.id', '=', 'invoiced.invoice_id')
            ->groupBy('invoices.id');
    }
}
