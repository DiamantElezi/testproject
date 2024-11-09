<?php
namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Imports Employee from an uploaded file and stores them in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request)
    {
        Excel::import(new EmployeeImport, $request->file('file')->store('temp'));

        return redirect()->back()->with('success', 'Employee imported successfully.');
    }

    /**
     * Downloads a CSV file with a list of all Employee.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportCsv()
    {
        return Excel::download(new EmployeeExport, 'Employee.csv');
    }

    /**
     * Downloads an Excel file with a list of all Employee.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportXls()
    {
        return Excel::download(new EmployeeExport, 'Employee.xlsx');
    }
}