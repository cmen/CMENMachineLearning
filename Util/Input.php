<?php

namespace MachineLearning\Util;

/**
 * Class Input
 * @package MachineLearning\Util
 */
class Input
{
    const NUM_INPUT = 5;

    /**
     * Generate input for a comment.
     *
     * @param string $comment
     *
     * @return array
     */
    public function getInputFromComment($comment)
    {
        $input = [];

        // 1 : lenght
        $input[] = strlen($comment);

        // 2 : count $
        $input[] = substr_count($comment, '$');

        // 3 : count =
        $input[] = substr_count($comment, '=');

        // 4 : count ->
        $input[] = substr_count($comment, '->');

        // 5 : count ;
        $input[] = substr_count($comment, ';');

        return $input;
    }
}
