Installation du Plugin AdminDesign (qui permet de designer l'interface d'administration)

1. Copier le fichier suivant dans "lib/form/doctrine"
    - plugins/ndAdminDesignPlugin/lib/form/doctrine/interfaceSettingsForm.class.php 

2. Copier la fonction "executeInterface" du fichier suivant dans "apps/admin/modules/settings/lib/BaseSettingsActions.class.php"
    - plugins/ndAdminDesignPlugin/modules/settings/lib/BaseSettingsActions.class.php

3. Copier le fichier suivant dans "apps/admin/modules/settings/templates/"
    - plugins/ndAdminDesignPlugin/modules/settings/templates/interfaceSuccess.php

4. Copier la ligne (<li> de l'interface) du fichier suivant dans "apps/admin/modules/settings/templates/menu.php"
    - plugins/ndAdminDesignPlugin/modules/settings/templates/menu.php

5. Copier le fichier suivant dans "apps/admin/modules/sfGuardAuth/templates/"
    - plugins/ndAdminDesignPlugin/modules/sfGuardAuth/templates/_signin_form.php

6. Copier le fichier suivant dans "apps/admin/templates/"
    - plugins/ndAdminDesignPlugin/modules/templates/login.php

7. Copier le fichier suivant dans "/images"
    - plugins/ndAdminDesignPlugin/web/images/default_logo.png

8. Dans data/fixtures/peanutSettings.yml, ajouter un champ "interface"

    a:2:{s:5:"title";s:18:"Peanut2 Revolution";s:5:"color";s:7:"#f0017a";}


9. Dans le fichier apps/admin/config/app.yml, ajouter :

      # default values
      all:
        sfImageTransformPlugin:
          default_adapter: GD
          default_image:
            mime_type: image/png
            filename: Untitled.png
          mime_type:
            auto_detect: true
            library: gd_mime_type


10. Dans le fichier apps/admin/config/settings.yml, ajouter :

      standard_helpers:       [Partial, ..., Thumb]

11. Pour finir, executer : 
      
      mkdir web/uploads/admin/
      mkdir web/uploads/admin/thumb && chmod 777 -R web/uploads/admin/
      cp 
      
12. BUILD ! ... ou MIGRATE pour ne pas perdre vos données.


