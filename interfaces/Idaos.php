<?php
namespace interfaces;
interface Idaos
{
    public function GetAll();
    public function Add($objeto);
    public function Delete($email);
    public function Update($objeto);
    public function Search($objeto);//en cada calse que la implemente, este objeto sera el atributo
    //por el cual se quiere buscar un registro
}