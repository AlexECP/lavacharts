<?php

namespace Khill\Lavacharts\Charts;

use \Khill\Lavacharts\Utils;

/**
 * DonutChart Class
 *
 * Alias for a pie chart with pieHolethat is rendered within the browser using SVG or VML. Displays
 * tooltips when hovering over slices.
 *
 *
 * @package    Lavacharts
 * @subpackage Charts
 * @since      1.0.0
 * @author     Kevin Hill <kevinkhill@gmail.com>
 * @copyright  (c) 2015, KHill Designs
 * @link       http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link       http://lavacharts.com                   Official Docs Site
 * @license    http://opensource.org/licenses/MIT MIT
 */
class DonutChart extends PieChart
{
    /**
     * Javascript chart type.
     *
     * @var string
     */
    const TYPE = 'DonutChart';

    /**
     * Javascript chart version.
     *
     * @var string
     */
    const VERSION = '1';

    /**
     * Javascript chart package.
     *
     * @var string
     */
    const VIZ_PACKAGE = 'corechart';

    /**
     * Javascript chart class.
     *
     * @var string
     */
    const VIZ_CLASS = 'google.visualization.PieChart';

    /**
     * Builds a new chart with the given label.
     *
     * @param  string $chartLabel Identifying label for the chart.
     * @return Chart
     */
    public function __construct($chartLabel)
    {
        parent::__construct($chartLabel);

        $this->defaults = array_merge($this->defaults, [
            'pieHole'
        ]);

        $this->pieHole(0.5);
    }

    /**
     * If between 0 and 1, displays a donut chart. The hole with have a radius
     * equal to $pieHole times the radius of the chart.
     *
     * @param  integer|float  $pieHole Size of the pie hole.
     * @return DonutChart
     */
    public function pieHole($pieHole)
    {
        if (Utils::between(0.0, $pieHole, 1.0) === false) {
            throw $this->invalidConfigValue(
                __FUNCTION__,
                'float',
                'while, 0 < pieHole < 1 '
            );
        }

        return $this->addOption([__FUNCTION__ => $pieHole]);
    }
}
