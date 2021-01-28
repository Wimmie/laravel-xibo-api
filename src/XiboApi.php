<?php

namespace Wimmie\XiboApi;

use Wimmie\XiboApi\Categories\Campaign;
use Wimmie\XiboApi\Categories\Dataset;
use Wimmie\XiboApi\Categories\DatasetColumn;
use Wimmie\XiboApi\Categories\DatasetData;
use Wimmie\XiboApi\Categories\DatasetRss;
use Wimmie\XiboApi\Categories\DayPart;
use Wimmie\XiboApi\Categories\Display;
use Wimmie\XiboApi\Categories\DisplayGroup;
use Wimmie\XiboApi\Categories\DisplayGroupAction;
use Wimmie\XiboApi\Categories\DisplayGroupDisplay;
use Wimmie\XiboApi\Categories\DisplayGroupDisplayGroup;
use Wimmie\XiboApi\Categories\DisplayGroupLayout;
use Wimmie\XiboApi\Categories\DisplayGroupMedia;
use Wimmie\XiboApi\Categories\DisplayProfile;
use Wimmie\XiboApi\Categories\Layout;
use Wimmie\XiboApi\Categories\Library;
use Wimmie\XiboApi\Categories\Misc;
use Wimmie\XiboApi\Categories\Notification;
use Wimmie\XiboApi\Categories\PlayerSoftware;
use Wimmie\XiboApi\Categories\Playlist;
use Wimmie\XiboApi\Categories\Region;
use Wimmie\XiboApi\Categories\Resolution;
use Wimmie\XiboApi\Categories\Schedule;
use Wimmie\XiboApi\Categories\Statistics;
use Wimmie\XiboApi\Categories\Tags;
use Wimmie\XiboApi\Categories\Template;
use Wimmie\XiboApi\Categories\User;
use Wimmie\XiboApi\Categories\UserGroup;
use Wimmie\XiboApi\Categories\Widget;

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
            $url .= '/' . $action;
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

    /**
     * Get the dataset category of the Xibo api
     * @return Dataset
     */
    public function dataset(): Dataset
    {
        return new Dataset($this);
    }

    /**
     * Get the dataset column category of the Xibo api
     * @param int $datasetId
     * @return DatasetColumn
     */
    public function datasetColumn(int $datasetId): DatasetColumn
    {
        return new DatasetColumn($this, $datasetId);
    }

    /**
     * Get the dataset data category of the Xibo api
     * @param int $datasetId
     * @return DatasetData
     */
    public function datasetData(int $datasetId): DatasetData
    {
        return new DatasetData($this, $datasetId);
    }

    /**
     * Get the dataset rss category of the Xibo api
     * @param int $datasetId
     * @return DatasetRss
     */
    public function datasetRss(int $datasetId): DatasetRss
    {
        return new DatasetRss($this, $datasetId);
    }

    /**
     * Get the day part category of the Xibo api
     * @return DayPart
     */
    public function dayPart(): DayPart
    {
        return new DayPart($this);
    }

    /**
     * Get the display category of the Xibo api
     * @return Display
     */
    public function display(): Display
    {
        return new Display($this);
    }

    /**
     * Get the display group category of the Xibo api
     * @return DisplayGroup
     */
    public function displayGroup(): DisplayGroup
    {
        return new DisplayGroup($this);
    }

    /**
     * Get the display group media category of the Xibo api
     * @param int $displayGroupId
     * @return DisplayGroupMedia
     */
    public function displayGroupMedia(int $displayGroupId): DisplayGroupMedia
    {
        return new DisplayGroupMedia($this, $displayGroupId);
    }

    /**
     * Get the display group layout category of the Xibo api
     * @param int $displayGroupId
     * @return DisplayGroupLayout
     */
    public function displayGroupLayout(int $displayGroupId): DisplayGroupLayout
    {
        return new DisplayGroupLayout($this, $displayGroupId);
    }

    /**
     * Get the display group display category of the Xibo api
     * @param int $displayGroupId
     * @return DisplayGroupDisplay
     */
    public function displayGroupDisplay(int $displayGroupId): DisplayGroupDisplay
    {
        return new DisplayGroupDisplay($this, $displayGroupId);
    }

    /**
     * Get the display group display group category of the Xibo api
     * @param int $displayGroupId
     * @return DisplayGroupDisplayGroup
     */
    public function displayGroupDisplayGroup(int $displayGroupId): DisplayGroupDisplayGroup
    {
        return new DisplayGroupDisplayGroup($this, $displayGroupId);
    }

    /**
     * Get the display group action category of the Xibo api
     * @param int $displayGroupId
     * @return DisplayGroupAction
     */
    public function displayGroupAction(int $displayGroupId): DisplayGroupAction
    {
        return new DisplayGroupAction($this, $displayGroupId);
    }

    /**
     * Get the display profile category of the Xibo api
     * @return DisplayProfile
     */
    public function displayProfile(): DisplayProfile
    {
        return new DisplayProfile($this);
    }

    /**
     * Get the library category of the Xibo api
     * @return Library
     */
    public function library(): Library
    {
        return new Library($this);
    }

    /**
     * Get the player software category of the Xibo api
     * @return PlayerSoftware
     */
    public function playerSoftware(): PlayerSoftware
    {
        return new PlayerSoftware($this);
    }

    /**
     * Get the resolution category of the Xibo api
     * @return Resolution
     */
    public function resolution(): Resolution
    {
        return new Resolution($this);
    }

    /**
     * Get the statistics category of the Xibo api
     * @return Statistics
     */
    public function statistics(): Statistics
    {
        return new Statistics($this);
    }

    /**
     * Get the tags category of the Xibo api
     * @return Tags
     */
    public function tags(): Tags
    {
        return new Tags($this);
    }

    /**
     * Get the template category of the Xibo api
     * @return Template
     */
    public function template(): Template
    {
        return new Template($this);
    }

    /**
     * Get the user category of the Xibo api
     * @return User
     */
    public function user(): User
    {
        return new User($this);
    }

    /**
     * Get the user group category of the Xibo api
     * @return UserGroup
     */
    public function userGroup(): UserGroup
    {
        return new UserGroup($this);
    }

    /**
     * Get the region category of the Xibo api
     * @return Region
     */
    public function region(): Region
    {
        return new Region($this);
    }
}
