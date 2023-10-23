<?php

namespace App\Http\Controllers\Utilidades;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\BeforeExport;

class ReportExportArray implements FromArray, WithHeadings
{
    protected $results;

    public function __construct(array $results, array $headings, array $fileAttributes)
    {
        $this->results = $results;
        $this->headings = $headings;
        $this->file_attributes = $fileAttributes;
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->results;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return $this->headings;
    }

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setTitle('Patrick');
            },
        ];
    }

}