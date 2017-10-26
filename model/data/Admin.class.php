<?php

namespace model\data;

class Admin
{
    private $id;
    private $login;
    private $password;

    public function __construct($id = 0, $login = '', $password = '')
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function selectAdmin(\PDO $pdo)
    {
        try {
            $sql = 'SELECT admins.login, admins.password FROM admins WHERE admins.id = :id;';
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id]);
            return $statement->fetch(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка считывания администратора', 0, $e);
        }
    }

    public function deleteAdmin(\PDO $pdo)
    {
        try {
            $sql = 'DELETE FROM admins WHERE admins.id=:id;';
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id]);
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка удаления администратора', 0, $e);
        }
    }

    public function checkAdmin(\PDO $pdo, $validate = false, $edit = false, $id = 0)
    {
        try {

            if (null === $this->login || null === $this->password || trim($this->login) === '' || trim($this->password) === '') {
                throw new \LogicException('При записи администратора все поля должны быть заполнены');
            }

            if ($validate) {

                if ($edit) {
                    $sql = 'SELECT admins.login, admins.password FROM admins WHERE admins.login = :login and admins.id <> :id;';
                    $parameters = ['login' => $this->login, 'id'=>$id];
                } else {
                    $sql = 'SELECT admins.login, admins.password FROM admins WHERE admins.login = :login;';
                    $parameters = ['login' => $this->login];
                }

                $statement = $pdo->prepare($sql);
                $statement->execute($parameters);
                $row = $statement->fetch(\PDO::FETCH_OBJ);

                if ($row) {
                    throw new \LogicException('Такой логин администратора уже существует');
                }
            }

        } catch (\RuntimeException $e){
            throw new \RuntimeException('Ошибка при валидации записи администратора', 0, $e);
        } catch (\LogicException $e) {
            throw $e;
        }
    }

    public function updateAdmin(\PDO $pdo)
    {
        try {
            $sql = 'UPDATE admins SET admins.login = :login, admins.password = :password WHERE admins.id = :id;';
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id, 'login'=>$this->login, 'password'=>md5($this->password)]);
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка изменения администратора', 0, $e);
        }
    }

    public function insertAdmin(\PDO $pdo)
    {
        try {
            $sql = 'INSERT INTO admins ( login, password ) VALUES (:login, :password);';
            $statement = $pdo->prepare($sql);
            $statement->execute(['login'=>$this->login, 'password'=>md5($this->password)]);
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка добавления администратора', 0, $e);
        }
    }

    public function validateAdmin (\PDO $pdo)
    {
        {
            try {
                $sql = 'SELECT admins.id FROM admins WHERE admins.login = :login and admins.password = :password;';
                $statement = $pdo->prepare($sql);
                $statement->execute(['login'=>$this->login, 'password'=>md5($this->password)]);
                $row = $statement->fetch(\PDO::FETCH_OBJ);

                if (!$row) {
                    throw new \LogicException('Логин или пароль не верны');
                }

                $_SESSION['admin'] = $row->id;
            } catch (\RuntimeException $e) {
                throw new \RuntimeException('Ошибка валидации администратора', 0, $e);
            } catch (\LogicException $e) {
                throw $e;
            }
        }
    }

}