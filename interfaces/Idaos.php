<?php
namespace interfaces;
interface Idaos
{
    public function GetAll();
    public function Add($objeto);
    public function Delete($objeto);
    public function Update($objeto, $buscador);//sera el dato por el cual busque al opjeto que quiero actualizar
    public function Search($objeto);//en cada calse que la implemente, este objeto sera el atributo
    //por el cual se quiere buscar un registro
}