<?php
namespace App\Enums ;

enum PermissionEnum : string
{
    case UserIndex  = 'user.index' ;
    case UserShow = 'user.show' ;
    case UserStore  = 'user.store' ;
    case UserUpdate = 'user.update' ;
    case UserDelete = 'user.delete' ;

}
