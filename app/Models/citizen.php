<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $table = 'citizens';

    protected $fillable = [
        'first_name', 
        'middle_name', 
        'last_name',
        'id_number',
        'document_id',
        'request_id'

        
        
        ];

    public function document(){
        return $this->belongsTo(Document::class);
    }

    public function request(){
        return $this->belongsTo(Request::class);
    }

    public function citizen(){
        return $this->belongsTo(Citizen::class);
    }
}
