<?php
 
 namespace App\Mail;

 use Carbon\Traits\Serialization;
 use Illuminate\Mail\Mailable;
 use Illuminate\Bus\Queueable;
 use Illuminate\Queue\SerializesModels;
 use PhpParser\Builder\Function_;

 class ForgotPasswordMail extends Mailable{
    use Queueable,SerializesModels;

    public $user;

    public function __construct($user){
$this->user = $user;
    }

    public function build(){
        return $this->markdown('emails.forgot_password')->subject(config('app.name') . ', Forgot Password');
    }
 }