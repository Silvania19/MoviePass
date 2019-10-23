<?php
namespace interfaces;
interface Idaos
{
    public function GetAll();
    public function Add($objeto);
    public function Delete($email);
    public function Update($objeto);
    public function Search($email);
}