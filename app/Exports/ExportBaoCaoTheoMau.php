<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class ExportBaoCaoTheoMau implements FromView, ShouldAutoSize, WithEvents
{
    protected $type;
    protected $data;
    protected $donVi;

    public function __construct($type, $data, $donVi)
    {
        $this->type = $type;
        $this->data = $data;
        $this->donVi = $donVi;
    }

    /**
     * @inheritDoc
     */
    public function view(): View
    {
        return view('baocaothongke::mau-bao-cao-excel.'.$this->type, [
            'data' => $this->data,
            'donVi' => $this->donVi
        ]);
    }

    public function registerEvents(): array
    {
        // TODO: Implement registerEvents() method.
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet
                    ->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
                $event->sheet->getPageSetup()->setpaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            },
        ];
    }
}
