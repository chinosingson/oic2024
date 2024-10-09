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

/* themes/custom/jango_sub/templates/html.html.twig */
class __TwigTemplate_8b07144e713e021e7dfaee5543e3d485 extends \Twig\Template
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
        // line 28
        echo "<!DOCTYPE html>
<html";
        // line 29
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["html_attributes"] ?? null), 29, $this->source), "html", null, true);
        echo ">
  <head>
    <head-placeholder token=\"";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 31, $this->source), "html", null, true);
        echo "\">
    <title>";
        // line 32
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["head_title"] ?? null), 32, $this->source), " | "));
        echo "</title>
    <link rel=\"preload\" as=\"font\" type=\"font/woff\" href=\"/themes/custom/jango_sub/fonts/Metropolis-Regular.woff\" crossorigin>
    <link rel=\"preload\" as=\"font\" type=\"font/woff\" href=\"/themes/custom/jango_sub/fonts/Metropolis-Bold.woff\" crossorigin>
    <link rel=\"preload\" as=\"font\" type=\"font/woff\" href=\"/themes/custom/jango_sub/fonts/Metropolis-Medium.woff\" crossorigin>
    <link rel=\"preload\" as=\"font\" type=\"font/woff\" href=\"/themes/custom/jango_sub/fonts/Metropolis-Light.woff\" crossorigin>
    <css-placeholder token=\"";
        // line 37
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 37, $this->source), "html", null, true);
        echo "\">
    <js-placeholder token=\"";
        // line 38
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 38, $this->source), "html", null, true);
        echo "\">
    ";
        // line 39
        if (($context["gmap_key"] ?? null)) {
            echo "      
      <script src=\"//maps.googleapis.com/maps/api/js?key=";
            // line 40
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["gmap_key"] ?? null), 40, $this->source), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
    ";
        }
        // line 42
        echo "  </head>
  <body";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 43, $this->source), "html", null, true);
        echo ">
    ";
        // line 48
        echo "    <a href=\"#main-content\" class=\"visually-hidden focusable\">
      ";
        // line 49
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Skip to main content"));
        echo "
    </a>
    ";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_top"] ?? null), 51, $this->source), "html", null, true);
        echo "
    ";
        // line 52
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page"] ?? null), 52, $this->source), "html", null, true);
        echo "
    ";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_bottom"] ?? null), 53, $this->source), "html", null, true);
        echo "
    <js-bottom-placeholder token=\"";
        // line 54
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 54, $this->source), "html", null, true);
        echo "\">
    <div class=\"c-layout-go2top\" style=\"display: block;\">
      <i class=\"icon-arrow-up\"></i>
    </div>

    ";
        // line 59
        if (($context["dev"] ?? null)) {
            // line 60
            echo "      <nav class=\"c-layout-quick-sidebar\">
        <div class=\"c-header\">
          <button type=\"button\" class=\"c-link c-close\">
            <i class=\"icon-login\"></i>
          </button>
        </div>
        <div class=\"c-content\">
          <div class=\"c-section\">
            <h3>";
            // line 68
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Theme Colors"));
            echo "</h3>
            <div class=\"c-settings\">
              <span class=\"c-color c-default c-active\" data-color=\"default\"></span>
              <span class=\"c-color c-green1\" data-color=\"green1\"></span>
              <span class=\"c-color c-green2\" data-color=\"green2\"></span>
              <span class=\"c-color c-green3\" data-color=\"green3\"></span>
              <span class=\"c-color c-yellow1\" data-color=\"yellow1\"></span>
              <span class=\"c-color c-yellow2\" data-color=\"yellow2\"></span>
              <span class=\"c-color c-yellow3\" data-color=\"yellow3\"></span>
              <span class=\"c-color c-red1\" data-color=\"red1\"></span>
              <span class=\"c-color c-red2\" data-color=\"red2\"></span>
              <span class=\"c-color c-red3\" data-color=\"red3\"></span>
              <span class=\"c-color c-purple1\" data-color=\"purple1\"></span>
              <span class=\"c-color c-purple2\" data-color=\"purple2\"></span>
              <span class=\"c-color c-purple3\" data-color=\"purple3\"></span>
              <span class=\"c-color c-blue1\" data-color=\"blue1\"></span>
              <span class=\"c-color c-blue2\" data-color=\"blue2\"></span>
              <span class=\"c-color c-blue3\" data-color=\"blue3\"></span>
              <span class=\"c-color c-brown1\" data-color=\"brown1\"></span>
              <span class=\"c-color c-brown2\" data-color=\"brown2\"></span>
              <span class=\"c-color c-brown3\" data-color=\"brown3\"></span>
              <span class=\"c-color c-dark1\" data-color=\"dark1\"></span>
              <span class=\"c-color c-dark2\" data-color=\"dark2\"></span>
              <span class=\"c-color c-dark3\" data-color=\"dark3\"></span>
            </div>
          </div>
          <div class=\"c-section\">
            <h3>";
            // line 95
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Header Type"));
            echo "</h3>
            <div class=\"c-settings\">
              <input type=\"button\" class=\"c-setting_header-type btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active\" data-value=\"boxed\" value=\"boxed\">
              <input type=\"button\" class=\"c-setting_header-type btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase\" data-value=\"fluid\" value=\"fluid\">
            </div>
          </div>
          <div class=\"c-section\">
            <h3>";
            // line 102
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Header Mode"));
            echo "</h3>
            <div class=\"c-settings\">
              <input type=\"button\" class=\"c-setting_header-mode btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active\" data-value=\"fixed\" value=\"fixed\">
              <input type=\"button\" class=\"c-setting_header-mode btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase\" data-value=\"static\" value=\"static\">
            </div>
          </div>
          <div class=\"c-section\">
            <h3>";
            // line 109
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Mega Menu Style"));
            echo "</h3>
            <div class=\"c-settings\">
              <input type=\"button\" class=\"c-setting_megamenu-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active\" data-value=\"dark\" value=\"dark\">
              <input type=\"button\" class=\"c-setting_megamenu-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase\" data-value=\"light\" value=\"light\">
            </div>
          </div>
          <div class=\"c-section\">
            <h3>";
            // line 116
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Font Style"));
            echo "</h3>
            <div class=\"c-settings\">
              <input type=\"button\" class=\"c-setting_font-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase active\" data-value=\"default\" value=\"default\">
              <input type=\"button\" class=\"c-setting_font-style btn btn-sm c-btn-square c-btn-border-1x c-btn-white c-btn-sbold c-btn-uppercase\" data-value=\"light\" value=\"light\">
            </div>
          </div>
        </div>
      </nav>
    ";
        }
        // line 125
        echo "
    <!--[if lt IE 9]>
    <script src=\"../assets/global/plugins/excanvas.min.js\"></script>
    <![endif]-->
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango_sub/templates/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 125,  183 => 116,  173 => 109,  163 => 102,  153 => 95,  123 => 68,  113 => 60,  111 => 59,  103 => 54,  99 => 53,  95 => 52,  91 => 51,  86 => 49,  83 => 48,  79 => 43,  76 => 42,  71 => 40,  67 => 39,  63 => 38,  59 => 37,  51 => 32,  47 => 31,  42 => 29,  39 => 28,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/jango_sub/templates/html.html.twig", "/app/web/themes/custom/jango_sub/templates/html.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 39);
        static $filters = array("escape" => 29, "safe_join" => 32, "t" => 49);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'safe_join', 't'],
                []
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
