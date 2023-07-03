<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comic extends Model
{
    use HasFactory;
    // il soft delete aggiunge una column con valore null che si riempue con la data e non cancella definitivamente l'oggetto dal db
    use SoftDeletes;
    // protected $fillable = ['title','type', 'series','description','thumb','sale_date','price'];
}
