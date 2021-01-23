<?php

namespace Wimmie\XiboApi;

use CURLFile;
use Mockery\Matcher\Not;
use Wimmie\XiboApi\Categories\Campaign;
use Wimmie\XiboApi\Categories\Misc;
use Wimmie\XiboApi\Categories\Notification;

class XiboApi
{
    public const REQUEST_DELETE = 'DELETE';
    public const REQUEST_POST = 'POST';
    public const REQUEST_PUT = 'PUT';
    public const REQUEST_GET = 'GET';

    /**
     * @var string The access token
     */
    private string $accessToken;

    public function __construct()
    {
        $url = $this->generateUrl('authorize/access_token');
        $data = http_build_query(
            [
                'client_id' => config('xibo.client_id'),
                'client_secret' => config('xibo.client_secret'),
                'grant_type' => 'client_credentials',
            ]
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::REQUEST_POST);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        $this->accessToken = json_decode($result)->access_token;
    }

    /**
     * Generates an url using the config url and the given parameters
     * @param string|null $prefix
     * @param string|null $action
     * @param int|null $id
     * @param array $parameters
     * @return string
     */
    public function generateUrl(string $prefix = null, string $action = null, int $id = null, array $parameters = []): string
    {
        $url = config('xibo.url') . '/api';
        if (isset($prefix)) {
            $url .= '/' . $prefix;
        }
        if (isset($action)) {
            $url .= '/'. $action;
        }
        if (isset($id)) {
            $url .= '/' . $id;
        }
        $parameters = array_filter($parameters);
        foreach ($parameters as $key => $value) {
            if ($key == array_key_first($parameters)) {
                $url .= '?';
            } else {
                $url .= '&';
            }
            if (is_array($value)) {
                $url .= $key . '=' . array_pop($value);
                foreach ($value as $item) {
                    $url .= ',' . $item;
                }
            } else {
                $url .= $key . '=' . $value;
            }
        }
        return $url;
    }

    /**
     *
     * @param string $url
     * @param mixed|null $data
     * @param string $requestType
     * @param string|null $html
     * @return mixed
     */
    public function sendRequest(string $url, string $requestType, $data = null, string $html = null)
    {
        if ($html != null) {
            $data = http_build_query(
                [
                    'text' => $html,
                ]
            );
        } elseif ($data != null) {
            $data = http_build_query($data);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requestType);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            [
                'Authorization: Bearer ' . $this->accessToken,
            ]
        );

        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Get the misc category of the Xibo api
     * @return Misc
     */
    public function misc(): Misc
    {
        return new Misc($this);
    }

    /**
     * Get the notification category of the Xibo api
     * @return Notification
     */
    public function notification(): Notification
    {
        return new Notification($this);
    }

    /**
     * Get the campaign category of the Xibo api
     * @return Campaign
     */
    public function campaign(): Campaign
    {
        return new Campaign($this);
    }

    /**
     * Get the playlist category of the Xibo api
     * @return Playlist
     */
    public function playlist(): Playlist
    {
        return new Playlist($this);
    }

    /**
     * Get the schedule category of the Xibo api
     * @return Schedule
     */
    public function schedule(): Schedule
    {
        return new Schedule($this);
    }

    /**
     * Get the layout category of the Xibo api
     * @return Layout
     */
    public function layout(): Layout
    {
        return new Layout($this);
    }

    /**
     * Get the widget category of the Xibo api
     * @return Widget
     */
    public function widget(): Widget
    {
        return new Widget($this);
    }
}
