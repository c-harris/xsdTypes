<?php
namespace AlgoWeb\xsdTypes\Facets;

trait MinMaxTrait
{
    /**
     * @Exclude
     * @var int|float|\DateTime|\AlgoWeb\xsdTypes\AxillaryClasses\Calender Specifies the lower bounds for numeric values
     *                                                                     (the value must be greater than or equal to
     *                                                                      this value)
     */
    private $minInclusive = null;
    /**
     * @Exclude
     * @var int|float|\DateTime|\AlgoWeb\xsdTypes\AxillaryClasses\Calender Specifies the upper bounds for numeric values
     *                                                                     (the value must be less than or equal to this
     *                                                                      value)
     */
    private $maxInclusive = null;

    /**
     * @Exclude
     * @var int|float|\DateTime|\AlgoWeb\xsdTypes\AxillaryClasses\Calender Specifies the upper bounds for numeric values
     *                                                                     (the value must be less than or equal to this
     *                                                                      value)
     */
    private $minExclusive = null;
    /**
     * @Exclude
     * @var int|float|\DateTime|\AlgoWeb\xsdTypes\AxillaryClasses\Calender Specifies the upper bounds for numeric values
     *                                                                     (the value must be less than or equal to this
     *                                                                      value)
     */
    private $maxExclusive = null;

    /**
     * @param int|float|\DateTime|\AlgoWeb\xsdTypes\AxillaryClasses\Calender $v Specifies the upper bounds for numeric
     *                                                                          values (the value must be less than this
     *                                                                          value)
     */
    public function setMaxExclusive($v)
    {
        $this->maxExclusive = $v;

    }

    /**
     * @param int|float|\DateTime|\DateInterval $v Specifies the upper bounds for numeric values
     *                                             (the value must be less than or equal to this value)
     */
    public function setMaxInclusive($v)
    {
        $this->maxInclusive = $v;
    }
    /**
     * @param int|float|\DateTime|\DateInterval $v Specifies the lower bounds for numeric values
     *                                             (the value must be greater than this value)
     */
    public function setMinExclusive($v)
    {
        $this->minExclusive = $v;
    }

    /**
     * @param int|float|\DateTime|\DateInterval $v Specifies the lower bounds for numeric values
     *                                             (the value must be greater than or equal to this value)
     */
    public function setMinInclusive($v)
    {
        $this->minInclusive = $v;
    }

    public function checkMinMax($v)
    {
        if (null !== $this->minInclusive) {
            $this->checkMin($v);
        }
        if (null !== $this->maxInclusive) {
            $this->checkMax($v);
        }
    }

    private function checkMin($v)
    {
        if ($v < $this->minInclusive) {
            throw new \InvalidArgumentException('Value less than allowed min value ' . get_class($this));
        }
    }

    private function checkMax($v)
    {
        if ($v > $this->maxInclusive) {
            throw new \InvalidArgumentException('Value greater than allowed max value ' . get_class($this));
        }
    }
}
