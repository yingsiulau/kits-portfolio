<?php

declare(strict_types=1);

namespace Playground\KitjanPortfolio\DataProcessing;

use TYPO3\CMS\Core\Resource\FileRepository;
use TYPO3\CMS\Core\Resource\FileReference;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

class ExtractImageNameProcessor implements DataProcessorInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;

    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ): array {
        // Extract the file UID from the processed data
        $fileUid = $processedData['data'][$processorConfiguration['fieldName']] ?? null;
        $imageName = '';
        $fileObject = null;

        if ($fileUid) {
            // Get the file object from FileRepository
            $fileRepository = GeneralUtility::makeInstance(FileRepository::class);
            $fileReferences = $fileRepository->findByRelation('tt_content', $processorConfiguration['fieldName'], $processedData['data']['uid']);

            if (!empty($fileReferences)) {
                /** @var FileReference $file */
                $file = reset($fileReferences);
                $imageName = $file->getOriginalFile()->getName(); // Get the name of the file
                $fileObject = $file; // FileReference object
            } else {
                // Log if no file references found
                $this->logger->warning('No file references found for UID ' . $processedData['data']['uid']);
            }
        }

        // Add the extracted image name and file reference object to the processed data array
        $processedData[$processorConfiguration['as']] = $imageName;
        $processedData['fileObject'] = $fileObject; // FileReference object

        return $processedData;
    }
}
