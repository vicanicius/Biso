<?php

namespace App\Http\Controllers;

use App\Exceptions\AverageException;
use App\Services\AverageService;
use Exception;
use Illuminate\Http\Request;

class AverageController extends Controller
{

    public function __construct(private AverageService $averageService)
    {
        $this->averageService = $averageService;
    }

    public function calc(Request $request)
    {
        try {
            return response()->json([
                [
                    'result' => $this->averageService->calc($request)
                ]
            ]);
        } catch (Exception $e) {
            throw new AverageException($e->getMessage(), $e->getCode());
        }
    }
}
