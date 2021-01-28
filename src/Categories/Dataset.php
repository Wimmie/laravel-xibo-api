<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Dataset extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'dataset';

    /**
     * Copy DataSet
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function copy(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'copy', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Import CSV
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function importCsv(int $id, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'import', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Import JSON
     * @param int $id
     * @param string $json
     * @return mixed
     */
    public function importJson(int $id, string $json)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'importjson', $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, null, null, $json);
    }
}
