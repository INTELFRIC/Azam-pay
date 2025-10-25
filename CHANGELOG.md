# UPGRADE GUIDE: Migrating to v1.0 (Laravel 12 Compatibility)

This major release introduces full compatibility with Laravel 12 and requires PHP 8.2 or newer.

## 1. Prerequisites

- **PHP Version**: Ensure your project is running **PHP 8.2** or higher.
- **Laravel Version**: Ensure your project is running **Laravel 12** or higher.

## 2. Composer Dependency Update

Update your `composer.json` file to require the new major version of the package.

```bash
composer require intelfric/laravel-azampay "^1.0"
```

This will automatically update the package and its dependencies.

## 3. Breaking Changes and Migration Steps

### A. Service Provider and Facade

The explicit service binding in `AzampayServiceProvider` has been removed and replaced with a conventional singleton binding.

**No action is required** for most users, as the package relies on Laravel's automatic package discovery and the existing Facade (`Azampay::class`).

### B. Configuration Access in Service Class

The internal `AzampayService` class has been refactored to lazily initialize its configuration and token generation. This resolves issues in testing environments.

**No action is required** for consumers using the public API.

### C. Test Suite

The package's internal test suite has been upgraded to use:

- `orchestra/testbench:^10.0`
- `pestphp/pest:^3.0` and `pestphp/pest-plugin-laravel:^3.0`
- `larastan:^3.0` for static analysis

This ensures the package is tested against the latest Laravel standards.

### D. Route Handling (Minor Change)

The internal callback route logic in `routes/azampay_api.php` has been updated to use the global `event()` helper for dispatching the `AzampayCallback` event.

**No action is required** unless you were manually overriding the package's routes.

## 4. Next Steps

After updating your dependencies, run your application's test suite to ensure full compatibility.