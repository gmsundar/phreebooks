Translator Module 

Installation Procedure:
1. unzip and install in the module directory.
2. Go to Admin -> Modules and install the module.
3. You may have to set permission and re-log in.

NOTE: If you did an upgrade, you will need to uninstall your prior version.
If you have the zip file you sent me, use that to do the upload. I
tested this with your zip file you sent me and all seemed well.
Now to build a translation.

Usage:
The first step is to upload an older release of the language to
translate to (i.e. fr_fr for release 2.1).

1. Click on the Upload icon and enter the language to create (i.e.
fr_fr), enter All for all modules (this is necessary since the
modules from 2.1 don't align with 3.0), enter the release number
(2.1 since its an older version), Select a zipped language file to
upload. The file will be uploaded and all 'defines' will be
extracted into the db.

2. Import your current translation (which will be en_us for now
since that is all that has been released). Language: en_us, Module:
All (we'll do all at once), leave the install directory alone for
now, it will need to be imported separately.

3. Import the install directory. Language: en_us, Module: install,
directory (default is install but if you renamed the directory fix
it here)

Now the fun part, creating new translation files. This is done 
module by module.

4. Click New Translation icon. Enter language to create (i.e.
fr_fr), select a source module and language (which needs to be en_us
at this time since that is all there is). Select the check box and
enter best guess language (i.e. fr_fr from step 1 above). This will
create a new translation and fill in the translation with the source
language, if the same constant is found in the overwrite
translation, it will overwrite the translation. After the import,
you should be left at the edit screen where you will see a mixture
of English and French translations.

5. Repeat for more modules.
