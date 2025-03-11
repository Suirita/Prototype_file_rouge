# Multi-Language Support in Laravel and Vue.js

## Overview
This project provides multilingual support for both **Laravel (backend)** and **Vue.js (frontend)**, allowing users to switch between different languages dynamically.

---

## Features
- Laravel localization using language files.
- Vue.js translation handling with `vue-i18n`.
- Dynamic language switching.
- API-based language synchronization between Laravel and Vue.js.

---

## Laravel Localization Setup

### 1. Install Laravel Localization (Optional)
To install additional language support, run:
```sh
composer require laravel-lang/lang
php artisan lang:add en fr ar
```

### 2. Create Language Files
Run the following command to create language folders:
```sh
mkdir -p resources/lang/en && mkdir -p resources/lang/fr && mkdir -p resources/lang/ar
```

Now, create translation files:
```sh
touch resources/lang/en/messages.php
```
```sh
touch resources/lang/fr/messages.php
```
```sh
touch resources/lang/ar/messages.php
```

Inside each file, define translations:
```php
// resources/lang/en/messages.php
return [
    'welcome' => 'Welcome to our website!',
    'contact' => 'Contact Us',
];
```
```php
// resources/lang/fr/messages.php
return [
    'welcome' => 'Bienvenue sur notre site Web!',
    'contact' => 'Contactez-nous',
];
```
```php
// resources/lang/ar/messages.php
return [
    'welcome' => 'مرحبًا بك في موقعنا!',
    'contact' => 'اتصل بنا',
];
```

### 3. Set Default Language in Laravel
Modify `config/app.php`:
```php
'locale' => 'en',
'fallback_locale' => 'en',
```

### 4. Create Language Switcher Route
Add the following to `routes/web.php`:
```php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr', 'ar'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
});
```

### 5. Use Translations in Blade Views
```blade
{{ __('messages.welcome') }}
```
Create language switcher links:
```blade
<a href="{{ url('/lang/en') }}">🇺🇸 English</a>
<a href="{{ url('/lang/fr') }}">🇫🇷 French</a>
<a href="{{ url('/lang/ar') }}">🇸🇦 Arabic</a>
```

### 6. Persist Language Across Requests
Modify `AppServiceProvider.php` in `app/Providers/`:
```php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

public function boot()
{
    if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
    }
}
```

---

## Vue.js Localization Setup

### 1. Install `vue-i18n`
```sh
npm install vue-i18n
```

### 2. Create Language Files in Vue.js
Inside `src/locales/`, create JSON files:
- `src/locales/en.json`
- `src/locales/fr.json`
- `src/locales/ar.json`

Example:
```json
// en.json
{
  "welcome": "Welcome to our website!",
  "contact": "Contact Us"
}
```
```json
// fr.json
{
  "welcome": "Bienvenue sur notre site Web!",
  "contact": "Contactez-nous"
}
```
```json
// ar.json
{
  "welcome": "مرحبًا بك في موقعنا!",
  "contact": "اتصل بنا"
}
```

### 3. Configure Vue i18n in `main.js`
```javascript
import { createApp } from 'vue';
import { createI18n } from 'vue-i18n';
import App from './App.vue';
import en from './locales/en.json';
import fr from './locales/fr.json';
import ar from './locales/ar.json';

const i18n = createI18n({
  locale: 'en', // Default language
  fallbackLocale: 'en',
  messages: { en, fr, ar }
});

const app = createApp(App);
app.use(i18n);
app.mount('#app');
```

### 4. Use Translations in Vue Components
```vue
<template>
  <div>
    <h1>{{ $t("welcome") }}</h1>
    <button @click="changeLanguage('fr')">🇫🇷 French</button>
    <button @click="changeLanguage('en')">🇺🇸 English</button>
    <button @click="changeLanguage('ar')">🇸🇦 Arabic</button>
  </div>
</template>

<script>
export default {
  methods: {
    changeLanguage(lang) {
      this.$i18n.locale = lang;
    }
  }
};
</script>
```

---

## Synchronizing Laravel and Vue.js Translations

### 1. Create API Route in Laravel
Add this to `routes/api.php`:
```php
Route::get('/api/translations/{locale}', function ($locale) {
    App::setLocale($locale);
    return response()->json([
        'welcome' => __('messages.welcome'),
        'contact' => __('messages.contact'),
    ]);
});
```

### 2. Fetch Translations in Vue.js
```javascript
async function loadTranslations(locale) {
  const response = await fetch(`/api/translations/${locale}`);
  const messages = await response.json();
  i18n.global.setLocaleMessage(locale, messages);
  i18n.global.locale = locale;
}
```

---

## Conclusion
This setup ensures **seamless multi-language support** for both the **Laravel backend** and **Vue.js frontend**. 🎉

### Next Steps:
✅ Deploy the app.  
✅ Add more languages.  
✅ Improve UI for language selection.

---

💡 Need Help? Feel free to ask! 🚀

