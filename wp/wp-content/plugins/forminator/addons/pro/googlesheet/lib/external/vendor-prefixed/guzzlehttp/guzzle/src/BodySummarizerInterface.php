<?php

namespace ForminatorGoogleAddon\GuzzleHttp;

use ForminatorGoogleAddon\Psr\Http\Message\MessageInterface;
interface BodySummarizerInterface
{
    /**
     * Returns a summarized message body.
     */
    public function summarize(MessageInterface $message) : ?string;
}
