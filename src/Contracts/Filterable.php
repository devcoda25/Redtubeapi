<?php

namespace devcoda25\Redtube\Filters;

/**
 * Contract describing query filters
 *
 * @package devcoda25\Redtube\Filters
 * @author Lukáš Homza <lhomza@webland.company>
 */
interface Filterable
{

    /**
     * Compile filter into a query string
     *
     * @return string
     */
    public function compile();

}
