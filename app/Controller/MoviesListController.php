<?php

declare(strict_types=1);

namespace App\Controller;

use App\View\Movies;
use App\Models\Db;
use App\View\Renderer;
use App\Models\ProducerFilter;

class MoviesListController extends AbstractController
{
    public function execute()
    {
        $sql = <<<SQL
        SELECT *
        FROM movies
            INNER JOIN producers AS p ON p.producer_id = movies.producer_id
            WHERE
        SQL;

        if ($producerId = $this->getProducerId()) {
            $sql .= ' p.producer_id = :producerId';
        }
        if ($minBudget = $this->getMinValue()) {
            $sql .= ' AND budget >= :min_budget';
        }
        if ($maxBudget = $this->getMaxValue()) {
            $sql .= ' AND budget <= :max_budget;';
        }


        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':producerId', $producerId, \PDO::PARAM_INT);
        $stmt->bindValue(':min_budget', $minBudget, \PDO::PARAM_INT);
        $stmt->bindValue(':max_budget', $maxBudget, \PDO::PARAM_INT);

        $stmt->execute();
        $movies = $stmt->fetchAll();
        header('Content-Type: application/json');
        echo json_encode($movies);
    }

    /**
     * @return int
     */
    public function getProducerId(): int
    {
        return isset($_REQUEST['producer_id'])
            ? (int) $_REQUEST['producer_id']
            : 0;
    }

    public function getMinValue(): int
    {
        return isset($_REQUEST['min_budget'])
            ? (int) $_REQUEST['min_budget']
            : 0;
    }

    public function getMaxValue(): int
    {
        return isset($_REQUEST['max_budget'])
            ? (int) $_REQUEST['max_budget']
            : 0;
    }
}