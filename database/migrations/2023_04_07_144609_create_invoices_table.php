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
            $table->string('invoice_no')->autoIncrement();
            $table->dateTime('date');
            $table->integer('tax')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('total');
            $table->string('description')->nullable();
            $table->string('note')->nullable();
            $table->string('header')->nullable();
            $table->string('footer')->nullable();
            $table->string('content');
            $table->timestamps();
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
