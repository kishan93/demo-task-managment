# Test Task

## Create a very simple Laravel web application for task management:

- Create task (info to save: task name, priority, timestamps)
- Edit task
- Delete task
- Reorder tasks with drag and drop in the browser.
  - Priority should automatically be updated based on this. #1 priority goes at top, #2 next down and so on.
- Tasks should be saved to a mysql table.
- BONUS POINT: add project functionality to the tasks.
  - User should be able to select a project from a dropdown and only view tasks associated with that project.

# Setup

## Requirements
- PHP 8.x
- Nodejs >= 16
- MySQL / SQLite

## Env 
- copy `.env.example` to `.env`
- set values in `.env`
- generate key
    ```shell
    php artisan key:generate
    ```

## Database
- create database
- set database config in `.env`

## Frontend Assets
- install node dependencies
    ```shell
    npm install
    ```
- compile assets
    ```shell
    npm run build
    ```

## Dev server
- start dev server
    ```shell
    php artisan serve
    ```

