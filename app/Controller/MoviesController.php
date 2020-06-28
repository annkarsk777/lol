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
        $result = $stmt->fetch(\PDO::FETCH_NUM);
        return $result ? $result[0] : null;
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
        $result = $stmt->fetch(\PDO::FETCH_NUM);
        return $result ? $result[0] : null;
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