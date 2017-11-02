<?php
declare(strict_types = 1);
namespace model\data;

class Admin
{
    private $id;
    private $login;
    private $password;

    /**
     * Admin constructor.
     * @param int $id
     * @param string $login
     * @param string $password
     */
    public function __construct(int $id = 0, string $login = '', string $password = '')
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getId() :int {
        return $this->id;
    }

    /**
     * @param $id
     * @return Admin
     */
    public function setId(int $id) :Admin {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin() :string {
        return $this->login;
    }

    /**
     * @param $login
     * @return Admin
     */
    public function setLogin(string $login) :Admin {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword() :string {
        return $this->password;
    }

    /**
     * @param $password
     * @return Admin
     */
    public function setPassword(string $password) :Admin {
        $this->password = $password;
        return $this;
    }

    /**
     * @param \PDO $pdo
     * @return object
     */
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

    /**
     * @param \PDO $pdo
     */
    public function deleteAdmin(\PDO $pdo) :void {
        try {
            $sql = 'DELETE FROM admins WHERE admins.id=:id;';
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id]);
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка удаления администратора', 0, $e);
        }
    }

    /**
     * @param \PDO $pdo
     * @param bool $validate
     * @param bool $edit
     * @param int $id
     */
    public function checkAdmin(\PDO $pdo, bool $validate = false, bool $edit = false, int $id = 0) :void {
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

    /**
     * @param \PDO $pdo
     */
    public function updateAdmin(\PDO $pdo) :void {
        try {
            $sql = 'UPDATE admins SET admins.login = :login, admins.password = :password WHERE admins.id = :id;';
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id, 'login'=>$this->login, 'password'=>md5($this->password)]);
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка изменения администратора', 0, $e);
        }
    }

    /**
     * @param \PDO $pdo
     */
    public function insertAdmin(\PDO $pdo) :void {
        try {
            $sql = 'INSERT INTO admins ( login, password ) VALUES (:login, :password);';
            $statement = $pdo->prepare($sql);
            $statement->execute(['login'=>$this->login, 'password'=>md5($this->password)]);
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка добавления администратора', 0, $e);
        }
    }

    /**
     * @param \PDO $pdo
     */
    public function validateAdmin (\PDO $pdo) :void {
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