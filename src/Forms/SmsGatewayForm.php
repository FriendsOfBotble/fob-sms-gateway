<?php

namespace FriendsOfBotble\Sms\Forms;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Forms\FormAbstract;
use Botble\Base\Forms\FormField;
use FriendsOfBotble\Sms\Facades\Sms;

abstract class SmsGatewayForm extends FormAbstract
{
    protected string $gateway;

    protected array $sensitiveFields = [];

    public function setup(): void
    {
        $this->contentOnly();
    }

    public function renderForm(array $options = [], bool $showStart = true, bool $showFields = true, bool $showEnd = true): string
    {
        $sensitiveFields = apply_filters('sms_gateway_sensitive_fields', $this->sensitiveFields);

        /** @var FormField $field */
        foreach ($this->fields as $field) {
            $value = Sms::getSetting($field->getName(), $this->gateway);

            $field->setValue(
                BaseHelper::hasDemoModeEnabled() && in_array($field->getName(), $sensitiveFields)
                    ? str($value)->mask('*', 0)
                    : $value
            );
        }

        return parent::renderForm($options, $showStart, $showFields, $showEnd);
    }

    public function gateway(string $gateway): static
    {
        $this->gateway = $gateway;

        return $this;
    }
}
