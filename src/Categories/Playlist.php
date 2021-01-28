<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Playlist extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'playlist';

    /**
     * Search
     * @param array|null $parameters
     * @return mixed
     */
    public function search(array $parameters = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, null, $parameters);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Add
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Edit
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function edit(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Copy Playlist
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function copy(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'copy', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Playlist Widget Search
     * @param array|null $parameters
     * @return mixed
     */
    public function searchWidget(array $parameters = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'widget', null, $parameters);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Assign Library Items
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function assignLibrary(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'library/assign', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Order Widgets
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function order(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'order', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Get Playlist Item Usage Report
     * @param int $id
     * @return mixed
     */
    public function usageReport(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'usage', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Get Playlist Item Usage Report for Layouts
     * @param int $id
     * @return mixed
     */
    public function usageLayoutReport(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'usage/layouts', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Enable Stats Collection
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function setEnableStat(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'setenablestat', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }
}
