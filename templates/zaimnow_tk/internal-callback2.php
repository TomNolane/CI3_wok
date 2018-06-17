<?php
require_once("FBAuth.php");

$fb = new FBAuth(array(

	"client_id"	=> "578516362116657",
	"client_secret"	=> "eb1814bd3980ab9a306dc35073021fb3",
	"redirect_uri"	=> "https://zaimnow.tk/callback2"
));

if(isset($_GET["code"])){

	if($fb->auth($_GET["code"])){

		if($fb->auth_status){

            echo("Социальный ID пользователя: ".$fb->user_info["id"]);
            echo("<br />");
            echo("Имя пользователя: ".$fb->user_info["first_name"]);
            echo("<br />");
            echo("Фамилия пользователя: ".$fb->user_info["last_name"]);
            echo("<br />");
            echo("<img src='".$fb->user_info["picture"]["data"]["url"]."' alt='image' />");
        }else{
        
            echo("<a href='".$fb->get_link()."'>Войти</a>");
        }
	}
}

