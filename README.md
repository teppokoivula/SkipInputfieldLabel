Skip Inputfield Label module for ProcessWire
--------------------------------------------

This module makes the skipLabel option for inputfields available via the admin field editor, making it possilbe to visually hide the label or remove it completely for any given field. Since modules such as FormBuilder also use regular inputfields, this should also work for them, as long as the module in question doesn't somehow override inputfield settings.

Please note that this module may be used to create non-userfriendly admin interfaces; especially options that completely remove the label should be avoided, as they can make things harder to grasp, and they are also bad in terms of accessibility.