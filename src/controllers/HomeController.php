<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    public function index() {
        $this->render('home');
    }

    public function materia() {
        $this->render('materia');
    }

    public function materiaAction() {
        $this->redirect('/materia/8');
    }
}