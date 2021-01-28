<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Statistics extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'stats';

    /**
     * @param array|null $parameters
     * @return mixed
     */
    public function stats(array $parameters = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, null, $parameters);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * @param array|null $parameters
     * @return mixed
     */
    public function timeDisconnected(array $parameters = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'timeDisconnected', null, $parameters);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }
}
