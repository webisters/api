# Webisters API

Webisters API Project This project is intended as an application-level codebase that can be configured and extended for local or deployed environments.

## What Is Included
- Practical building blocks for API-first workflows and endpoint interaction.
- A project-oriented foundation for building and organizing application features.
- Configuration and dependency wiring that supports repeatable local setup.

## Setup
```bash
composer global require webisters/webisters
php webisters new-api api
cd api
```

## Run Locally
```bash
php webisters start
```
If the custom runtime command is unavailable, use: `php -S localhost:8000 -t public`.

## Testing
```bash
vendor/bin/phpunit
```

## Project Structure
- `app/`: Application code, modules, and domain logic.
- `boot/`: Bootstrap and startup configuration scripts.
- `public/`: Public web root and entrypoint files.
- `tests/`: Automated tests and supporting fixtures.

## Support
- Issues: https://github.com/webisters/api/issues
- Source: https://github.com/webisters/api
- Documentation: https://webisters.com
- Forum: https://github.com/webisters/forum
- Email: support@webisters.com

## License
MIT
