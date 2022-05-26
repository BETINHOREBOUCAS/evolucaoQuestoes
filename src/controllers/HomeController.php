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

    public function materia() {
        $this->render('materia');
    }

    //Adiciona conteudo da matéria
    public function materiaAction() {
        $this->redirect('/materia/8');
    }    
}