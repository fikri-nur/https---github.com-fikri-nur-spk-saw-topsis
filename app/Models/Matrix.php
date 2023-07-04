<?php

namespace App\Models;
use App\Models\Alternative;
use App\Models\Criteria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrix extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];


    public function alternative(){
        return $this->belongsTo(Alternative::class, 'rowNo_alternatif');
    }

    public function criteria(){
        return $this->belongsTo(Criteria::class, 'colNo_kriteria');
    }
}
