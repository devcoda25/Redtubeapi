<?php

namespace devcoda25\Redtube\Enumerators;

use MyCLabs\Enum\Enum;


/**
 * Period Enumerator
 *
 * @package devcoda25\Redtube\Enumerators
 * @author Lukáš Homza <lhomza@webland.company>
 */
final class Period extends Enum
{

    const WEEKLY = 'weekly';
    const MONTHLY = 'monthly';
    const ALL_TIME = 'alltime';

}
