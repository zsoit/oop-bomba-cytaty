<?php
require_once 'Database.php';
require_once 'HtmlTemplate.php';

class App
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function count_cytaty()
    {
        $sql = <<<SQL
        SELECT count(*) as 'count_cytaty' FROM "cytaty"
        SQL;
        $result = $this->connection->query($sql);
        $row = $result->fetchArray();
        return $row['count_cytaty'];
    }

    public function select_cytat($id)
    {
        $sql = <<<SQL
        SELECT * FROM "cytaty" WHERE id="$id"
        SQL;
        $result = $this->connection->query($sql);
        $row = $result->fetchArray();
        HtmlTemplate::Cytat($row);

    }

    public function idArray()
    {

        $array = array();

        $sql = <<<SQL
        SELECT id FROM "cytaty"
        SQL;
        $result = $this->connection->query($sql);
        while($row = $result->fetchArray())
        {
            $array[] = $row['id'];
        }
        return $array;
    }

    public function randomNumerFromArray($array)
    {
            $liczba_losowa = null;
            if (!empty($array)) {
                $losowy_indeks = array_rand($array);
                $liczba_losowa = $array[$losowy_indeks];
            }
            return $liczba_losowa;
    }

    public function select_cytaty()
    {
        $sql = <<<SQL
        SELECT * FROM "cytaty"
        SQL;
        $result = $this->connection->query($sql);
        while($row = $result->fetchArray())
        {
            HtmlTemplate::Cytat($row);
            // echo <<<HTML
            // <a href="?action=delete&id={$row['id']}">
            //     <button>Usuń #{$row['id']} </button>
            // </a>
            // <a href="?action=update__form&id={$row['id']}">
            //     <button>Edytuj #{$row['id']} </button>
            // </a>
            // <br>
            // HTML;
        }
    }

    function Delele(){
        $id = isset($_GET['id']) ? $_GET['id'] : '0' ;
        $confirm = isset($_GET['confirm']) ? $_GET['confirm'] : '0' ;

        if($id != 0 AND $confirm == "true")
        {
            echo "<h3>Usunięto cyatat #$id!</h3> ";
            $this->select_cytaty();
            $sql = <<<SQL
            DELETE FROM "cytaty" WHERE id=$id
            SQL;
            $this->connection->query($sql);
        }
        else{
            echo <<<HTML
            <h1>USUWANIE</h1>
            <p>Czy jesteś pewien że chcesz usunąć cytat #$id?</p>
            <a href="?action=delete&id=$id&confirm=true">
                <button>
                    Usun
                </button>
            </a>
            HTML;
        }
    }

    private function setPOST($name)
    {
        if(isset($_POST[$name])) return $_POST[$name];
        else return null;
    }
    private function insertInto()
    {
        $autor= $this->connection->escapeString(
            $this->setPOST("autor")
        );
        $cytat = $this->connection->escapeString(
            $this->setPOST("cytat")
        );
        $sql = <<<SQL
        INSERT INTO "cytaty" ("id","cytat","autor")
        VALUES (NULL,'$cytat','$autor')
        SQL;
        $this->connection->query($sql);

    }

    private function UpdateForm()
    {
        echo "<h1>UWAGA! NIESKOŃCZONA EDYCJA</h1>";
        // $this->formInsertHTML("index.php?action=update");

    }
    private function Update()
    {
        $sql = <<<SQL
        UPDATE "cytaty" SET "id"='5', "cytat"='– NAPIERDALAAAAAAAAĆ!asdsa – Kurwa, panie kapitanie! Przecież napierdalamy! – Żebyś jeszcze tak, jak mordą, napierdalał z karabinu, to byłby z ciebie pożytek! Masz gdzie napierdalać?! – (Sebek zauważa, że strzelał w kamień) O kurwa.', "autor"='Kapitan Tytus Bomba' WHERE "rowid" = 5
        SQL;
        echo $sql;
        // $this->connection->query($sql);
    }

    public function Controller()
    {
        $page = isset($_GET['action']) ? $_GET['action'] : "home" ;

        switch($page)
        {
            case 'list':
                $count = $this->count_cytaty();
                echo "<h1>WSZYSTKIE CYTATY ($count)</h1>";
                $this->select_cytaty();
                break;
            case 'add':
                    $this->insertInto();
                    echo "<h1>DODANO</h1>";
                    echo "<h2>{$this->setPOST("cytat")}</h2>";
                    echo "<p>~{$this->setPOST("autor")}</p>";
                    break;
            case 'add__form':
                    echo "<h1>DODAJ CYTAT</h1>";
                    HtmlTemplate::AddFrom("index.php?action=add");
                    break;
            case 'delete':
                $this->Delele();
                break;

            case 'update__form':
                    $this->UpdateForm();
                    break;
            case 'update':
                    $this->Update();
                    break;
            default:
                echo "<h1>TWÓJ CYTAT NA DZIŚ</h1>";
                $array_id = $this->idArray();
                $random = $this->randomNumerFromArray($array_id);
                $this->select_cytat($random);
                break;
        }
    }

}
?>