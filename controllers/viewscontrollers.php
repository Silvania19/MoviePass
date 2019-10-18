<?php
namespace controllers;

use models\User as User;
use daos\userdao as userD;

class viewscontrollers
{
    public function index()
    {
        include(VIEWS_PATH."login.php");
    }
}
