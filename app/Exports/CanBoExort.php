<?php

namespace App\Exports;

use App\Models\VanBanDi;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class CanBoExort implements FromView, ShouldAutoSize, WithEvents
{

    protected $ds_CanBo;

    protected $totalReCord;

    public function __construct($ds_CanBo, $totalReCord)
    {

        $this->ds_CanBo = $ds_CanBo;
        $this->totalReCord=$totalReCord + 3;
    }

    /**
     * @inheritDoc
     */
    public function view(): View
    {
        return view('tracuu::canBoExport',[
            'ds_CanBo' => $this->ds_CanBo,
        ]);
    }


    /**
     * @inheritDoc
     */
    public function registerEvents(): array
    {
        // TODO: Implement registerEvents() method.
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $cellRange = 'A1:J1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray([
                    'font' => [
                        'name'      =>  'Times New Roman',
                        'bold' => true,
                        'size' => 13,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                $event->sheet->getDelegate()->getStyle('A1:F1')
                    ->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()
                    ->setARGB('caeaef');

                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];


                $event->sheet->getStyle('A2:' . $event->sheet->getDelegate()->getHighestDataColumn() . $this->totalReCord)->applyFromArray($styleArray);
            }
        ];
    }

}

