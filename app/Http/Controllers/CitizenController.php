<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;

class CitizenController extends Controller
{
     public function getCitizens(){
        $citizens = Citizen::get();

        return response()->json(['citizens' => $citizens]);
    }  

    public function addCitizen(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id_number' => ['nullable', 'string', 'max:255', 'unique:citizens'],
            'document_id' => ['nullable'],
            'request_id' => ['nullable'],


        ]);

        $citizen = Citizen::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'id_number' => $request->id_number,
            'document_id' => $request->document_id,
            'request_id' => $request->request_id,
        ]);

        return response()->json(['message' => 'Citizen added successfully', 'citizen' => $citizen]);
    }

    public function editCitizen(Request $request, $id){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            
        ]);

        $citizen = Citizen::find($id);

        if(!$citizen){
            return response()->json(['message' => 'Citizen not found'], 404);
        }

        $citizen->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            
        ]);

        return response()->json(['message' => 'Citizen updated successfully', 'citizen' => $citizen ]);
    }   

    public function deleteCitizen($id){
        $citizen = Citizen::find($id);

        if(!$citizen){
            return response()->json(['message' => 'Citizen not found'], 404);
        }

        $citizen->delete();

        return response()->json(['message' => 'Citizen deleted successfully']);
    }
}
