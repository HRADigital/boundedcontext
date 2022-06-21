# Framework layer

This layer will contain any code that might be more or less linked with the Framework being used.

This layer should not contain any Business related code, and should be as thin as possible, providing only
entry points to _Application Processes_.

Examples of this can be Controllers, Requests, Handlers, JHobs, Listeners, Middlewares, etc...

This layer could be completely replaced, with zero impact to the _Business Core_ of the Bounded Context
(_Application + Domain layers_).
