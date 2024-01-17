<?php

namespace spec\ImportGenius\PhpSpecForCi;

use PhpSpec\ObjectBehavior;
use DateTime;

class CiObjectBehaviorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('ImportGenius\PhpSpecForCi\CiObjectBehavior');
        $this->shouldHaveType(ObjectBehavior::class);
    }
    
    function it_should_set_the_behavior_of_get_instance_function(DateTime $expectedReturnObject)
    {
       $this->setReturnValueOfGetInstance($expectedReturnObject);
       $this->getExpectedReturnValue()->shouldReturn($expectedReturnObject);
       $ciGodObject = get_instance();
       expect($ciGodObject)->toBe($expectedReturnObject);
    }
}
