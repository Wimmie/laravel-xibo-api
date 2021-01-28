<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Template extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'template';

    /**
     * Template Search
     * @param array|null $parameters
     * @return mixed
     */
    public function search(array $parameters = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, null, $parameters);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Add a template from a Layout
     * @param int $layoutId
     * @param array|null $data
     * @return mixed
     */
    public function addFromLayout(int $layoutId, array $data = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $layoutId);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET, $data);
    }
}
