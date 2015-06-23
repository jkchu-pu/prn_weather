<?php

class PrincetonForecastDataObject extends KGODataObject
{
    const HIGH_ATTTRIBUTE = 'ndforecast:high';
    const LOW_ATTRIBUTE = 'ndforecast:low';
    const TEXT_ATTRIBUTE = 'ndforecast:text';
    const DAY_ATTRIBUTE = 'ndforecast:day';
    const DATE_ATTRIBUTE = 'ndforecast:date';
    const CODE_ATTRIBUTE = 'ndforecast:code';

    public function getHigh() {
        return $this->getAttribute(self::HIGH_ATTTRIBUTE);
    }

    public function getLow() {
        return $this->getAttribute(self::LOW_ATTRIBUTE);
    }

    public function getText() {
        return $this->getAttribute(self::TEXT_ATTRIBUTE);
    }

    public function getDay() {
        return $this->getAttribute(self::DAY_ATTRIBUTE);
    }

    public function getDate() {
        return $this->getAttribute(self::DATE_ATTRIBUTE);
    }

    public function getCode() {
        return $this->getAttribute(self::CODE_ATTRIBUTE);
    }

    public function getUIField(KGOUIObject $object, $field) {
        switch ($field) {
            case 'title':
                return $this->getText();
            break;
            case 'label':
                return $this->getDay();

            case 'subtitle':
                return "Lo: ".$this->getLow()."° Hi: ".$this->getHigh()."°";
            break;
            case 'thumbnail':
                $img = sprintf("http://s.imwx.com/v.20100719.135915/img/wxicon/72/%d.png", $this->getCode());
                $args = array('maxwidth'=>60);
                $proc = KGODataProcessor::factory("KGOImageDataProcessor", $args);
                return $proc->process($img);
            default:
                return parent::getUIField($object, $field);
        }
    }
}
