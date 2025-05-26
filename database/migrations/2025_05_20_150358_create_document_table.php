<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Document;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('documents', function (Blueprint $table) {
        $table->id();
        $table->string('document_name'); // changed from 'name' to 'document_name'
        $table->timestamps();
});

       $documents = [
        ['document_name' => 'brgy clearance'],
        ['document_name' => 'brgy indigency'],
        ['document_name' => 'brgy residency'],
];

        foreach ($documents as $document) {
            Document::create($document);
}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
