<?php


class PrincetonWeatherModule extends KGOModule {

    /*
     *  The initializeForPageConfigObjects_ methods below don't need to do much, they simply check if a feed has been configured
     *  The $objects configured in the page objdefs will take control from here
     */

    protected function initializeForPageConfigObjects_index(KGOUIPage $page, $objects) {
        //$jc_feeds=$this->getFeed();
        //kgo_debug($jc_feeds,true,true);
        //kgo_debug($this,true,true);
        if (!($feed = $this->getFeed())) {
            $this->setPageError($page, "Unable to load weather");
            return;
        }
    }
    
    public function getWeather() {
        //$tics=time();
        //kgo_debug("getWeather called at tics[$tics]",false,false);
        if($feed = $this->getFeed()) {
            //$jc_retriever=$feed->getRetriever();
            //kgo_debug($jc_retriever,true,true);
            //$jc_data=$jc_retriever->getData();
            //kgo_debug($jc_data,true,true);
            return $feed->getRetriever()->getData();
        }
    }
    
    public function getForecasts() {
        $weather = $this->getWeather();
        $currentWeather = reset($weather);  
        return $currentWeather->getForecasts();
    }    
    
}
