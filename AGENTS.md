# AGENTS.md

## Project Ownership

Treat this repository as a production application.

Before making changes, understand the existing architecture, product intent, data flow, authentication, authorization, database model, external integrations, build system, and deployment configuration.

Do not make blind changes.

## Primary Objective

Improve the project while preserving its intended product behavior and data integrity.

Prefer:

- secure architecture
- maintainable code
- stable dependencies
- clear structure
- strong UX
- responsive design
- accessibility
- testability
- production reliability

Do not preserve obsolete architecture only because it already exists.

## Autonomy

Do not ask the user about minor implementation decisions.

Investigate the repository and choose the most defensible solution.

Only stop when genuinely blocked by something external such as:

- missing credentials
- unavailable external account access
- destructive decision requiring business approval
- missing information that cannot reasonably be inferred

If blocked by credentials, complete the integration structure and document the missing credential instead of abandoning the task.

## Dependency Rules

Do not blindly upgrade every package to the newest version.

For each major dependency:

1. verify whether it is maintained
2. inspect breaking changes
3. verify compatibility with the rest of the stack
4. upgrade it when appropriate
5. replace it if obsolete
6. remove it if unnecessary

Prefer stable production releases.

Avoid experimental or prerelease dependencies unless necessary.

## Framework Migrations

When upgrading a framework:

- follow the official migration path
- migrate deprecated APIs
- remove obsolete compatibility code
- update configuration
- update build tooling
- update tests
- update deployment files
- verify production build afterward

Do not leave the project half-migrated.

## Architecture

Keep responsibilities clearly separated.

Avoid:

- giant components
- giant service files
- duplicated business logic
- circular dependencies
- hidden side effects
- unnecessary abstractions
- unnecessary global state
- client-side enforcement of server-side security rules

Prefer simple, explicit architecture.

## Security

Never weaken security to make implementation easier.

Review changes for:

- authentication
- authorization
- object-level authorization
- input validation
- output encoding
- XSS
- injection
- CSRF where applicable
- SSRF where applicable
- insecure redirects
- sensitive logging
- secret exposure
- unsafe file uploads
- insecure session handling
- insecure client-side trust
- dependency vulnerabilities

Secrets must never be committed.

Use environment variables for secrets.

Do not expose server secrets to client bundles.

## Database

Treat data migrations as potentially destructive.

Before schema changes:

- understand existing data relationships
- preserve data whenever possible
- create safe migrations
- avoid destructive resets
- maintain referential integrity

Do not delete production data merely to simplify a migration.

## Feature Completion

When you find:

- TODO
- FIXME
- placeholder UI
- stub endpoint
- disabled control
- incomplete page
- partial workflow
- mocked production behavior

determine whether the intended behavior can be inferred from the repository.

If it can, complete it.

Do not invent unrelated features.

## UI and Design

Maintain a coherent design system.

The UI should be:

- responsive
- accessible
- consistent
- clear
- modern
- usable on mobile
- visually hierarchical

Improve poor UX when encountered.

Avoid decorative complexity without functional value.

Handle:

- loading states
- empty states
- error states
- disabled states
- validation feedback
- responsive layouts

## Code Quality

Prefer readable code over clever code.

Use descriptive names.

Avoid unnecessary comments that merely repeat the code.

Remove:

- dead code
- unused imports
- obsolete files
- debugging output
- stale comments
- unused dependencies
- temporary migration hacks once no longer needed

## Tests

Do not delete legitimate tests merely because they fail.

Fix the implementation.

Add meaningful tests for critical behavior.

Where applicable, run:

- unit tests
- integration tests
- end-to-end tests
- lint
- type checking
- production build

## Validation

Before declaring a task complete, verify the relevant project commands succeed.

At minimum, when available:

- dependency install
- lint
- type check
- tests
- production build

Do not declare success based only on code inspection.

## Error Handling

Do not assume happy-path behavior.

Handle relevant cases such as:

- invalid input
- missing data
- unauthorized access
- expired sessions
- API failures
- network failures
- duplicate actions
- external integration failures

## Documentation

When architecture, setup, dependencies, environment variables, or deployment behavior changes, update the relevant documentation.

Keep example environment files synchronized with actual configuration.

## Git Changes

Keep changes logically coherent.

Do not mix unrelated refactors into a focused task unless required by the migration.

Do not commit generated secrets, credentials, local databases, build artifacts, or machine-specific files.

## Definition of Done

A change is not complete merely because it compiles.

It should also be:

- functionally correct
- secure
- tested where appropriate
- compatible with the rest of the project
- documented when necessary
- free of obvious dead code
- production-buildable