<?php

namespace App\Services;

use App\Models\EmailTemplate;

class EmailTemplateService
{
    /**
     * Extract placeholders from email template body
     *
     * @param EmailTemplate $template
     * @return array
     */
    public function getPlaceholders($body, $oldPlaceholders): array
    {
        // Extract placeholders from the template
        $placeholders = [];
        preg_match_all('/{{\s*([^}]+)\s*}}/i', $body, $matches);
        if (!empty($matches[1])) {
            $placeholders = array_unique($matches[1]);
        }

        // Filter out the placeholders that already exist in the database
        $placeholders = array_filter($placeholders, function ($placeholder) use ($oldPlaceholders) {
            return !in_array(trim($placeholder), array_keys($oldPlaceholders));
        });

        // Create an array of new placeholders with empty values
        $newPlaceholdersWithValues = array_fill_keys($placeholders, '');

        // Merge the existing placeholders with the new placeholders
        return array_merge($oldPlaceholders, $newPlaceholdersWithValues);
    }
}
