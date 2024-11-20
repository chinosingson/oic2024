<?php

namespace Drupal\Tests\views_flipped_table\Functional\Plugin;

use Drupal\Tests\views\Functional\ViewTestBase;

/**
 * Tests the table style views plugin.
 *
 * @group views
 */
class StyleFlippedTableTest extends ViewTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'views',
    'views_flipped_table',
    'views_flipped_table_test_config',
  ];

  /**
   * Views used by this test.
   *
   * @var array
   */
  public static $testViews = ['test_flipped_table', 'test_table'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected function setUp($import_test_views = TRUE, $modules = ['views_test_config']): void {
    $modules = [...$modules, 'views_flipped_table_test_config'];
    parent::setUp($import_test_views, $modules);

    $this->enableViewsTestModule();
  }

  /**
   * Tests the first row header option.
   */
  public function testFirstRowHeader() {
    $this->drupalGet('test-flipped-table');

    // Default is to show the first row in the header.
    $this->assertSession()->elementExists('xpath', '//thead/tr/th[contains(., "Age")]');

    // Disable first row header option.

    /** @var \Drupal\views\ViewEntityInterface $view */
    $view = \Drupal::entityTypeManager()->getStorage('view')->load('test_flipped_table');
    $display = &$view->getDisplay('default');
    $display['display_options']['style']['options']['flipped_table_header_first_field'] = FALSE;
    $view->save();

    $this->drupalGet('test-flipped-table');

    $this->assertSession()->elementNotExists('xpath', '//thead/tr/th[contains(., "Age")]');
    $this->assertSession()->elementExists('xpath', '//tbody/tr/th[contains(., "Age")]');
  }

  /**
   * Tests table fields in columns.
   */
  public function testFieldInColumns(): void {
    $this->drupalGet('test-flipped-table');

    // Ensure that both columns are in separate tds.
    // Check for class " views-field-job ", because just "views-field-job" won't
    // do: "views-field-job-1" would also contain "views-field-job".
    // @see Drupal\system\Tests\Form\ElementTest::testButtonClasses().
    $this->assertSession()->elementExists('xpath', '//tbody/tr/td[contains(concat(" ", @class, " "), " views-field-job ")]');
    $this->assertSession()->elementExists('xpath', '//tbody/tr/td[contains(concat(" ", @class, " "), " views-field-job-1 ")]');

    // Ensure the field classes are also on their respective header cells in
    // the table body.
    $this->assertSession()->elementExists('xpath', '//tbody/tr/th[contains(concat(" ", @class, " "), " views-field-job ")]');
    $this->assertSession()->elementExists('xpath', '//tbody/tr/th[contains(concat(" ", @class, " "), " views-field-job-1 ")]');

    // Click the sort link.
    $this->clickLink('ID');

    // Ensure the "is-active" class is on both the td and th for that field.
    $contains_field_id = 'contains(@class, "views-field-id")';
    $contains_is_active = 'contains(@class, "is-active")';
    $this->assertSession()->elementExists('xpath', "//tbody/tr/th[$contains_field_id and $contains_is_active]");
    $this->assertSession()->elementExists('xpath', "//tbody/tr/td[$contains_field_id and $contains_is_active]");
  }

}
