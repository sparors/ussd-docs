---
title: State
description: Introduction to States
extends: _layouts.documentation
section: content
---
# States {#states}

When a user dials a ussd code. A menu is presented to him/her. There may or may not be an input field. If there is a input field, you user is expected to enter some text to take him to another page. All the pages this user sees as he navigates the ussd application are refer to as **States**.

You can think of States as pages in a website while the inputs are the various navigation options he chooses to get to those pages.

Just as website pages are different and have their own functions, so are states. You may use some states to gather information from the user, some to process those information and probably some to do both.