<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;
use PHPUnit\Framework\Constraint\Count;

class Categories extends Model
{
    public function products()
    {
        return $this->hasMany(Products::class);
    }
    public function create($arr) //Nepanaudotas, realizuotas Controleryje
    {
        $category = new Categories();
        $category->id = $arr['id'];
        $category->type = $arr['type'];
        $category->save();
        return $category;
    }


}
