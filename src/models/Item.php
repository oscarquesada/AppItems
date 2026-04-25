<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    // Apagamos las fechas automáticas para que MySQL no tire error
    public $timestamps = false; 
    
    protected $table = 'items';
    protected $fillable = ['name', 'qty', 'price'];
}