---
title: Menu
description: Introduction to Menus
extends: _layouts.documentation
section: content
---
# Menus {#menus}

Menus are two-way flash messages; the user opens a menu and picks from a set number of options. Ideal for surveys, votes and customer feedback. Menus can be both menus and responses without the user needing to download a mobile application to interact.

## How is it created?

Unlike a website where you define the content with a makeup language. Ussd does not provide you with that luxury. All your menus are strings including lists.

## Example

Suppose you want to create a menu like this:

```txt
Welcome to Laravel Ussd

Select an option
1. Buy Airtime
2. Buy Data
3. Pay Bills

9. Next Page
#. Back
0. Main Menu
```

You will have to define it as such

```php
"Welcome to Laravel Ussd\n\nSelect an option\n1. Buy Airtime\n2. Buy Data\n3. Pay Bills\n\n9. Next Page\n#.Back\n0. Main Menu"
```

## Why the need for menu?

Suppose you are getting the list from an API, you have to get the list, loop and append to the string. Don't forget you may have to paginate since there is a limit to the number of characters a phone can display. That may not be the only list in your application. Hard coding will make your application harder to maintain.

Just focus on how you want your menu to look, we take care of the hassle for you.
