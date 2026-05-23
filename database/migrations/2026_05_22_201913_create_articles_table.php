<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок статьи');
            $table->string('slug')->unique()->comment('URL-адрес статьи');
            $table->text('short_description')->nullable()->comment('Краткое описание');
            $table->longText('content')->comment('Полное содержание статьи');
            $table->string('image')->nullable()->comment('Изображение');
            $table->string('author')->default('Администратор')->comment('Автор');
            $table->boolean('is_active')->default(true)->comment('Активна');
            $table->date('published_at')->nullable()->comment('Дата публикации');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};