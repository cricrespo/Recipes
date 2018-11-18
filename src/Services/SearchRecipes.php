<?php


namespace App\Services;

class SearchRecipes
{


	public function connect()
	{
		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', 'http://www.recipepuppy.com/api/?i=onions,garlic&q=omelet&p=3');
		return $res;
	}

	public function getRecipes()
	{
		$client = $this->connect();
		$body = $client->getBody();
		$resul = json_decode($body, true);
		$resul = $resul['results'];
		return $resul;
	}

	public function getVegetarian(){

		$client = $this->connect();
		$body = $client->getBody();
		$resul = json_decode($body, true);
		$resul = $resul['results'];

		$vegetarian = [];
		foreach ($resul as $res) {
			if(!strpos($res['ingredients'], 'bacon') && !strpos($res['ingredients'], 'chicken') && !strpos($res['ingredients'], 'meat')	){
				array_push($vegetarian, $res);
			}
		}

		return $vegetarian;
	}




}