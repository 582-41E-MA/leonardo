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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit');
            $table->text('description');
            $table->string('model');
            $table->decimal('prix', 10, 2);
            $table->integer('stock');
            $table->string('categorie');
            $table->string('image_url');
            $table->string('image_path');
            $table->text('materiaux')->nullable();
            $table->text('technologie')->nullable();
            $table->text('fonctionnalites')->nullable();
            $table->string('certifications')->nullable();
            $table->string('fabricant')->nullable();
            $table->date('date_de_lancement')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
