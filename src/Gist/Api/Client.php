<?php

namespace Gist\Api;

use GuzzleHttp\Client as BaseClient;

/**
 * Class Client
 * @author Simon Vieille <simon@deblan.fr>
 */
class Client extends BaseClient
{
    const CREATE = '/en/api/create';
    const UPDATE = '/en/api/update/{gist}';

    public function create($title, $type, $content)
    {
        $response = $this->post(
            self::CREATE,
            array(
                'form_params' => array(
                    'form' => array(
                        'title' => $title,
                        'type' => $type,
                        'content' => $content,
                    ),
                ),
            )
        );

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }
    
    public function update($gist, $content)
    {
        $response = $this->post(
            str_replace('{gist}', $gist, self::UPDATE),
            array(
                'form_params' => array(
                    'form' => array(
                        'content' => $content,
                    ),
                ),
            )
        );

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }
}
