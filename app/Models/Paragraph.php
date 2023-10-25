<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    use HasFactory;

    protected $fillable = ['*'];

    /*
     * Get the next paragraphs or wrap if necessary
     */
    public static function getNext($index, $steps, $end)
    {
        // Check if getting the next steps from index will exceed end
        if ($index + $steps > $end) {
            // Get the remaining paragraphs
            $remaining = self::getRemaining($index, $end);

            // Get the paragraphs to wrap
            $wrap = self::getWrap($steps - count($remaining));

            // Merge the two arrays
            return array_merge($remaining, $wrap);
        } else {
            // Get the next steps
            return self::getParagraphs($index, $steps);
        }
    }

    /*
     * Get the remaining paragraphs
     */
    public static function getRemaining($index, $end)
    {
        return self::getParagraphs($index, $end - $index + 1);
    }

    /*
     * Get the next steps
     */
    public static function getParagraphs($index, $steps)
    {
        return self::whereBetween('id', [$index, $index + $steps - 1])
            ->pluck('content')
            ->toArray();
    }

    /*
     * Get the paragraphs to wrap
     */
    public static function getWrap($steps)
    {
        return self::getParagraphs(1, $steps);
    }
}
