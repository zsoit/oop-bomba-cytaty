<?php
class HtmlTemplate
{
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
}

