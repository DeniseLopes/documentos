<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    protected $table = 'documento';
    protected $fillable = ['nome', 'numero', 'pessoa_id'];

    public $timestamps = false;

    //relacionamentos
    public function pessoa()
    {
        return $this->belongsTo('App\Pessoa');
    }
}
