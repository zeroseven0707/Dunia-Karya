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
        Schema::create('product_files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('product_id');
            $table->string('file_path');
            $table->enum('file_type',['main','preview','extra'])->default('main');
            $table->string('file_size_bytes');
            $table->string('checksum_sha256');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_files');
    }
};
