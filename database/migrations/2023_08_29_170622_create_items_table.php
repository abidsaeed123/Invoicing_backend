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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('quantity')->default(0);
            // $table->decimal('unit_price', 10, 2)->default(0.00);
            $table->decimal('price', 10, 2)->default(0.00);
            // $table->decimal('discount', 10, 2)->default(0.00);
            // $table->decimal('tax', 10, 2)->default(0.00);
            // $table->string('status')->default('pending');
            // $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
