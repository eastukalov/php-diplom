<?php
require_once('../vendor/autoload.php');
require_once('../autoloader.php');
require_once('../assets/functions.php');
use model\data\Content;
use model\db\DB;
use model\data\Question;
use model\data\User;
use model\data\Admin;
session_start();

$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array(
    'cache'=>'../compilation_cache',
    'auto_reload'=>true
));

$categories = [];
$x=md5('admin');
$questions = [];
$answers = [];
$error = '';
$formAdminHide = null;
$admin = null;
$mode = [
    'question'=>'guest',
    'role'=>'guest',
    'userName'=>''
];


try {
    $pdo = (new DB())->getDBConnect();
    $content = new Content();

    if (isPost()) {

        if (isset($_POST['save'])) {
            $temp = new Question();
            $temp->setUser(new User(0, isset($_POST['name']) ? $_POST['name'] : (isset($_SESSION['userName']) ? $_SESSION['userName'] : ''),
                isset($_POST['email']) ? $_POST['email'] : ''))
                ->setQuestionName(isset($_POST['question']) ? $_POST['question'] : '')
                ->setCategoryId(isset($_POST['category']) ? $_POST['category'] : null);
            $temp->checkInsert();
            $temp->insertQuestion($pdo);
        } elseif (isset($_POST['admin']) && isset($_POST['login']) && isset($_POST['password'])) {
            $formAdminHide = false;
            $temp = new Admin(0, $_POST['login'], $_POST['password']);
            $admin = $temp;
            $temp->checkAdmin($pdo);
            $temp->validateAdmin($pdo);
            $formAdminHide = true;
        }
    }

    if (isPost()) {
        header("Location: main.php");
        exit;
    }

    $categories = $content->getCategories($pdo);
    $questions = $content->getQuestionsWithAnswersPublic($pdo);
    $answers = $content->getAnswersPublic($pdo);

    if (isset($_SESSION) && isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
        $mode['role'] = 'admin';
    }

    if (isset($_SESSION) && isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {
        $mode['question'] = 'user';
        $mode['userName'] = $_SESSION['userName'];
    }
}
catch (Exception $e)
{
    $error = $e->getMessage();
}

echo $twig->render('main.twig', [
    'categories'=>$categories,
    'questions'=>$questions,
    'answers'=>$answers,
    'admin'=>$admin,
    'error'=>$error,
    'mode'=>$mode,
    'formAdminHide'=>$formAdminHide
]);