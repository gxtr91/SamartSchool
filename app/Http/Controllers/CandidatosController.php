<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatosModel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Excel;
use App\Exports\CandidatosExport;


class CandidatosController extends Controller
{
    public function __invoke(){
        return view('Candidatos.index');
    }

    public function indexJson(Request $request)
    {
        $usuario = Auth::user();
        $query = CandidatosModel::query(); // Carga las relaciones departamento y modulo

        // Aplicar filtro por nombre de entrenador si es enviado desde el cliente
        if ($request->has('genero') && !empty($request->genero)) {
            $query->where('genero', $request->genero);
        }

        // Aplicar filtro por empresa si es enviado desde el cliente
        if ($request->has('titulo_estudio') && !empty($request->titulo_estudio)) {
            $query->where('titulo_estudio', $request->titulo_estudio);
        }

        // Aplicar filtro por rango de fechas si son enviadas desde el cliente
        if ($request->has('startDate') && !empty($request->startDate) &&
            $request->has('endDate') && !empty($request->endDate)) {
            $query->whereBetween('fecha_entrevista', [$request->startDate, $request->endDate]); // Reemplaza 'fecha_columna' con el nombre real de la columna de fecha
        }

        // Obtener los eventos ordenados
        $query->orderBy('fecha_entrevista', 'desc');

        $eventos = $query->get();



        // Retornar los datos para DataTables
        return DataTables::of($eventos)
            ->addColumn('acciones', function($row) {
                // Definición de la columna de acciones
                // Asegúrate de que las URL sean correctas para tu aplicación
                $acciones = '<button type="button" class="btn" id="dropdown-align-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ...
                </button>
                <div class="dropdown-menu dropdown-menu-end " aria-labelledby="dropdown-align-primary" style="">

                ';
                $usuario = Auth::user();
                if ($usuario->id_rol==1){
                    $acciones.='<a  class="dropdown-item moreData" data-id="'.$row->id.'" href="#">Apliar detalles</a>
                                <a class="dropdown-item updateState" data-id="'.$row->id.'" href="#">Cambiar estado</a>';
                }

                return $acciones;
            })

            ->rawColumns(['acciones'])
            ->toJson();
    }

    public function updateState(Request $request){
        $usuario = Auth::user();
        if ($usuario->id_rol!=1){
            abort(403);
        }
        $id = $request->input('id');
        try {
            $evento = CandidatosModel::find($id);

            $evento->status==1 ? $evento->status = 0: $evento->status = 1;

            $evento->save();

            return response()->json(['success' => true, 'message' => 'Estado actualizado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar estado']);
        }

    }

    public function dwnExcel(Request $request)
    {

        $genero = request('genero');
        $startDate = request('startDate');
        $endDate = request('endDate');
        $usuario = Auth::user();
        // Filtrar por técnico y empresa
        $query = CandidatosModel::query();
        if ($genero) {
            $query->where('genero', $genero);
        }

        // Filtrar por rango de fechas
        if ($startDate && $endDate) {
            $query->whereBetween('fecha_entrevista', [$startDate, $endDate]);
        }

        $individuos = $query->get();

        $type = 'xlsx';

        // Fecha
        $now = new \DateTime();
        $now = $now->format('d-m-Y');

        // Nombre del archivo

        $nombreArchivo = 'Candidatos_Root_Capital_' . $now . '.' . $type;

        // Retorna el archivo de excel
        return Excel::download(new CandidatosExport($individuos), $nombreArchivo);
    }

    public function show($id){
        $actividad = CandidatosModel:: where('id',$id)->first();
        return response()->json($actividad);

        /*$ctx =[
            'actividad' => $actividad,
        ];
        return view('Actividades.show',$ctx);
        */
    }

    public function getCandidateSkills(Request $request) {
        $candidateId = $request->input('candidateId');
        $candidate = CanCandidatosControllerdidate::find($candidateId);
        if (!$candidate) {
            return response()->json(['error' => 'Candidato no encontrado'], 404);
        }
        return response()->json([
            'ingles' => $candidate->ValoracionIngles,
            'excel' => $candidate->ValoracionExcel,
            'basesDeDatos' => $candidate->ValoracionBasesDeDatos,
            'trabajoEquipo' => $candidate->ValoracionTrabajoEquipo
        ]);
    }

}