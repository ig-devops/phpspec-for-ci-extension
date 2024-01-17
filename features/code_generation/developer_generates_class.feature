Feature: Developer generates a class
  As a Developer
  I want to automate class creation
  In order to avoid repetitive tasks and interruptions in development flow

  Scenario: Generating a class without a namespace for a specified suite
    Given the config file contains:
    """
    suites:
      ci_controller:
        src_path: %paths.config%/codeigniter/application/controllers
        spec_path: %paths.config%/ci_spec/controller

      ci_model:
        src_path:    %paths.config%/codeigniter/application/models
        spec_path:   %paths.config%/ci_spec/model

    extensions:
      - ImportGenius\PhpSpecForCi\PhpSpecExtension
    """
    And I have started describing the "FooBar" class for "ci_controller" suite
    When I run phpspec and answer "y" when asked if I want to generate the code
    Then a new class should be generated in the "codeigniter/application/controllers/FooBar.php":
      """
      <?php

      class FooBar
      {
      }

      """