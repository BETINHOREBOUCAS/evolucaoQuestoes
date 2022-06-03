<?php

namespace src\handlers;

class CalculadorHandlers
{

    public static function getValores($materias)
    {
        if (!empty($materias)) {
            foreach ($materias as $key => $value) {
                $conteudo[] = $value['id_materia'];
            }

            $conteudo = array_unique($conteudo);
            $resolução = 0;
            $corretas = 0;
            $erradas = 0;
            foreach ($conteudo as $key => $value) {

                foreach ($materias as $resultados) {

                    if ($value == $resultados['id_materia']) {
                        $resolução += $resultados['resolucoes'];
                        $corretas += $resultados['corretas'];
                        $erradas += $resultados['erradas'];

                        $valores[$resultados['materia']]['id_materia'] = $resultados['id_materia'];
                        $valores[$resultados['materia']]['resolucao'] = $resolução;
                        $valores[$resultados['materia']]['corretas'] = $corretas;
                        $valores[$resultados['materia']]['erradas'] = $erradas;
                    } else {
                        $resolução = 0;
                        $corretas = 0;
                        $erradas = 0;
                    }
                }
            }

            return $valores;
        } else {
            return array();
        }
    }

    public static function getValoresTotal($materias)
    {
        $total_resolução = 0;
        $total_erradas = 0;
        $total_corretas = 0;
        foreach ($materias as $key => $value) {
            $total_resolução += $value['resolucoes'];
            $total_corretas += $value['corretas'];
            $total_erradas += $value['erradas'];
        }

        $valores = [
            "total_resolucao" => $total_resolução,
            "total_corretas" => $total_corretas,
            "total_erradas" => $total_erradas
        ];

        return $valores;
    }

    public static function getConteudo($materias)
    {

        if (!empty($materias)) {
            foreach ($materias as $key => $value) {
                $conteudo[] = $value['id_conteudo'];
            }
            $conteudo = array_unique($conteudo);
            sort($materias);

            foreach ($conteudo as $value) {
                $resolução = 0;
                $corretas = 0;
                $erradas = 0;
                foreach ($materias as $resultados) {

                    if ($value == $resultados['id_conteudo']) {
                        $resolução += $resultados['resolucoes'];
                        $corretas += $resultados['corretas'];
                        $erradas += $resultados['erradas'];

                        $valores[$resultados['conteudo']]['id_conteudo'] = $resultados['id_conteudo'];
                        $valores[$resultados['conteudo']]['resolucao'] = $resolução;
                        $valores[$resultados['conteudo']]['corretas'] = $corretas;
                        $valores[$resultados['conteudo']]['erradas'] = $erradas;
                    } else {

                        $resolução = 0;
                        $corretas = 0;
                        $erradas = 0;
                    }
                }
            }
            ksort($valores);
            return $valores;
        } else {
            return array();
        }
    }
}