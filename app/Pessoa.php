<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use SoftDeletes;

class Pessoa extends Model
{
    protected $table ='pessoas';
    protected $fillable = ['nome'];

    public $timestamps = false;

    //relacionamentos
    public function documentos()
    {
        return $this->hasMany('App\Documentos');
    }
}
