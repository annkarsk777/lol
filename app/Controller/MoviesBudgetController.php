<?php


namespace App\Controller;


use App\Models\Db;

class MoviesBudgetController extends AbstractController
{
    public function execute() {
        $minBudet = $_POST['min'];
        $maxBudet = $_POST['max'];
        $sql = <<<SQL
        SELECT budget
        FROM movies
            
        SQL;

        if ($minBudet && $maxBudet) {
            $sql .= ' WHERE budget>= :minBudet  AND budget<= :maxBudget;';
        }


        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':minBudet', $minBudet, \PDO::PARAM_INT);
        $stmt->bindValue(':maxBudet', $maxBudet, \PDO::PARAM_INT);

        $stmt->execute();
        $movies = $stmt->fetchAll();
        header('Content-Type: application/json');
        echo json_encode($movies);
    }
}
//        include '../../config/config.php';
//
//        /* Range */
//        $min = $_POST['min'];
//        $max = $_POST['max'];
//
//        /* Query */
//        $query = 'select * from movies where budget>=' . $min . ' and budget<=' . $max;
//        $result = mysql_query($query);
//
//        $html = '';
//        while ($row = mysql_fetch_array($result)) {
//            $emp_name = $row['emp_name'];
//            $email = $row['email'];
//            $salary = $row['salary'];
//            $city = $row['city'];
//
//            $html .= '<tr>';
//            $html .= '<td>' . $emp_name . '</td>';
//            $html .= '<td>' . $email . '</td>';
//            $html .= '<td>' . $salary . '</td>';
//            $html .= '<td>' . $city . '</td>';
//            $html .= '</tr>';
//        }
//
//        echo $html;
//    }
