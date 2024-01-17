<?php

namespace ImportGenius\PhpSpecForCi {
    
    use PhpSpec\ObjectBehavior;

    class CiObjectBehavior extends ObjectBehavior
    {
        /**
         * @var Object
         */
        private static $expectedReturnValue;

        public function setReturnValueOfGetInstance(Object $expectedReturnValue)
        {
            self::$expectedReturnValue = $expectedReturnValue;
        }

        /**
         * @return Object
         */
        public static function getExpectedReturnValue()
        {
            return self::$expectedReturnValue;
        }
    }
}

namespace {
    
    // @codingStandardsIgnoreStart
    use ImportGenius\PhpSpecForCi\CiObjectBehavior;
    // @codingStandardsIgnoreEnd
    
    /**
     * @return Object
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    function get_instance()
    {
        return CiObjectBehavior::getExpectedReturnValue();
    }
}
