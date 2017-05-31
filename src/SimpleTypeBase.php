<?php
namespace AlgoWeb\xsdTypes;

/**
 * Base Class representing xsd anySimpleTypes
 */
abstract class SimpleTypeBase
{
    /** @Exclude */
    private $enumeration = array();
    /** @Exclude */
    private $length = null;
    /** @Exclude */
    private $maxLength = null;
    /** @Exclude */
    private $minLength = null;
    /** @Exclude */
    private $whiteSpaceHandle = "collapse";

    public function __set($name, $value)
    {
        switch ($name) {
            case "enumeration":
                $this->setEnumoration($value);
                return;
            case "length":
                $this->setLength($value);
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
            default:
                throw new \InvalidArgumentException("Invalid parameters (facets) assignment for anyURI: " . __CLASS__);
        }
    }

    private function setWhiteSpaceHandle($value)
    {
        if (!in_array($value, ["preserve", "replace", "collapse"])) {
            throw new \InvalidArgumentException("Invalid white space handleing method " . __CLASS__);
        }
        $this->whiteSpaceHandle = $value;
    }

    private function checkLength($value)
    {
        if (((int)$value) != $value) {
            throw new \InvalidArgumentException("length values MUST be castable to int " . __CLASS__);
        }
        if (0 >= $value) {
            throw new \InvalidArgumentException("length values MUST be greater then 0 " . __CLASS__);
        }
    }

    private function setMaxLength($value)
    {
        $this->checkLength($value);
        $this->maxLength = $value;
    }
    private function setMinLength($value)
    {
        $this->checkLength($value);
        $this->minLength = $value;
    }

    private function setLength($value)
    {
        $this->checkLength($value);
        $this->length = $value;
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
        $v = $this->fixValue($value[0]);
        $this->isBaseValid($v);
        if (0 < count($value)) {
            $this->__value = $v;
        }
        return $this->__value;
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

    protected function fixValue($v)
    {
        return $this->fixWhitespace($v, $this->whiteSpaceHandle);
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
                    . $this->Length);
            }
        }
        if (is_array($this->enumeration) && !in_array($v, $this->enumeration)) {
            throw new \InvalidArgumentException("the provided value for " . __CLASS__ . " is not " .
                implode(" || ", $this->enumeration));
        }
        $this->isValid($v);
    }
    abstract protected function isValid($v);
}
