<?php
require_once 'HtmlTemplate.php';
class Views
{
    public static  function DisplayCytat($result)
    {

        $row = $result->fetchArray();
        HtmlTemplate::Cytat($row);

    }

    public static function DisplayCytaty($result)
    {

        while($row = $result->fetchArray())
        {
            HtmlTemplate::Cytat($row);
            HtmlTemplate::OptionCytat($row['id']);

        }
    }
}