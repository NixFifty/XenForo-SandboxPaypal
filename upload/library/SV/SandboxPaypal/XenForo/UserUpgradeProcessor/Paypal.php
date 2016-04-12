<?php

class SV_SandboxPaypal_XenForo_ControllerPublic_Account extends XFCP_SV_SandboxPaypal_XenForo_ControllerPublic_Account
{
    public function validateRequest(&$errorString)
    {
        if (!XenForo_Application::debugMode())
        {
			$errorString = new XenForo_Phrase('sandboxing_paypal_but_debug_is_off');
			XenForo_Error::logException(new Exception($errorString), false);
			return false;
        }

        $this->_filtered['test_ipn']  = true;

        return parent::validateRequest($errorString);
    }
}