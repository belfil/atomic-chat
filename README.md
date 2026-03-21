# ⚛️ Atomic Chat

[![Latest Version](https://img.shields.io/packagist/v/belfil/atomic-chat.svg?style=flat-square)](https://packagist.org/packages/belfil/atomic-chat)  
![GitHub Actions](https://github.com)  
[![License](https://img.shields.io)](LICENSE.md)

**Atomic-fast, scalable messaging engine for Laravel.**

Built for high-performance applications with native **Laravel Reverb** support, a modular architecture, and a clean Fluent API.

> ⚠️ **Status:** Atomic Chat is currently in **Alpha**. Expect changes.

---

## ✨ Features

- 🧩 **Actors System**  
  Attach any Eloquent model (User, Bot, Company) to conversations.

- 🔗 **Fluent Builder API**  
  Elegant, chainable syntax for creating chats and messages.

- 🧱 **Modular Architecture**  
  Enable only what you need:
    - Streams
    - Private Chats
    - Groups

- ⚡ **Performance First**  
  Optimized indexes and efficient "read receipts" via watermarks.

---

## 🚀 Installation

Install via Composer:

```bash
composer require belfil/atomic-chat
```

Publish config (optional but recommended):

```bash
php artisan vendor:publish --tag="atomic-chat-config"
```

Run migrations:

```bash
php artisan migrate
```

---

## 💬 Quick Start

### 1. Stream Conversations

Streams are the simplest chat type — ideal for logs, feeds, or public messaging.

```php
use Belfil\AtomicChat\Stream\Models\StreamChat;

// Create a stream
$chat = StreamChat::new()->save();
```

---

### 2. Send Messages

Using the Chat instance:

```php
$chat->message()
    ->content('Hello Atomic World! ⚛️')
    ->save();
```

Or via Message Builder:

```php
use Belfil\AtomicChat\Stream\Models\StreamMessage;

StreamMessage::new()
    ->content('Fluent API is awesome')
    ->chat($chat)
    ->save();
```

---

### 3. Retrieve Messages

Standard Eloquent relationships:

```php
$messages = $chat->messages()
    ->latest()
    ->get();
```

---

## 🧩 Modules

Atomic Chat is fully modular. Configure modules in:

`config/atomic-chat.php`

```php
'modules' => [
    'stream' => [
        'enabled' => true,
        'provider' => \Belfil\AtomicChat\Stream\ServiceProvider::class,
    ],
],
```

---

## 🛣️ Roadmap

- [ ] Private chats module
- [ ] Group conversations
- [ ] WebSocket
- [ ] Message reactions
- [ ] Attachments

---

## 🤝 Contributing

PRs, ideas, and feedback are welcome — especially during Alpha.

---

## 📄 License

See [LICENSE.md](LICENSE.md)