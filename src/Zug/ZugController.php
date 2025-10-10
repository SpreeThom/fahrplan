<?php
/**
 * class für das Eintragen der Züge
 */
namespace App\Zug;

use App\AbstractMVC\AbstractController;

class ZugController extends AbstractController
{
    /**
     * @var ZugDatabase|null
     */
    protected $zugDatabase = null;
    public ?string $error =null;
    private bool $berr = false;
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
                $this ->updateZug();
            }elseif((!empty($_POST['zugNr'])) and (!empty($_POST['zugGt']))) {
                $this ->zugEintragen();
            }
            if((!empty($_POST['zugGattung'])) AND (!empty($_POST['internFpl'])) ) {
                $checkM = isset($_POST['internMitropa']) ? 1 : 0;
                $checkB = isset($_POST['internBar']) ? 1 : 0;
                $this->internEintragen($checkM, $checkB);
            }

        //
       $zug= $this->zugDatabase->getZug();
            if(!$zug){
                $this->setError("Es wurde keine Zug gefunden!");
            }
       $intern =$this -> zugDatabase->getIntern();

        $this -> pageLoad("Zug","zug",['zug' => $zug,'intern'=>$intern,'error' => $this->error]);
    }

    /**
     * @return void
     */
    private function zugEintragen(): void
    {
                $zNummer = $this->sanitizeData($_POST['zugNr']);
                $zMitgattung = $this->sanitizeData($_POST['zugMg']);
                $zJahr = "1986";
                $zLaufweg = $this->sanitizeData($_POST['zugLw']);
                $zGattung = $this->sanitizeData($_POST['zugGt']);
                $err=$this->zugDatabase->insertZug($zNummer,$zMitgattung, $zJahr,$zLaufweg,$zGattung);
                if(!$err){

                    $this->setError("Datenbank-Fehler!");
                    header("Location: /fahrplan/");
                }
        }

    /**
     * @param $checkM
     * @param $checkB
     * @return void
     */
    private function internEintragen($checkM, $checkB):void{
        $fpl = $this->sanitizeData($_POST['internFpl']);
        $lw = $this->sanitizeData($_POST['internLw']);
        $gat = $this->sanitizeData($_POST['zugGattung']);
        $text = $this->sanitizeData($_POST['zugIntern']);
        $tage = $this->sanitizeData($_POST['internTage']);
        $nicht = $this->sanitizeData($_POST['internNicht']);
        $mitropa = $checkM;
        $bar = $checkB;
        if((empty($nicht)) || (empty($nicht)=="")) {
            $nicht = "--";
        }
        $_id = $this->sanitizeData($_POST['idZug']);
        $this->zugDatabase->insertIntern($fpl,$gat,$lw,$tage,$nicht,$text,$mitropa,$bar,$_id);
     }
     function updateZug(): void
     {
        $_sId = $this->sanitizeData($_POST['upID']);
            if((!empty($_Id)) Or ($_sId < 1))
            {
                $this->setError("Update Fehlgeschlagen keine ID Ausgewählt!");
                exit();
            }
         $zNummer = $this->sanitizeData($_POST['zugNr']);
         $zMitgattung = $this->sanitizeData($_POST['zugMg']);
        // $zJahr = $this->sanitizeData($_POST['zugJahr']);
         $zLaufweg = $this->sanitizeData($_POST['zugLw']);
            $this->zugDatabase->setUpdateZug($zNummer,$zMitgattung,$zLaufweg,$_sId);
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