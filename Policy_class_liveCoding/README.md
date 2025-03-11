In Laravel, you can use **policies** and **Spatie** together to manage authorization effectively. Here’s how you can set it up:

### 1. Install Spatie Permissions
Since you're using Laravel 11, install Spatie's Permission package:

```bash
composer require spatie/laravel-permission
```

Then, publish the configuration file and run migrations:

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

### 2. Setup Roles and Permissions
Define roles and permissions in your `RoleSeeder.php`:

```php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

public function run()
{
    $admin = Role::create(['name' => 'admin']);
    $user = Role::create(['name' => 'user']);

    Permission::create(['name' => 'edit']);
    Permission::create(['name' => 'delete']);

    $admin->givePermissionTo(['edit Article plans', 'edit']);
}
```

### 3. Assign Roles to Users
In your `User` model (`app/Models/User.php`), add:

```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}
```

Then, assign a role when a user registers:

```php
$user->assignRole('user');
```

### 4. Create a Policy
Generate a policy:

```bash
php artisan make:policy ArticlePolicy --model=Article
```

Edit `ArticlePolicy.php`:

```php
use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{
    public function update(User $user, Article $article): bool
    {
        return $user->id === $article->user->id && $user->hasPermissionTo('edit');
    }
}
```

### 5. Register the Policy
In `AppServiceProvider.php`:

```php
use App\Models\Article;
use App\Policies\ArticlePolicy;

protected $policies = [
    Article::class => ArticlePolicy::class,
];
```

### 6. Use the Policy in Controllers or Blade
#### In Controllers:
```php
public function update(Request $request, Article $article)
{
    $this->authorize('edit', $article);
    // Update logic
}
```

#### In Blade Views:
```blade
@can('edit', $article)
    <a href="{{ route('Article.edit', $article) }}">Edit</a>
@endcan
```

### Summary:
- **Spatie handles roles and permissions**
- **Policies define granular access control**
- **Use `$this->authorize('edit', $article)` to enforce policies**