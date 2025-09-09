<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code');
            $table->enum('type', ['public', 'private'])->default('public');
            $table->double('discount_value');
            $table->integer('usage_limit');
            $table->integer('qty');
            $table->double('min_spend');
            $table->timestamp('start_date');
            $table->timestamp('exp_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
