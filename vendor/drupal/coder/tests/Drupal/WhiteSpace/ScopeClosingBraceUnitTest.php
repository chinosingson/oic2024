<?php

namespace Drupal\Test\WhiteSpace;

use Drupal\Test\CoderSniffUnitTest;

class ScopeClosingBraceUnitTest extends CoderSniffUnitTest
{


    /**
     * Returns the lines where errors should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of errors that should occur on that line.
     *
     * @param string $testFile The name of the file being tested.
     *
     * @return array<int, int>
     */
    protected function getErrorList(string $testFile): array
    {
        switch ($testFile) {
        case 'ScopeClosingBraceUnitTest.inc':
            return [
                16 => 1,
                23 => 1,
                29 => 1,
            ];
        }

        return [];

    }//end getErrorList()


    /**
     * Returns the lines where warnings should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of warnings that should occur on that line.
     *
     * @param string $testFile The name of the file being tested.
     *
     * @return array<int, int>
     */
    protected function getWarningList(string $testFile): array
    {
        return [];

    }//end getWarningList()


    /**
     * Skip this test on PHP versions lower than 8 because the syntax is not allowed there.
     *
     * @return bool
     */
    protected function shouldSkipTest()
    {
        if (version_compare(PHP_VERSION, '8.0.0') < 0) {
            return true;
        }

        return false;

    }//end shouldSkipTest()


}//end class
