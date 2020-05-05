---
title: Creating States
description: Quickly Scafford States
extends: _layouts.documentation
section: content
---
# Creating States {#creating-states}

Laravel uses PSR-4 autoloading to load all the resources in the *project/app* directory. That means you don't have to manually require or include it. You are expected to put your application logic in this directory. You can create states in the *project/app* directory or under any sub directory. How deep they are nested does not matter.

## Meet the Artisan State Command {#state-command}

We provide a ussd artisan command which allows you to quickly create new states.

```bash
php artisan ussd:state Welcome
```

This will generate a class called Welcome.php in *app/Http/Ussd* directory. If the directory does not exist, it will be created for you.

### Why in *app/Http/Ussd* {#state-directory}

That is the default root directory specified in *config/ussd.php*. If the configuration file does not exist, you can publish it, [see](../installation#installation-config).

To change the default directory to *app/Ussd* change the *class_namespace* variable in the configuration to `App\\Ussd` before running the command.

### Nested States {#state-nesting}

Your default namespace is *app/Http/Ussd* but you want some states nested. No need to be changing configurations. For example, if you want to create Amount.php state class in *app/Http/Ussd/Airtime*. Just specify the relative path like this:

Linux/Unix

```bash
php artisan ussd:state airtime/amount
```

Windows

```bash
php artisan ussd:state airtime\amount
```

### Why are the directory and class starting with caps. {#state-directory-convention}

Take a good look are the file structure in app. That the format they all use. It simple convention and we ensure you stick with that, so if enter airtime/amount for Airtime/Amount, we just fix that for you. Isn't it cool?