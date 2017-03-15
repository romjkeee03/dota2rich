<?php namespace App\Services;

use App\Http\Controllers\GameController;
use App\Http\Controllers\SteamController;
use Exception;

class SteamItem {
	const STEAM_PRICE_URL = 'http://backpack.tf/api/IGetMarketPrices/v1/?key=56360c8eb98d881c5ae94b01&compress=1&appid=730';
    //const STEAM_PRICE_URL = 'http://steamcommunity.com/market/priceoverview/?appid=730&currency=5&market_hash_name=';
    //const STEAM_ITEM_URL = 'http://api.steampowered.com/ISteamEconomy/GetAssetClassInfo/v0001?key=%s&format=json&language=en&appid='.GameController::APPID.'&class_count=2&classid0=0&classid1=%s';

    public  $classid;
    public  $name;
    public  $market_hash_name;
    public  $price;
    public  $rarity;

    public function __construct($info)
    {
        $this->classid = $info['classid'];
        $this->name = $info['name'];
        $this->market_hash_name = $info['market_hash_name'];
        $this->rarity = isset($info['rarity']) ? $info['rarity'] : $this->getItemRarity($info);
        if ($price = $this->getItemPrice()) {
		
            $this->price = floatval($price->value*66/100);
        }else{
            $this->_setToFalse();
        }
    }

    public function getItemPrice() {
        try{
            $json = file_get_contents(self::STEAM_PRICE_URL);
            $json = json_decode($json, true);
			
			if($json['response']['success'])
			{	
				$f = fopen("/var/www/html/storage/app/json.txt", "w");
				fwrite($f, serialize($json)); 
				fclose($f);
			
				foreach($json['response']['items'] as $name=>$item)
				{
					if($name == $this->market_hash_name)
					{
						return (object) $item;
						break;
					}
				}
			}
            else
			{
				$f = fopen("/var/www/html/storage/app/json.txt", "r");
				$json = unserialize(fgets($f));
				fclose($f);
				
				foreach($json['response']['items'] as $name=>$item)
				{
					if($name == $this->market_hash_name)
					{
						return (object) $item;
						break;
					}
				}
			}
        }catch(Exception $e){
            return false;
        }
    }
/*
    public function getItemInfo() {
        $json = file_get_contents(sprintf(self::STEAM_ITEM_URL, SteamController::steamApiKey, $this->classid));
        $json = json_decode($json, true);
        if($json["result"]['success'])
            return (object) $json["result"][$this->classid];
        else
            return false;
    }
*/

    public function getItemRarity($info) {
        $type = $info['type'];
        $rarity = '';
        $arr = explode(',',$type);
        if (count($arr) == 2) $type = trim($arr[1]);
        if (count($arr) == 3) $type = trim($arr[2]);
        if (count($arr) && $arr[0] == 'Нож') $type = '★';
        switch ($type) {
            case 'Армейское качество':      $rarity = 'milspec'; break;
            case 'Запрещенное':             $rarity = 'restricted'; break;
            case 'Засекреченное':           $rarity = 'classified'; break;
            case 'Тайное':                  $rarity = 'covert'; break;
            case 'Ширпотреб':               $rarity = 'common'; break;
            case 'Промышленное качество':   $rarity = 'common'; break;
            case '★':                       $rarity = 'rare'; break;
        }

        return $rarity;
    }

    private function _setToFalse()
    {
        $this->name = false;
        $this->price = false;
        $this->rarity = false;
    }
}