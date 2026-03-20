# PHP Katas
[![License](https://img.shields.io/badge/license-MIT-22C55E)](LICENSE)
[![Docs](https://img.shields.io/badge/docs-live-3B82F6)](https://becoming-a-senior.github.io/php-katas/)
[![CI](https://github.com/becoming-a-senior/php-katas/actions/workflows/deploy.yml/badge.svg)](https://github.com/becoming-a-senior/php-katas/actions)

> **Work in Progress**: This project is actively being expanded. More will be added over time.

> A collection of common algorithm and data structure problems solved in PHP,
> each with multiple implementations, benchmarks, and tests.

## What's Included

- **Arrays**: Array Chunk, Group Of People, Two Sum
- **Strings**: Anagram, Palindrome, String Reverse, Vowels
- **Data Structures**: Linked List, Queue, Stack


## Requirements

**To run the full project (docs + tests):**
- [Docker](https://www.docker.com/) and Docker Compose

**To just run the PHP tests locally:**
- PHP 8.4+
- [Composer](https://getcomposer.org/)


## Getting Started

**With Docker** — runs tests, builds and serves the documentation:

```bash
git clone https://github.com/becoming-a-senior/php-katas.git
cd php-katas
make up
```

If you don't have Make installed:

```bash
docker compose up --build
```

Then open [http://localhost:8080](http://localhost:8080) to view the documentation.

**Without Docker** — install dependencies and run the tools:

```bash
git clone https://github.com/becoming-a-senior/php-katas.git
cd php-katas
composer install
composer tools
```
---

## Code Quality

```bash
composer lint      # Code style (PHP_CodeSniffer)
composer test      # Unit tests (PHPUnit)
composer analyse   # Static analysis (PHPStan)
composer tools     # Run all three
```

---

## Built With

- [PHPUnit 13](https://phpunit.de/): unit testing
- [PHP_CodeSniffer 4](https://github.com/squizlabs/PHP_CodeSniffer): code style
- [PHPStan 2](https://phpstan.org/): static analysis
- [PHPStan PHPUnit extension](https://github.com/phpstan/phpstan-phpunit): PHPUnit-aware static analysis
- [MkDocs Material](https://squidfunk.github.io/mkdocs-material/): documentation
- [hyperfine](https://github.com/sharkdp/hyperfine): benchmarking

---

## License

MIT — see [LICENSE](LICENSE) for details.

Made by [BecomingASenior.com](https://becomingasenior.com)