<?php

namespace App\Imports;

use App\Models\Faculty;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class FacultyImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Faculty([
            
            'name' => $row['Name'],
            'teacher_code' => $row['TeacherCode'],
            'office' => $row['Office'],
            'designation' => $row['Designation'],
            'status' => $row['Status'],
            'phone' => $row['Phone'],
            'pabx' => $row['PABX'],
            'official_email' => $row['OfficialEmail'],
            'room' => $row['Room'],
        ]);
    }
}
