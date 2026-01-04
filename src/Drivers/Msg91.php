<?php

namespace FriendsOfBotble\Sms\Drivers;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Forms\FormAbstract;
use Exception;
use FriendsOfBotble\Sms\DataTransferObjects\SmsResponse;
use FriendsOfBotble\Sms\Facades\Sms;
use FriendsOfBotble\Sms\Forms\Msg91GatewayForm;
use GuzzleHttp\Client as HttpClient;

class Msg91 extends AbstractDriver
{
    protected HttpClient $client;
    protected string $apiUrl = 'https://api.msg91.com/api/v5/flow/';
    protected string $otpApiUrl = 'https://control.msg91.com/api/v5/otp';

    public function __construct()
    {
        $authKey = Sms::getSetting('auth_key', 'msg91');

        if (empty($authKey)) {
            return;
        }

        $this->client = new HttpClient([
            'headers' => [
                'authkey' => $authKey,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    protected function performSend(string $to, string $message): SmsResponse
    {
        if (! isset($this->client)) {
            return new SmsResponse(success: false);
        }

        try {
            $otpVariableName = Sms::getSetting('otp_variable_name', 'msg91') ?: 'OTP';

            // Extract OTP code from the message (typically 4-8 digits)
            $otpCode = $this->extractOtpFromMessage($message);

            $payload = [
                'json' => [
                    'flow_id' => Sms::getSetting('flow_id', 'msg91'),
                    'sender' => $this->getFrom(),
                    'mobiles' => $to,
                    $otpVariableName => $otpCode,
                ],
            ];

            $response = $this->client->post($this->apiUrl, $payload);
            $responseData = json_decode($response->getBody()->getContents(), true);

            return new SmsResponse(
                success: isset($responseData['type']) && $responseData['type'] === 'success',
                messageId: $responseData['message'] ?? null,
                response: $responseData,
            );
        } catch (Exception $e) {
            BaseHelper::logError($e);

            return new SmsResponse(success: false, response: [
                'error' => $e->getMessage(),
            ]);
        }
    }

    protected function extractOtpFromMessage(string $message): string
    {
        // Extract OTP code (4-8 digits) from the message
        if (preg_match('/\b(\d{4,8})\b/', $message, $matches)) {
            return $matches[1];
        }

        return $message;
    }

    public function normalizePhoneNumber(string $phone): string
    {
        // Remove any non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);

        return $phone;
    }

    public function getLogo(): string
    {
        return asset('vendor/core/plugins/fob-sms-gateway/images/msg91.svg');
    }

    public function getInstructions(): string
    {
        return view('plugins/fob-sms-gateway::instructions.msg91');
    }

    public function getSettingForm(): FormAbstract
    {
        return Msg91GatewayForm::create();
    }
}
