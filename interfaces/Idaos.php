<?php
namespace interfaces;
interface iDaos
{
    public function GetAll();
    public function Add($objeto);
    public function Delete($objeto);
    public function Update($objeto);
    public function Read($email);
}