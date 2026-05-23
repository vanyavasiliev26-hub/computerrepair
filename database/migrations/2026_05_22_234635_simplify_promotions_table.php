<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $columns = ['badge', 'old_price', 'new_price', 'icon', 'link', 'sort_order'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('promotions', $column)) {
                    $table->dropColumn($column);
                }
            }
            if (!Schema::hasColumn('promotions', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
        });
    }

    public function down()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->string('badge')->nullable();
            $table->decimal('old_price', 10, 2)->nullable();
            $table->decimal('new_price', 10, 2)->nullable();
            $table->string('icon')->nullable();
            $table->string('link')->nullable();
            $table->integer('sort_order')->default(0);
        });
    }
};