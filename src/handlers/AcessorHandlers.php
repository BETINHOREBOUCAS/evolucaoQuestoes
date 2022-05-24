<?php
namespace src\handlers;

use src\models\Materia;

class AcessorHandlers {

    public static function getConteudo($materia) {

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