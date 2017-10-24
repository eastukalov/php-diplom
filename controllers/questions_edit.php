<?php
require_once('../vendor/autoload.php');
require_once('../autoloader.php');
require_once('../assets/functions.php');
use model\data\Content;
use model\db\DB;
use model\data\Answer;
use model\data\Question;
use model\data\User;
use model\data\Status;
session_start();

if (!isAdmin()) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    echo "403 Forbidden";
    exit;
}

$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array(
    'cache'=>'../compilation_cache',
    'auto_reload'=>true
));

$answers = [];
$answer = null;
$categories = [];
$statuses = [];
$error = '';
$add_edit = 'add';
$editAnswer = '';

try {
    $pdo = (new DB())->getDBConnect();
    $content = new Content();
    $categories = $content->getCategories($pdo);
    $statuses = $content->getStatuses($pdo);

    if (isset($_GET['action']) && $_GET['action']=='edit' && !isset($_POST['answer'])) {
        $add_edit = 'edit';
    }

    if (isGet()) {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            throw new Exception('Ошибка Get-запроса');
        }

        $answers = $content->getCategoriesQuestionsAnswers($pdo, $_GET['id'], 0,0);

        if (empty($answers)) {
            throw new Exception('Вопрос не найден, возможно он удален другим администратором');
        }

        $answer = $answers[0];

        if (isset($_GET['action']) && isset($_GET['answerId']) && !empty($_GET['answerId'])) {
            $temp = new Answer();
            $temp->setAnswerId($_GET['answerId']);

            if ($_GET['action'] == 'edit' && $add_edit == 'edit') {
                $editAnswer = $temp->selectAnswer($pdo);
            }
            elseif ($_GET['action'] == 'delete') {
                $temp->deleteAnswer($pdo);
            }

        }

    }
    else {
        throw new Exception('Ошибка: не установлены Get-параметры');
    }

    if (isPost()) {

        if (isAddEdit() && isset($_POST['answer']) & !empty($_POST['answer'])) {
            $temp = new Answer();

            if (isset($_POST['add_edit']) && $_POST['add_edit'] == 'edit' && isset($_GET['answerId']) && !empty($_GET['answerId'])) {
                $temp->setAnswerId($_GET['answerId'])
                     ->setAnswerName($_POST['answer']);
                $temp->updateAnswer($pdo);
            }
            else {
                $temp->setQuestionId($_GET['id'])
                    ->setAnswerName($_POST['answer']);
                $temp->insertAnswer($pdo);
            }

        }
        elseif (isEditQuestion()) {
            $temp = new Question();
            $temp->setQuestionId($_GET['id'])
                ->setUser(new User($answer->getUser()->getId(), isset($_POST['name']) ? $_POST['name'] : '',
                    isset($_POST['email']) ? $_POST['email'] : ''))
                ->setQuestionName(isset($_POST['question']) ? $_POST['question'] : '')
                ->setStatus(new Status(isset($_POST['status']) ? $_POST['status'] : 0, ''))
                ->setCategoryId(isset($_POST['category']) ? $_POST['category'] : null);
            $temp->checkUpdate();
            $temp->updateQuestion($pdo);
            header("Location: questions.php");
        }
        elseif (isCancel()) {
            header("Location: questions.php");
        }

    }

    if ((!empty($_POST) && isset($_POST['addedit'])) || (isset($_GET['action']) && $_GET['action']=='delete')) {
        header("Location: questions_edit.php?id=" . $_GET['id']);
        exit;
    }

    }
catch (Exception $e)
    {
        $error = $e->getMessage();
        if (isPost() && isEditQuestion())
        {
            $answer->getUser()->setName(isset($_POST['name']) ? $_POST['name']: '')
                              ->setEmail(isset($_POST['email']) ? $_POST['email']: '');
            $answer->setQuestionName(isset($_POST['question']) ? $_POST['question']: '')
                   ->setCategoryId(isset($_POST['category']) ? $_POST['category']: null);
            $answer->getStatus()->setId(isset($_POST['status']) ? $_POST['status']: 0);
        }
    }

echo $twig->render('question_edit_admin.twig', [
    'categories'=>$categories,
    'answers'=>$answers,
    'answer'=>$answer,
    'error'=>$error,
    'statuses'=>$statuses,
    'edit_answer'=>$editAnswer,
    'add_edit'=>$add_edit
]);