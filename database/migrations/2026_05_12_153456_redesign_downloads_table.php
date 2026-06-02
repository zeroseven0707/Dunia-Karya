<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('downloads', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn(['product_id', 'order_id', 'download_count', 'last_download_at']);
        });

        Schema::table('downloads', function (Blueprint $table) {
            // Add new columns
            $table->foreignUuid('product_file_id')->after('user_id');
            $table->string('ip_address', 45)->nullable()->after('product_file_id');
            $table->text('user_agent')->nullable()->after('ip_address');
        });
    }

    public function down(): void
    {
        Schema::table('downloads', function (Blueprint $table) {
            $table->dropColumn(['product_file_id', 'ip_address', 'user_agent']);
        });

        Schema::table('downloads', function (Blueprint $table) {
            $table->foreignUuid('product_id')->after('user_id');
            $table->foreignUuid('order_id')->after('product_id');
            $table->integer('download_count')->after('order_id');
            $table->timestamp('last_download_at')->after('download_count');
        });
    }
};
