<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Archivo extends Model
{
    //
	use SoftDeletes;

    protected $dates = ['deleted_at'];


	public static function genlist()
	{
		$catlist = [];
		foreach (self::where('id', 1)->get() as $cat)
		{
			//$catlist[$cat->nombre] = [$cat->id=>$cat->nombre];
			$catlist[" ".$cat->id] = $cat->nombre;
			//array_push($catlist,.$cat->id=>$cat->nombre]);
			$catlist=array_merge($catlist, self::lista($cat->id,'--'));
		}
		return $catlist;
	}
    public static function lista($raiz,$separador='')
    {
        $catlist = [];
        foreach (self::where('archivos_id', $raiz)->where('tipo', 'rama')->get() as $cat)
        {
            //$catlist[$cat->nombre] = [$cat->id=>$separador.'>'.$cat->nombre];
            $catlist[" ".$cat->id.""] = $separador.'>'.$cat->nombre;
            //array_push($catlist,[$cat->id=>$separador.'>'.$cat->nombre]);
            $catlist=array_merge($catlist, self::lista($cat->id,$separador.'--'));
        }
        return $catlist;
    }
}
