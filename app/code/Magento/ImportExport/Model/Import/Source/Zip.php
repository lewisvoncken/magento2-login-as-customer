<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\ImportExport\Model\Import\Source;

/**
 * Zip import adapter.
 */
class Zip extends Csv
{
    public function __construct(
        $file,
        \Magento\Framework\Filesystem\Directory\Write $directory,
        $options
    ) {
        $zip = new \Magento\Framework\Archive\Zip();
        $file = $zip->unpack(
            $directory->getRelativePath($file),
            $directory->getRelativePath(preg_replace('/\.zip$/i', '.csv', $file))
        );
        parent::__construct($file, $directory, $options);
    }
}