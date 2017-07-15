<?php
namespace AlgoWeb\xsdTypes\Facets;

trait MinMaxTrait
{
    /**
     * @Exclude
     * @var int|float|\DateTime|\AlgoWeb\xsdTypes\AxillaryClasses\Calender Specifies the lower bounds for numeric values
     *                                                                     (the value must be greater than or equal to
     *                                                                     this value)
     */
    private $minInclusive = null;
    /**
     * @Exclude
     * @var int|float|\DateTime|\AlgoWeb\xsdTypes\AxillaryClasses\Calender Specifies the upper bounds for numeric values
     *                                                                     (the value must be less than or equal to this
     *                                                                     value)
     */
    private $maxInclusive = null;

    /**
     * @Exclude
     * @var int|float|\DateTime|\AlgoWeb\xsdTypes\AxillaryClasses\Calender Specifies the upper bounds for numeric values
     *                                                                     (the value must be less than or equal to this
     *                                                                     value)
     */
    private $minExclusive = null;
    /**
     * @Exclude
     * @var int|float|\DateTime|\AlgoWeb\xsdTypes\AxillaryClasses\Calender Specifies the upper bounds for numeric values
     *                                                                     (the value must be less than or equal to this
     *                                                                     value)
     */
    private $maxExclusive = null;

    /**
     * @param int|float|\DateTime|\AlgoWeb\xsdTypes\AxillaryClasses\Calender $newMax Specifies the upper bounds for numeric
     *                                                                          values (the value must be less than this
     *                                                                          value)
     */
    public function setMaxExclusive($newMax)
    {
        $this->maxExclusive = $newMax;
    }

    /**
     * @param int|float|\DateTime|\DateInterval $v Specifies the upper bounds for numeric values
     *                                             (the value must be less than or equal to this value)
     */
    public function setMaxInclusive($newMax)
    {
        $this->maxInclusive = $newMax;
    }
    /**
     * @param int|float|\DateTime|\DateInterval $v Specifies the lower bounds for numeric values
     *                                             (the value must be greater than this value)
     */
    public function setMinExclusive($newMin)
    {
        $this->minExclusive = $newMin;
    }

    /**
     * @param int|float|\DateTime|\DateInterval $v Specifies the lower bounds for numeric values
     *                                             (the value must be greater than or equal to this value)
     */
    public function setMinInclusive($newMin)
    {
        $this->minInclusive = $newMin;
    }

    public function checkMinMax($value)
    {
        if (null !== $this->minInclusive) {
            $this->checkMin($value);
        }
        if (null !== $this->maxInclusive) {
            $this->checkMax($value);
        }
    }

    private function checkMin($value)
    {
        if ($value < $this->minInclusive) {
            throw new \InvalidArgumentException('Value less than allowed min value ' . get_class($this));
        }
    }

    private function checkMax($value)
    {
        if ($value > $this->maxInclusive) {
            throw new \InvalidArgumentException('Value greater than allowed max value ' . get_class($this));
        }
    }
}
