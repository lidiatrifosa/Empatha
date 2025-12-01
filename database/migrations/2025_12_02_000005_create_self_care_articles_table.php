<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('self_care_articles')) {
            Schema::create('self_care_articles', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('body');
                $table->string('author')->nullable();
                $table->timestamp('published_at')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('self_care_articles');
    }
};
