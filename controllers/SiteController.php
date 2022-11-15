<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home(){
        $params = [
            "name" => Application::$app->user->firstname
        ];
        return $this->render('home',$params);
    }

    public function contact(): string
    {
        $params = [
            "name" => "sayed"
        ];
        return $this->render('contact',$params);
    }
    public function handleContact(Request $request){
        $body = $request->getBody();
//        return $this->render('contact',$params);
    }
}