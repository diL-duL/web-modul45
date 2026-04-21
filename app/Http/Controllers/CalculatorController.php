<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calc(string $angka1, string $angka2, string $operasi): string
    {
        $num1 = (float) $angka1;
        $num2 = (float) $angka2;
        $hasil = 0;

        if ($operasi === 'tambah' || $operasi === '+') {
            $hasil = $num1 + $num2;
        } elseif ($operasi === 'kurang' || $operasi === '-') {
            $hasil = $num1 - $num2;
        } elseif ($operasi === 'kali' || $operasi === '*') {
            $hasil = $num1 * $num2;
        } elseif ($operasi === 'bagi' || $operasi === '/') {
            if ($num2 == 0) {
                return 'Pembagian tidak boleh dengan 0.';
            }
            $hasil = $num1 / $num2;
        } else {
            return 'Operasi tidak valid. Gunakan tambah, kurang, kali, atau bagi.';
        }

        return "Hasil dari {$angka1} {$operasi} {$angka2} adalah: " . $hasil;
    }
}
