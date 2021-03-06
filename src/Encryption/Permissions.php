<?php
/**
 * BaconPdf
 *
 * @link      http://github.com/Bacon/BaconPdf For the canonical source repository
 * @copyright 2015 Ben Scholzen (DASPRiD)
 * @license   http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */

namespace Bacon\Pdf\Encryption;

/**
 * Permissions as defined in table 3.20 in section 3.5
 */
final class Permissions
{
    /**
     * @var bool
     */
    private $mayPrint;

    /**
     * @var bool
     */
    private $mayPrintHighResolution;

    /**
     * @var bool
     */
    private $mayModify;

    /**
     * @var bool
     */
    private $mayCopy;

    /**
     * @var bool
     */
    private $mayAnnotate;

    /**
     * @var bool
     */
    private $mayFillInForms;

    /**
     * @var bool
     */
    private $mayExtractForAccessibility;

    /**
     * @var bool
     */
    private $mayAssemble;

    /**
     * @param bool $mayPrint
     * @param bool $mayPrintHighResolution
     * @param bool $mayModify
     * @param bool $mayCopy
     * @param bool $mayAnnotate
     * @param bool $mayFillInForms
     * @param bool $mayExtractForAccessibility
     * @param bool $mayAssemble
     */
    public function __construct(
        $mayPrint,
        $mayPrintHighResolution,
        $mayModify,
        $mayCopy,
        $mayAnnotate,
        $mayFillInForms,
        $mayExtractForAccessibility,
        $mayAssemble
    ) {
        $this->mayPrint                   = $mayPrint;
        $this->mayPrintHighResolution     = $mayPrintHighResolution;
        $this->mayModify                  = $mayModify;
        $this->mayCopy                    = $mayCopy;
        $this->mayAnnotate                = $mayAnnotate;
        $this->mayFillInForms             = $mayFillInForms;
        $this->mayExtractForAccessibility = $mayExtractForAccessibility;
        $this->mayAssemble                = $mayAssemble;
    }

    /**
     * @param  int $revision
     * @return int
     */
    public function toInt($revision)
    {
        $flags = 0;

        if ($this->mayPrint) {
            $flags |= 3;
        }

        if ($this->mayModify) {
            $flags |= 4;
        }

        if ($this->mayCopy) {
            $flags |= 5;
        }

        if ($this->mayAnnotate) {
            $flags |= 6;
        }

        if ($revision >= 3) {
            if ($this->mayFillInForms) {
                $flags |= 9;
            }

            if ($this->mayExtractForAccessibility) {
                $flags |= 10;
            }

            if ($this->mayAssemble) {
                $flags |= 11;
            }

            if ($this->mayPrintHighResolution) {
                $flags |= 12;
            }
        }

        return $flags;
    }
}
