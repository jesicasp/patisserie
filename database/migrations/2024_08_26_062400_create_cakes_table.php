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
        Schema::create('cakes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chef_id');
            $table->string('cake_name');
            $table->string('image')->nullable();            
            $table->decimal('price',8,2);
            $table->text('cake_description');
            $table->timestamps();

            $table->foreign('chef_id')->references('id')->on('chefs')->onDelete('cascade');
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cakes');
    }
};
