Feature: Developer generates a spec
  As a Developer
  I want to automate specs creation
  In order to avoid repetitive tasks and interruptions in development flow


  Scenario: Generating a spec by specifying a suite
    Given the config file contains:
    """
    suites:
      ci_controller:
        src_path:  %paths.config%/codeigniter/application/controllers
        spec_path: %paths.config%/ci_spec/controller

      ci_model:
        src_path:  %paths.config%/codeigniter/application/models
        spec_path: %paths.config%/ci_spec/model

    extensions:
      - ImportGenius\PhpSpecForCi\PhpSpecExtension
    """
    When I start describing the "FooBar" class and passed the suite option "ci_controller"
    Then a new spec should be generated in the "ci_spec/controller/spec/FooBarSpec.php":
    """
    <?php

    namespace spec;

    use PhpSpec\ObjectBehavior;
    use Prophecy\Argument;

    class FooBarSpec extends ObjectBehavior
    {
        function it_is_initializable()
        {
            $this->shouldHaveType('FooBar');
        }
    }

    """


  Scenario: Generating a spec that matches multiple suites and not specifying a suite results to an error
    Given the config file contains:
    """
      suites:
        ci_controller:
          src_path:  %paths.config%/codeigniter/application/controllers
          spec_path: %paths.config%/ci_spec/controller

        ci_model:
          src_path:  %paths.config%/codeigniter/application/models
          spec_path: %paths.config%/ci_spec/model

      extensions:
        - ImportGenius\PhpSpecForCi\PhpSpecExtension
      """
    When I start describing the "FooBar" class, it should result to an error


  Scenario: Generating a spec that matches a PSR4 while having a suite that also matches the class
    Given the config file contains:
    """
    suites:
      psr4_class:
        psr4_prefix: FooBar
        namespace:   FooBar
        src_path:    %paths.config%/FooBar
        spec_path:   %paths.config%/some_spec/FooBar

      ci_controller:
        src_path:  %paths.config%/codeigniter/application/controllers
        spec_path: %paths.config%/ci_spec/controller

    extensions:
      - ImportGenius\PhpSpecForCi\PhpSpecExtension
    """
    When I start describing the "FooBar\Awesomeness" class
    Then a new spec should be generated in the "some_spec/FooBar/spec/AwesomenessSpec.php":
    """
    <?php

    namespace spec\FooBar;

    use PhpSpec\ObjectBehavior;
    use Prophecy\Argument;

    class AwesomenessSpec extends ObjectBehavior
    {
        function it_is_initializable()
        {
            $this->shouldHaveType('FooBar\Awesomeness');
        }
    }

    """
