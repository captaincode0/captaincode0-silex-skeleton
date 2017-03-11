<?php
	
	/**
	 * Mount your controllers
	 */
	$app->get("/", function() use($app){
		return "<h1>¡This Works!</h1>";
	})
		->after(function($request, $response) use($app){
			$response->headers->set("content-type", "text/html;charset=utf-8");
		});