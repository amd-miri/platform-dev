api = 2
core = 7.x

projects[drupal][type] = "core"
projects[drupal][version] = "7.35"

projects[drupal][patch][] = patches/ajax-js_url_suffix.patch
projects[drupal][patch][] = patches/default-settings-php-include-local-settings-3154.patch
projects[drupal][patch][] = patches/entity-entity_load_sanity_check_any_integer_do_not_test-1003788-76.patch
projects[drupal][patch][] = patches/field-extra-fields-visible-1256368-83.patch
projects[drupal][patch][] = patches/form-form_anonymous_no_token-1617918-17.patch
projects[drupal][patch][] = patches/imagegd-transparency-29_0.patch
projects[drupal][patch][] = patches/menu-conflict_with_menu_token-2534.patch
projects[drupal][patch][] = patches/node-node_access_views_relationship-1349080.patch
projects[drupal][patch][] = patches/standard-change_article_description-791.patch
projects[drupal][patch][] = patches/user-drupal.d7.user-password-reset-logged-in-889772.patch
projects[drupal][patch][] = patches/user-request_password_behaviour-2205.patch
projects[drupal][patch][] = patches/user-user_picture_deleted_user_save_call-935592-65.patch
projects[drupal][patch][] = patches/user-vulnerability-884.patch
