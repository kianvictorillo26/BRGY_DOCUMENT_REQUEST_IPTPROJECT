<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentRequest;

class DocumentRequestController extends Controller
{
    public function getRequests() {
        $requests = DocumentRequest::get();
        return response()->json(['requests' => $requests]);
    }

    public function addRequest(Request $request) {
        $request->validate([
            // Removed 'user_id' validation
            'document_id' => ['required', 'integer', 'exists:documents,id'],
            'name' => ['required', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],
            'remarks' => ['nullable', 'string'],
        ]);

        $documentRequest = DocumentRequest::create([
            'user_id' => auth()->id(), // Automatically use the logged-in user's ID
            'document_id' => $request->document_id,
            'name' => $request->name,
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return response()->json(['message' => 'Request added successfully', 'request' => $documentRequest]);
    }

    public function editRequest(Request $request, $id) {
        $request->validate([
            // Still required here — assuming admin/staff is allowed to change it
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'document_id' => ['required', 'integer', 'exists:documents,id'],
            'name' => ['required', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],
            'remarks' => ['nullable', 'string'],
        ]);

        $documentRequest = DocumentRequest::find($id);

        if (!$documentRequest) {
            return response()->json(['message' => 'Request not found'], 404);
        }

        $documentRequest->update([
            'user_id' => $request->user_id,
            'document_id' => $request->document_id,
            'name' => $request->name,
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return response()->json(['message' => 'Request updated successfully', 'request' => $documentRequest]);
    }

    public function deleteRequest($id) {
        $documentRequest = DocumentRequest::find($id);

        if (!$documentRequest) {
            return response()->json(['message' => 'Request not found'], 404);
        }

        $documentRequest->delete();

        return response()->json(['message' => 'Request deleted successfully']);
    }
}
