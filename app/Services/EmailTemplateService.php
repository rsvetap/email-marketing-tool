<?php

namespace App\Services;

class EmailTemplateService
{
    /**
     * Extract placeholders from email template body
     *
     * @param string $body
     * @return array
     */
    public function getPlaceholders(string $body): array
    {
        // Extract placeholders
        $placeholders = [];
        preg_match_all('/{{\s*(.*?)\s*}}/', $body, $matches);
        if (!empty($matches[1])) {
            $placeholders = array_unique($matches[1]);
        }

        return array_fill_keys($placeholders, '');
    }
}
