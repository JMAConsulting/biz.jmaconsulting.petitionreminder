<?php

require_once 'petitionreminder.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function petitionreminder_civicrm_config(&$config) {
  _petitionreminder_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function petitionreminder_civicrm_xmlMenu(&$files) {
  _petitionreminder_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function petitionreminder_civicrm_install() {
  _petitionreminder_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function petitionreminder_civicrm_uninstall() {
  _petitionreminder_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function petitionreminder_civicrm_enable() {
  _petitionreminder_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function petitionreminder_civicrm_disable() {
  _petitionreminder_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function petitionreminder_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _petitionreminder_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function petitionreminder_civicrm_managed(&$entities) {
  _petitionreminder_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function petitionreminder_civicrm_caseTypes(&$caseTypes) {
  _petitionreminder_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function petitionreminder_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _petitionreminder_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implementation of hook_civicrm_buildForm
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_buildForm
 */
function petitionreminder_civicrm_buildForm($formName, &$form) {
  if ($formName == "CRM_Campaign_Form_Petition_Signature") {
    $tags = CRM_Core_Smarty::singleton()->get_template_vars('tag');
    if (isset($tags)) {
      foreach ($tags as $key => &$tag) {
        if ($tag['name'] != "Renewable Kootenays") {
          unset($tags[$key]);
        }
        else {
          $tag['name'] = ts("Might Volunteer - Renewable Kootenays");
        }
      }
      $form->assign('tag', $tags);
      $form->assign('tree', $tags);
      $form->assign('tagCount', count($tags));
    }
  }
}
