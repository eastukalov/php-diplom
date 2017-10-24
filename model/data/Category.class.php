<?php

namespace model\data;

class Category
{
    private $id;
    private $name;
    private $count = [];

    public function __construct($id = 0, $name = '')
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getCategoryId()
    {
        return $this->id;
    }

    public function setCategoryId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCategoryName()
    {
        return $this->name;
    }

    public function setCategoryName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    public function selectCategory($pdo)
    {
        try {
            $sql = "SELECT categories.name FROM categories WHERE categories.id = :id;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id]);
            $row = $statement -> fetch(\PDO::FETCH_OBJ);
            return $row->name;
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка считывания темы');
        }
    }

    public function deleteCategory($pdo)
    {
        try {
            $sql = "DELETE FROM categories WHERE categories.id=:id;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка удаления темы');
        }
    }

    public function checkCategory($pdo)
    {
        $error = '';
        try {

            if (is_null($this->name) || trim($this->name) == '') {
                $error = 'miss';
                throw new \Exception('При записи темы все поля должны быть заполнены');
            }

            $sql = "SELECT categories.name FROM categories WHERE categories.name = :name;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['name'=>$this->name]);
            $row = $statement->fetch(\PDO::FETCH_OBJ);

            if ($row) {
                $error = 'miss';
                throw new \Exception('Такая тема уже существует');
            }

        }
        catch (\Exception $e)
        {
            if ($error == 'miss') {
                throw new \Exception($e->getMessage());
            }

            throw new \Exception('Ошибка при валидации записи темы');
        }
    }

    public function updateCategory($pdo)
    {
        try {
            $sql = "UPDATE categories SET categories.name = :name WHERE categories.id = :id;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id, 'name'=>$this->name]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка изменения темы');
        }
    }

    public function insertCategory($pdo)
    {
        try {
            $sql = "INSERT INTO categories ( name ) VALUES (:name);";
            $statement = $pdo->prepare($sql);
            $statement->execute(['name'=>$this->name]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка добавления темы');
        }
    }

}