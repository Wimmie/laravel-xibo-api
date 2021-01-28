<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class PlayerSoftware extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'playersoftware';

    /**
     * Edit Player Version
     * @param int $versionId
     * @param array|null $data
     * @return mixed
     */
    public function edit(int $versionId, array $data = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $versionId);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Delete Version
     * @param int $versionId
     * @return mixed
     */
    public function delete(int $versionId)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $versionId);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_DELETE);
    }
}
