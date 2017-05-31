<?php
namespace AlgoWeb\xsdTypes;

/**
 * Base Class representing xsd anySimpleTypes
 * @property-write array $enumeration Defines a list of acceptable values
 * @property-write array $fractionDigits Specifies the maximum number of decimal places allowed. Must be equal to or greater than zero
 * @property-write array $length Specifies the exact number of characters or list items allowed. Must be equal to or greater than zero
 * @property-write array $maxExclusive Specifies the upper bounds for numeric values (the value must be less than this value)
 * @property-write array $maxInclusive Specifies the upper bounds for numeric values (the value must be less than or equal to this value)
 * @property-write array $maxLength Specifies the maximum number of characters or list items allowed. Must be equal to or greater than zero
 * @property-write array $minExclusive Specifies the lower bounds for numeric values (the value must be greater than this value)
 * @property-write array $minInclusive Specifies the lower bounds for numeric values (the value must be greater than or equal to this value)
 * @property-write array $minLength Specifies the lower bounds for numeric values (the value must be greater than or equal to this value)
 * @property-write array $pattern Defines the exact sequence of characters that are acceptable
 * @property-write array $totalDigits Specifies the exact number of digits allowed. Must be greater than zero
 * @property-write array whiteSpace Specifies how white space (line feeds, tabs, spaces, and carriage returns) is handled
 */
abstract class SimpleTypeBase
{
    /**
     * @Exclude
     * @var array Defines a list of acceptable values
     */
    private $enumeration = array();
    /**
     * @Exclude
     * @var integer Specifies the maximum number of characters or list items allowed. Must be equal to or greater than zero
     */
    private $maxLength = null;
    /**
     * @Exclude
     * @var integer Specifies the minimum number of characters or list items allowed. Must be equal to or greater than zero
     */
    private $minLength = null;
    /**
     * @Exclude
     * @var string Specifies how white space (line feeds, tabs, spaces, and carriage returns) is handled
     */
    private $whiteSpaceHandle = "preserve";
    /**
     * @Exclude
     * @var string Defines the exact sequence of characters that are acceptable
     */
    private $pattern = null;
    /**
     * @Exclude
     * @var string Specifies the maximum number of decimal places allowed. Must be equal to or greater than zero
     */
    private $fractionDigits = null;
    /**
     * @Exclude
     * @var integer Specifies the lower bounds for numeric values (the value must be greater than this value)
     */
    private $minExclusive = null;
    /**
     * @Exclude
     * @var integer Specifies the upper bounds for numeric values (the value must be less than this value)
     */
    private $maxExclusive = null;

