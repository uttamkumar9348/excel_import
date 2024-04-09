<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use public\simplexlsx\src\SimpleXLSX;

class ExcelController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function insert(Request $request)
    {
        if ($request->hasFile('excel_import')) {
            $file = $request->file('excel_import');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName);

            $data = $this->readExcel($filePath);

            foreach ($data as $row) {

                $mappedData = [
                    'name' => $row[0],
                    'email' => $row[1],
                    'phone' => $row[2],
                    // Add more mappings as needed
                ];
                DB::table('excels')->insert($mappedData);
            }
        }

        return redirect()->back()->with('success', 'File imported successfully');
    }

    private function readExcel($filePath)
    {
        // Read the Excel file and extract data
        $data = [];

        // Open the Excel file
        $spreadsheet = SimpleXLSX::parse(storage_path('app/' . $filePath));

        // Get the first worksheet
        $rows = $spreadsheet->rows();

        // Iterate through each row
        foreach ($rows as $row) {
            $rowData = [];

            // Iterate through each cell in the row
            foreach ($row as $cell) {
                // Extract cell value
                $rowData[] = $cell;
            }

            // Add row data to the result array
            $data[] = $rowData;
        }

        return $data;
    }
}
