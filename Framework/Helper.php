<?php

function cleanURI($uri)
{
  return htmlspecialchars_decode($uri);
}

// ONLY PREVIEW
function checkForParams($path)
{

	// index -> /
	// test -> test/id(string)
	$is = explode('/', $path);
	$iss = array_shift($is);
	if(count($is) > 1){

		for ($i=1; $i < count($is); $i++) { 
			echo getTypeOfParam($is[$i]);
		}

	}

}

function getTypeOfParam($param)
{

	if(is_numeric($param)){
		return 'int';
	}elseif(is_string($param)){
		return 'string';
	}else{
		return 'undefined';
	}

}