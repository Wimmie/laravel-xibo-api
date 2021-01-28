<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class DatasetRss extends CategoryWithCrud
{
    /**
     * @inheritdoc
     */
    protected string $name = 'dataset/{datasetId}/rss';

    public function __construct(XiboApi $xiboApi, int $datasetId)
    {
        $this->name = str_replace('{datasetId}', $datasetId, $this->name);
        parent::__construct($xiboApi);
    }
}
