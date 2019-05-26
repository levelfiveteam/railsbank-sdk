<?php

namespace LevelFiveTeam\Railsbank;

use GuzzleHttp\Client;
use Zend\Config\Config;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;
use LevelFiveTeam\Railsbank\Exception\EntityNotFoundException;
use LevelFiveTeam\Railsbank\Exception\EndpointNotFoundException;

/**
 * This is the service that will simplify the commands (and act as a controller)
 *
 * Class RailsbankCommand
 * @package LevelFiveTeam\Railsbank
 */
class Railsbank
{
    /**
     * @var RailsbankConfig
     */
    private $configService;

    /**
     * Railsbank constructor.
     *
     * @param array $config
     * @param string|null $mode
     *
     * @throws Exception\RailsbankConfigurationMissingException
     * @throws Exception\UnspecifiedModeException
     */
    public function __construct(array $config = [], string $mode = null)
    {
        $this->configService = new RailsbankConfig($config, $mode);
    }

    /**
     * @var string
     */
    private $requestType = 'GET';

    /**
     * @param CommandInterface $command
     */
    public function runCommand(CommandInterface $command)
    {
        $this->requestType = 'POST';
        var_dump($command, 'test');
        die();
    }

    /**
     * @param CommandInterface $command
     * @return EntityInterface
     */
    public function runQuery(CommandInterface $command) :? EntityInterface
    {
        $this->requestType = 'GET';

        try {
            /** @var EntityInterface $response */
            $response = $this->handleApiCall($command, 'GET');
        } catch (\Exception $e) {

        }

        return $response;
    }

    private function handleApiCall(CommandInterface $command, string $method = 'GET')
    {
        $apiUrl = $this->getApiUrl($command);
        $customerKey = $this->getCustomerApiKey();

        $config = [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $customerKey,
            ],
        ];

        $client = new Client($config);

        if ($method === 'GET') {
            $response = $client->request('GET', $apiUrl);
        }

        /** @var string $content */
        $content = $response->getBody()->getContents();

        $decodedContent = json_decode($content);
        $entity = $this->getEntity($command);
        return new $entity($decodedContent);
    }

    private function getEntity(CommandInterface $command) :? string
    {
        /** @var Config $apiConfig */
        $apiConfig = $this->configService->getBaseConfig()->get('entity_map');

        if (! $entity = $apiConfig->get(get_class($command))) {
            throw new EntityNotFoundException($command);
        }

        var_dump(class_exists($entity));
        die();

        return $entity;
    }

    /**
     * @param CommandInterface $command
     * @return string
     *
     * @throws EndpointNotFoundException
     */
    private function getApiUrl(CommandInterface $command) :? string
    {
        return $this->configService->getBaseApiUrl($command) . $this->getEndpoint($command);
    }

    /**
     * @param CommandInterface $command
     * @return string
     *
     * @throws EndpointNotFoundException
     */
    private function getEndpoint(CommandInterface $command) :? string
    {
        /** @var Config $apiConfig */
        $apiConfig = $this->configService->getBaseConfig()->get('railsbank_http_url');

        if (! $endpoint = $apiConfig->get(get_class($command))) {
            throw new EndpointNotFoundException($command);
        }

        return $endpoint;
    }

    private function getCustomerApiKey() : string
    {
        return 'API-Key ' . $this->configService->getApiKey();
    }
}
