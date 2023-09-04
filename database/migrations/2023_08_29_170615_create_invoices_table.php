<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->enum('status', ['pending', 'canceled', 'paid'])->default('pending');
            $table->string('billing_address')->nullable();
            // $table->string('terms')->nullable();
            // $table->string('terms_title')->nullable();
            // $table->date('date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('shipping_address')->nullable();
            // $table->string('ship_via')->nullable();
            $table->date('shipping_date')->nullable();
            // $table->string('payment_mathod')->nullable();
            // $table->text('remarks')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
