<?php

namespace MachineLearning;

use MachineLearning\Util\Input;

include 'Util/Input.php';

$ann = fann_create_from_file('Data/training_result');
if (!$ann) {
    die("ANN could not be created");
}

$input = new Input();

$comments[] = '//simple comment';
$comments[] = '/**
 * Returns the same version for all assets.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */';
$comments[] = '// $this->getAll(3);';
$comments[] = '//fix for v1.2';
$comments[] = '/* if ($path && \'/\' == $path[0]) {
            return \'/\'.$versionized;
        }*/';
$comments[] = '// We have server(s) -> apply default configuration';
$comments[] = '/* The <info>%command.name%</info> command clears the application cache for a given environment
and debug mode:

  <info>php %command.full_name% --env=dev</info>
  <info>php %command.full_name% --env=prod --no-debug</info>*/';
$comments[] = '// avoid shutting down the Kernel if no request has been performed yet
        // WebTestCase::createClient() boots the Kernel but do not handle a request';

foreach ($comments as $comment) {
    $result = fann_run($ann, $input->getInputFromComment($comment));

    printf("COMMENT : %s\n", $comment);
    printf("RESULT : %f\n", $result[0]);

    if ($result[0] > 0.9) {
        echo ("!!! CODE DETECTED !!!\n");
    }

    echo ("\n");
}

fann_destroy($ann);
