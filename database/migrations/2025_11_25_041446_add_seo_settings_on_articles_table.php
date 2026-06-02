<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            if (!Schema::hasColumn('articles', 'seo_title')) {
                $table->string('seo_title')->nullable()->after('title');
            }
            if (!Schema::hasColumn('articles', 'seo_description')) {
                $table->text('seo_description')->nullable()->after('excerpt');
            }
            if (!Schema::hasColumn('articles', 'seo_keywords')) {
                $table->string('seo_keywords')->nullable()->after('seo_description');
            }
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['seo_title', 'seo_description', 'seo_keywords']);
        });
    }
};
