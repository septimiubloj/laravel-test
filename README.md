# Welcome to Neurony Laravel Test

In this test, you will have to fulfill several tasks, by fully respecting the requirements and restrictions.

# Description

The application consists of only the homepage, fully functional, filtering of `App\Models\Post` records is implemented.

# Duration

3-5 hours 

# Installation

```
git clone git@github.com:Neurony/laravel-test.git .

mv .env.example .env

php artisan key:generate

php artisan migrate
```

*** Any other necessary steps depending on your local environment

   
# Tasks

**You must follow all REQUIREMENTS & RESTRICTIONS for each task**

## Task 1

Populate the database with 50 posts.

**Requirements**

- No matter how many times I run the seeder I want to always have exactly 50 posts in the database table.
- Those exact 50 posts have to be the posts from my latest execution of the command.

**Completed**

This task is considered completed when by running the command (one or more times) I will have exactly 50 posts in my `posts` database table. 

## Task 2

This application filters post records using the `App\Repositories\DatabasePostSearchRepository` class, which if you've inspected you noticed that the `DB` facade is used to directly access the database.

You will have to switch the filtering logic to work based on Eloquent, thus using your `App\Models\Post` model as reference instead of the `DB` facade. 

**Requirements**    

- Create a new repository class called `App\Repositories\EloquentPostSearchRepository` and in here write the code for filtering the records      

**Restrictions**

- You cannot change anything inside `App\Http\Controllers\HomeController`, except for what parameters the `index` method receives.
- Even though you can change the method signature of the `index` method, present on the `App\Http\Controllers\HomeController`, you are not allowed to bind `App\Repositories\EloquentPostSearchRepository` to it.

**Completed**

This task is considered complete when upon entering the homepage, I'm able to filter posts in exactly the same way as before, but using the `App\Repositories\EloquentPostSearchRepository` functionality.

## Task 3

Restrict users to filter posts based on their IP.

**Requirements**    

- Each IP can filter posts once every 6 seconds
- If the same IP tries to filter posts more than once in a 6 second time period, throw an exception
- Any IP can view the homepage (as is, not filtered whatsoever) as many times as he pleases, without being restricted      

**Completed**

This task is considered complete when a user cannot filter posts more than once every 6 seconds, but can view the default homepage as many times as he wants (by refreshing the page).

## Task 4

Write tests that assert your `App\Repositories\EloquentPostSearchRepository` class filters posts correctly.

**Requirements**    

- Write at least on test for every filtering method present inside `App\Repositories\EloquentPostSearchRepository`

**Restrictions**

- Place your tests inside the `tests/Integration/EloquentPostSearchRepositoryTest.php` class.       

**Completed**

This task is considered complete when each filter method present on the `App\Repositories\EloquentPostSearchRepository` is tested and I can run the tests by running `vendor/bin/phpunit` from the project root.

## Task 5

Develop a deploy script, that when ran, it will install the project from ground up, without me having to run every command necessary in order to setup a Laravel project.

**Assumptions**    

- The person installing the project is responsible for having his local environment setup already
- The person installing the project is responsible for having the `.env` file setup before running the script
- The person installing the project is responsible for having a working database created before running the script

**Requirements**    

- The script should accept a parameter (the git `branch`), so I can run this on any environment (dev, staging, production).
- **PRO TIP:** given the `branch` parameter requirement, one step in your deploy script should be `git pull origin {branch}`

**Completed**

This task is considered complete when only after the following commands, I will have your project up & running on my local machine:
- `git clone {your-repo}`
- `run your deploy script`

# Happy coding 
