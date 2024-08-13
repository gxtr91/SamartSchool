<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Events\AfterSheet;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;

use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Font;



class CandidatosExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting , ShouldAutoSize, WithTitle, WithEvents, WithStyles

{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $individuos;

    public function __construct($individuos)
    {
        $this->individuos = $individuos;
    }

    public function collection()
    {
        return $this->individuos;
    }

    public function headings(): array
    {
        return [
            'nombres',
            'apellidos',
            'nombres_apellidos',
            'genero',
            'fecha_entrevista',
            'duracion',
            'ciudad',
            'ciudad_estado',
            'titulo_estudio',
            'ValoracionIngles',
            'ValoracionExcel',
            'ValoracionBasesDeDatos',
            'ValoracionTrabajoEquipo',
            'PromedioValoracion',
            'status',
        ];
    }

    public function registerEvents(): array
    {
        return array(
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setAutoFilter('A1:'.$event->sheet->getDelegate()->getHighestColumn().'1');
            }
        );
    }

    public function map($individuos): array
    {
        return [
            $individuos->nombres,
            $individuos->apellidos,
            $individuos->nombres_apellidos,
            $individuos->genero,
            $individuos->fecha_entrevista,
            $individuos->duracion,
            $individuos->estado,
            $individuos->ciudad,
            $individuos->ciudad_estado,
            $individuos->ValoracionIngles,
            $individuos->ValoracionExcel,
            $individuos->ValoracionBasesDeDatos,
            $individuos->ValoracionTrabajoEquipo,
            $individuos->PromedioValoracion,
            $individuos->status,


        ];
    }

    public function title(): string
    {
        return 'Registro de candidatos'; // Cambia el nombre de la pestaña aquí
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'K' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'L' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'M' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'N' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'O' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Aplicar un color de fondo a la primera fila (A1 hasta Z1)
        $sheet->getStyle('A1:O1')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '308a5a', // Color de fondo (Amarillo)
                ],
            ],
            'font' => [
                'bold' => true,        // Texto en negrita
                'color' => [
                    'argb' => 'FFFFFFFF', // Color del texto (Blanco)
                ],
            ],
        ]);
    }

}