<?php
defined( '_JEXEC' ) or die;


class Services_Twilio_Rest_AvailablePhoneNumbers
    extends Services_Twilio_ListResource
{
    public function getLocal($country)
    {
        $curried = new Services_Twilio_PartialApplicationHelper();
        $curried->set(
            'getList',
            array($this, 'getList'),
            array($country, 'Local')
        );
        return $curried;
    }
    public function getTollFree($country)
    {
        $curried = new Services_Twilio_PartialApplicationHelper();
        $curried->set(
            'getList',
            array($this, 'getList'),
            array($country, 'TollFree')
        );
        return $curried;
    }
    /**
     * Get a list of available phone numbers. 
     *
     * @param string country The 2-digit country code you'd like to search for 
     *    numbers e.g. ('US', 'CA', 'GB')
     * @param string type The type of number ('Local' or 'TollFree')
     * @return object The object representation of the resource
     */

    public function getList($country, $type, array $params = array())
    {
        return $this->retrieveData("$country/$type", $params);
    }

    public function getSchema()
    {
        // You can't page through the list of available phone numbers.
        return array('list' => 'countries') + parent::getSchema();
    }
}
