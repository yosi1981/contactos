<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncios';

    protected $primaryKey = 'idanuncio';

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'descripcion',
        'idlocalidad',
        'idusuario',
    ];

    protected $guarded = [
    ];

    public function UserAnunciante()
    {
        return $this->belongsTo('App\Useranunciante', 'idusuario', 'id');
    }

    public function ProvinciaAnuncio()
    {
        return $this->belongsTo('App\Provincia', 'idlocalidad', 'idprovincia');
    }

    public function ImagenesAnuncio()
    {
        return $this->belongsToMany('App\Imagen', 'imagenes_anuncios', 'idanuncio', 'idimagen');
    }

}
