<?php
/*
Plugin Name: Custom plagin12
Description: Выводит хук страницы контента
Version: Номер версии плагина, например: 1.0
Author: Яровой Рома
*/
?>

<?php
/*

   Plugin Name: Add Text To Footer

 */

// Хук события 'wp_footer', добавляем функцию 'mfp_Add_Text' к нему
 add_action("the_content", "mfp_Add_Text");

// Определяем 'mfp_Add_Text'
 function mfp_Add_Text($content){

$my_user = get_user_by('email', 'stepyarik395@gmail.com');
echo "<label>Автор поста</label>".'&nbsp;'.$my_user->first_name.$content;



 }
?>

