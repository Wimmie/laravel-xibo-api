<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Campaign extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'campaign';

    /**
     * Assign Layouts
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function assignLayout(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'layout/assign', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }
}
