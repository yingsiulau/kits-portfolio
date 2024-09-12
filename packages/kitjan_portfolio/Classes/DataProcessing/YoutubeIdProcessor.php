<?php

declare(strict_types=1);

namespace Playground\KitjanPortfolio\DataProcessing;

use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface; // Correct interface for TYPO3 v12
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class YoutubeIdProcessor implements DataProcessorInterface
{
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ): array {
        // Extract the YouTube video ID
        $youtubeUrl = $processedData['data']['my_custom_media'] ?? '';
        $videoId = '';

        // Regular expression to extract the YouTube video ID
        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $youtubeUrl, $matches)) {
            $videoId = $matches[1];
        }

        // Add the extracted video ID to the processed data array
        $processedData['youtubeVideoId'] = $videoId;

        return $processedData;
    }
}
