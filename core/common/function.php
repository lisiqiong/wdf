<?php

/**
 * @desc debug打印信息
 * **/
function p($var){
	echo '<div style="border:1px solid #ccc;padding:30px;margin-top:15px;" >';
	print_r($var);
	echo '</div>';
}