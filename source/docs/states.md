---
title: State
description: Introduction to States
extends: _layouts.documentation
section: content
---
# States {#states}

When a user dials a ussd short code. **E.g. (*392#)**. A menu is presented to him/her. There may or may not be an input field. If there is an input field, the user is expected to enter some text to take him to another page. All the views a user sees as he navigates through the ussd application are refered to as **States**.

You can think of States as pages in a website while inputs are the various navigation options that are linked to get to the appropriate pages.

Just as website pages are different and have their own functions, so are States. You may use States to gather information from the user, process those information or do both.