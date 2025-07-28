# Symfony Task Tracker
This is a small task tracker built with Symfony 6.4 and Tailwind CSS 3.4. It uses Twig templating, Doctrine ORM, and a SQLite database. Flash messages are handled with a small amount of vanilla JavaScript.

### Functionality
- View all tasks
- Add new tasks
- Toggle tasks as done/undone
- Soft delete tasks
- Flash message when adding a new task

### Routes
- `GET /tasks` – List all tasks
- `POST /tasks` – Add new task
- `POST /tasks/{id}/toggle` – Toggle task as done
- `POST /tasks/{id}/delete` – Soft delete task

### Quick Start
Run the following commands to install dependencies and start the local server.
#### With Docker:
```
docker-compose up -d --build
```
#### Without Docker:
```
composer install          
npm install
npm run dev
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
symfony serve
```
