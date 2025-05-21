<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\document;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $document = [
            ['name' => 'brgy clearance'],
            ['name' => 'brgy indigency'],
            ['name' => 'brgy goodmoral'],
            
        ];

        foreach($document as $document){
            YearLevel::create($document);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document');
    }
};
