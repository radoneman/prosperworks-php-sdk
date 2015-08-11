<?php
/**
 * Prosperworks PHP API Client
 *
 * @author radone@gmail.com
 * @version 1.0.0
 */
namespace Prosperworks;

use Prosperworks\Exceptions\ProsperworksException;
use Prosperworks\HttpClients\CurlHttpClient;
use Prosperworks\HttpClients\GuzzleHttpClient;

/**
 *
 * @package Prosperworks
 */
class Prosperworks
{
	/**
	 *
	 * @const string
	 */
	const VERSION = '1.0.0';

	/**
	 *
	 * @var string
	 */
	const API_URL = 'https://api.prosperworks.com/developer_api/v1/';

	/**
	 *
	 * @const string
	 */
	const APPLICATION = 'developer_api';

	/**
	 *
	 * @var string
	 */
	protected $access_token = '';

	/**
	 *
	 * @var string
	 */
	protected $user_email = '';

	/**
	 *
	 * @var array
	 */
	protected $headers = array();

	/**
	 *
	 * @var
	 */
	protected $client;

	/**
	 *
	 * @var string
	 */
	protected $client_http = 'curl';

	/**
	 *
	 * @var
	 */
	protected $last_response;

	/**
	 *
	 * @param array $config
	 *		- access_token: generated token on Prosperworks
	 *		- user_email: your Prosperworks email
	 *		- client_http: curl (default) or guzzle
	 * @throws ProsperworksException
	 */
	public function __construct(array $config = [])
	{
		if (isset($config['access_token'])) {
			$this->access_token = $config['access_token'];
		}
		if (empty($this->access_token)) {
			throw new ProsperworksException('Config "access_token" is require');
		}

		if (isset($config['user_email'])) {
			$this->user_email = $config['user_email'];
		}
		if (empty($this->user_email)) {
			throw new ProsperworksException('Config "user_email" is required');
		}

		$this->headers = array(
			'Content-Type' => 'application/json',
			'X-PW-Application' => self::APPLICATION,
			'X-PW-AccessToken' => $this->access_token,
			'X-PW-UserEmail' => $this->user_email
		);

		if (isset($config['client_http'])) {
			$this->client_http = $config['client_http'];
		}
		if ($this->client_http == 'curl') {
			$this->client = new CurlHttpClient(array(
				'url' => self::API_URL,
				'headers' => $this->headers
			));
		} else if ($this->client_http == 'guzzle') {
			$this->client = new GuzzleHttpClient(array(
				'url' => self::API_URL,
				'headers' => $this->headers
			));
		} else {
			throw new ProsperworksException('Invalid client_http. Allowed clients: curl, guzzle');
		}
	}

	/**
	 *
	 * @param string $cmd
	 * @param array $params
	 * @return array
	 */
	public function get($cmd, array $params = [])
	{
		$this->last_response = $this->client->get($cmd, $params);
		return $this->last_response;
	}

	/**
	 *
	 * @param string $cmd
	 * @param array $params
	 * @return array
	 */
	public function post($cmd, array $params = [])
	{
		$this->last_response = $this->client->post($cmd, $params);
		return $this->last_response;
	}

	/**
	 *
	 * @return array
	 */
	public function get_last_response()
	{
		return $this->last_response;
	}

}