<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    public function index()
    {

        return view('Report.index');
    }

    public function downloadReport(Request $request, $reportId)
    {
        // Initialize an empty variable to store the report data
        $reportData = null;

        // Use a switch statement to handle different report IDs
        switch ($reportId) {
            case 1:
                // Query for report with ID 1
                $reportData = DB::table('transactions')
                    ->select('transactions.id as no', 'users.name as cashier_name', 'transactions.nota_id', 'transactions.total_price')
                    ->join('users', 'transactions.cashier_id', '=', 'users.id')
                    ->whereMonth('transactions.created_at', '=', now()->month) // Filter by the current month
                    ->get();
                break;

            case 2:
                // Query for report with ID 2
                $reportData = DB::table('transactions')
                    ->select('transactions.id as no', 'users.name as cashier_name', 'transactions.nota_id', 'transactions.total_price')
                    ->join('users', 'transactions.cashier_id', '=', 'users.id')
                    ->get();
                break;

            case 3:
                // Query for report with ID 3
                $reportData = DB::table('detail_transactions')
                    ->select('products.name as product_name', 'products.category', DB::raw('SUM(detail_transactions.qty) as total_qty'), DB::raw('SUM(detail_transactions.qty * products.price) as total_price'))
                    ->join('products', 'detail_transactions.product_id', '=', 'products.id')
                    ->groupBy('products.name', 'products.category')
                    ->orderByDesc('total_qty') // Order by qty descending
                    ->get();
                break;

            case 4:
                // Query for report with ID 4
                $reportData = DB::table('your_table_2')->where('id', $reportId)->first();
                break;

            // Add more cases for other report IDs as needed

            default:
                // Handle the case when $reportId doesn't match any specific case
                abort(404, 'Report not found');
        }

        // Generate CSV data
        $csvData = $this->convertToCsv($reportData);

        // Set response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="report.csv"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        // Return response with CSV data
        return Response::make($csvData, 200, $headers);
    }

    // Function to convert data to CSV format
    private function convertToCsv($data)
    {
        $output = fopen('php://output', 'w');

        // Header CSV
        fputcsv($output, array_keys((array)$data[0]));

        // Data CSV
        foreach ($data as $row) {
            fputcsv($output, (array)$row);
        }

        fclose($output);

        return ob_get_clean();
    }

}
