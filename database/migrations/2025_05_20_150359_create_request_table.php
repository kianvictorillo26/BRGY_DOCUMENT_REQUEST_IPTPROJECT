<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\DocumentRequest;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        $requests = [
            ['name' => 'Dcoument Name'],
            ['name' => 'Document Description'],
        ];  

        foreach($requests as $request){
           DocumentRequest::create($request);
        }
    }

    /**
     * Reverse the migrations.
     */
     public function down()
    {
        Schema::dropIfExists('document_requests');
    }
};