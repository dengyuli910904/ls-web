<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Mail;
use Naux\Mail\SendCloudTemplate;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 重写发送密码重置邮件
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $data = [ 'url' => url('password/reset', $token)];

        $template = new SendCloudTemplate('password_reset_template', $data);

        Mail::raw($template, function ($message) {

            $message->from('customers@livesong.cn', 'Laravel');
            $message->to($this->email);
        });
    }
<<<<<<< HEAD
=======

    /**
     * 收藏
     */
    public function favorites(){
        // return $this->belongsToMany()
    }
>>>>>>> a7f3bba920bc527f25b45a1a5199c1786c5a43a9
}
