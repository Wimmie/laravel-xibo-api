<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class DisplayGroupDisplayGroup extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'displaygroup/{displayGroupId}/displayGroup';

    public function __construct(XiboApi $xiboApi, int $displayGroupId)
    {
        $this->name = str_replace('{displayGroupId}', $displayGroupId, $this->name);
        parent::__construct($xiboApi);
    }

    /**
     * Assign one or more DisplaysGroups to a Display Group
     * @param array $data
     * @return mixed
     */
    public function assign(array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'assign');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Unassigns one or more DisplaysGroups to a Display Group
     * @param array $data
     * @return mixed
     */
    public function unassign(array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'unassign');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }
}
