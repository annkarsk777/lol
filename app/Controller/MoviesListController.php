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
//        $currentMinBudget = $this->getCurrentMinBudget();
//        $sql = <<<SQL
//        select *
//        from movies
//            join producers as p on  p.producer_id = movies.producer_id
//            WHERE m.budget >= :current_min_budget AND m.budget <=
//        SQL;

        $sql = <<<SQL
        SELECT *
        FROM movies
            INNER JOIN producers AS p ON p.producer_id = movies.producer_id
        SQL;

        if ($producerId = $this->getProducerId()) {
            $sql .= ' WHERE p.producer_id = :producerId;';
        }


        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':producerId', $producerId, \PDO::PARAM_INT);

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

//    public function findAllMovies(int $producerId = 0)
//    {
//        $sql = <<<SQL
//        select *
//        from movies
//            join producers as p on  p.producer_id = movies.movies_id
//        SQL;
//
//        if ($producerId) {
//            $sql .= 'where p.producer_id = :producerId;';
//        }
//
//        $dbh = Db::getDbh();
//        $stmt = $dbh->prepare($sql);
//        $stmt->bindValue(':producerId', $producerId, \PDO::PARAM_INT);
//
//        $stmt->execute();
//        return $stmt->fetchAll(\PDO::FETCH_CLASS, \App\Models\ProducerFilter::class);
//    }
}