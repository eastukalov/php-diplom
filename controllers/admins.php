<?php
require_once('../vendor/autoload.php');
require_once('../autoloader.php');
require_once('../assets/functions.php');
use model\data\Content;
use model\db\DB;
use model\data\Admin;
session_start();

if (!isAdmin()) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    echo "403 Forbidden";
    exit;
}

$error = "";
$add_edit = 'add';
$admin = null;
$admins = null;

$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array(
    'cache'=>'../compilation_cache',
    'auto_reload'=>true
));


try {
    $pdo = (new DB())->getDBConnect();
    $content = new Content();
    $admins = $content->getAdmins($pdo);

    if (isset($_GET['action']) && $_GET['action']=='edit' && !isset($_POST['login'])) {
        $add_edit = 'edit';
    }

    if (isGet()) {

        if (isset($_GET['action']) && isset($_GET['id']) && !empty($_GET['id'])) {
            $temp = new Admin();
            $temp->setId($_GET['id']);

            if ($_GET['action'] == 'edit' && $add_edit == 'edit') {
                $admin = $temp->selectAdmin($pdo);
            }
            elseif ($_GET['action'] == 'delete') {
                $temp->deleteAdmin($pdo);
            }

        }

    }

    if (isPost()) {

        if (isAddEdit() && isset($_POST['login']) && isset($_POST['password'])) {
            $temp = new Admin();

            if (isset($_POST['add_edit']) && $_POST['add_edit'] == 'edit' && isset($_GET['id']) && !empty($_GET['id'])) {
                $temp->setId($_GET['id'])
                    ->setLogin($_POST['login'])
                    ->setPassword($_POST['password']);
                $admin = $temp;
                $temp->checkAdmin($pdo, true, true, $_GET['id']);
                $temp->updateAdmin($pdo);
            }
            else {
                $temp->setLogin($_POST['login'])
                    ->setPassword($_POST['password']);
                $admin = $temp;
                $temp->checkAdmin($pdo, true);
                $temp->insertAdmin($pdo);
            }

        }

    }

    if ((!empty($_POST) && isset($_POST['addedit'])) || (isset($_GET['action']) && $_GET['action']=='delete')) {
        header("Location: admins.php");
        exit;
    }

}
catch (Exception $e) {
    $error = $e->getMessage();
}

echo $twig->render('admins_admin.twig', [
    'admins'=>$admins,
    'error'=>$error,
    'admin'=>$admin,
    'tab'=>1,
    'add_edit'=>$add_edit,
    'adminId'=>$_SESSION['admin']
]);