<?php

namespace Railsbank\Query;

interface QueryInterface
{
    public function getInputFilterSpecification() : array;
}
