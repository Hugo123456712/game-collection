<?php

class AjoutFormulaireController
{
    private VideoGameModels $videoGameModels;

    public function __construct(VideoGameModels $videoGameModels)
    {
        $this->videoGameModels = $videoGameModels;
    }

    public function render()
    {
        require 'views/ajoutFormulaireView.php';
    }
}