<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-11
 * Time: 15:01
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class RequestMessage extends Model
{
    protected $table = 'request_messages';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}