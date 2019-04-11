<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-11
 * Time: 21:19
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class MessageResponse extends Model
{
    protected $table = 'message_responses';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}