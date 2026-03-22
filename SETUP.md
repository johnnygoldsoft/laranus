# Laranus API - Setup Guide

## Installation

### Local Development

1. **Clone the repository**
```bash
git clone https://github.com/johnnygoldsoft/laranus.git
cd laranus
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
php artisan jwt:secret
```

4. **Setup database**
```bash
php artisan migrate
```

5. **Run development server**
```bash
php artisan serve
```

The API will be available at `http://localhost:8000`

## API Endpoints

### Authentication

- `POST /api/auth/register` - Register a new user
- `POST /api/auth/login` - Login user
- `GET /api/auth/me` - Get authenticated user (requires token)
- `POST /api/auth/logout` - Logout user (requires token)
- `POST /api/auth/refresh` - Refresh JWT token (requires token)

### Health Check

- `GET /api/health` - Check API status

## Environment Variables

Key variables to configure:

```
APP_NAME=Laranus
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laranus
DB_USERNAME=root
DB_PASSWORD=your_password

JWT_SECRET=your_jwt_secret
JWT_ALGORITHM=HS256
JWT_TTL=60

CORS_ALLOWED_ORIGINS=https://your-frontend-domain.com
FRONTEND_URL=https://your-frontend-domain.com
```

## Deployment

### Using Docker

1. **Build the image**
```bash
docker build -t laranus-api .
```

2. **Run the container**
```bash
docker run -p 8000:8000 \
  -e APP_KEY=base64:your_key \
  -e JWT_SECRET=your_secret \
  -e DB_HOST=your_db_host \
  -e DB_DATABASE=laranus \
  -e DB_USERNAME=root \
  -e DB_PASSWORD=your_password \
  laranus-api
```

### Using Railway

1. Push to GitHub
2. Connect your GitHub repository to Railway
3. Set environment variables in Railway dashboard
4. Deploy

## Testing

Run tests with:
```bash
php artisan test
```

## API Response Format

All API responses follow this format:

```json
{
  "message": "Success message",
  "data": {},
  "access_token": "token_here",
  "token_type": "Bearer"
}
```

## Authentication

Include the JWT token in the Authorization header:

```
Authorization: Bearer your_jwt_token_here
```

## Support

For issues or questions, please refer to the Laravel and JWT-Auth documentation.
