<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Layout extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'layout';

    /**
     * Copy layout
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
     * Layout Status
     * @param int $id
     * @return mixed
     */
    public function status(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'status', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Checkout Layout
     * @param int $id
     * @return mixed
     */
    public function checkout(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'checkout', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT);
    }

    /**
     * Publish Layout
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function publish(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'publish', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Discard Layout
     * @param int $id
     * @return mixed
     */
    public function discard(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'discard', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT);
    }
}
