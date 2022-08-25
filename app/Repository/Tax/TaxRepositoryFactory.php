<?php


namespace App\Repository\Tax;


class TaxRepositoryFactory
{

    public function __invoke($taxRepositoryDb)
    {
        $connection=[
            'mysql' => TaxMysqlRepository::class,
            'postgresql' => TaxPostgresqlRepository::class,
        ];
        return $connection[$taxRepositoryDb];
    }

}
