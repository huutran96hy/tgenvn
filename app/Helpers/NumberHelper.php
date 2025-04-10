<?php

namespace App\Helpers;

class NumberHelper
{
    /**
     * Định dạng số lương với dấu chấm phân cách hàng nghìn
     * Nếu giá trị đã có ký tự tiền tệ hoặc dấu chấm, không định dạng lại.
     *
     * @param mixed $value
     * @return string
     */
    public static function formatSalary($value)
    {
        // Loại bỏ tất cả ký tự không phải số
        $numericValue = preg_replace('/[^\d]/', '', $value);

        // Nếu sau khi loại bỏ mà không còn gì, trả về "Thoả thuận"
        if ($numericValue === '') {
            return 'Thoả thuận';
        }

        return number_format($numericValue, 0, ',', '.') . ' VNĐ';
    }
}
