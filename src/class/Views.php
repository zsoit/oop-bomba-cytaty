<?php
namespace CytatyBomba\View;

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