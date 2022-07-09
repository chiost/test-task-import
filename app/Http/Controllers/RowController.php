<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRowsRequest;
use App\Imports\RowsImport;
use App\Models\Row;
use Illuminate\Http\JsonResponse;
use Maatwebsite\Excel\Excel;

class RowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(
            Row::query()
                ->get(['id', 'name', 'date'])
                ->groupBy('date')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ImportRowsRequest $request
     * @return JsonResponse
     */
    public function import(ImportRowsRequest $request): JsonResponse
    {
        \Excel::import(new RowsImport(), $request->file('file')->store('tmp'), readerType: Excel::XLSX);

        return response()->json(
            'ok'
        );
    }
}
