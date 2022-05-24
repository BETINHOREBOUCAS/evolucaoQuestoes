<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\AcessorHandlers;
use src\models\Materia;

class HomeController extends Controller {

    public function index() {
        $materia = Materia::getInfo('materias');
        $conteudo = Materia::getInfo('conteudos');
        
        if ($materia != false) {
            $dados['materia'] = AcessorHandlers::getConteudo($materia);
        }
        $this->render('home', $dados);
    }

    //Adiciona uma nova matéria
    public function addMateria() {
        $materia['materia'] = filter_input(INPUT_POST, 'materia', FILTER_DEFAULT);
        Materia::add('materias', $materia);
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