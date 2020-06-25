<?php
declare(strict_types = 1);

namespace App\Controller;

use App\View\Renderer;
use App\Models\Db;

class ActorsListController extends AbstractController
{
    public function execute()
    {
        $sql = <<<SQL
        SELECT *
        FROM actors AS a
            INNER JOIN countries AS c ON c.country_id = a.country_id
        SQL;

        if ($countryId = $this->getCountryId()) {
            $sql .= ' WHERE c.country_id = :countryId;';
        }


        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':countryId', $countryId, \PDO::PARAM_INT);

        $stmt->execute();
        $actors = $stmt->fetchAll();
        header('Content-Type: application/json');
        echo json_encode($actors);
    }

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return isset($_REQUEST['country_id'])
            ? (int)$_REQUEST['country_id']
            : 0;
    }
}