<?php

namespace model\data;

class Answer extends Question
{
    private $answerId;
    private $answerName;

    public function __construct(
        $categoryId = null,
        $categoryName = '',
        $questionId = null,
        $questionName = '', $date = null,
        $user = null,
        $status = null,
        $answerId = 0,
        $answerName = ''
    ) {
        parent::__construct ($categoryId, $categoryName, $questionId, $questionName, $date, $user, $status);
        $this->answerId = $answerId;
        $this->answerName = $answerName;
    }


    public function getAnswerId()
    {
        return $this->answerId;
    }

    public function setAnswerId($answerId)
    {
        $this->answerId = $answerId;
        return $this;
    }

    public function getAnswerName()
    {
        return $this->answerName;
    }

    public function setAnswerName($answerName)
    {
        $this->answerName = $answerName;
        return $this;
    }

    public function updateAnswer(\PDO $pdo)
    {
        try {
            $sql = 'UPDATE answers SET answers.name = :name WHERE answers.id = :id;';

            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->answerId, 'name'=>$this->answerName]);
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка при изменении ответа', 0, $e);
        }
    }

    public function insertAnswer(\PDO $pdo)
    {
        try {
            $sql = 'INSERT INTO answers ( id_questions, name ) VALUES ( :id_questions, :name);';

            $statement = $pdo->prepare($sql);
            $statement->execute(['id_questions'=>$this->getQuestionId(), 'name'=>$this->answerName]);
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка добавления ответа', 0, $e);
        }
    }

    public function selectAnswer(\PDO $pdo)
    {
        try {
            $sql = 'SELECT answers.name FROM answers WHERE answers.id = :id;';
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->answerId]);
            $row = $statement->fetchall(\PDO::FETCH_COLUMN, 0);
            return $row[0];
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка считывания ответа', 0, $e);
        }
    }

    public function deleteAnswer(\PDO $pdo)
    {
        try {
            $sql = 'DELETE FROM answers WHERE answers.id=:id;';
            $statement = $pdo->prepare($sql);
            $statement->execute(['id'=>$this->answerId]);
        } catch (\Exception $e) {
            throw new \RuntimeException('Ошибка удаления ответа', 0, $e);
        }
    }
}