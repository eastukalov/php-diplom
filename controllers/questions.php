<?php
require_once('../vendor/autoload.php');
require_once('../autoloader.php');
require_once('../assets/functions.php');
use model\data\Content;
use model\db\DB;
use model\data\Question;
session_start();

if (!isAdmin()) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    echo "403 Forbidden";
    exit;
}

$error = "";
$categories = [];
$answers = [];
$order = 1;
$filter = -1;
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array(
    'cache'=>'../compilation_cache',
    'auto_reload'=>true
));

try {
    $pdo = (new DB())->getDBConnect();

    if (isGet()) {
        if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['action']))
        {
            switch ($_GET['action'])  {
                case 'delete':
                    $temp = new Question();
                    $temp->setQuestionId($_GET['id']);
                    $temp->deleteQuestion($pdo);
                break;
                case 'filter':
                    $filter = $_GET['id'];
                    setcookie('filter', $_GET['id']);
                    $order = isset($_COOKIE['sort']) && !empty($_COOKIE['sort']) ? $_COOKIE['sort'] : $order;
                break;
                case 'sort':
                    $order = $_GET['id'];
                    $filter = isset($_COOKIE['filter']) && !empty($_COOKIE['filter']) ? $_COOKIE['filter'] : $filter;
                    setcookie('sort', $_GET['id']);
                break;
            }
        }
    }
    else {
        $order = isset($_COOKIE['sort']) && !empty($_COOKIE['sort']) ? $_COOKIE['sort'] : $order;
        $filter = isset($_COOKIE['filter']) && !empty($_COOKIE['filter']) ? $_COOKIE['filter'] : $filter;
    }

    $content = new Content();
    $categories = $content->getCategories($pdo);
    $answers = $content->getCategoriesQuestionsAnswers($pdo, 0, $filter, $order);
}
catch (Exception $e)
{
    $error = $e->getMessage();
}
//echo "<pre>";
//print_r($answers);
//echo "</pre>";
//exit;
echo $twig->render('question_admin.twig', [
    'categories'=>$categories,
    'answers'=>$answers,
    'error'=>$error,
    'tab'=>3
]);
