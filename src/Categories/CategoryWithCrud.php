<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

abstract class CategoryWithCrud extends Category
{
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
    public function edit(int $id, array $data) {
        $url = $this->xiboApi->generateUrl($this->name, null, $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Delete
     * @param int $id
     * @return mixed
     */
    public function delete(int $id) {
        $url = $this->xiboApi->generateUrl($this->name, null, $id);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_DELETE);
    }
}
