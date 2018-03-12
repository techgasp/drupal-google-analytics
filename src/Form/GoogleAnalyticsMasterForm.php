<?php

namespace Drupal\googleanalyticsmaster\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class GoogleAnalyticsMasterForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'googleanalyticsmaster_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Form constructor.
    $form = parent::buildForm($form, $form_state);
    // Default settings.
    $config = $this->config('googleanalyticsmaster.settings');

    // Insert Type field.
    $form['tracking_id'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Insert Traking Id number:'),
      '#default_value' => $config->get('googleanalyticsmaster.tracking_id'),
      '#description' => $this->t('if Tracking Id is selected above, insert it here.'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('googleanalyticsmaster.settings');
    $config->set('googleanalyticsmaster.tracking_id', $form_state->getValue('tracking_id'));
    $config->save();
    return parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'googleanalyticsmaster.settings',
    ];
  }
}
