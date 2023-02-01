<?php
namespace ZiffMedia\LaravelKsql;

use Symfony\Component\HttpClient\Exception\ServerException;
use Symfony\Component\HttpClient\HttpClient;
use ZiffMedia\LaravelKsql\KsqlStreamChanged;

class KsqlStreamingClient
{
    protected array $streamingQueries = [];

    public function __construct(
        protected string $endpoint,
        protected string|null $username,
        protected string|null $password
    ) {}

    public function addQuery(string $name, string $query, string $eventClass = null)
    {
        $this->streamingQueries[$name] = ["query" => $query, "event_class" => $eventClass];
    }
    public function stream($offset = 'earliest')
    {
        $authHeader = "Basic " . base64_encode($this->username . ":" . $this->password);
        $client = HttpClient::create([
            'http_version' => '2.0',
            'headers' => [
                'Authorization' => $authHeader,
                'Accept' => 'application/vnd.ksqlapi.delimited.v1'
            ]
        ]);

        $fullRequestUri = $this->endpoint . '/query-stream';

        $responses = [];
        foreach ($this->streamingQueries as $name => $config) {
            $query = $config["query"];
            $eventClass = $config["event_class"] ?? KsqlStreamChanged::class;
            $requestBody = [
                'sql' => $query,
                'streamsProperties' => [
                    'streams.auto.offset.reset' => $offset
                ]
            ];

            $responses[] = $client->request('POST', $fullRequestUri, [
                'body' => json_encode($requestBody),
                'user_data' => [
                    'query_name' => $name,
                    'event_class' => $eventClass
                ]
            ]);
        }

        try {
            foreach ($client->stream($responses) as $response => $chunk) {
                dump($client);
                $userData = $response->getInfo('user_data');
                if (!$chunk->isFirst() ||  $chunk->isLast()) {
                    dump($chunk->getContent());
                }
            }
        } catch (ServerException $e) {
            // @todo do some laravel shit here
            throw $e;
        }



    }
}