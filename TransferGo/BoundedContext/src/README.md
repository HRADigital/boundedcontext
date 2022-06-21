# Bounded Context's source code

Bounded Context uses Onion Architecture, with the following layers:

- Application (_for Application related Processes, and related objects_).
- Domain (_for Domain related actions, and related objects/Models_).
- Framework (_for Framework related code. Eg:. Controllers, Requests, CLI Commands, Handlers, Listeners, ..._).
- Infrastructure (_for Infrastructure related code. Eg:. Repositories, Decorators, Adapters, Proxies, ..._).

## Loading and Configuration

Loading and Configuration is done via the Service Provider `BoundedContextServiceProvider`.
If resources are all loaded and configured in appropriate files under `/resources`, no extra configuration
should be required.

Please register Service Provider in appropriate section in `/bootstrap/app.php`, so that Lumen is able to configure
the Bounded Context. For Laravel, register it in appropriate section in `/app/config/app.php`.
