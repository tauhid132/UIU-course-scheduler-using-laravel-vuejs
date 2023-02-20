<?php

namespace App\Imports;

use App\Models\Section;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class SectionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Section([
            'program' => $row['Program'],
            'formal_code' => $row['FormalCode'],
            'title' => $row['Title'],
            'section_name' => $row['SectionName'],
            'capacity' => $row['Capacity'],
            'occupied' => $row['Occupied'],
            'reg_count' => $row['RegCount'],
            'room1' => $row['Room1'],
            'room2' => $row['Room2'],
            'day1' => $row['Day1'],
            'day2' => $row['Day2'],
            'time1' => $row['Time1'],
            'time2' => $row['Time2'],
            'grade_sheet_template' => $row['GradeSheetTemplate'],
            'credits' => $row['Credits'],
        ]);
    }
}
