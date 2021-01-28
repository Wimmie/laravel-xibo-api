<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Region extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'region';

    /**
     * Add Region
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Edit Region
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
     * Delete Region
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_DELETE);
    }

    /**
     * Position Regions
     * @param int $layoutId
     * @param array $data
     * @return mixed
     */
    public function position(int $layoutId, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'position/all', $layoutId);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }
}
