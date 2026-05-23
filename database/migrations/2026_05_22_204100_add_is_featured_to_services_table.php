<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            // Проверяем, существует ли колонка is_featured
            if (!Schema::hasColumn('services', 'is_featured')) {
                $table->boolean('is_featured')->default(false)->after('is_active');
            }
            // Проверяем, существует ли колонка icon
            if (!Schema::hasColumn('services', 'icon')) {
                $table->string('icon')->nullable()->after('is_featured');
            }
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            if (Schema::hasColumn('services', 'is_featured')) {
                $table->dropColumn('is_featured');
            }
            if (Schema::hasColumn('services', 'icon')) {
                $table->dropColumn('icon');
            }
        });
    }
};