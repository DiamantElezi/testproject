<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Imports\EmployeeImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Import employees from a CSV file or raw CSV data in the request body.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function importCsv(Request $request)
    {
        // Check if a file is uploaded via 'file' input in the request
        if ($request->hasFile('file')) {
            // Validate uploaded file is of CSV or XLSX format
            $request->validate([
                'file' => 'file|mimes:csv,xlsx'
            ]);
            $file = $request->file('file');
        } else {
            // If no file uploaded, retrieve raw CSV content from the request body
            $fileContent = $request->getContent();
            // Generate a temporary file path for storing CSV data
            $tempFilePath = 'temp/' . Str::uuid() . '.csv';
            Storage::disk('local')->put($tempFilePath, $fileContent);
            $file = storage_path('app/' . $tempFilePath);
        }

        try {
            // Import the CSV file content into the Employee model
            Excel::import(new EmployeeImport, $file);

            // Remove the temporary file if it was created
            if (isset($tempFilePath)) {
                Storage::disk('local')->delete($tempFilePath);
            }

            return response()->json(['message' => 'Employees imported successfully from CSV']);
        } catch (\Exception $e) {
            // Log any exceptions during the import process for debugging
            \Log::error('CSV Import Error: ' . $e->getMessage());

            return response()->json([
                'message' => 'Failed to import employees from CSV.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Retrieve all employees from the database.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllEmployees()
    {
        return response()->json(['data' => Employee::all()], 200);
    }

    /**
     * Retrieve a single employee by their ID.
     *
     * @param string $empId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEmployee(string $empId)
    {
        // Find employee by ID
        $employee = Employee::find($empId);
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
        return response()->json(['data' => $employee], 200);
    }

    /**
     * Delete an employee by their ID.
     *
     * @param string $empId
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEmploy(string $empId)
    {
        // Find employee by ID
        $employee = Employee::find($empId);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        // Delete the employee record from the database
        $employee->destroy($employee->id);

        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }
}
