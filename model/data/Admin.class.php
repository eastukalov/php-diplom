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

    public function selectAdmin($pdo)
    {
        try {
            $sql = "SELECT admins.login, admins.password FROM admins WHERE admins.id = :id;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id]);
            $row = $statement -> fetch(\PDO::FETCH_OBJ);
            return $row;
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка считывания администратора');
        }
    }

    public function deleteAdmin($pdo)
    {
        try {
            $sql = "DELETE FROM admins WHERE admins.id=:id;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка удаления администратора');
        }
    }

    public function checkAdmin($pdo, $validate = false, $edit = false, $id = 0)
    {
        $error = '';
        try {

            if (is_null($this->login) || is_null($this->password) || trim($this->login) == '' || trim($this->password) == '') {
                $error = 'miss';
                throw new \Exception('При записи администратора все поля должны быть заполнены');
            }

            if ($validate) {

                if ($edit) {
                    $sql = "SELECT admins.login, admins.password FROM admins WHERE admins.login = :login and admins.id <> :id;";
                    $parameters = ['login' => $this->login, 'id'=>$id];
                } else {
                    $parameters = ['login' => $this->login];
                }

                $statement = $pdo->prepare($sql);
                $statement->execute($parameters);
                $row = $statement->fetch(\PDO::FETCH_OBJ);

                if ($row) {
                    $error = 'miss';
                    throw new \Exception('Такой логин администратора уже существует');
                }
            }

        }
        catch (\Exception $e)
        {
            if ($error == 'miss') {
                throw new \Exception($e->getMessage());
            }

            throw new \Exception('Ошибка при валидации записи администратора');
        }
    }

    public function updateAdmin($pdo)
    {
        try {
            $sql = "UPDATE admins SET admins.login = :login, admins.password = :password WHERE admins.id = :id;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id, 'login'=>$this->login, 'password'=>md5($this->password)]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка изменения администратора');
        }
    }

    public function insertAdmin($pdo)
    {
        try {
            $sql = "INSERT INTO admins ( login, password ) VALUES (:login, :password);";
            $statement = $pdo->prepare($sql);
            $statement->execute(['login'=>$this->login, 'password'=>md5($this->password)]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка добавления администратора');
        }
    }

    public function validateAdmin ($pdo)
    {
        {
            $error = '';

            try {
                $sql = "SELECT admins.id FROM admins WHERE admins.login = :login and admins.password = :password;";
                $statement = $pdo->prepare($sql);
                $statement->execute(['login'=>$this->login, 'password'=>md5($this->password)]);
                $row = $statement->fetch(\PDO::FETCH_OBJ);

                if (!$row) {
                    $error = 'miss';

                    throw new \Exception('Логин или пароль не верны');
                }

                $_SESSION['admin'] = $row->id;
            }
            catch (\Exception $e)
            {
                if ($error == 'miss') {
                    throw new \Exception($e->getMessage());
                }

                throw new \Exception('Ошибка валидации администратора');
            }
        }
    }

}