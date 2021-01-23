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
     * Assign Layouts
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function copy(int $id, string $name)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'layout/assign', $id, [
            'name' => $name,
        ]);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST);
    }
}
