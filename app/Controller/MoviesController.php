<?php
declare(strict_types=1);
namespace App\Controller;
use App\View\Movies;
use App\Models\Db;
use App\View\Renderer;
use App\Models\ProducerFilter;

class MoviesController extends AbstractController
{
    public function getMinBudget()
    {
        $sql = <<<SQL
         select MIN(budget)
         from movies
        SQL;
        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $minBudget = $stmt->fetchAll();
        return $minBudget;
    }

    public function getMaxBudget()
    {
        $sql = <<<SQL
         select MAX(budget)
         from movies
        SQL;
        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $maxBudget = $stmt->fetchAll();
        return $maxBudget;

    }
    public function getCurrentMaxBudget()
    {

    }
    public function execute()
    {
        $this->renderHtml('movies.phtml');
    }

    /**
     * @return array
     */
    public function getProducers(): array
    {
        $db = \App\Models\Db::getDbh()->prepare('SELECT * FROM producers');
        $db->execute();
        return $db->fetchAll();
    }
}