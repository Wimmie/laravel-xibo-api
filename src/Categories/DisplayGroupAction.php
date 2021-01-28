<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class DisplayGroupAction extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'displaygroup/{displayGroupId}/action';

    public function __construct(XiboApi $xiboApi, int $displayGroupId)
    {
        $this->name = str_replace('{displayGroupId}', $displayGroupId, $this->name);
        parent::__construct($xiboApi);
    }

    /**
     * Action: Collect Now
     * @return mixed
     */
    public function collectNow()
    {
        $url = $this->xiboApi->generateUrl($this->name, 'collectNow');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST);
    }

    /**
     * Action: Clear Stats and Logs
     * @return mixed
     */
    public function clearStatsAndLogs()
    {
        $url = $this->xiboApi->generateUrl($this->name, 'clearStatsAndLogs');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST);
    }

    /**
     * Action: Change Layout
     * @return mixed
     */
    public function changeLayout(array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'changelayout');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Action: Revert to Schedule
     * @return mixed
     */
    public function revertToSchedule()
    {
        $url = $this->xiboApi->generateUrl($this->name, 'revertToSchedule');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST);
    }

    /**
     * Action: Overlay Layout
     * @param array $data
     * @return mixed
     */
    public function overlayLayout(array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'overlaylayout');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Action: Overlay Layout
     * @param array $data
     * @return mixed
     */
    public function command(array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'command');
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }
}
