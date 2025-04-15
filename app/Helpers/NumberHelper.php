<?php

namespace App\Helpers;

class NumberHelper
{
    public static function formatSalary($value)
    {
        // Loại bỏ tất cả ký tự không phải số
        $numericValue = preg_replace('/[^\d]/', '', $value);

        if ($numericValue === '' || !is_numeric($numericValue)) {
            return 'Thoả thuận';
        }

        $number = (int) $numericValue;

        // Nếu số >= 1 triệu => đổi ra triệu
        if ($number >= 1000000) {
            $million = $number / 1000000;
            // Nếu là số nguyên như 10 triệu => bỏ phần thập phân
            if (fmod($million, 1) == 0) {
                return number_format($million, 0, ',', '.') . ' triệu';
            } else {
                return number_format($million, 1, ',', '.') . ' triệu';
            }
        }

        // Nếu nhỏ hơn 1 triệu thì format kiểu VNĐ 
        return number_format($number, 0, ',', '.') . ' VNĐ';
    }
}
