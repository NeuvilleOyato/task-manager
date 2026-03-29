# Task Manager API

A REST API built with Laravel and MySQL for managing tasks.

## Live URL
https://task-manager-production-cee5.up.railway.app

## Tech Stack
- PHP / Laravel
- MySQL
- Deployed on Railway

## Local Setup

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure your database
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan serve`

## API Endpoints

### Create a task
POST /api/tasks
```json
{
    "title": "Task title",
    "due_date": "2026-04-01",
    "priority": "high"
}
```

### List tasks
GET /api/tasks
GET /api/tasks?status=pending

### Update task status
PATCH /api/tasks/{id}/status

### Delete a task
DELETE /api/tasks/{id}

### Daily report
GET /api/tasks/report?date=2026-04-01

## Business Rules
- Title cannot duplicate on the same due date
- Due date must be today or later
- Status can only progress: pending → in_progress → done
- Only done tasks can be deleted
