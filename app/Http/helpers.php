<?php

function setActiveRoute($name)
{
    return request()->routeIs($name) ? 'active' : '';
}