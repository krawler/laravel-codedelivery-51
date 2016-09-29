<?php
namespace CodeDelivery\Models;

<<<<<<< HEAD

use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Passwords\CanResetPassword;



class User extends Model implements Transformable, AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use TransformableTrait, Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';
=======
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable
{
    use TransformableTrait;
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

}
