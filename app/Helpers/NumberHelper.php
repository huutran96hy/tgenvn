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
         // Trả về giá trị ban đầu nếu đã có ký tự không phải là số
        if (preg_match('/[^\d]/', $value)) {
            return $value;
        }

        // Kiểm tra nếu là số thì định dạng
        if (is_numeric($value)) {
            return number_format($value, 0, ',', '.') . ' VNĐ';
        }

        return 'Thoả thuận'; 
    }
}
