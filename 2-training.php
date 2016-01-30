<?php

namespace MachineLearning;

include 'Util/Input.php';
include 'Util/Output.php';

$numLayers = 3;
$numInput = Util\Input::NUM_INPUT;
$numNeuronsHidden = 9;
$numOutput = Util\Output::NUM_OUTPUT;
$maxEpochs = 500000;
$epochsBetweenReports = 1000;
$desiredError = 0.001;

$ann = fann_create_standard($numLayers, $numInput, $numNeuronsHidden, $numOutput);

if ($ann) {
    fann_set_activation_function_hidden($ann, FANN_SIGMOID_SYMMETRIC);
    fann_set_activation_function_output($ann, FANN_SIGMOID_SYMMETRIC);

    if (fann_train_on_file($ann, 'Data/training', $maxEpochs, $epochsBetweenReports, $desiredError)) {
        fann_save($ann, 'Data/training_result');
    }

    fann_destroy($ann);
}
