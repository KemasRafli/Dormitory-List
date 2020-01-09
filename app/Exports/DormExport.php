<?php

namespace App\Exports;

use App\Dorm;
use Maatwebsite\Excel\Concerns\FromCollection;

class DormExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dorm::all();
    }
}
