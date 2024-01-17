#Phpspec for CodeIgniter Extension

##Using the extension
1. Add the following repository entry in your ```composer.json``` file:
```
    ...
    "repositories": [
        ...
        {
          "type": "git",
          "url": "git@bitbucket.org:code-ninja/phpspec-for-ci-extension.git"
        }
        ...
    ]
```
2. Add the following repository entry in your ```composer.json``` file:
```
    ...
    "require-dev": {
        ...
        "importgenius/phpspec-for-ci-extension" : "dev-master"
        ...
    }
```
3. Enable the extension in your ```phpspec.yml``` file:
```
...
extensions:
    - ImportGenius\PhpSpecForCi\PhpSpecExtension
...
```

##For further technical details, see the feature files in this folder:
```
vendor/importgenius/phpspec-for-ci-extension/features/code_generation
```

##Running The Tests

###Behat
```
$ bin/behat
```

###Phpspec
```
$ bin/phpspec run
```

###PHPMD
```
$ bin/phpmd src/ text cleancode,codesize,controversial,design,naming,unusedcode
```

###PHPCS
```
$ bin/phpcs src/ --standard=PSR2
```