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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('menus')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('url', 255)->nullable();
            $table->string('route_name', 100)->nullable();
            $table->string('icon', 50)->nullable();
            $table->integer('order')->default(0);
            $table->string('target', 20)->default('_self');
            $table->string('position', 20)->default('header');
            $table->boolean('is_active')->default(true);
            $table->foreignId('permission_id')->nullable()->constrained('permissions')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
