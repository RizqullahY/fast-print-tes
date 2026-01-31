<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($message = 'Berhasil', $data = null)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data
        ]);
    }

    public static function error($message = 'Terjadi kesalahan', $errors = null, $code = 422)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors
        ], $code);
    }
}
