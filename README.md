# Task Manager API

A REST API built with Laravel and MySQL for managing tasks, with a frontend dashboard built using HTML, CSS and Vanilla JavaScript.

## Live URL
https://task-manager-production-cee5.up.railway.app

## Tech Stack
- PHP / Laravel
- MySQL
- Vanilla JavaScript (frontend)
- Deployed on Railway

## Local Setup

1. Clone the repository
```
git clone https://github.com/NeuvilleOyato/task-manager.git
```
2. Install dependencies
```
composer install
```
3. Copy `.env.example` to `.env` and configure your database
```
cp .env.example .env
```
4. Generate app key
```
php artisan key:generate
```
5. Create a MySQL database called `task_manager` and update `.env` with your credentials
6. Run migrations
```
php artisan migrate
```
7. Start the server
```
php artisan serve
```
8. Visit `http://127.0.0.1:8000`

## Deployment (Railway)

1. Push project to GitHub
2. Create a new project on Railway and deploy from GitHub repo
3. Add a MySQL database service on Railway
4. Add the following environment variables to your Laravel service:
```
APP_ENV=production
APP_DEBUG=false
APP_KEY=your_app_key
APP_URL=your_railway_url
DB_CONNECTION=mysql
DB_HOST=your_mysql_host
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
5. Set pre-deploy command to `php artisan migrate --force`
6. Set start command to `php artisan serve --host=0.0.0.0 --port=8080`

## Database
- Database used: **MySQL**
- SQL dump file included: `task_manager.sql`

## API Endpoints

### Create a task
```
POST /api/tasks
```
```json
{
    "title": "Task title",
    "due_date": "2026-04-01",
    "priority": "high"
}
```

### List tasks
```
GET /api/tasks
GET /api/tasks?status=pending
```

### Update task status
```
PATCH /api/tasks/{id}/status
```

### Delete a task
```
DELETE /api/tasks/{id}
```

### Daily report
```
GET /api/tasks/report?date=2026-04-01
```

## Business Rules
- Title cannot duplicate on the same due date
- Due date must be today or later
- Status can only progress: pending → in_progress → done
- Only done tasks can be deleted