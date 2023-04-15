<?php
namespace CytatyBomba\Model;

use CytatyBomba\Model\DatabaseQuery;
use CytatyBomba\View\HtmlTemplate;
use CytatyBomba\View\Views;
use CytatyBomba\Controller\DataController;

class App
{
    private $dbquery;
    private $CYTATY;
    private $COUNT_CYTATY;
    private $FETCH_ID_ARRAY;

    public function __construct()
    {
        $this->dbquery = new DataBaseQuery();
        $this->CYTATY = $this->dbquery->SelectCytaty();
        $this->COUNT_CYTATY = $this->dbquery->CountCytaty();
        $this->FETCH_ID_ARRAY = $this->dbquery->IdFetchArray();
    }

    public function PageHome(){
        HtmlTemplate::PrimaryHeader("TWÓJ CYTAT NA DZIS");
        $random = DataController::randomNumerFromArray($this->FETCH_ID_ARRAY);
        Views::DisplayCytat(
            $this->dbquery->SelectCytatById($random)
        );
    }

    public  function PageList()
    {
        HtmlTemplate::PrimaryHeader("WSZYSTKIE CYTATY ($this->COUNT_CYTATY)");
        Views::DisplayCytaty($this->CYTATY);
    }

    public function PageAdd()
    {
        $cytat = DataController::fetchPOST("cytat");
        $autor = DataController::fetchPOST("autor");

        $this->dbquery->InsertCytat($cytat,$autor);

        $row['cytat'] = $cytat;
        $row['autor'] = $autor;
        $row['id'] = "CYTATY_Z_BOMBY";

        HtmlTemplate::PrimaryHeader("DODANO");
        HtmlTemplate::Cytat($row);
    }

    public function AddFormPage()
    {
        HtmlTemplate::PrimaryHeader("DODAWANIE");
        HtmlTemplate::AddFrom("index.php?action=add");
    }

    public function DelelePage()
    {
        $id = DataController::fetchGET('id') ;
        $confirm = DataController::fetchGET('confirm') ;

        if($id != null AND $confirm == "true")
        {
            HtmlTemplate::PrimaryHeader("Usunięto cytat #$id!");
            $this->dbquery->DeleteCytat($id);
            Views::DisplayCytaty($this->CYTATY);
        }
        else{
            HtmlTemplate::ConfirmDelte($id);
        }
    }
}
?>