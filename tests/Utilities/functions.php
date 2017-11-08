<?php

function create($class, $attributes = [], $times = NULL)
{
    return factory($class, $times)->create($attributes);
}

function make($class, $attributes = [], $times = NULL)
{
    return factory($class, $times)->make($attributes);
}
