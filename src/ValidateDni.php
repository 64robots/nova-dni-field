<?php

namespace R64\NovaDniField;

class ValidateDni
{
    public static function check_dni($cif){

        $cif = strtoupper($cif);

        for ($i = 0; $i < 9; $i ++) {
            $num[$i] = substr($cif, $i, 1);
        }

        // Invalid format
        if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif)) {
            return false;
        }

        // NIFs
        if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif)) {
            return ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1));
        }

        $suma = $num[2] + $num[4] + $num[6];
        for ($i = 1; $i < 8; $i += 2)
        {
            $suma += substr((2 * $num[$i]),0,1) + substr((2 * $num[$i]), 1, 1);
        }
        $n = 10 - substr($suma, strlen($suma) - 1, 1);

        // Special NIFs
        if (preg_match('/^[KLM]{1}/', $cif)) {
            return ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1));
        }

        // CIFs
        if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif)) {
            return ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1));
        }

        if (preg_match('/^[XYZ]{1}/', $cif)) {
            return ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X','Y','Z'), array('0','1','2'), $cif), 0, 8) % 23, 1));

        }

        return false;
    }
}
