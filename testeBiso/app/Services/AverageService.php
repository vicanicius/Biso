<?php

namespace App\Services;

use App\Exceptions\AverageException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class AverageService
{
    public function calc(Request $request): array
    {       
        foreach ($request->files as $key => $file) {
            $dataFiles = array_map('intval', explode(';', $request->$key->get()));
            $result[] = [$key => $this->prepareToCalc($dataFiles)];
        }

        return $result;
    }

    private function prepareToCalc(array $dataFile): array
    {
        $dataSize = $dataFile[0];

        $dataToCalc = Arr::except($dataFile, [0]);

        if ($dataSize !== count($dataToCalc)) {
            throw new AverageException('Formato de arquivo invalido', Response::HTTP_BAD_REQUEST);
        }

        foreach ($dataToCalc as $value) {
            $list[] = $value;
            $averages[] = number_format($this->calcAverage($list), 4);
        }

        return $averages;
    }

    private function calcAverage($list): int
    {
        $count = count($list);
        if ($count == 1) {
            return $list[0];
        } else if ($count == 2) {
            sort($list);
            return ($list[0] + $list[1]) / 2;
        } else if (!$this->isPair($count)) {
            sort($list);
            $index = round($count / 2,  0, PHP_ROUND_HALF_DOWN);
            return $list[$index];
        } else if ($this->isPair($count)) {
            sort($list);
            $index = round($count / 2,  0, PHP_ROUND_HALF_DOWN);
            $calc = ($list[$index] + $list[$index - 1]) / 2;
            return $calc;
        }  
    }

    private function isPair($value): bool
    {
        if($value % 2 == 0){
            return 1;
       } else {
            return 0;
       }
    }
}