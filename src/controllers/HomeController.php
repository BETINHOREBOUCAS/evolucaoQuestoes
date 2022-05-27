<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\CalculadorHandlers;
use src\models\Materia;

class HomeController extends Controller {

    public function index() {
        $dados = [];
        $materias = Materia::getResult();
        
        if ($materias != false) {
            $dados['materias'] = CalculadorHandlers::getValores($materias);
            $dados['valores_totais'] = CalculadorHandlers::getValoresTotal($materias);
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
        $id_materia = $argumento['materia'];

        $dados = [];
        $materias = Materia::getResultConteudo($id_materia);
        $dados['materiaAtual']['id_materia'] = $id_materia;
        $dados['materiaAtual']['materia'] = $materias[0]['materia'];
        if ($materias != false) {
            $dados['materias'] = CalculadorHandlers::getConteudo($materias);
            $dados['valores_totais'] = CalculadorHandlers::getValoresTotal($materias);
        }
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