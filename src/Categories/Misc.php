<?php


namespace Wimmie\XiboApi\Categories;

use Wimmie\XiboApi\XiboApi;

class Misc extends Category
{
    /**
     * The current CMS time
     * @return mixed
     */
    public function clock()
    {
        $url = $this->xiboApi->generateUrl('clock');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * About
     * @return mixed
     */
    public function about()
    {
        $url = $this->xiboApi->generateUrl('about');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }
}
