<?php

namespace model\data;

class Answer extends Question
{
    private $id;
    private $name;

    public function __construct($categoryId = null, $categoryName = '', $questionId = null, $questionName = '', $date = null, $user = null, $status = null, $id = 0, $name = '')
    {
        parent::__construct ($categoryId, $categoryName, $questionId, $questionName, $date, $user, $status);
        $this->id = $id;
        $this->name = $name;
    }


    public function getAnswerId()
    {
        return $this->id;
    }

    public function setAnswerId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getAnswerName()
    {
        return $this->name;
    }

    public function setAnswerName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function updateAnswer($pdo)
    {
        try {
            $sql = "UPDATE answers SET answers.name = :name WHERE answers.id = :id;";

            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id, 'name'=>$this->name]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка при изменении ответа');
        }
    }

    public function insertAnswer($pdo)
    {
        try {
            $sql = "INSERT INTO answers ( id_questions, name ) VALUES ( :id_questions, :name);";

            $statement = $pdo->prepare($sql);
            $statement->execute(['id_questions'=>$this->getQuestionId(), 'name'=>$this->name]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка добавления ответа');
        }
    }

    public function selectAnswer($pdo)
    {
        try {
            $sql = "SELECT answers.name FROM answers WHERE answers.id = :id;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id]);
            $row = $statement -> fetchall(\PDO::FETCH_COLUMN, 0);
            return $row[0];
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка считывания ответа');
        }
    }

    public function deleteAnswer($pdo)
    {
        try {
            $sql = "DELETE FROM answers WHERE answers.id=:id;";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->id]);
        }
        catch (\Exception $e)
        {
            throw new \Exception('Ошибка удаления ответа');
        }
    }
}