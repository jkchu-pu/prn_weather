<?php

/*
 * Copyright © 2010 - 2014 Modo Labs Inc. All rights reserved.
 *
 * The license governing the contents of this file is located in the LICENSE
 * file located at the root directory of this distribution. If the LICENSE file
 * is missing, please contact sales@modolabs.com.
 *
 */

class PrincetonWeatherDataRetriever extends KGOURLDataRetriever {
    public static $forecaseURLTemplate = "http://xml.weather.yahoo.com/forecastrss/%s_f.xml";

    protected function init($args) {
        parent::init($args);

        $this->setBaseURL(sprintf(self::$forecaseURLTemplate, $args['zipCode']));
    }
}
