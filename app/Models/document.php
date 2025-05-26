<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
   use HasFactory;

    protected $table = 'documents';

    protected $fillable = ['document_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documentRequests()
    {
        return $this->hasMany(DocumentRequest::class);
    }
}
