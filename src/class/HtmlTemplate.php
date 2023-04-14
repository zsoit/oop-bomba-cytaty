<?php
class HtmlTemplate
{
    public static function PrimaryHeader($desc)
    {
        echo <<<HTML
        <h1>$desc</h1>
        HTML;
    }
    public static function Cytat($row)
    {
        echo <<<HTML
        <div class="cytat_bomba" id="{$row['id']}">
            <fieldset>
                <legend>Cytat#{$row["id"]}</legend>
                <h2>,,{$row["cytat"]}''</h2>
                <p>~ {$row["autor"]}</p>
            </fieldset>
        </div>
        HTML;
    }

    public static function AddFrom($path)
    {
        echo <<<HTML
        <form action="$path" method="POST">
            <fieldset>
                <legend>Autor</legend>
                <input type="text" name="autor" required>
            </fieldset>
            <fieldset>
                <legend>Cytat</legend>
                <textarea id="cytat" name="cytat" rows="5" cols="50"></textarea>
            </fieldset>
            <input type="submit" value="Dodaj">
        </form>
        HTML;

    }

    public static function ConfirmDelte($id)
    {
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

    public static function OptionCytat($id)
    {
        echo <<<HTML
        <a href="?action=delete&id=$id">
            <button>Usuń #$id </button>
        </a>
        <a href="?action=update__form&id=$id">
            <button>Edytuj #$id </button>
        </a>
        <br>
        HTML;
    }
}

