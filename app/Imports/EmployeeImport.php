<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Employee([
            'employee_id' => $row['emp_id'],
            'name_prefix' => $row['name_prefix'],
            'first_name' => $row['first_name'],
            'middle_initial' => $row['middle_initial'],
            'last_name' => $row['last_name'],
            'gender' => $row['gender'],
            'email' => $row['e_mail'],
            'date_of_birth' => date('Y-m-d', strtotime($row['date_of_birth'])),
            'time_of_birth' => date('H:i:s', strtotime($row['time_of_birth'])),
            'age_in_years' => $row['age_in_yrs'],
            'date_of_joining' => date('Y-m-d', strtotime($row['date_of_joining'])),
            'age_in_company' => (float) $row['age_in_company_years'],
            'phone_no' => $row['phone_no'],
            'place_name' => $row['place_name'],
            'county' => $row['county'],
            'city' => $row['city'],
            'zip' => $row['zip'],
            'region' => $row['region'],
            'user_name' => $row['user_name'],
        ]);
    }
}
