<?php

namespace App\Regiobahn;

use App\AbstractMVC\AbstractDatabase;
use PDO;
use PDOException;

class RegiobahnDatabase extends AbstractDatabase
{

    function getTable()
    {
        // TODO: Implement getTable() method.
    }

    function getModel()
    {
        // TODO: Implement getModel() method.
    }

    /**
     * @param int $pzNr
     * @param $pzMg
     * @param $pzLw
     * @param $pzGt
     * @param $pzBis
     * @param $pzUe
     * @param $pzZus
     * @param int $strId
     * @return void
     */
    public function insertStrecke(int $pzNr, $pzMg, $pzLw, $pzGt, $pzBis, $pzUe, $pzZus, int $strId): void
    {
        try{
          if(!empty($this -> pdo)){
              $stmt = $this -> pdo -> prepare ("INSERT INTO db_399097_24.pzug( p_nr, p_mg, p_lw, p_gt, p_bis, p_ue, p_zus, str_id)
                                                        VALUES(:p_nr,:p_mg,:p_lw,:p_gt,:p_bis,:p_ue,:p_zus,:str_id)");
              $stmt -> execute([
                  ":p_nr"=>$pzNr,
                  ":p_mg"=>$pzMg,
                  ":p_lw"=>$pzLw,
                  ":p_gt"=>$pzGt,
                  ":p_bis"=>$pzBis,
                  ":p_ue"=>$pzUe,
                  ":p_zus"=>$pzZus,
                  ":str_id"=>$strId
              ]);
          }
        }catch (PDOException $e){
            header("Location /regiobahn");
            var_dump($e -> getMessage());
        }
    }
}