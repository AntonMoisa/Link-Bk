<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="container">
    <div class="row justify-content-center" id="sign_in_margin">
        <div class="col-md-5" id="sign_in" >SIGN IN</div>
    </div>
    <div class="row justify-content-center">
        <div class="col col-md-5" id="sign_in_text">Suspendisse vehicula nulla condimentum,
            malesuada elit nec, bibendum ante. Donec nec purus vitae ipsum facilisis egestas.
            Nunc a viverra elit, non elementum elit. Vivamus nulla dui, ultricies ut tortor vitae,
            ullamcorper accumsan quam. Etiam vel lorem sem. Quisque hendrerit eu dui cursus scelerisque.
            Proin blandit sapien turpis, vitae imperdiet orci auctor quis. Duis maximus libero enim,
            eu malesuada lacus pulvinar sit amet. Phasellus eget euismod libero</div>
    </div>
    <form>
        <div class="row justify-content-center">
            <div class="col-md-5" id="sign_in_margin">
                <label for="email" id="Sing_in_uppercase">Email Adreess</label>
                <input type="email" class="Sign_in_input" id="email" placeholder="Your email">
            </div>
        </div>
    </form>
    <form>
        <div class="row justify-content-center">
            <div class="col-md-5" id="sign_in_margin">
                <label for="password" id="Sing_in_uppercase">Password</label>
                <input type="password" class="Sign_in_input" id="password" placeholder="Your password">
            </div>
        </div>
    </form>
    <form>
        <div class="row justify-content-center">
            <div class="col-md-5" id="sign_in_margin">
                <label for="checkbox" id="Sing_in_uppercase"><input type="checkbox" class="Sign_in_Checkbox" id="checkbox">Remember_me</label>
            </div>
        </div>
    </form>
    <div class="row justify-content-center">
        <div class="col-md-5" id="sign_in_margin">
            <small>
                Forgotten password?
            </small>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5" id="sign_in_margin">
            <div class="row justify-content-between">
                <div class="col-md-5">
                    <button type="submit" class="btn" id="button">
                        LOGIN
                    </button>
                </div>
                <div class="col-md-5">
                    <button type="submit" class="btn" id="button">
                        CREATE ACCOUNT
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

