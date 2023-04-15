<?php
namespace CytatyBomba\Controller;

use CytatyBomba\Model\App;

class PageController extends App
{
    public function Start()
    {
        $page = DataController::fetchGET('action');

        switch($page)
        {
            case 'list':
                $this->PageList();
                break;

            case 'add':
                $this->PageAdd();
                break;

            case 'add__form':
                $this->AddFormPage();
                break;

            case 'delete':
                $this->DelelePage();
                break;

            default:
                $this->PageHome();
                break;
        }

    }

    public function include_html($file)
    {
        include_once "src/public/$file.php";
    }
}