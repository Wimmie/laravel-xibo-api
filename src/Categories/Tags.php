<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Tags extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'tag';
}
