# Task List

## How to run
- `composer install`
- create `.env` from `.env.example`
- set up database configurations per your existing database install
- `php artisan migrate`
- `php artisan serve`

The application will be running at http://127.0.0.1:8000

## Features
- [ ] User can register and login with username, password and email.
- [ ] User can create a workspace to work with.
- [ ] In every workspace, user can create task with a compulsory deadline.
- [x] The task can be set as completed or incomplete and the status is shown in a task view.
- [x] Incomplete task must show how far time to deadline in human-readable way. eg: (2 days 5 minutes remaining).
- [x] Completed task need to show when was the task has been completed in human-readable way. eg: (2 days ago, 5 minutes ago)
- [ ] Each workspace and task must be protected that another user can't access that workspace and task.

## Developer notes
- Application can be started using `php artisan serve`.
- I tried to attempt to set up authentication, but I had trouble grasping Laravel authentication and authorization system (it's not very clear how it can be implemented).
- Workspace is skipped as I need to have authentication set up first in order to make it work.
- Website is in standard HTML because that's my extent of my "front-end" skills.

### Extra notes
- I should consider writing more web applications on Laravel. There's quite a bunch of things that made me want to port my existing Python apps to Laravel as a base to play around