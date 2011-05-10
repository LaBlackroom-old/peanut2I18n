<?php

  class languageActions extends sfActions
  {
    public function executeChangeLanguage(sfWebRequest $request)
    {
      $form = new sfFormLanguage(
        $this->getUser(),
        array('languages' => array('en', 'fr'))
      );

      $form->process($request);

      return $this->redirect('localized_homepage');
    }
  }