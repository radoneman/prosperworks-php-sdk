<?php
/**
 * Using Guzzle 5.0 (some things changed on Guzzle 6.0)
 */
namespace Prosperworks\HttpClients;

use Prosperworks\Exceptions\ProsperworksException;
use GuzzleHttp\Client;

class GuzzleHttpClient implements HttpClientInterface
{
	protected $headers = array();

	protected $url = '';

	public function __construct($params)
	{
		$this->url = $params['url'];
		if (empty($this->url)) {
			throw new ProsperworksException('CurlHttpClient: Invalid url');
		}

		if (isset($params['headers'])) {
			$this->headers = $params['headers'];
		}
	}

	public function get($cmd, array $data = [])
	{
		return $this->exec($cmd, 'get', $data);
	}

	public function post($cmd, array $data = [])
	{
		return $this->exec($cmd, 'post', $data);
	}

	private function exec($cmd, $method = 'get', array $data = [])
	{
		$client = new Client(array('base_url' => $this->url));

		if ($method == 'get') {
			$response = $client->get($cmd, array(
				'headers' => $this->headers,
				'verify' => false // disable SSL verification
			));
		} else if ($method == 'post') {
			$response = $client->post($cmd, array(
				'headers' => $this->headers,
				'body' => json_encode($data),
				'verify' => false // disable SSL verification
			));
		}
		$data = $response->json();
		return $data;
	}

}