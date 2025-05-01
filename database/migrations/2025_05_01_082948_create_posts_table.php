<?php

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'author_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(PostCategory::class, 'category_id')->constrained()->cascadeOnDelete();
            $table->string('title')->unique();
            $table->string('slug');
            $table->text('content');
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->unsignedTinyInteger('status'); # PostStatusEnum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
