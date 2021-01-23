<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

abstract class Category
{
    /**
     * @var string The name of the category
     */
    protected string $name;

    /**
     * @var XiboApi
     */
    protected XiboApi $xiboApi;

    /**
     * Category constructor.
     * @param XiboApi $xiboApi
     */
    public function __construct(XiboApi $xiboApi)
    {
        $this->xiboApi = $xiboApi;
    }
}
