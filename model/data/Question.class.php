<?php

namespace model\data;

class Question extends Category
{
    private $id;
    private $date;
    private $name;
    private $user;
    private $status;

    public function __construct($categoryId = 0, $categoryName = '', $id = 0, $name = '', $date = null, $user = null, $status = null)
    {
        parent::__construct ($categoryId, $categoryName);
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->user = $user;
        $this->status = $status;
    }

    public function getQuestionId()
    {
        return $this->id;
    }

    public function setQuestionId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getQuestionName()
    {
        return $this->name;
    }

    public function setQuestionName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function checkUpdate()
    {
        $error = '';
        try {
            if (is_null($this->user) || is_null($this->user->getName()) || trim($this->user->getName()) == '' || is_null($this->user->getEmail()) ||
                trim($this->user->getEmail()) == '' || trim($this->name) == '' || is_null($this->status)  || is_null($this->status->getId()) || is_null($this->getCategoryId())) {
                $error = 'miss';
                throw new \Exception('При записи вопроса все поля должны быть заполнены');
            }
        }
        catch (\Exception $e)
        {
            if ($error == 'miss') {
                throw new \Exception($e->getMessage());
            }

            throw new \Exception('Ошибка при валидации записи вопроса');
        }
    }

    public function updateQuestion($pdo)
    {
        try {
            $sql = "UPDATE questions SET questions.id_categories = :id_categories, questions.name = :name, questions.id_status = :id_status WHERE questions.id = :id;";

            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id, 'id_categories'=>$this->getCategoryId(), 'name'=>$this->name, 'id_status'=>$this->status->getId()]);
            $sql = "UPDATE users SET users.name = :name, users.email = :email WHERE users.id = :id;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->user->getId(), 'name'=>$this->user->getName(), 'email'=>$this->user->getEmail()]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка изменения вопроса');
        }
    }

    public function deleteQuestion($pdo)
    {
        try {
            $sql = "DELETE FROM questions WHERE questions.id=:id;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка удаления вопроса');
        }
    }

    public function checkInsert()
    {
        $error = '';
        try {

            if ((isset($_SESSION) && isset($_SESSION['admin']) && !empty($_SESSION['admin'])) ||
                isset($_SESSION) && isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {

                if (trim($this->name) == '' || is_null($this->getCategoryId())) {
                    $error = 'miss';
                    throw new \Exception('При записи вопроса все поля должны быть заполнены');
                }

            } else {

                if (is_null($this->user) || is_null($this->user->getName()) || trim($this->user->getName()) == '' || is_null($this->user->getEmail()) ||
                    trim($this->user->getEmail()) == '' || trim($this->name) == '' || is_null($this->getCategoryId())) {
                    $error = 'miss';
                    throw new \Exception('При записи вопроса все поля должны быть заполнены');
                }
            }
        }
        catch (\Exception $e)
        {
            if ($error == 'miss') {
                throw new \Exception($e->getMessage());
            }

            throw new \Exception('Ошибка при валидации записи вопроса');
        }
    }

    public function insertQuestion($pdo)
    {
        try {

            if (isset($_SESSION) && isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {
                $userId = $_SESSION['userId'];
            } else {

                $sql = "SELECT users.id FROM users WHERE users.name = :name and users.email = :email;";
                $statement = $pdo->prepare($sql);
                $statement->execute(['name' => $this->user->getName(), 'email' => $this->user->getEmail()]);
                $row = $statement->fetch(\PDO::FETCH_OBJ);

                if (!$row) {
                    $sql = "INSERT INTO users ( name, email ) VALUES (:name, :email);";
                    $statement = $pdo->prepare($sql);
                    $statement->execute(['name' => $this->user->getName(), 'email' => $this->user->getEmail()]);
                    $userId = $pdo->lastInsertId('users');
                } else {
                    $userId = $row->id;
                }
            }

            $sql = "INSERT INTO questions ( id_categories, id_users, name ) VALUES (:id_categories, :id_user, :name);";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id_categories'=>$this->getCategoryId(), 'id_user'=>$userId, 'name'=>$this->name]);
            $_SESSION['userId'] = $userId;
            $_SESSION['userName'] = $this->user->getName();
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка добавления вопроса');
        }
    }
}