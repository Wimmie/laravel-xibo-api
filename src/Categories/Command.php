<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Command extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'command';
}
