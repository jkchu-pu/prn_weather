<?php

class PrincetonWeatherDataObject extends KGODataObject
{
    const TEXT_ATTRIBUTE = 'ndweather:text';
    const CODE_ATTRIBUTE = 'ndweather:code';
    const TEMP_ATTRIBUTE = 'ndweather:temp';
    const DATE_ATTRIBUTE = 'ndweather:date';
    const FORECASTS_ATTRIBUTE = 'ndweather:forecasts';

    public function getText() {
        return $this->getAttribute(self::TEXT_ATTRIBUTE);
    }

    public function getCode() {
        return $this->getAttribute(self::CODE_ATTRIBUTE);
    }

    public function getTemp() {
        return $this->getAttribute(self::TEMP_ATTRIBUTE);
    }

    public function getDate() {
        return $this->getAttribute(self::DATE_ATTRIBUTE);
    }

    public function getForecasts() {
        return $this->getAttribute(self::FORECASTS_ATTRIBUTE);
    }

    public function getUIField(KGOUIObject $object, $field) {
        switch ($field) {
            case 'title':
                return $this->getTemp()."° F";
            case 'subtitle':
                return $this->getText();
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
