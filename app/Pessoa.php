<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use SoftDeletes;
    protected $table ='pessoas';
    protected $fillable = ['nome'];

    public $timestamps = false;

    //relacionamentos
    public function documentos()
    {
        return $this->hasMany('App\Documento');
    }
}
