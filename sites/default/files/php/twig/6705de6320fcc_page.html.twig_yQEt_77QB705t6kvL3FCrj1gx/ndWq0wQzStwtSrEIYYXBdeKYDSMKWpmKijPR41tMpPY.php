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

/* themes/custom/jango/templates/page.html.twig */
class __TwigTemplate_c715af94a2daa8981ab4f54af9f64884 extends \Twig\Template
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
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
        echo "
";
        // line 54
        if (($context["layout_builder_activated"] ?? null)) {
            // line 55
            echo "
  ";
            // line 56
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nikadevs_page"] ?? null), 56, $this->source), "html", null, true);
            echo "

";
        } else {
            // line 59
            echo "
  ";
            // line 60
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 60)) {
                // line 61
                echo "    ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
                echo "
  ";
            }
            // line 63
            echo "  <div class=\"container contextual-links-region\">
    ";
            // line 64
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "page_top", [], "any", false, false, true, 64)) {
                // line 65
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "page_top", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
                echo "
    ";
            }
            // line 67
            echo "    <div class=\"row\">
      <div class=\"col-md-12\">
        ";
            // line 69
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 69)) {
                // line 70
                echo "          ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
                echo "
        ";
            }
            // line 72
            echo "      </div>
      <div class=\"col-md-12\">
        ";
            // line 74
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 74)) {
                // line 75
                echo "          ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
                echo "
        ";
            }
            // line 77
            echo "      </div>
    </div>
    ";
            // line 79
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "page_bottom", [], "any", false, false, true, 79)) {
                // line 80
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "page_bottom", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
                echo "
    ";
            }
            // line 82
            echo "    ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_full", [], "any", false, false, true, 82)) {
                // line 83
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_full", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
                echo "
    ";
            }
            // line 85
            echo "  </div>
  ";
            // line 86
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 86)) {
                // line 87
                echo "    ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
                echo "
  ";
            }
            // line 89
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 89,  126 => 87,  124 => 86,  121 => 85,  115 => 83,  112 => 82,  106 => 80,  104 => 79,  100 => 77,  94 => 75,  92 => 74,  88 => 72,  82 => 70,  80 => 69,  76 => 67,  70 => 65,  68 => 64,  65 => 63,  59 => 61,  57 => 60,  54 => 59,  48 => 56,  45 => 55,  43 => 54,  39 => 53,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/jango/templates/page.html.twig", "/app/web/themes/custom/jango/templates/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 54);
        static $filters = array("escape" => 53);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