    /**
     * @property mixed $__value
     */
    private $__value = null;

    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value($value);
    }

    /**
     * Gets or sets the inner value
     *
     * @param mixed ...$value
     * @return mixed
     * @throws \Exception
     */
    public function value(...$value)
    {
        if (0 >= count($value)) {
            return $this->__value;
        }
        $v = $this->fixValue($value[0]);
        $this->isBaseValid($v);
        $this->__value = $v;
        return $v;
    }

    protected function fixValue($v)
    {
        return $this->fixWhitespace($v, $this->whiteSpaceHandle);
    }

    protected function fixWhitespace($val, $handle = "preserve")
    {
        switch ($handle) {
            case "preserve":
                return $val;
            case "replace":
                return preg_replace('/\s/', ' ', $val);
            case "collapse":
                return preg_replace('/\s+/', ' ', $val);
            default:
                throw new \InvalidArgumentException(__CLASS__ . " Called Fix whitespace with invalid handle operation");
        }
    }

    private function isBaseValid($v)
    {
        $stringLen = strlen($v);
        if ($this->minLength != null) {
            if ($stringLen > $this->minLength) {
                throw new \InvalidArgumentException("the provided value for " . __CLASS__ . " is to long minLength: "
                    . $this->minLength);
            }
        }
        if ($this->maxLength != null) {
            if ($stringLen < $this->maxLength) {
                throw new \InvalidArgumentException("the provided value for " . __CLASS__ . " is to short MaxLength: "
                    . $this->maxLength);
            }
        }
        if ($this->length != null) {
            if ($stringLen != $this->length) {
                throw new \InvalidArgumentException("the provided value for " . __CLASS__ . " is not "
                    . $this->length);
            }
        }
        if (is_array($this->enumeration) && !in_array($v, $this->enumeration)) {
            throw new \InvalidArgumentException("the provided value for " . __CLASS__ . " is not " .
                implode(" || ", $this->enumeration));
        }
        if ($this->pattern != null) {
            if (!$this->matchesRegexPattern($this->pattern, $v)) {
                throw new \InvalidArgumentException("assigned value that dose not match pattern " . __CLASS__);
            }
        }
        $this->isValid($v);
    }

    /**
     * Checks a pattern against a string
     * @param string $pattern the regex pattern
     * @param string $string the string to check
     * @return bool true if string matches pattern
     */
    private function matchesRegexPattern($pattern, $string)
    {
        $matches = null;
        return (1 == preg_match($pattern, $string, $matches) && $string == $matches[0]);
    }

    abstract protected function isValid($v);

    public function __set($name, $value)
    {
        switch ($name) {
            case "enumeration":
                $this->setEnumoration($value);
                return;
            case "totalDigits":
            case "length":
                $this->setMaxLength($value);
                $this->setMinLength($value);
                return;
            case "maxLength":
                $this->setMaxLength($value);
                return;
            case "minLength":
                $this->setMinLength($value);
                return;
            case "whiteSpaceHandle":
                $this->setWhiteSpaceHandle($value);
                return;
            case "pattern":
                $this->setPattern($value);
                return;
            case "fractionDigits":
                $this->setFractionDigits($value);
                return;
            case "minInclusive":
                $value--;
            // bump down by one to become MinExclusive
            case "minExclusive":
                $this->setMinExclusive($value);
                return;
            case "maxInclusive":
                $value++;
            // bump up by one to become MaxExclusive
            case "maxExclusive":
                $this->setMaxExclusive($value);
                return;
            default:
                throw new \InvalidArgumentException("Invalid parameters (facets) assignment for anyURI: " . __CLASS__);
        }
    }

    private function setEnumoration($value)
    {
        if (!is_array($value)) {
            throw new \InvalidArgumentException("enumoration values MUST be an array " . __CLASS__);
        }
        if (0 == count($value)) {
            throw new \InvalidArgumentException("enumoration values MUST have at least one value " . __CLASS__);
        }
        $this->enumeration = $value;
    }

    private function setMaxLength($value)
    {
        $this->checkLength($value);
        $this->maxLength = $value;
    }

    private function checkLength($value, $min = 0)
    {
        if (((int)$value) != $value) {
            throw new \InvalidArgumentException("length values MUST be castable to int " . __CLASS__);
        }
        if ($min >= $value) {
            throw new \InvalidArgumentException("length values MUST be greater then 0 " . __CLASS__);
        }
    }

    private function setMinLength($value)
    {
        $this->checkLength($value);
        $this->minLength = $value;
    }

    private function setWhiteSpaceHandle($value)
    {
        if (!in_array($value, ["preserve", "replace", "collapse"])) {
            throw new \InvalidArgumentException("Invalid white space handleing method " . __CLASS__);
        }
        $this->whiteSpaceHandle = $value;
    }

    private function setPattern($value)
    {
        if (!$this->checkPattern($value)) {
            $value = "/" . $value . "/";
            if (!$this->checkPattern($value)) {
                throw new \InvalidArgumentException("Invalid regex Pattern provided: " . __CLASS__);
            }
        }
        $this->pattern = $value;
    }

    private function checkPattern($pattern)
    {
        return (@preg_match($pattern, null) === false);
    }

    private function setFractionDigits($value)
    {
        $this->checkLength($value);
        $this->fractionDigits = $value;
    }

    private function setMinExclusive($value)
    {
        $this->checkLength($value, -1);
        $this->minExclusive = $value;
    }

    private function setMaxExclusive($value)
    {
        $this->checkLength($value);
        $this->maxExclusive = $value;
    }

    /**
     * Gets a string value
     *
     * @return mixed
     */
    public function __toString()
    {
        return strval($this->__value);
    }

    private function checkMinLength($v)
    {
        $stringLen = strlen($v);
        if ($this->minLength != null) {
            if ($stringLen > $this->minLength) {
                throw new \InvalidArgumentException("the provided value for " . __CLASS__ . " is to long minLength: "
                    . $this->minLength);
            }
        }
    }
}
