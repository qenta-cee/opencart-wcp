<?php
/*
* Shop System Plugins - Terms of use
*
* This terms of use regulates warranty and liability between Wirecard Central Eastern Europe (subsequently referred to as WDCEE) and it's
* contractual partners (subsequently referred to as customer or customers) which are related to the use of plugins provided by WDCEE.
*
* The Plugin is provided by WDCEE free of charge for it's customers and must be used for the purpose of WDCEE's payment platform
* integration only. It explicitly is not part of the general contract between WDCEE and it's customer. The plugin has successfully been tested
* under specific circumstances which are defined as the shopsystem's standard configuration (vendor's delivery state). The Customer is
* responsible for testing the plugin's functionality before putting it into production enviroment.
* The customer uses the plugin at own risk. WDCEE does not guarantee it's full functionality neither does WDCEE assume liability for any
* disadvantage related to the use of this plugin. By installing the plugin into the shopsystem the customer agrees to the terms of use.
* Please do not use this plugin if you do not agree to the terms of use!
*/

// Load main controller
$dir = dirname(__FILE__);
require_once($dir . '/wirecard.php');

class ControllerPaymentWirecardInstallment extends ControllerPaymentWirecard
{
    // define payment type
    public $payment_type = '_installment';

    // define input fields
    protected $arrayInputFields = array(
        'status' => 'undefinied',
        'customerId' => 'input',
        'secret' => 'input',
        'shopId' => 'input',
        'serviceUrl' => 'input',
        'backgroundColor' => 'input',
        'imageURL' => 'input',
        'displayText' => 'textarea',
        'minAmount' => 'input',
        'maxAmount' => 'input',
        'success_status' => 'status_code',
        'pending_status' => 'status_code',
        'failure_status' => 'status_code',
        'cancel_status' => 'status_code',
        'autoDeposit' => 'true_false',
        'duplicateRequestCheck ' => 'true_false',
        'maxRetries' => 'input',
        'confirmMail' => 'input',
        'customerStatement' => 'textarea',
        'iframe' => 'true_false',
        'consumerInformation' => 'true_false'
    );

    protected function validate()
    {
        $boolHasValidationError = parent::validate();

        $fieldname = $this->prefix . $this->payment_type . '_minAmount';
        if (!empty($this->request->post[$fieldname]) and !is_numeric($this->request->post[$fieldname])) {
            $this->arrayInputFieldsMandatory['minAmount'] = true;
            $boolHasValidationError = false;
        }

        $fieldname = $this->prefix . $this->payment_type . '_maxAmount';
        if (!empty($this->request->post[$fieldname]) and !is_numeric($this->request->post[$fieldname])) {
            $this->arrayInputFieldsMandatory['maxAmount'] = true;
            $boolHasValidationError = false;
        }

        return $boolHasValidationError;
    }

}
