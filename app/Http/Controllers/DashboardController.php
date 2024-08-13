<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatosModel;
use DB;


class DashboardController extends Controller
{
    public function __invoke(){
        $total=CandidatosModel::count();
        $masculino=CandidatosModel::where('genero','masculino')->count();
        $femenino=CandidatosModel::where('genero','femenino')->count();
        $valoracion = DB::table('candidatos')->avg('PromedioValoracion');
        $valoracion = round($valoracion, 2);

        $generos = CandidatosModel::select('genero', DB::raw('count(*) as total'))
        ->groupBy('genero')
        ->pluck('total', 'genero')->all();

        $valoraciones = CandidatosModel::select(
            DB::raw('AVG(ValoracionIngles) as ingles'),
            DB::raw('AVG(ValoracionExcel) as excel'),
            DB::raw('AVG(ValoracionBasesDeDatos) as bases_de_datos'),
            DB::raw('AVG(ValoracionTrabajoEquipo) as trabajo_en_equipo')
        )->first()->toArray();

        $ctx=[
            'total'=>$total,
            'masculino'=>$masculino,
            'femenino'=>$femenino,
            'valoracion'=>$valoracion,
            'generos'=>$generos,
            'valoraciones'=>$valoraciones,


        ];




        return view('dashboard',$ctx);
    }

    public function index() {
        // Datos para gráfico de géneros
        $generos = CandidatosModel::select('genero', DB::raw('count(*) as total'))
                    ->groupBy('genero')
                    ->pluck('total', 'genero')->all();

        // Datos para gráfico de valoración promedio
        $valoracionPromedio = CandidatosModel::avg('PromedioValoracion');

        // Datos para gráfico de valoraciones individuales
        $valoraciones = CandidatosModel::select(
                DB::raw('AVG(ValoracionIngles) as ingles'),
                DB::raw('AVG(ValoracionExcel) as exvelv'),
                DB::raw('AVG(ValoracionBasesDeDatos) as dbv'),
                DB::raw('AVG(ValoracionTrabajoEquipo) as teamv')
            )->first();

        return view('dashboard', compact('generos', 'valoracionPromedio', 'valoraciones'));
    }
}