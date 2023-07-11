<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Carbon $dateTime
     * @param string $delimiterTag
     *
     * @return string
     */
    public static function rawDateTime(Carbon $dateTime, string $delimiterTag = '<br>'): string
    {
        return $dateTime->format('Y.m.d') . $delimiterTag . $dateTime->format('H:i:s');
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public static function rawUpperCase(string $text): string
    {
        return "<strong>" . ucwords($text) . "</strong>";
    }

    /**
     * @param bool $isActive
     *
     * @return string
     */
    public static function rawStatus(bool $isActive): string
    {
        return $isActive ? '<i class="success-icon fa-solid fa-check fa-lg"></i>' : '<i class="danger-icon fa-solid fa-xmark fa-lg">';
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public static function rawTitle(string $text): string
    {
        return ucwords(strtolower($text));
    }

    /**
     * @param string $text
     * @param string $url
     * @param string $title
     *
     * @return string
     */
    public static function rawLink(string $text = '-', string $url = '#', string $title = 'Show'): string
    {
        return sprintf('<a href="%s" title="%s" target="_blank">%s</a>', $url, $title, $text);
    }

    /**
     * @param string $email
     *
     * @return string
     */
    public function rawEmail(string $email = ''): string
    {
        if ($email) {
            return '<a href="mailto:' . $email . '" title="Write mail">' . $email . '</a>';
        }
        return '-';
    }

    /**
     * @param ?string $phone
     *
     * @return string
     */
    public function rawPhone(?string $phone): string
    {
        if ($phone) {
            return '<a href="tel:' . $phone . '" title="Call">' . $phone . '</a>';
        }
        return '-';
    }
}
