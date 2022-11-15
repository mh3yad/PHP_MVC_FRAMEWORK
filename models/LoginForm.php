<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';


    public function login(){
        $user= (new User)->findOne(['email'=>$this->email]);
        if(!$user) {
            $this->addError('email', 'The email address  you entered isn\'t connected to an account');
            return false;
        }
        if(!password_verify($this->password,$user->password)) {
            $this->addError('password', 'Password you provided is incorrect, please try again');
            return false;
        }
        return Application::$app->login($user);
    }

    public function rules(): array
    {
        return [

            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED,],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => "Email",
            'password' => "Password"
        ];
    }

    public function getLabels(string $attr): string
    {
       return $this->labels()[$attr];
    }
}