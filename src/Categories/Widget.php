<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Widget extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'playlist/widget';

    /**
     * Add a Widget to a Playlist
     * @param string $type
     * @param int $playlistId
     * @param array|null $data
     * @return mixed
     */
    public function add(string $type, int $playlistId, array $data = null)
    {
        $url = $this->xiboApi->generateUrl($this->name) . '/' . $type . '/' . $playlistId;
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Delete a Widget
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_DELETE);
    }

    /**
     * Adds In/Out transition
     * @param string $type
     * @param int $playlistId
     * @param array $data
     * @return mixed
     */
    public function addTransition(string $type, int $playlistId, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'transition') . '/' . $type . '/' . $playlistId;
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Parameters for edting/adding audio file to a specific widget
     * @param int $id
     * @param array|null $data
     * @return mixed
     */
    public function audioParameters(int $id, array $data = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id) . '/audio';
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Delete assigned audio widget
     * @param int $id
     * @return mixed
     */
    public function deleteAudio(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id) . '/audio';
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_DELETE);
    }

    /**
     * Set Widget From/To Dates
     * @param int $id
     * @param array|null $data
     * @return mixed
     */
    public function expiry(int $id, array $data = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id) . '/expiry';
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Edit Widget
     * @param int $id
     * @param string $type
     * @param array|null $data
     * @return mixed
     */
    public function edit(int $id, string $type, array $data = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id) . '?' . $type . '=';
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }
}
