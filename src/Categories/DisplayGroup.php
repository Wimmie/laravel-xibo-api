<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class DisplayGroup extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'displaygroup';

    /**
     * Copy Display Group
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function copy(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id) . '/copy';
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }
}
