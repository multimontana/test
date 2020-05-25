<?php

namespace App\Imports;

use App\Bulk;
use Maatwebsite\Excel\Concerns\ToModel;

class BulkImport implements ToModel
{
    /**
     * @param array $row
     * @return Bulk|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
     */
    public function model(array $row)
    {
        return new Bulk([
            'name'     => $row['name'],
            'email'    => $row['email'],
        ]);
    }
}
