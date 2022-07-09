<?php

namespace App\Imports;

use App\Models\Row;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class RowsImport implements ToModel, WithChunkReading, ShouldQueue, WithHeadingRow, WithStartRow, WithMapping
{
    private const CHUNK_SIZE = 1000;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Row([
            'name' => $row['name'],
            'date' => $row['date'],
        ]);
    }

    public function chunkSize(): int
    {
        return self::CHUNK_SIZE;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function map($row): array
    {
        $row['date'] = Carbon::instance(Date::excelToDateTimeObject($row['date']));

        return $row;
    }
}
