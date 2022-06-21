<?php
/*
 |--------------------------------------------------------------------------
 | Strategy Extention Bindings
 |--------------------------------------------------------------------------
 |
 | Here is where you can register aliases, that will extend existing Strategies.
 |
 */

return [
    /**
    Contract::class => function (Contract $original) {
        return new DecoratorImplementation(
            $original,
            \app()->make(NewDependency::class),
            \app()->make(SomeOtherDependency::class)
        );
    },
    */
];
