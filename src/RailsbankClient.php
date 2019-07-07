<?php
namespace LevelFiveTeam\Railsbank;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Zend\Config\Config;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;
use LevelFiveTeam\Railsbank\Exception\EntityNotExistException;
use LevelFiveTeam\Railsbank\Exception\EntityNotFoundException;
use LevelFiveTeam\Railsbank\Exception\EndpointNotFoundException;

class RailsbankClient
{
    /**
     * @var RailsbankConfig
     */
    private $configService;

    /**
     * RailsbankClient constructor.
     * @param RailsbankConfig $config
     */
    public function __construct(RailsbankConfig $config)
    {
        $this->configService = $config;
    }

    /**
     * @param $apiUrl
     * @param $variables
     *
     * @return string|null
     */
    private function setVariablesToApiUrl($apiUrl, $variables) :? string
    {
        if (empty($variables)) {
            return $apiUrl;
        }

        foreach ($variables as $variable => $value) {
            if (is_array($value)) {
                continue;
            }

            $apiUrl = str_replace('{{' . $variable . '}}', $value, $apiUrl);
        }

        return $apiUrl;
    }

    /**
     * https://stackoverflow.com/questions/9895130/recursively-remove-empty-elements-and-subarrays-from-a-multi-dimensional-array
     */
    private function prepareBody(array $body) : array
    {
        foreach ($body as $k => &$v) {
            if (is_array($v)) {
                $v = $this->prepareBody($v);  // filter subarray and update array

                if (!sizeof($v)) { // check array count
                    unset($body[$k]);
                }
            } else if(!strlen($v)) {  // this will handle (int) type values correctly
                unset($body[$k]);
            }
        }
        return $body;
    }

    public function handleApiCall($command, string $method = 'GET', $returnRawResponse = false)
    {
        $apiUrl = $this->getApiUrl($command);
        $customerKey = $this->getCustomerApiKey();

        // need to work out how to send parameters as post
        $config = [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $customerKey,
            ],
        ];

        $client = new Client($config);

        $apiUrl = $this->setVariablesToApiUrl($apiUrl, $command->getBody());

        if ($method === 'GET') {
            $response = $client->request($method, $apiUrl);
        } else {
            $body = $this->prepareBody($command->getBody());
            $response = $client->post($apiUrl, [RequestOptions::JSON => $body]);
        }

        /** @var string $content */
        $content = $response->getBody()->getContents();

        if ($returnRawResponse) {
            return $content;
        }

        $decodedContent = json_decode($content);
        $entity = $this->getEntity($command, $decodedContent);

        return $entity;
    }

    /**
     * @param CommandInterface $command
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
