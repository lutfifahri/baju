<?php

namespace App\Services;

use Exception;
use PHPJasper\PHPJasper;
use Throwable;

class JasperService
{
    protected $db_connection;

    public function __construct()
    {
        $this->db_connection = [
            'driver'   => 'mysql',
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'host'     => env('DB_HOST', '127.0.0.1'),
            'database' => env('DB_DATABASE', 'forge'),
            'port'     => env('DB_PORT', '3306'),
        ];
    }

    public function generate($input, $output, $params)
    {
        try {
            $options = [
                'format'        => ['pdf'],
                'params'        => $params,
                'db_connection' => $this->db_connection,
            ];

            $jasper = new PHPJasper;

            $jasper->compile($input)->execute();

            return $jasper->process(
                $input,
                $output,
                $options,
            )->execute();
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
}
