<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Employee::all();
    }

    public function headings(): array
    {
        return [
            'Employee ID',
            'User Name',
            'Name Prefix',
            'First Name',
            'Middle Initial',
            'Last Name',
            'Gender',
            'Email',
            'Date of Birth',
            'Time of Birth',
            'Age in Years',
            'Date of Joining',
            'Age in Company',
            'Phone No.',
            'Place Name',
            'County',
            'City',
            'Zip',
            'Region',
        ];
    }
}
