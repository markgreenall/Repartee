<?php namespace Repartee\Action;

use Repartee\Action\BaseClass\BaseSendMessage;
use Repartee\config\ReparteeConfig;
use Repartee\core\Commit;


class NewMessage extends BaseSendMessage
{
    public $Recipients = [];
    public $Message = "";

    /**
     * Send a new SMS Message
     * @return array
     */
    final public function send ()
    {
        # Commit Message to cURL
        return (new Commit)->send(
            ReparteeConfig::getSetting('send_sms'),     # Endpoint path
            [
                'numbers' => $this->formatRecipients(), # Format Numbers into Comma-Delimited
                'message' => urlencode($this->Message)  # URL Encode Message
            ]
        );
    }
}
