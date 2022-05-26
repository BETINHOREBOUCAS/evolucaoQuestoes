<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\AcessorHandlers;
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
        $materia['materia'] = filter_input(INPUT_POST, 'materia', FILTER_DEFAULT);
        $conteudo['conteudo'] = filter_input(INPUT_POST, 'conteudo', FILTER_DEFAULT);
        $idMateria = Materia::add('materias', $materia);
        $conteudo['id_materia'] = $idMateria;
        $idConteudo = Materia::add('conteudos', $conteudo);
        Materia::add('resolucoes', ['resolucoes' => 0, "corretas" => 0, "erradas" => 0, "id_conteudo" => $idConteudo, "id_materia" => $idMateria]);
        $this->redirect('/');
    }

    public function materia($argumento) {
        $id_materia = $argumento['materia'];

        $dados = [];
        $materias = Materia::getResultConteudo($id_materia);
        if ($materias != false) {
            $dados['materias'] = CalculadorHandlers::getConteudo($materias);
            //$dados['valores_totais'] = CalculadorHandlers::getValoresTotal($materias);
        }
        $this->render('materia', $dados);
    }

    //Adiciona conteudo da matéria
    public function materiaAction($argumento) {
        $id_materia = $argumento['materia'];
        $conteudo['id_materia'] = $id_materia;
        $conteudo['id_conteudo'] = filter_input(INPUT_POST, 'conteudo', FILTER_DEFAULT);
        $conteudo['resolucoes'] = filter_input(INPUT_POST, 'resolucao', FILTER_DEFAULT);
        $conteudo['corretas'] = filter_input(INPUT_POST, 'certa', FILTER_DEFAULT);
        $conteudo['erradas'] = filter_input(INPUT_POST, 'erro', FILTER_DEFAULT);
        
        Materia::add("resolucoes", $conteudo);
        $this->redirect("/materia/$id_materia");
    }    
}