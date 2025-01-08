<?php
require_once 'models/bibliothequeModels.php';

class ClassementController
{
    private $bibliothequeModels;

    public function __construct()
    {
        $this->bibliothequeModels = new BibliothequeModels();
    }

    public function render()
    {
        $topPlayers = $this->bibliothequeModels->getTopPlayers();
        require 'views/ClassementView.php';
    }
}
?>