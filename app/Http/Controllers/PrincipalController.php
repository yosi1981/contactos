<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\AnuncioDia;
use App\Paquete;
use App\Poblacion;
use App\Provincia;
use App\User;
use App\Useranunciante;
use DB;

class PrincipalController extends Controller
{
    public function __construct()
    {

    }

    public function mostrarAnuncios($id = 1)
    {

        try {
            $provincia = Provincia::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $provincia = Provincia::first();
        }
        $fechaact    = getdate();
        $fechaactual = $fechaact['year'] . "-" . substr("0" . $fechaact['mon'], -2) . "-" . substr("0" . $fechaact['mday'], -2);

        $preanuncios = DB::table('anuncios')
            ->join('localidades', 'anuncios.idlocalidad', '=', 'localidades.idlocalidad')
            ->select('anuncios.idanuncio', 'anuncios.titulo', 'anuncios.descripcion', 'anuncios.fechainicio', 'anuncios.fechafinal', 'anuncios.activo', 'anuncios.idlocalidad', 'localidades.nombre as NombreLocalidad', 'anuncios.idusuario', 'localidades.idprovincia')
            ->where('localidades.idprovincia', '=', $provincia->idprovincia) //filtramos la localidad
            ->where(function ($query) use ($fechaactual) {
                $query->where('anuncios.activo', '=', '1')
                    ->orwhere('anuncios.fechainicio', "=", $fechaactual);
            })
            ->get();

        //$preanuncios=Anuncio::all();
        $ayer = date("Y-m-d", strtotime("$fechaactual - 1 day"));
        $i    = -1;
        foreach ($preanuncios as $anu) {
            $i       = $i + 1;
            $anuncio = new Anuncio();
            $anuncio = Anuncio::findorfail($anu->idanuncio);

            if ($anu->activo == 0) {
                $anuncio->activo = 1;
                $anuncio->save();

            } else {

                if ($anu->fechafinal == $ayer) //si sigue activo, pero el final era ayer, lo desactivamos y no lo mostramos
                {

                    $anuncio->activo = 0;
                    $anuncio->save();
                    unset($preanuncios[$i]);
                }
                if ($anu->activo == 1) {
                    if ($anuncio->ult_muestra != $fechaactual) {
                        $usuarioAnuncio = Useranunciante::findorfail($anu->idusuario);

                        if ($usuarioAnuncio->dias_disponibles == 0) {
                            $anuncio->activo = 0;
                            $anuncio->save();
                            unset($preanuncios[$i]);
                        }
                    }

                }

            }
        }
        $i = -1;
        foreach ($preanuncios as $an) {
            $i     = $i + 1;
            $anDia = AnuncioDia::all()
                ->where('fecha', '=', $fechaactual)
                ->where('idanuncio', '=', $an->idanuncio) //este ya activado
                ->where('idlocalidad', '=', $an->idlocalidad) //filtramos la localidad
                ->first();
            $poblacion      = Poblacion::findorfail($an->idlocalidad);
            $provincia      = Provincia::findorfail($poblacion->idprovincia);
            $anuncio        = Anuncio::findOrFail($an->idanuncio);
            $usuarioAnuncio = Useranunciante::findorfail($anuncio->UserAnunciante->id);

            if (count($anDia) == 1) {
                $newandia             = new AnuncioDia();
                $newandia             = AnuncioDia::findorfail($anDia->idanuncioDia);
                $newandia->numvisitas = $newandia->numvisitas + 1;

                $newandia->update();
            } else {
                if ($usuarioAnuncio->dias_disponibles > 0) {
                    $newandia               = new AnuncioDia();
                    $an1                    = new Anuncio();
                    $an1                    = Anuncio::findorfail($an->idanuncio);
                    $newandia->idanuncio    = $an1->idanuncio;
                    $newandia->idanunciante = $an1->UserAnunciante->id;
                    $newandia->fecha        = $fechaactual;
                    $newandia->idlocalidad  = $poblacion->idlocalidad;
                    $newandia->idprovincia  = $provincia->idprovincia;
                    $newandia->idadminPro   = $provincia->adminPro->id;
                    $newandia->iddelegado   = $provincia->delegado->id;
                    $newandia->idpartner    = $an1->UserAnunciante->Partner->id;
                    $newandia->numvisitas   = 1;
                    //$usuarioAnuncio                   = Useranunciante::findorfail($an1->UserAnunciante->id);
                    $usuarioAnuncio->dias_disponibles = $usuarioAnuncio->dias_disponibles - 1;
                    //localizamos el paquete del que descontar el dia
                    //para realizar los pagos...
                    $auxpaquete = Paquete::all()
                        ->where('idanunciante', $usuarioAnuncio->id)
                        ->where('estado', 'EN VIGOR')
                        ->sortBy('fechaReg')
                        ->first();

                    $auxpaquete->drestantes = $auxpaquete->drestantes - 1;
                    if ($auxpaquete->drestantes == 0) {
                        $auxpaquete->estado = 'AGOTADO';
                    }
                    $newandia->idpaquete = $auxpaquete->idpaquete;
                    $auxpaquete->save();

                    $usuarioAnuncio->save();
                    $an1->ult_muestra = $fechaactual;
                    $an1->save();
                    $newandia->save();
                } else {

                    $anuncio->activo = 0;
                    $anuncio->save();
                    unset($preanuncios[$i]);
                }
            }
        }
        $provincias = DB::table('provincias')
            ->select('idprovincia', 'nombre')
            ->where('habilitado', '=', '1')
            ->get();
        return view('publico.mostrarAnunciosProvincia', ["anuncios" => $preanuncios, "provincias" => $provincias, "provincia" => $provincia]);
    }

    public function ActivarUsuario($email, $verifytoken)
    {
        $usuario = User::where(['email' => $email, 'token' => $verifytoken])->first();
        if ($usuario) {
            $usuario->status = 1;
            $usuario->token  = null;
            $usuario->update();
                $newpaquete= new Paquete;
                $newpaquete->tipo='GRATIS';
                $newpaquete->idanunciante=$usuario->id;
                $newpaquete->total=30;
                $newpaquete->dcontratados=30;
                $newpaquete->drestantes=30;
                $fechaact=getdate();
                $fechaactual = $fechaact['year'] . "/" . substr("0" . $fechaact['mon'], -2) . "/" . substr("0" . $fechaact['mday'], -2);
                $newpaquete->fechaReg=$fechaactual;
                $newpaquete->fechaUlt=$fechaactual;
                $newpaquete->estado='EN VIGOR';
                $newpaquete->save();            
            return $usuario->name . " Activado";
        } else {
            return $usuario->name . " No existe";
        }
    }
}
