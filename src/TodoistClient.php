<?php

namespace Watson\Todoist;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class TodoistClient extends Client
{
    public function __construct(string $accessToken)
    {
        parent::__construct([
            'base_uri' => 'https://api.todoist.com/rest/v1/',
            'headers' => [
                'Accept-Encoding' => 'gzip',
                'Authorization' => "Bearer $accessToken"
            ],
            'http_errors' => false,
            'timeout'     => 10,
        ]);
    }

    public function getProjects() : array
    {
        $response = $this->get('projects');

        return $this->transformResponse($response);
    }

    public function getTasks(int $projectId) : array
    {
        return $this->transformResponse($this->get("tasks?project_id=$projectId"));
    }

    protected function transformResponse(ResponseInterface $response) : array
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
