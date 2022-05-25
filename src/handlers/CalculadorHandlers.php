<?php
namespace src\handlers;

use src\models\Materia;

class CalculadorHandlers {

    public static function getValores($materias) {
        $teste = [];
        foreach ($materias as $key => $value) { 
            $conteudo[] = $value['id_materia'];
            //$conteudo[$value['materia']]['resolucao'] =+ $value['resolucoes'];
            /*$conteudo[$value['materia']] = [
                'resolucoes' => $resolucoes += $value['resolucoes'],
                'corretas' => $corretas += $value['corretas'],
                'erradas' => $erradas += $value['erradas']
            ];*/
        }

        $conteudo = array_unique($conteudo);

        foreach ($conteudo as $key => $value) {
            foreach ($materias as $resultados) {
                if ($value == $resultados['id_materia']) {
                    $teste[$resultados['materia']] += $resultados['resolucoes'];
                }
            }
        }
        
        echo "<pre>";
        print_r($teste);
        echo "<pre>";
    }    
}