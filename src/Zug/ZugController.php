<?php
/**
 * class für das Eintragen der Züge
 */
namespace App\Zug;

use App\AbstractMVC\AbstractController;

class ZugController extends AbstractController
{
    protected $zugDatabase = null;
    public ?string $error =null;
    public function __construct(ZugDatabase $zugDatabase){
        $this->zugDatabase = $zugDatabase;
    }
    //

    /**
     * @return void
     */
    public function zug():void{
        //

            if((!empty($_POST['zugUpdate'])) and (!empty($_POST['upID'])) and (!empty($_POST['zugNr']))) {
                var_dump("Ein Eintrag ist vorhanden");
            }elseif((!empty($_POST['zugNr'])) and (!empty($_POST['zugJahr']))) {
                $this ->zugEintragen();
            }
            if((!empty($_POST['internJahr'])) AND (!empty($_POST['internFpl'])) ) {
                $checkM = isset($_POST['internMitropa']) ? 1 : 0;
                $checkB = $_POST['internBar'] ? 1 : 0;
                $this->internEintragen($checkM, $checkB);
            }

        //
       $zug= $this->zugDatabase->getZug();
            if(!$zug){
                $this->setError("Es wurde keine Zug gefunden!");
            }
        $this -> pageLoad("Zug","zug",['zug' => $zug,'error' => $this->error]);
    }

    /**
     * @return void
     */
    private function zugEintragen(): void
    {
                $zNummer = $this->sanitizeData($_POST['zugNr']);
                $zMitgattung = $this->sanitizeData($_POST['zugMg']);
                $zJahr = $this->sanitizeData($_POST['zugJahr']);
                $zLaufweg = $this->sanitizeData($_POST['zugLw']);
                $err=$this->zugDatabase->insertZug($zNummer,$zMitgattung, $zJahr,$zLaufweg);
                if($err){
                    $this->setError("Datenbank-Fehler!");
                }
        }

    /**
     * @param $checkM
     * @param $checkB
     * @return void
     */
    private function internEintragen($checkM, $checkB):void{
        $jahr = $this->sanitizeData($_POST['internJahr']);
        $fpl = $this->sanitizeData($_POST['internFpl']);
        $lw = $this->sanitizeData($_POST['internLw']);
        $gat = $this->sanitizeData($_POST['zugGattung']);
        $text = $this->sanitizeData($_POST['zugIntern']);
        $tage = $this->sanitizeData($_POST['internTage']);
        $nicht = $this->sanitizeData($_POST['internNicht']);
        $mitropa = $checkM;
        $bar = $checkB;
        $_id = $this->sanitizeData($_POST['idZug']);
        $this->zugDatabase->insertIntern($jahr,$fpl,$gat,$lw,$tage,$nicht,$text,$mitropa,$bar,$_id);
     }
    protected function setError(?string $error): void
    {
        $this->error = $error;
    }
    private function sanitizeData($data):string{
        if(empty($data)){
            $this->setError("Es wurde keine Daten angegeben!");
            exit();
        }
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
}