<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class DatasetData extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'dataset/data/{datasetId}';

    public function __construct(XiboApi $xiboApi, int $datasetId)
    {
        $this->name = str_replace('{datasetId}', $datasetId, $this->name);
        parent::__construct($xiboApi);
    }

    /**
     * Search
     * @return mixed
     */
    public function get()
    {
        $url = $this->xiboApi->generateUrl($this->name);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Add
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
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
}
