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

        if ($budget = $this->getMinBudgetValue()) {
            $sql .= ' WHERE budget >= :min_budget;';
        }

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

        if ($budget = $this->getMaxBudgetValue()) {
            $sql .= ' WHERE budget <= :max_budget;';
        }

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

    /**
     * @return int
     */
    public function getMinBudgetValue(): int
    {
        return isset($_REQUEST['min_budget'])
            ? (int) $_REQUEST['min_budget']
            : 0;
    }

    /**
     * @return int
     */
    public function getMaxBudgetValue(): int
    {
        return isset($_REQUEST['max_budget'])
            ? (int) $_REQUEST['max_budget']
            : 0;
    }
}