<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class User extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'user';

    /**
     * Get Me
     * @return mixed
     */
    public function me()
    {
        $url = $this->xiboApi->generateUrl($this->name, 'me');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Permission Data
     * @param string $entity
     * @param int $objectId
     * @return mixed
     */
    public function permissionData(string $entity, int $objectId)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'permissions') . '/' . $entity . '/' . $objectId;
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Permission Set
     * @param string $entity
     * @param int $objectId
     * @param array $data
     * @return mixed
     */
    public function permissionSet(string $entity, int $objectId, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'permissions') . '/' . $entity . '/' . $objectId;
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET, $data);
    }

    /**
     * Retrieve User Preferences
     * @param array|null $parameters
     * @return mixed
     */
    public function preferences(array $parameters = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'pref', null, $parameters);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Save User Preferences
     * @param array|null $data
     * @return mixed
     */
    public function savePreferences(array $data = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'pref');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Save User Preferences
     * @param array|null $data
     * @return mixed
     */
    public function saveNonStatePreferences(array $data = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'pref');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }
}
