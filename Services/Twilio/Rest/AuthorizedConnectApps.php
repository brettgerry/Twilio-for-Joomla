<?php
defined( '_JEXEC' ) or die;


class Services_Twilio_Rest_AuthorizedConnectApps
    extends Services_Twilio_ListResource
{
   public function create($name, array $params = array())
    {
        throw new BadMethodCallException('Not allowed');        
    }
}
