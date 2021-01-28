<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Library extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'library';

    /**
     * Enable Stats Collection
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function setEnableStats(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'setenablestats', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Tidy Library
     * @param array|null $data
     * @return mixed
     */
    public function tidy(array $data = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'tidy');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_DELETE, $data);
    }

    /**
     * Download Media
     * @param int $id
     * @param string $type
     * @return mixed
     */
    public function download(int $id, string $type)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'download', $id) . '/' . $type;
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Tag layout
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function tag(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id) . '/tag';
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Untag layout
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function untag(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id) . '/tag';
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Get Library Item Usage Report
     * @param int $id
     * @return mixed
     */
    public function usage(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'usage', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Get Library Item Usage Report for Layouts
     * @param int $id
     * @return mixed
     */
    public function usageLayouts(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'usage/layouts', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Copy Media
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
     * Media usage check
     * @param int $id
     * @return mixed
     */
    public function isUsed(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id) . '/isused';
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Upload Media from URL
     * @param array $data
     * @return mixed
     */
    public function uploadUrl(array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'uploadUrl');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }
}
