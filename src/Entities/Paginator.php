<?php

namespace devcoda25\Redtube\Entities;

use Illuminate\Support\Collection;
use JMS\Serializer\Annotation as JMS;


/**
 * Paginator
 *
 * @package devcoda25\Redtube\Entities
 * @author Lukáš Homza <lhomza@webland.company>
 *
 * @JMS\XmlRoot("root")
 */
class Paginator
{

    /**
     * @var int $page
     *
     * @JMS\Exclude()
     */
    private $page = 1;

    /**
     * @var int $total
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("count")
     */
    private $total = 0;

    /**
     * @var Collection|Videos $items
     *
     * @JMS\Type("devcoda25\Redtube\Entities\Videos")
     * @JMS\SerializedName("videos")
     */
    private $items;

    /**
     */
    public function __construct()
    {
        $this->items = new Collection;
    }

    /**
     * @JMS\PostDeserialize()
     */
    public function onPostDeserialize()
    {
        $this->items = $this->items->flatten();
    }

    /**
     * @param int $page
     *
     * @return Paginator
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function perPage()
    {
        return $this->items->count();
    }

    /**
     * @return int
     */
    public function currentPage()
    {
        return $this->page;
    }

    /**
     * @return float
     */
    public function getLastPage()
    {
        return ceil($this->total / $this->perPage());
    }

    /**
     * @return Collection
     */
    public function items()
    {
        return $this->items;
    }

}
