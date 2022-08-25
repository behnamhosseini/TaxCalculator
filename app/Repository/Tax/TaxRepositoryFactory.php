<?php


namespace App\Repository\Tax;


class TaxRepositoryFactory
{

    public function __invoke($taxRepositoryDb)
    {
        $connection=[
            'mysql' => TaxMysqlRepository::class,
            'pgsql' => TaxPostgresqlRepository::class,
        ];
        return $connection[$taxRepositoryDb];
    }

}
