<?php

namespace App;

//use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;
use PHPUnit\Framework\Constraint\Count;

class Categories extends Model
{
    public function Products()
    {
        return $this->hasMany(Products::class);
    }
    public function Create($arr) //Nepanaudotas, realizuotas Controleryje
    {
        $category = new Categories();
        $category->id = $arr['id'];
        $category->type = $arr['type'];
        $category->save();
        return $category;
    }


}
