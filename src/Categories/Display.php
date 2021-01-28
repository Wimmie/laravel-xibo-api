<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Display extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'display';

    /**
     * Search
     * @param array|null $parameters
     * @return mixed
     */
    public function search(array $parameters = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, null, $parameters);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Edit
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function edit(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Delete
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_DELETE);
    }

    /**
     * Request Screen Shot
     * @param int $id
     * @return mixed
     */
    public function requestScreenshot(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'requestscreenshot', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT);
    }

    /**
     * Issue WOL
     * @param int $id
     * @return mixed
     */
    public function wol(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'wol', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST);
    }

    /**
     * Toggle authorised
     * @param int $id
     * @return mixed
     */
    public function toggleAuthorised(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'authorise', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT);
    }

    /**
     * Set Default Layout
     * @param int $id
     * @return mixed
     */
    public function defaultLayout(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'defaultlayout', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Licence Check
     * @param int $id
     * @return mixed
     */
    public function licenceCheck(int $id)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'licencecheck', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT);
    }
}
