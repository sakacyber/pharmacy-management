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
        Schema::table('patients', function (Blueprint $table) {
            // $table->id();
            // $table->string('name');
            // $table->string('gender');
            // $table->string('age');
            $table->string('phone')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('description')->nullable()->change();
            // $table->dateTime('enter_date');
            $table->dateTime('exit_date')->nullable()->change();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
