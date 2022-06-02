<?php
namespace src\controllers;

use \core\Controller;
use DateTime;
use DateTimeZone;
use src\handlers\CalculadorHandlers;
use src\models\Materia;

class HomeController extends Controller {

    public function index() {
        $data = new DateTime();
        $data->setTimezone(new DateTimeZone('America/Fortaleza'));
        $mesAtual = $data->format('m');
        
        $dados = [];
        $materias = Materia::getResult($mesAtual, ($mesAtual-1));     
        
        
        if ($materias != false) {
            $dados['materiasMesAtual'] = CalculadorHandlers::getValores($materias['infoMesAtual']);
            $dados['valores_totais_atual'] = CalculadorHandlers::getValoresTotal($materias['infoMesAtual']);

            $dados['materiasMesAnterior'] = CalculadorHandlers::getValores($materias['infoMesAnterior']);
            $dados['valores_totais_anterior'] = CalculadorHandlers::getValoresTotal($materias['infoMesAnterior']);

            $dados['materiasTotal'] = CalculadorHandlers::getValores($materias['infoTotal']);
            $dados['valores_totais'] = CalculadorHandlers::getValoresTotal($materias['infoTotal']);
        }

        $this->render('home', $dados);
    }

    //Adiciona uma nova matéria
    public function addMateria() {
        $id_materia = strtolower(filter_input(INPUT_POST, 'id_materia', FILTER_DEFAULT));
        if (isset($id_materia) && !empty($id_materia)) {
            $conteudo['conteudo'] = strtolower(filter_input(INPUT_POST, 'conteudo', FILTER_DEFAULT));
            $conteudo['id_materia'] = $id_materia;
            $idConteudo = Materia::add('conteudos', $conteudo);
            Materia::add('resolucoes', ['resolucoes' => 0, "corretas" => 0, "erradas" => 0, "id_conteudo" => $idConteudo, "id_materia" => $id_materia]);
            $this->redirect("/materia/$id_materia");
        }else {
            $materia['materia'] = strtolower(filter_input(INPUT_POST, 'materia', FILTER_DEFAULT));
            $conteudo['conteudo'] = strtolower(filter_input(INPUT_POST, 'conteudo', FILTER_DEFAULT));
            $idMateria = Materia::add('materias', $materia);
            $conteudo['id_materia'] = $idMateria;
            $idConteudo = Materia::add('conteudos', $conteudo);
            Materia::add('resolucoes', ['resolucoes' => 0, "corretas" => 0, "erradas" => 0, "id_conteudo" => $idConteudo, "id_materia" => $idMateria]);
            $this->redirect("/");
        }
    }

    public function materia($argumento) {

        $data = new DateTime();
        $data->setTimezone(new DateTimeZone('America/Fortaleza'));
        $mesAtual = $data->format('m');

        $id_materia = $argumento['materia'];

        $dados = [];
        // Falta modificar função getResultConteudo para retorna todos os meses
        $materias = Materia::getResultConteudo($id_materia, $mesAtual, ($mesAtual-1));
        
        if ($materias != false) {
            $dados['materiasMesAtual'] = CalculadorHandlers::getConteudo($materias['infoMesAtual']);
            $dados['valores_totais_atual'] = CalculadorHandlers::getValoresTotal($materias['infoMesAtual']);

            $dados['materiasMesAnterior'] = CalculadorHandlers::getConteudo($materias['infoMesAnterior']);
            $dados['valores_totais_anterior'] = CalculadorHandlers::getValoresTotal($materias['infoMesAnterior']);

            $dados['materiasTotal'] = CalculadorHandlers::getConteudo($materias['infoTotal']);
            $dados['valores_totais'] = CalculadorHandlers::getValoresTotal($materias['infoTotal']);
        }

        /*echo "<pre>";
        print_r($dados);
        echo "<pre>";*/
        $this->render('materia', $dados);
    }

    //Adiciona conteudo da matéria
    public function materiaAction($argumento) {
        $id_materia = $argumento['materia'];
        $conteudo['id_materia'] = $id_materia;
        $conteudo['id_conteudo'] = strtolower(filter_input(INPUT_POST, 'conteudo', FILTER_DEFAULT));
        $conteudo['resolucoes'] = strtolower(filter_input(INPUT_POST, 'resolucao', FILTER_DEFAULT));
        $conteudo['corretas'] = strtolower(filter_input(INPUT_POST, 'certa', FILTER_DEFAULT));
        $conteudo['erradas'] = strtolower(filter_input(INPUT_POST, 'erro', FILTER_DEFAULT));
        
        Materia::add("resolucoes", $conteudo);
        $this->redirect("/materia/$id_materia");
    }    
}