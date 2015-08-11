<?php
namespace Prosperworks\HttpClients;

interface HttpClientInterface {

	public function get($cmd, array $data = []);
	public function post($cmd, array $data = []);
}