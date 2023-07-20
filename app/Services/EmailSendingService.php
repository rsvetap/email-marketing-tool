<?php

namespace App\Services;


use App\Enums\CustomerSexEnum;
use App\Jobs\SendEmailJob;
use App\Models\Customer;
use App\Models\EmailTemplate;


class EmailSendingService
{
    /**
     * Loop through the recipients and dispatch a job for each one
     *
     * @param  array  $recipientEmails
     * @param  EmailTemplate  $template
     *
     * @return void
     */
    public function sendEmailToRecipients(array $recipientEmails, EmailTemplate $template): void
    {
        foreach ($recipientEmails as $email) {
            $customer = Customer::where('email', $email)->first();
            if (!$customer) {
                continue;
            }

            $subject = $this->replacePlaceholders($template->subject, (array)$template->placeholders, $customer);
            $body = $this->replacePlaceholders($template->body, (array)$template->placeholders, $customer);

            dispatch(new SendEmailJob($email, $subject, $body));
        }
    }

    /**
     * Replace placeholders with data from customers table
     *
     * @param  string  $template
     * @param  array  $placeholders
     * @param  Customer  $customer
     *
     * @return string
     */
    protected function replacePlaceholders(string $template, array $placeholders, Customer $customer): string
    {
        foreach ($placeholders as $key => $value) {
            $placeholderValue = $customer->{$value} ?? '';

            // Convert enum instance to a string if necessary
            if ($placeholderValue instanceof CustomerSexEnum) {
                $placeholderValue = $placeholderValue->value;
            }

            // Create a pattern with optional spaces before and after the key
            $pattern = '/{{\s*' . preg_quote($key, '/') . '\s*}}/i';

            // Replace the placeholders in the template body
            $template = preg_replace($pattern, $placeholderValue, $template);
        }

        return $template;
    }

}
