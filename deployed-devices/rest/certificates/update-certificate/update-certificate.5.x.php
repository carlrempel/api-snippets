<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once '/path/to/vendor/autoload.php'; // Loads the library

use Twilio\Rest\Client;

// Get your Account SID and Auth Token from https://twilio.com/console
$accountSid = 'ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$authToken = 'your_auth_token';
$client = new Client($sid, $token);

$fleetSid = 'FLXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$fleetService = $client->preview->deployedDevices->fleets($fleetSid);

$certSid = "CYXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$certificate = $fleetService->certificates($certSid)
                            ->fetch()
                            ->update([
                              'FriendlyName' => "My New Certificate",
                              'DeviceSid' => "THXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
                            ]);

echo $certificate->sid;
