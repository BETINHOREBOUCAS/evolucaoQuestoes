<?php
namespace src\handlers;

use src\models\Materia;

class CalculadorHandlers {

    public static function getValor($materia) {

        foreach ($materia as $value) {
            $dados[$value['materia']] = Materia::getResult('conteudos', $value['id']);
        }

        return $dados;
        /*
        echo "<pre>";
        print_r($dados);
        echo "<pre>";
        */
    }    
}