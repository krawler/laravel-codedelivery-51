<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 26/08/2016
 * Time: 12:51
 */

namespace CodeDelivery\Models;


class OauthClient extends Model implements Transformable
{
    use TransformableTrait;

    protected  $fillable = [
        'secret',
        'name'
    ];

}