<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/jango_sub/templates/shortcodes/jango-shortcodes-menu.html.twig */
class __TwigTemplate_b5639b5d648d044b3ab657ebb2b46d2e extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<header class=\"c-layout-header test ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["class"] ?? null), 1, $this->source), "html", null, true);
        echo "\" data-minimize-offset=\"80\">
  <input type=\"hidden\" id=\"body-classes\" value=\"";
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["body_classes"] ?? null), 2, $this->source), "html", null, true);
        echo "\"/>
  ";
        // line 3
        if (($context["header_top"] ?? null)) {
            // line 4
            echo "    <div class=\"c-topbar c-topbar-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_class"] ?? null), 4, $this->source), "html", null, true);
            echo "\">
      <div class=\"container";
            // line 5
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["width"] ?? null), 5, $this->source), "html", null, true);
            echo "\">


        <!-- BEGIN: INLINE NAV -->
        <nav class=\"c-top-menu c-pull-right\">
            
              <ul class=\"c-ext c-theme-ul\">
                ";
            // line 17
            echo "                <li class=\"c-lang dropdown c-last\">
                  <a href=\"#\">";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar("Select Language");
            echo "</a>
                  <!-- Language list menu -->
                  <ul class=\"language-switcher-language-url dropdown-menu pull-right\">
                    <li hreflang=\"fr\" class=\"fr\">
                      <!-- <a href=\"https://translate.google.com/translate?hl=&sl=en&tl=fr&u=https://oceaninnovationchallenge.org\" class=\"language-link\" hreflang=\"fr\" target=\"_blank\">French</a> -->
                      <a href=\"https://rua7oqtzgoqavgvbs6i7pu4fse-ac5fdsxevxq4s5y.translate.goog\" class=\"language-link\" hreflang=\"fr\" target=\"_blank\">French</a>
                    </li>
                    <li hreflang=\"es\" class=\"es\">
                      <!-- <a href=\"https://translate.google.com/translate?hl=&sl=en&tl=es&u=https://oceaninnovationchallenge.org\" class=\"language-link\" hreflang=\"es\" target=\"_blank\">Spanish</a> -->
                      <a href=\"https://vx6ixilarp2v6w7ujdmyullhhq-ac5fdsxevxq4s5y.translate.goog\" class=\"language-link\" hreflang=\"es\" target=\"_blank\">Spanish</a>
                    </li>
                  </ul>
                </li>
                <li class=\"c-divider\">|</li>
              ";
            // line 32
            if (($context["search"] ?? null)) {
                // line 33
                echo "                <li class=\"c-search-toggler-wrapper\">
                  <a href=\"#\" class=\"c-btn-icon c-search-toggler\">
                    <i class=\"fa fa-search\"></i>
                  </a>
                </li>
              ";
            }
            // line 39
            echo "              </ul>

        </nav>
        <!-- END: INLINE NAV -->
      </div>
    </div>
  ";
        }
        // line 46
        echo "
  <div class=\"c-navbar\">
    <div class=\"container";
        // line 48
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["width"] ?? null), 48, $this->source), "html", null, true);
        echo "\">
      <!-- BEGIN: BRAND -->
      <div class=\"c-navbar-wrapper clearfix\">
        <div class=\"c-brand c-pull-left\">
          <a href=\"";
        // line 52
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        echo "\" class=\"c-logo\">
            <img src=\"";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["logo"] ?? null), 53, $this->source), "html", null, true);
        echo "\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 53, $this->source), "html", null, true);
        echo "\" class=\"c-desktop-logo\">
            <img src=\"";
        // line 54
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["logo"] ?? null), 54, $this->source), "html", null, true);
        echo "\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 54, $this->source), "html", null, true);
        echo "\" class=\"c-desktop-logo-inverse\">
            <img src=\"";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["logo"] ?? null), 55, $this->source), "html", null, true);
        echo "\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 55, $this->source), "html", null, true);
        echo "\" class=\"c-mobile-logo\">
          </a>

          <a id=\"toggle-icon\" class=\"toggle c-hor-nav-toggler responsive-menu-toggle\" title=\"Menu\" href=\"#off-canvas\">
            <span class=\"c-line\"></span>
            <span class=\"c-line\"></span>
            <span class=\"c-line\"></span>
          </a>
          <button class=\"c-topbar-toggler\" type=\"button\">
            <i class=\"fa fa-ellipsis-v\"></i>
          </button>
          ";
        // line 71
        echo "          ";
        if (($context["cart"] ?? null)) {
            // line 72
            echo "            <button class=\"c-cart-toggler\" type=\"button\">
              <i class=\"icon-handbag\"></i>
              <span class=\"c-cart-number c-theme-bg\">";
            // line 74
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cart_count"] ?? null), 74, $this->source), "html", null, true);
            echo "</span>
            </button>
          ";
        }
        // line 77
        echo "        </div>
        ";
        // line 78
        if ((($context["search"] ?? null) && (($context["search_block"] ?? null) != false))) {
            // line 79
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["search_block"] ?? null), 79, $this->source), "html", null, true);
            echo "
        ";
        }
        // line 81
        echo "
        <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
        <nav class=\"c-mega-menu c-pull-right c-mega-menu-";
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["bg_color"] ?? null), 83, $this->source), "html", null, true);
        echo " c-mega-menu-dark-mobile c-mega-menu-onepage\" data-onepage-animation-speed=\"700\">
          <!-- Main Menu -->
          <ul class=\"nav navbar-nav c-theme-nav\">
            ";
        // line 86
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["menu"] ?? null), 86, $this->source), "html", null, true);
        echo "

            ";
        // line 88
        if (($context["cart"] ?? null)) {
            // line 89
            echo "              <li class=\"c-cart-toggler-wrapper\">
                <a href=\"";
            // line 90
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("commerce_cart.page"));
            echo "\" class=\"c-btn-icon c-cart-toggler\">
                  <i class=\"icon-handbag c-cart-icon\"></i>
                  <span class=\"c-cart-number c-theme-bg\">";
            // line 92
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cart_count"] ?? null), 92, $this->source), "html", null, true);
            echo "</span>
                </a>
              </li>
            ";
        }
        // line 96
        echo "
            ";
        // line 97
        if (($context["login"] ?? null)) {
            // line 98
            echo "              <li>
                ";
            // line 99
            if (($context["is_authenticated"] ?? null)) {
                // line 100
                echo "                  ";
                $context["user_menu_title"] = "Account";
                // line 101
                echo "                ";
            } else {
                // line 102
                echo "                  ";
                $context["user_menu_title"] = "Sign In";
                // line 103
                echo "                ";
            }
            // line 104
            echo "                <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("user.page"));
            echo "\"
                   class=\"c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold\">
                  <i class=\"icon-user\"></i> ";
            // line 106
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t($this->sandbox->ensureToStringAllowed(($context["user_menu_title"] ?? null), 106, $this->source)));
            echo "
                </a>
              </li>
            ";
        }
        // line 110
        echo "
            ";
        // line 111
        if (($context["is_dev_host"] ?? null)) {
            // line 112
            echo "              <li class=\"c-quick-sidebar-toggler-wrapper\">
                <a href=\"#\" class=\"c-quick-sidebar-toggler\">
                  <span class=\"c-line\"></span>
                  <span class=\"c-line\"></span>
                  <span class=\"c-line\"></span>
                </a>
              </li>
            ";
        }
        // line 120
        echo "          </ul>
        </nav>
      </div>

      ";
        // line 124
        if ((($context["cart_block"] ?? null) != false)) {
            // line 125
            echo "        <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => [0 => "c-cart-menu"]], "method", false, false, true, 125), 125, $this->source), "html", null, true);
            echo ">
          <div class=\"c-cart-menu-title\">
            <p class=\"c-cart-menu-float-l c-font-sbold\">";
            // line 127
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["count_text"] ?? null), 127, $this->source), "html", null, true);
            echo "</p>
            <p class=\"c-cart-menu-float-r c-theme-font c-font-sbold\">";
            // line 128
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cart_total_price"] ?? null), 128, $this->source), "html", null, true);
            echo "</p>
          </div>
          ";
            // line 130
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cart_block"] ?? null), 130, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 133
        echo "
    </div>
  </div>
</header>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango_sub/templates/shortcodes/jango-shortcodes-menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  282 => 133,  276 => 130,  271 => 128,  267 => 127,  261 => 125,  259 => 124,  253 => 120,  243 => 112,  241 => 111,  238 => 110,  231 => 106,  225 => 104,  222 => 103,  219 => 102,  216 => 101,  213 => 100,  211 => 99,  208 => 98,  206 => 97,  203 => 96,  196 => 92,  191 => 90,  188 => 89,  186 => 88,  181 => 86,  175 => 83,  171 => 81,  165 => 79,  163 => 78,  160 => 77,  154 => 74,  150 => 72,  147 => 71,  131 => 55,  125 => 54,  119 => 53,  115 => 52,  108 => 48,  104 => 46,  95 => 39,  87 => 33,  85 => 32,  68 => 18,  65 => 17,  55 => 5,  50 => 4,  48 => 3,  44 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/jango_sub/templates/shortcodes/jango-shortcodes-menu.html.twig", "/app/web/themes/custom/jango_sub/templates/shortcodes/jango-shortcodes-menu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 3, "set" => 100);
        static $filters = array("escape" => 1, "t" => 106);
        static $functions = array("url" => 52);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
                ['escape', 't'],
                ['url']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
