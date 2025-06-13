# Install dependencies

```bash
composer install
```

```bash
npm install
```

# Copy .env.example to .env

## For windows

```bash
copy .env.example .env
```

## For linux

```bash
cp .env.example .env
```

# Generate key

```bash
php artisan key:generate
```

# Run migration

```bash
php artisan migrate
```

# Run seeder (optional)

```bash
php artisan db:seed
```

# Run storage (optional)

```bash
php artisan storage:link
```

# Run Vite development server

```bash
npm run dev
```

# Run Laravel development server

```bash
php artisan serve
```