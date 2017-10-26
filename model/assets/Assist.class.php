<?php

namespace model\assets;

class Assist
{
    public function isPost()
    {
        return !empty($_POST);
    }

    public function isGet()
    {
        return !empty($_GET);
    }

    public function isAddEdit()
    {
        return isset($_POST['addedit']);
    }

    public function isEditQuestion()
    {
        return isset($_POST['editQuestion']);
    }

    public function isCancel()
    {
        return isset($_POST['cancel']);
    }

    public function isAdmin()
    {
        if (!empty($_SESSION['admin'])) {
            return true;
        }

        return false;
    }

    public function lockDirectInput() {

        if (!($this->isAdmin())) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
            echo '403 Forbidden';
            exit;
        }

        return;
    }

}