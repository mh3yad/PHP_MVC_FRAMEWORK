<?php

namespace app\models;

use app\core\Application;
use app\core\DBModel;
use app\core\Model;

class User extends  DBModel
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $status = 0;
    public string $password = '';
    public string $password_confirm = '';
    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_DELETED = 2;

     public function rules():array{
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL,[self::RULE_UNIQUE,'class'=>self::class]],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN, 'min'=>8],[self::RULE_MAX,'max'=>24]],
            'password_confirm' => [self::RULE_REQUIRED,[self::RULE_MATCH,'match' => 'password']]
        ];
    }

    public function save():bool
    {
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
        $this->status = self::STATUS_INACTIVE;
        parent::save();
        return true;
    }

    public function tableName(): string
    {
       return "users";
    }
    public function attributes(): array
    {
        return [
            'firstname','lastname','email','password','status'
        ];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirm' => 'Password Confirm'
        ];
    }

    public function getLabels(string $attr): string
    {
       return $this->labels()[$attr];
    }

    public  function findOne($where): User|bool
    {
         //['email' => 'sayed','firstname' => 'ahmed']
        $tableName= static::tableName();
        $attributes = array_keys($where);
        $attributes = implode(" AND",array_map(fn($attr) => "$attr = :$attr",$attributes));
        $stmt = static::prepare("SELECT * FROM $tableName WHERE $attributes");
        foreach ($where as $attr => $value){
            $stmt->bindParam(":$attr",$value);
        }
        $stmt->execute();
        return  $stmt->fetchObject(static::class);

    }

    public static function primaryKey(): string
    {
       return 'id';
    }
    public function displayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}