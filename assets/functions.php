<?php

function isPost ()
{
    return isset($_POST) && !empty($_POST);
}

function isGet ()
{
    return isset($_GET) && !empty($_GET);
}

function isAddEdit ()
{
    return isset($_POST['addedit']);
}

function isEditQuestion ()
{
    return isset($_POST['editQuestion']);
}

function isCancel ()
{
    return isset($_POST['cancel']);
}

function isAdmin ()
{
    if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
        return true;
    }

    return false;
}