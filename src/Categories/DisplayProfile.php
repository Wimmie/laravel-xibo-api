<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class DisplayProfile extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'displayprofile';

    /**
     * Copy Display Profile
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
