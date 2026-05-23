<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $columns = ['slug', 'short_description', 'author'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('articles', $column)) {
                    $table->dropColumn($column);
                }
            }
            if (!Schema::hasColumn('articles', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->string('author')->default('Администратор');
        });
    }
};