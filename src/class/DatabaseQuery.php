<?php
require_once 'Database.php';
class DatabaseQuery
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();

    }
    public function CountCytaty(): int
    {
        $sql = <<<SQL
        SELECT count(*) as 'count_cytaty' FROM "cytaty"
        SQL;

        $result = $this->db->query($sql);
        $row = $result->fetchArray();
        return $row['count_cytaty'];
    }

    public function SelectCytatById($id): object
    {
        $sql = <<<SQL
        SELECT * FROM "cytaty" WHERE id="$id"
        SQL;
        return  $this->db->query($sql);
    }

    public function SelectCytaty(): object
    {
        $sql = <<<SQL
        SELECT * FROM "cytaty"
        ORDER BY "id" DESC
        SQL;
        return $this->db->query($sql);
    }

    public function InsertCytat($cytat,$autor)
    {
        $cytat = $this->db->escapeString($cytat);
        $autor = $this->db->escapeString($autor);

        $sql = <<<SQL
        INSERT INTO "cytaty" ("id","cytat","autor")
        VALUES (NULL, "$cytat","$autor")
        SQL;
        $this->db->query($sql);
    }

    public function DeleteCytat($id): void
    {
        $sql = <<<SQL
        DELETE FROM "cytaty" WHERE id=$id
        SQL;
        $this->db->query($sql);
    }



    public function IdFetchArray(): array
    {
        $array = array();
        $sql = <<<SQL
        SELECT id FROM "cytaty"
        SQL;
        $result = $this->db->query($sql);
        while($row = $result->fetchArray())
        {
            $array[] = $row['id'];
        }
        return $array;
    }
}