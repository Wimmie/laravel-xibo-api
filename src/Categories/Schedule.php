<?php


namespace Wimmie\XiboApi\Categories;


use Wimmie\XiboApi\XiboApi;

class Schedule extends Category
{
    /**
     * @inheritdoc
     */
    protected string $name = 'schedule';

    /**
     * Generates the calendar that we draw events on
     * @param array|null $parameters
     * @return mixed
     */
    public function calendar(array $parameters = null)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'data/events', null, $parameters);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Event List
     * @param int $displayGroupId
     * @param array $parameters
     * @return mixed
     */
    public function list(int $displayGroupId, array $parameters)
    {
        $url = $this->xiboApi->generateUrl($this->name, 'events', $displayGroupId, $parameters);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_GET);
    }

    /**
     * Add Schedule Event
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_POST, $data);
    }

    /**
     * Edit Schedule Event
     * @param int $eventId
     * @param array $data
     * @return mixed
     */
    public function edit(int $eventId, array $data)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $eventId);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_PUT, $data);
    }

    /**
     * Delete Event
     * @param int $eventId
     * @return mixed
     */
    public function delete(int $eventId)
    {
        $url = $this->xiboApi->generateUrl($this->name, null, $eventId);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_DELETE);
    }

    /**
     * Delete a Recurring Event
     * @param int $eventId
     * @return mixed
     */
    public function deleteRecurrence(int $eventId)
    {
        $url = $this->xiboApi->generateUrl($this->name . 'recurrence', null, $eventId);
        return $this->xiboApi->sendRequest($url, XiboApi::REQUEST_DELETE);
    }


}
