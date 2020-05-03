---
title: Menu
description: Introduction to Menus
extends: _layouts.documentation
section: content
---
# Menus {#menus}

What the user see on his phones prompting him/her are refer to as menus. It may be asking a question affirmating an input or even displaying a list of items that you expect the user to choose from.

## How is it created ?

Unlike website where you define the content with makeup language. Ussd does not provide you with that luxury. All your menus are to be strings. Does it include list ? Oh yes, everything is expected to be returned as a string.

## Look at this Example

Suppose you want to create a menu like this:

```txt
Welcome to Paradise

Select an option
1. Buy Airtime
2. Buy Data
3. Pay Bills

9. Next Page
#. Back
0. Main Menu
```

You will have to defined it as such

```php
"Welcome to Paradise\n\nSelect an option\n1. Buy Airtime\n2. Buy Data\n3. Pay Bills\n\n9. Next Page\n#.Back\n0. Main Menu"
```

## Why need the menu ?

It simple to create the menu right ? Yes. But suppose you are getting the list from an API, you have to get the list, loop and append to the string. Don't forget you may have to paginate since there is a limit to the number of characters the phone can display. And that may not be the only list in your application. Hard coding it too will make your application hard to maintain.

Just focus on how you want to menu to look, we take care of the hassle for you.