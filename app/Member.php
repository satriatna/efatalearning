<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
class Member extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $guard = 'member';
    protected $guarded = [];
}
