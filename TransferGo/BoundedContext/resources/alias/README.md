# Contract's Alias/Implementation mapping

## Bindings

Use `bindings.php` file to add default mapping of Contracts to their Implementations.

Every time a Contract is injected, Dependency Injection will instantiate and inject the implementation class.

## Singletons

Same as regular binding, but same implementation instance will be injected, on every class that requires a
given Contract.

## Extensions

Extensions will be used together with bBindings and/or Singletons.
These will extend (Decorate) existing implementations, eg:. Caching.
