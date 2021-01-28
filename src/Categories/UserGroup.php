<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class UserGroup extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'group';

    /**
     * Assign User to User Group
     * @param int $id
     * @param array|null $data
     * @return mixed
     */
    public function assign(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'members/assign', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Unassign User to User Group
     * @param int $id
     * @param array|null $data
     * @return mixed
     */
    public function unassign(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'members/unassign', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Copy User Group
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
