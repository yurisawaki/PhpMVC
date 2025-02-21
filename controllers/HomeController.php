<?php
require_once __DIR__."/../utils/RenderViews.php";
require_once __DIR__ . "/../models/UserModel.php";

class HomeController extends RenderViews {
    public function index() {

        $users = new UserModel();

        $this->loadView('home', [
            'title' => 'Página Inicial',
            'users' => $users->fetch()
        ]);
    }
}


