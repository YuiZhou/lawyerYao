<?php
function thumb($content){
	preg_match ("<img.*src=[\"](.*?)[\"].*?>",$content,$match);
	return $match[0];
}