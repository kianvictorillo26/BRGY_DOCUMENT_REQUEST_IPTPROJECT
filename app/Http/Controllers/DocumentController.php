<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
  public function getDocuments(){
        $documents = Document::get();

        return response()->json(['documents' => $documents]);
    }  

    public function addDocument(Request $request){
        $request->validate([
            'document_name' => ['required', 'string', 'max:255'],
            
           


        ]);

        $document = Document::create([
            'document_name' => $request->document_name,
            
            
        ]);

        return response()->json(['message' => 'Document added successfully', 'document' => $document]);
    }

    public function editDocument(Request $request, $id){
        $request->validate([
            'document_name' => ['required', 'string', 'max:255'],
           
            
        ]);

        $document = Document::find($id);

        if(!$document){
            return response()->json(['message' => 'Document not found'], 404);
        }

        $document->update([
            'document_name' => $request->document_name,
            
            
        ]);

        return response()->json(['message' => 'Document updated successfully', 'document' => $document ]);
    }   

    public function deleteDocument($id){
        $document = Document::find($id);

        if(!$document){
            return response()->json(['message' => 'Document not found'], 404);
        }

        $document->delete();

        return response()->json(['message' => 'Document deleted successfully']);
    }
}
