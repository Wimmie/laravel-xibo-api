<?php

namespace Wimmie\XiboApi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wimmie\XiboApi\XiboApi
 */
class XiboApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'xibo-api';
    }
}
