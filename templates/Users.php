<?php

namespace viewK;

use Illuminate\Database\Eloquent\Model  as Eloquent; 

class Users extends  Eloquent 
{
    protected $table = 'users';
    
    //主鍵欄位
    // protected $primaryKey = 'id';
	
	//Eloquent 預期你的資料表會有 created_at 和 updated_at 欄位。如果你不希望讓 Eloquent 來自動維護這兩個欄位 timestamps = false
    // public $timestamps = false;
    //客製化你的時間戳記格式
    //protected $dateFormat = 'U';

}

?>