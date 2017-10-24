<?php
require_once('../vendor/autoload.php');
require_once('../autoloader.php');
require_once('../assets/functions.php');
use model\data\Content;
use model\db\DB;
use model\data\Category;
session_start();

if (!isAdmin()) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    echo "403 Forbidden";
    exit;
}

$error = "";
$add_edit = 'add';
$category = null;
$categories = null;

$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array(
    'cache'=>'../compilation_cache',
    'auto_reload'=>true
));



try {
    $pdo = (new DB())->getDBConnect();
    $content = new Content();
    $categories = $content->getCategories($pdo, 1);

    if (isset($_GET['action']) && $_GET['action']=='edit' && !isset($_POST['categoryName'])) {
        $add_edit = 'edit';
    }

    if (isGet()) {

        if (isset($_GET['action']) && isset($_GET['id']) && !empty($_GET['id'])) {
            $temp = new Category();
            $temp->setCategoryId($_GET['id']);

            if ($_GET['action'] == 'edit' && $add_edit == 'edit') {
                $category = $temp->selectCategory($pdo);
            }
            elseif ($_GET['action'] == 'delete') {
                $temp->deleteCategory($pdo);
            }

        }

    }
    else {

    }

    if (isPost()) {

        if (isAddEdit() && isset($_POST['categoryName'])) {
            $temp = new Category();


            if (isset($_POST['add_edit']) && $_POST['add_edit'] == 'edit' && isset($_GET['id']) && !empty($_GET['id'])) {
                $temp->setCategoryId($_GET['id'])
                    ->setCategoryName($_POST['categoryName']);
                $category = $temp->getCategoryName();
                $temp->checkCategory($pdo);
                $temp->updateCategory($pdo);
            }
            else {
                $temp->setCategoryName($_POST['categoryName']);
                $category = $temp->getCategoryName();
                $temp->checkCategory($pdo);
                $temp->insertCategory($pdo);
            }

        }

    }

    if ((!empty($_POST) && isset($_POST['addedit'])) || (isset($_GET['action']) && $_GET['action']=='delete')) {
        header("Location: categories.php");
        exit;
    }

}
catch (Exception $e) {
    $error = $e->getMessage();
}

echo $twig->render('categories_admin.twig', [
    'categories'=>$categories,
    'error'=>$error,
    'category'=>$category,
    'tab'=>2,
    'add_edit'=>$add_edit
]);