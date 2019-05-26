<?php

namespace LevelFiveTeam\Railsbank;

use GuzzleHttp\Client;
use LevelFiveTeam\Railsbank\Query\QueryInterface;
use Zend\Config\Config;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;
use LevelFiveTeam\Railsbank\Command\CommandInterface;
use LevelFiveTeam\Railsbank\Exception\EntityNotExistException;
use LevelFiveTeam\Railsbank\Exception\EntityNotFoundException;
use LevelFiveTeam\Railsbank\Exception\EndpointNotFoundException;

use LevelFiveTeam\Railsbank\Entity\VersionNumber;

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
     * @param CommandInterface $command
     */
    public function runCommand(CommandInterface $command)
    {
        var_dump($command, 'test');
        die();
    }

    /**
     * @param QueryInterface $query
     * @return EntityInterface
     */
    public function runQuery(QueryInterface $query) :? EntityInterface
    {
        /** @var EntityInterface $response */
        $response = $this->handleApiCall($query, 'GET');

        return $response;
    }

    private function handleApiCall($command, string $method = 'GET')
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

        $entity = $this->getEntity($command, $decodedContent);

        return $entity;
    }

    /**
     * @param QueryInterface|CommandInterface $command
     * @param $decodedContent
     *
     * @return EntityInterface|null
     *
     * @throws EntityNotExistException
     * @throws EntityNotFoundException
     * @throws \ReflectionException
     */
    private function getEntity($command, $decodedContent) :? EntityInterface
    {
        /** @var Config $apiConfig */
        $apiConfig = $this->configService->getBaseConfig()->get('entity_map');

        if (! $entity = $apiConfig->get(get_class($command))) {
            throw new EntityNotFoundException($command);
        }

        if (! class_exists($entity)) {
            throw new EntityNotExistException($entity);
        }

        $reflectedClass = ((new \ReflectionClass($entity)));

        /** @var EntityInterface $entity */
        $entity = $reflectedClass->newInstance($decodedContent);

        return $entity;
    }

    /**
     * @param CommandInterface $command
     * @return string
     *
     * @throws EndpointNotFoundException
     */
    private function getApiUrl($command) :? string
    {
        return $this->configService->getBaseApiUrl() . $this->getEndpoint($command);
    }

    /**
     * @param CommandInterface $command
     * @return string
     *
     * @throws EndpointNotFoundException
     */
    private function getEndpoint($command) :? string
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
