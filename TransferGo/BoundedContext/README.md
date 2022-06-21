# Bounded Context

Bounded context is organized into 3 different folders:

- `resources`
- `src`
- `tests`

Each of this folders, will only contain Bounded Context's specific code, keeping it in complete isolation from other
Bounded Contests (_when applicable_).

## Resources

This directory contains all configurable/non-executable code for this Bounded Context.
Either proper Configuration parameters, or Contract's aliases, Route's declarations, Migrations, Views,
Language Translations, etc..

## Source (src)

The Source folder will contain the actual executable code for the Bounded Context.

This is were the testable code os located at.

## Tests

This folder will contain all relevant tests for the `/src` folder's code.
