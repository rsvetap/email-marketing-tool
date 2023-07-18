<?php

namespace App\Services;

use App\Enums\CustomerSexEnum;
use App\Jobs\SendEmailJob;
use App\Models\Customer;
use App\Models\EmailTemplate;
use Illuminate\Validation\Rules\Enum;

class EmailSendingService
{
    /**
     * Loop through the recipients and dispatch a job for each one
     *
     * @param array $recipientEmails
     * @param EmailTemplate $template
     * @return void
     */
    public function sendEmailToRecipients(array $recipientEmails, EmailTemplate $template): void
    {
        foreach ($recipientEmails as $email) {
            $subject = $template->subject;
            $body = $this->replacePlaceholders($template, $email);

            dispatch(new SendEmailJob($email, $subject, $body));
        }
    }

    /**
     * Replace placeholders with data from customers table
     *
     * @param $template
     * @param $recipientEmail
     * @return string
     */
    protected function replacePlaceholders($template, $recipientEmail): string
    {
        $customer = Customer::where('email', $recipientEmail)->first();
        $replacedTemplate = $template->body;

        if (!is_null($template->placeholders)) {
            foreach ($template->placeholders as $key => $value) {

                $placeholderValue = $customer->{$value} ?? '';

                // Convert enum instance to a string if necessary
                if ($placeholderValue instanceof CustomerSexEnum) {
                    $placeholderValue = $placeholderValue->value;
                }

                // Create a pattern with optional spaces before and after the key
                $pattern = '/{{\s*' . preg_quote($key, '/') . '\s*}}/i';

                // Replace the placeholders in the template body
                $replacedTemplate = preg_replace($pattern, $placeholderValue, $replacedTemplate);
            }
        }

        return $replacedTemplate;
    }

}
